<?php
/**
 * Elemento reutilizable para formularios de edición (edit)
 * Variables esperadas:
 *  - $entity: la entidad (product, category, order, etc.)
 *  - $fields: array con los campos a renderizar ['name', 'price', 'description']
 *  - $title: título del formulario (opcional)
 *  - $returnAction: acción para el botón volver (por defecto 'index')
 */
?>

<div class="container-fluid px-4 mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-semibold text-dark">
            <i class="bi bi-pencil-square me-2 text-primary"></i>
            <?= h($title ?? 'Editar Registro') ?>
        </h2>
        <?= $this->Html->link(
            '<i class="bi bi-arrow-left me-1"></i> Volver',
            ['action' => $returnAction ?? 'index'],
            ['class' => 'btn btn-outline-secondary', 'escape' => false]
        ) ?>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <?= $this->Form->create($entity, ['class' => 'needs-validation', 'novalidate' => true]) ?>

                    <?php foreach ($fields as $field): ?>
                        <div class="mb-3">
                            <?= $this->Form->control($field, [
                                'label' => ['class' => 'form-label fw-semibold', 'text' => ucfirst($field)],
                                'class' => 'form-control'
                            ]) ?>
                        </div>
                    <?php endforeach; ?>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <?= $this->Form->postLink(
                            '<i class="bi bi-trash me-2"></i> Eliminar',
                            ['action' => 'delete', $entity->id],
                            [
                                'confirm' => '¿Seguro que deseas eliminar este registro?',
                                'class' => 'btn btn-outline-danger',
                                'escape' => false
                            ]
                        ) ?>

                        <?= $this->Form->button(
                            '<i class="bi bi-save me-2"></i> Guardar cambios',
                            ['class' => 'btn btn-primary px-4', 'escapeTitle' => false]
                        ) ?>
                    </div>

                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
