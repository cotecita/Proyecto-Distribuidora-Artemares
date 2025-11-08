<?php
/**
 * Elemento genérico para formularios de edición compatible con controlador base (Bake)
 * No requiere manejar archivos en el controlador.
 */
$fieldOptions = $fieldOptions ?? [];
?>
<div class="card shadow-sm border-0 mb-4">
    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
        <h4 class="mb-0 fw-semibold text-dark">
            <?php if (!empty($icon)): ?>
                <i class="bi <?= h($icon) ?> text-primary me-2"></i>
            <?php endif; ?>
            <?= h($title ?? 'Formulario') ?>
        </h4>

        <?= $this->Html->link(
            '<i class="bi bi-arrow-left"></i> Volver',
            ['action' => 'index'],
            ['escape' => false, 'class' => 'btn btn-outline-secondary btn-sm']
        ) ?>
    </div>

    <div class="card-body">
        <?= $form->create($entity, ['class' => 'row g-3', 'type' => 'file']) ?>

        <?php foreach ($fields as $field): ?>
            <?php
                $options = [
                    'class' => 'form-control',
                    'label' => ucfirst(str_replace('_', ' ', $field))
                ];

                if (str_contains($field, 'description')) {
                    $options['type'] = 'textarea';
                    $options['rows'] = 4;
                } elseif (str_contains($field, 'category')) {
                    $options['options'] = $categories ?? [];
                    $options['empty'] = 'Selecciona una categoría';
                } elseif (str_contains($field, 'image')) {
                    $options['type'] = 'file';
                    $options['accept'] = 'image/*';
                }
            ?>
            <div class="col-md-6">
                <?= $form->control($field, $options) ?>
            </div>
        <?php endforeach; ?>

        <!-- Mostrar la imagen actual si el controlador la pasa -->
        <?php if (!empty($entity->product_image) && !empty($entity->product_image->image_medium)): ?>
            <div class="col-md-6">
                <label class="form-label fw-semibold">Imagen actual</label>
                <div class="border rounded p-2 bg-light text-center">
                    <img
                        src="data:<?= h($entity->product_image->mime_type_medium ?? 'image/jpeg') ?>;base64,<?= base64_encode(stream_get_contents($entity->product_image->image_medium)) ?>"
                        alt="Imagen del producto"
                        style="max-width: 100%; height: auto;"
                    />
                </div>
            </div>
        <?php endif; ?>

        <div class="col-12 d-flex justify-content-end mt-3">
            <?php if (!empty($showDelete) && $showDelete): ?>
                <?= $form->postLink(
                    '<i class="bi bi-trash"></i> Eliminar',
                    ['action' => 'delete', $entity->id],
                    ['escape' => false, 'class' => 'btn btn-outline-danger me-auto', 'confirm' => '¿Seguro que deseas eliminar este registro?']
                ) ?>
            <?php endif; ?>

            <?= $form->button(
                '<i class="bi bi-save"></i> ' . ($actionLabel ?? 'Guardar'),
                ['escapeTitle' => false, 'class' => 'btn btn-primary px-4']
            ) ?>
        </div>

        <?= $form->end() ?>
    </div>
</div>
