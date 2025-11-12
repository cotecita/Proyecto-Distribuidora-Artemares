<?php
/**
 * Vista: Detalle de Producto
 * Estilo Artemares — coherente con index y forms
 */
?>

<!-- Encabezado -->
<div class="mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="fw-semibold mb-1" style="color: #009FE3;">
            <i class="bi bi-eye me-2"></i> Detalle del Producto
        </h3>
        <?= $this->Html->link(
            '<i class="bi bi-arrow-left"></i> Volver',
            ['action' => 'index'],
            ['escape' => false, 'class' => 'btn btn-outline-secondary btn-sm shadow-sm']
        ) ?>
    </div>

    <div style="
        height: 3px;
        margin-top: 6px;
        border-radius: 2px;
        background: linear-gradient(90deg, #009FE3 0%, #4CC3FF 100%);
        width: 100%;
    "></div>
</div>

<!-- Card principal con datos del producto -->
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <dl class="row mb-0">
            <dt class="col-sm-4 text-muted">ID</dt>
            <dd class="col-sm-8"><?= h($product->id) ?></dd>

            <dt class="col-sm-4 text-muted">Nombre</dt>
            <dd class="col-sm-8"><?= h($product->name) ?></dd>

            <dt class="col-sm-4 text-muted">Descripción</dt>
            <dd class="col-sm-8"><?= h($product->description) ?></dd>

            <dt class="col-sm-4 text-muted">Precio</dt>
            <dd class="col-sm-8">$<?= number_format($product->price, 0, ',', '.') ?></dd>

            <dt class="col-sm-4 text-muted">Cantidad por unidad</dt>
            <dd class="col-sm-8"><?= h($product->unit_quantity) ?></dd>

            <dt class="col-sm-4 text-muted">Unidad</dt>
            <dd class="col-sm-8"><?= h($product->unit) ?></dd>

            <dt class="col-sm-4 text-muted">Categoría</dt>
            <dd class="col-sm-8"><?= h($product->category->name ?? 'Sin categoría') ?></dd>

            <dt class="col-sm-4 text-muted">Creado</dt>
            <dd class="col-sm-8"><?= $product->created ? $product->created->format('d/m/Y H:i') : '-' ?></dd>

            <dt class="col-sm-4 text-muted">Última modificación</dt>
            <dd class="col-sm-8"><?= $product->modified ? $product->modified->format('d/m/Y H:i') : '-' ?></dd>
        </dl>
    </div>
</div>

<!-- Imagen del producto -->
<div class="card border-0 shadow-sm mt-4">
    <div class="card-header bg-white border-0 pb-2">
        <h5 class="fw-semibold text-dark mb-0">
            <i class="bi bi-image me-2 text-primary"></i> Imagen del producto
        </h5>
        <div style="
            height: 2px;
            margin-top: 6px;
            width: 100%;
            background: linear-gradient(90deg, #009FE3 0%, #4CC3FF 100%);
            border-radius: 1px;
        "></div>
    </div>

    <div class="card-body text-center">
        <?php if (!empty($product->product_image) && !empty($product->product_image->image_large)): ?>
            <img
                src="data:<?= h($product->product_image->mime_type_large ?? 'image/jpeg') ?>;base64,<?= base64_encode(stream_get_contents($product->product_image->image_large)) ?>"
                alt="Imagen del producto"
                class="img-fluid rounded shadow-sm"
                style="max-height: 320px;"
            />
        <?php else: ?>
            <div class="p-4 text-muted">
                <i class="bi bi-card-image display-6 d-block mb-2 text-secondary"></i>
                <span>Sin imagen disponible</span>
            </div>
        <?php endif; ?>
    </div>
</div>
