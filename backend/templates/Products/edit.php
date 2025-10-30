<?= $this->element('form_edit', [
    'entity' => $product,
    'fields' => ['name', 'price', 'stock', 'unit', 'category_id', 'description'],
    'title' => 'Editar Producto'
]) ?>
