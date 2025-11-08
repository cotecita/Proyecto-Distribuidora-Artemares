<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-semibold text-dark mb-0">
        <i class="bi bi-box-seam me-2 text-primary"></i> Productos
    </h3>

    <?= $this->Html->link(
        '<i class="bi bi-plus-lg"></i> Añadir Producto',
        ['action' => 'add'],
        ['escape' => false, 'class' => 'btn btn-primary shadow-sm']
    ) ?>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Formato</th>
                        <th>Unidad</th>
                        <th>Categoría</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= h($product->id) ?></td>
                        <td><?= h($product->name) ?></td>
                        <td>$<?= number_format($product->price, 0, ',', '.') ?></td>
                        <td><?= h($product->stock) ?></td>
                        <td><?= h($product->format) ?></td>
                        <td><?= h($product->unit) ?></td>
                        <td><?= h($product->category->name ?? '-') ?></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm" role="group">
                                <?= $this->Html->link(
                                    '<i class="bi bi-eye"></i>',
                                    ['action' => 'view', $product->id],
                                    ['escape' => false, 'class' => 'btn btn-outline-secondary', 'title' => 'Ver']
                                ) ?>
                                <?= $this->Html->link(
                                    '<i class="bi bi-pencil-square"></i>',
                                    ['action' => 'edit', $product->id],
                                    ['escape' => false, 'class' => 'btn btn-outline-primary', 'title' => 'Editar']
                                ) ?>
                                <a href="<?= $this->Url->build(['action' => 'delete', $product->id]) ?>"
                                   class="btn btn-outline-danger delete-link"
                                   title="Eliminar">
                                   <i class="bi bi-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
