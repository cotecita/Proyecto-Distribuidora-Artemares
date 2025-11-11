<?php
/**
 * Vista: Editar Receta
 */
?>
<div class="container-fluid px-4">

    <?= $this->element('form_card', [
        'form' => $this->Form,
        'entity' => $recipe,
        'title' => 'Editar Receta',
        'icon' => 'bi-egg-fried',
        'fields' => ['name', 'description', 'ingredients', 'image_file'],
        'actionLabel' => 'Actualizar',
        'showDelete' => true
    ]) ?>
</div>
