<?php
/**
 * Vista: Agregar Receta
 */
?>
<div class="container-fluid px-4">

    <?= $this->element('form_card', [
        'form' => $this->Form,
        'entity' => $recipe,
        'title' => 'Agregar Receta',
        'icon' => 'bi-egg-fried',
        'fields' => ['name', 'description', 'ingredients', 'image_file'],
        'actionLabel' => 'Guardar',
        'showDelete' => false
    ]) ?>
</div>
