<?php
/**
 * Vista: Editar Producto
 * Usa el element form_card, adaptado al controlador actual (campo image_file)
 */
?>

<?= $this->element('form_card', [
    'form' => $this->Form,
    'entity' => $product,
    'title' => 'Editar Producto',
    'icon' => 'bi-pencil-square',
    'fields' => [
        'name',
        'description',
        'price',
        'stock',
        'unit_quantity',
        'unit',
        'category_id',
        'image_file'
    ],
    'actionLabel' => 'Actualizar',
    'showDelete' => false,
    'categories' => $categories ?? []
]) ?>
