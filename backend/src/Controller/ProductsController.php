<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 */
class ProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    /*
    public function index()
    {
        $query = $this->Products->find()
            ->contain(['Categories']);
        $products = $this->paginate($query);

        $this->set(compact('products'));
    }*/

    public function index()
    {
        $query = $this->Products->find()
        ->contain(['Categories'])
        ->order(['Products.modified' => 'DESC']);
        // Búsqueda por nombre
        $search = $this->request->getQuery('search');
        if (!empty($search)) {
            $query->where(['Products.name ILIKE' => "%$search%"]);
        }

        // Lista de categorías para el <select>
        $categoriesList = $this->Products->Categories->find('list', [
            'keyField' => 'id',
            'valueField' => 'name'
        ])->toArray();

        // Filtro por categoría (ID)
        $categoryFilter = $this->request->getQuery('category');
        if (!empty($categoryFilter)) {
            $query->where(['Products.category_id' => $categoryFilter]);
        }

        $products = $this->paginate($query);

        $this->set(compact('products', 'search', 'categoryFilter', 'categoriesList'));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, contain: ['Categories', 'Orders', 'Recipes', 'NutritionalInformations', 'ProductImages']);
        $this->set(compact('product'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        // Creamos una nueva entidad de producto vacía
        $product = $this->Products->newEmptyEntity();

        if ($this->request->is('post')) {

            // Obtenemos todos los datos enviados desde el formulario
            $data = $this->request->getData();

            // Asignamos los datos al producto (nombre, descripción, etc.)
            $product = $this->Products->patchEntity($product, $data);

            //procesar la imagen 
            $imageFile = $data['image_file'] ?? null; // viene del campo del formulario

            if ($imageFile && $imageFile->getError() === UPLOAD_ERR_OK) {
                // Leemos los bytes del archivo
                $imageContent = file_get_contents($imageFile->getStream()->getMetadata('uri'));
                $mimeType = $imageFile->getClientMediaType();

                // Generar versiones small, medium, large
                $imageSmall = $this->resizeImage($imageContent, 100, 100);
                $imageMedium = $this->resizeImage($imageContent, 300, 300);
                $imageLarge = $this->resizeImage($imageContent, 800, 800);
                
                // Creamos una entidad para la tabla product_images
                $productImage = $this->Products->ProductImages->newEntity([
                    'image_small' => $imageSmall,
                    'image_medium' => $imageMedium,
                    'image_large' => $imageLarge,
                    'mime_type_small' => $mimeType,
                    'mime_type_medium' => $mimeType,
                    'mime_type_large' => $mimeType,
                ]);

                // Asociamos esta imagen al producto
                $product->product_image = $productImage;
            }

            if ($this->Products->save($product, ['associated' => ['ProductImages']])) {
                $this->Flash->success(__('El producto ha sido guardado con éxito.'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('El producto no pudo ser guardado. Intente nuevamente.'));
        }

        $categories = $this->Products->Categories->find('list', limit: 200)->all();
        $orders = $this->Products->Orders->find('list', limit: 200)->all();
        $recipes = $this->Products->Recipes->find('list', limit: 200)->all();

        $this->set(compact('product', 'categories', 'orders', 'recipes'));
    }

    #función para crear las 3 versiones de la imagen
    private function resizeImage(string $binaryData, int $width, int $height): string
    {
        $src = imagecreatefromstring($binaryData);
        $origWidth = imagesx($src);
        $origHeight = imagesy($src);

        // Mantener proporciones
        $ratio = min($width / $origWidth, $height / $origHeight);
        $newWidth = (int)($origWidth * $ratio);
        $newHeight = (int)($origHeight * $ratio);

        $dst = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);

        ob_start();
        imagepng($dst);
        $resizedData = ob_get_clean();

        imagedestroy($src);
        imagedestroy($dst);

        return $resizedData;
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /*
    public function edit($id = null)
    {
        $product = $this->Products->get($id, contain: ['Orders', 'Recipes']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $categories = $this->Products->Categories->find('list', limit: 200)->all();
        $orders = $this->Products->Orders->find('list', limit: 200)->all();
        $recipes = $this->Products->Recipes->find('list', limit: 200)->all();
        $this->set(compact('product', 'categories', 'orders', 'recipes'));
    }*/
    public function edit($id = null)
    {
        // Obtenemos el producto incluyendo relaciones
        $product = $this->Products->get($id, contain: ['Orders', 'Recipes', 'ProductImages']);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();

            // Asignamos datos básicos al producto
            $product = $this->Products->patchEntity($product, $data);

            // Procesar nueva imagen si se subió
            $imageFile = $data['image_file'] ?? null;
            if ($imageFile && $imageFile->getError() === UPLOAD_ERR_OK) {
                $imageContent = file_get_contents($imageFile->getStream()->getMetadata('uri'));
                $mimeType = $imageFile->getClientMediaType();

                // Generar versiones small, medium, large
                $imageSmall = $this->resizeImage($imageContent, 100, 100);
                $imageMedium = $this->resizeImage($imageContent, 300, 300);
                $imageLarge = $this->resizeImage($imageContent, 800, 800);

                if ($product->product_image) {
                    // Actualizar campos si ya existe
                    $product->product_image->image_small = $imageSmall;
                    $product->product_image->image_medium = $imageMedium;
                    $product->product_image->image_large = $imageLarge;
                    $product->product_image->mime_type_small = $mimeType;
                    $product->product_image->mime_type_medium = $mimeType;
                    $product->product_image->mime_type_large = $mimeType;
                } else {
                    // Crear nueva entidad si no existe
                    $product->product_image = $this->Products->ProductImages->newEntity([
                        'image_small' => $imageSmall,
                        'image_medium' => $imageMedium,
                        'image_large' => $imageLarge,
                        'mime_type_small' => $mimeType,
                        'mime_type_medium' => $mimeType,
                        'mime_type_large' => $mimeType,
                    ]);
                }
            }

            // Quitar imagen si se marcó el checkbox
            if (!empty($data['remove_image']) && $product->product_image) {
                $this->Products->ProductImages->delete($product->product_image);
                $product->product_image = null;
            }

            // Guardar producto con imagen asociada
            if ($this->Products->save($product, ['associated' => ['ProductImages']])) {
                $this->Flash->success(__('El producto ha sido actualizado con éxito.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El producto no pudo ser actualizado. Intente nuevamente.'));
        }

        $categories = $this->Products->Categories->find('list', limit: 200)->all();
        $orders = $this->Products->Orders->find('list', limit: 200)->all();
        $recipes = $this->Products->Recipes->find('list', limit: 200)->all();
        $this->set(compact('product', 'categories', 'orders', 'recipes'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
