<?php
/**
 * Vista: Detalle de Receta
 * Muestra los datos y la imagen asociada.
 */
?>
<div class="mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="fw-semibold mb-1" style="color: #009FE3;">
            <i class="bi bi-eye me-2"></i> Detalle de la Receta
        </h3>
        <?= $this->Html->link(
            '<i class="bi bi-arrow-left"></i> Volver',
            ['action' => 'index'],
            ['escape' => false, 'class' => 'btn btn-outline-secondary btn-sm shadow-sm']
        ) ?>
    </div>
    <div style="height:3px;margin-top:6px;border-radius:2px;background:linear-gradient(90deg,#009FE3 0%,#4CC3FF 100%);width:100%;"></div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <dl class="row mb-0">
            <dt class="col-sm-4 text-muted">ID</dt>
            <dd class="col-sm-8"><?= h($recipe->id) ?></dd>

            <dt class="col-sm-4 text-muted">Nombre</dt>
            <dd class="col-sm-8"><?= h($recipe->name) ?></dd>

            <dt class="col-sm-4 text-muted">Descripción</dt>
            <dd class="col-sm-8"><?= nl2br(h($recipe->description)) ?></dd>

            <dt class="col-sm-4 text-muted">Ingredientes</dt>
            <dd class="col-sm-8"><?= nl2br(h($recipe->ingredients ?? 'No especificados')) ?></dd>

            <dt class="col-sm-4 text-muted">Creada</dt>
            <dd class="col-sm-8"><?= $recipe->created ? $recipe->created->format('d/m/Y H:i') : '-' ?></dd>
        </dl>

        <?php if (!empty($recipe->recipe_image) && !empty($recipe->recipe_image->image_medium)): ?>
            <div class="mt-4 text-center">
                <label class="fw-semibold text-muted mb-2">Imagen asociada</label>
                <div class="border rounded p-2 bg-light d-inline-block">
                    <img
                        src="data:<?= h($recipe->recipe_image->mime_type_medium ?? 'image/jpeg') ?>;base64,<?= base64_encode(stream_get_contents($recipe->recipe_image->image_medium)) ?>"
                        alt="Imagen de la receta"
                        style="max-width:100%;height:auto;border-radius:8px;"
                    />
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
