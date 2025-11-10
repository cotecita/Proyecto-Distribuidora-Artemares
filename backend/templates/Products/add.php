<?php
/**
 * Vista: Agregar Producto
 * Usa el element form_card, adaptado al controlador actual (campo image_file)
 */
?>

<?= $this->element('form_card', [
    'form' => $this->Form,
    'entity' => $product,
    'title' => 'Agregar Producto',
    'icon' => 'bi-plus-circle',
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
    'actionLabel' => 'Guardar',
    'showDelete' => false,
    'categories' => $categories ?? []
]) ?>
