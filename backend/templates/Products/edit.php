<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 * @var \Cake\Collection\CollectionInterface|string[] $categories
 */
?>

<?php
echo $this->element('form_card', [
    'title' => 'Editar Producto',
    'icon' => 'bi-pencil-square',
    'form' => $this->Form,
    'entity' => $product,
    'fields' => [
        'name', 
        'price', 
        'stock', 
        'format', 
        'unit', 
        'category_id', 
        'description', 
        'image_medium'
    ],
    'actionLabel' => 'Guardar cambios',
    'showDelete' => true,
    'categories' => $categories ?? []
]);
?>
