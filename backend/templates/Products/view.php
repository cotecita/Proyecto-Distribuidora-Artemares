<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-semibold text-dark mb-0">
        <i class="bi bi-eye me-2 text-primary"></i> Detalle del Producto
    </h3>

    <?= $this->Html->link(
        '<i class="bi bi-arrow-left"></i> Volver',
        ['action' => 'index'],
        ['escape' => false, 'class' => 'btn btn-outline-secondary btn-sm']
    ) ?>
</div>

<div class="card border-0 shadow-sm">
    <div class="row g-0">
        <!-- Columna de imagen -->
        <div class="col-md-5 text-center p-4 bg-light border-end">
            <?php if (!empty($product->product_image) && !empty($product->product_image->image_large)): ?>
                <img
                    src="data:<?= h($product->product_image->mime_type_large ?? 'image/jpeg') ?>;base64,<?= base64_encode(stream_get_contents($product->product_image->image_large)) ?>"
                    alt="<?= h($product->name) ?>"
                    class="img-fluid rounded shadow-sm"
                    style="max-height: 400px; object-fit: contain;"
                />
            <?php else: ?>
                <div class="d-flex align-items-center justify-content-center text-muted bg-white border rounded" style="height: 300px;">
                    <i class="bi bi-image" style="font-size: 3rem;"></i>
                </div>
            <?php endif; ?>
        </div>

        <!-- Columna de datos -->
        <div class="col-md-7">
            <div class="card-body p-4">
                <h4 class="fw-bold mb-3"><?= h($product->name) ?></h4>

                <p class="text-muted mb-1">
                    <strong>Precio:</strong> 
                    <span class="text-dark">$<?= number_format($product->price, 0, ',', '.') ?></span>
                </p>
                <p class="text-muted mb-1">
                    <strong>Stock:</strong> <?= h($product->stock) ?> unidades
                </p>
                <p class="text-muted mb-1">
                    <strong>Formato:</strong> <?= h($product->format) ?>
                </p>
                <p class="text-muted mb-1">
                    <strong>Unidad:</strong> <?= h($product->unit) ?>
                </p>
                <p class="text-muted mb-1">
                    <strong>Categoría:</strong>
                    <?= $this->Html->link(
                        $product->category->name ?? '—',
                        ['controller' => 'Categories', 'action' => 'view', $product->category_id],
                        ['class' => 'text-decoration-none text-primary fw-semibold']
                    ) ?>
                </p>

                <?php if (!empty($product->description)): ?>
                    <hr>
                    <p class="text-muted small mb-1"><strong>Descripción:</strong></p>
                    <p class="text-dark"><?= nl2br(h($product->description)) ?></p>
                <?php endif; ?>

                <hr>

                <div class="d-flex justify-content-end mt-3 gap-2">
                    <?= $this->Html->link(
                        '<i class="bi bi-pencil-square"></i> Editar',
                        ['action' => 'edit', $product->id],
                        ['escape' => false, 'class' => 'btn btn-outline-primary']
                    ) ?>
                    <?= $this->Form->postLink(
                        '<i class="bi bi-trash"></i> Eliminar',
                        ['action' => 'delete', $product->id],
                        ['escape' => false, 'class' => 'btn btn-outline-danger', 'confirm' => '¿Seguro que deseas eliminar este producto?']
                    ) ?>
                </div>
            </div>
        </div>
    </div>
</div>
