<?php
/**
 * Vista: Dashboard
 */
?>

<h1 class="mb-4">Tablero</h1>
<div class="row">
    <!-- Total Productos -->
    <div class="col-md-3">
        <div class="card shadow-sm border-start border-4 border-primary mb-3">
            <div class="card-body d-flex align-items-center">
                <div class="me-3 fs-2 text-primary">
                    <i class="bi bi-box-seam"></i>
                </div>
                <div>
                    <div class="text-uppercase small text-muted">
                        Total de Productos
                    </div>
                    <div class="fs-2 fw-bold">
                        <?= $totalProducts ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Categorías -->
    <div class="col-md-3">
        <div class="card shadow-sm border-start border-4 border-success mb-3">
            <div class="card-body d-flex align-items-center">
                <div class="me-3 fs-2 text-success">
                    <i class="bi bi-tags"></i>
                </div>
                <div>
                    <div class="text-uppercase small text-muted">
                        Total de Categorías
                    </div>
                    <div class="fs-2 fw-bold">
                        <?= $totalCategories ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pedidos Pendientes -->
    <div class="col-md-3">
        <div class="card shadow-sm border-start border-4 border-warning mb-3">
            <div class="card-body d-flex align-items-center">
                <div class="me-3 fs-2 text-warning">
                    <i class="bi bi-clock-history"></i>
                </div>
                <div>
                    <div class="text-uppercase small text-muted">
                        Pedidos Pendientes
                    </div>
                    <div class="fs-2 fw-bold text-warning">
                        <?= $pendingOrders->count() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pedidos Cerrados Hoy -->
    <div class="col-md-3">
        <div class="card shadow-sm border-start border-4 border-info mb-3">
            <div class="card-body d-flex align-items-center">
                <div class="me-3 fs-2 text-info">
                    <i class="bi bi-check-circle"></i>
                </div>
                <div>
                    <div class="text-uppercase small text-muted">
                        Pedidos cerrados hoy
                    </div>
                    <div class="fs-2 fw-bold">
                        <?= $closedOrdersToday ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Accesos rápidos 
<h2 class="mb-3">Accesos Rápidos</h2>
<div class="mb-4">
    <?php foreach ($quickAccess as $link): ?>
        <a class="btn btn-outline-primary me-2 mb-2" href="<?= $this->Url->build($link['url']) ?>">
            <?= h($link['label']) ?>
        </a>
    <?php endforeach; ?>
</div>  -->

<!-- Accesos rápidos -->
<h2 class="mb-3">Accesos Rápidos</h2>
<div class="mb-4">
    <?php foreach ($quickAccess as $link): ?>
        <a
            class="btn btn-outline-primary me-2 mb-2 d-inline-flex align-items-center gap-2"
            href="<?= $this->Url->build($link['url']) ?>"
        >
            <i class="bi-lightning-charge"></i>
            <?= h($link['label']) ?>
        </a>
    <?php endforeach; ?>
</div>

<!-- Pedidos Pendientes -->
<h2 class="mb-3">Pedidos Pendientes</h2>

<?php if ($pendingOrders->isEmpty()): ?>
    <p class="text-muted">No hay pedidos pendientes.</p>
<?php else: ?>
    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Pedido</th>
                    <th>Estado</th>
                    <th>Fecha de Creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pendingOrders as $order): ?>
                    <tr>
                        <td><?= $order->id ?></td>
                        <td>
                            <span class="badge bg-info px-3 py-2">En Proceso</span>
                        </td>
                        <td><?= $order->created->format('d-m-Y') ?></td>
                        <td>
                            <?= $this->Html->link(
                                '<i class="bi bi-eye"></i>',
                                ['controller' => 'Orders', 'action' => 'view', $order->id],
                                ['class' => 'btn btn-outline-primary btn-sm rounded shadow-sm', 'escape' => false, 'title' => 'Ver', 'style' => 'border-width:1.5px;']
                            ) ?>
                            <?= $this->Html->link(
                                '<i class="bi bi-pencil"></i>',
                                ['controller' => 'Orders', 'action' => 'edit', $order->id],
                                ['class' => 'btn btn-outline-warning btn-sm rounded shadow-sm', 'escape' => false, 'title' => 'Editar', 'style' => 'border-width:1.5px;']
                            ) ?>
                            <?= $this->Form->postLink(
                                '<i class="bi bi-trash"></i>',
                                ['controller' => 'Orders', 'action' => 'delete', $order->id],
                                [
                                    'confirm' => '¿Seguro que deseas eliminar este pedido?',
                                    'class' => 'btn btn-outline-danger btn-sm rounded shadow-sm',
                                    'escape' => false,
                                    'title' => 'Eliminar',
                                    'style' => 'border-width:1.5px;'
                                ]
                            ) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>


<!-- Productos más vendidos -->
<h2 class="mb-3">Productos 5 más vendidos (histórico)</h2>
<div class="table-responsive mb-4">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Producto</th>
                <th>Cantidad Vendida</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productsMostSold as $item): ?>
            <tr>
                <td><?= h($item->_matchingData['Products']->name) ?></td>
                <td><?= $item->total_quantity ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Productos por Categoría -->
<h2 class="mb-3">Productos por Categoría</h2>
<div class="table-responsive mb-4">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Categoría</th>
                <th>Total de Productos</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productsByCategory as $item): ?>
            <tr>
                <td><?= h($item->name) ?></td>
                <td><?= $item->total_products ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Pedidos recientes -->
<h2 class="mb-3">Pedidos Recientes</h2>
<div class="table-responsive mb-4">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID Pedido</th>
                <th>Estado</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recentOrders as $order): ?>
            <tr>
                <td><?= $order->id ?></td>
                <td><?= h($order->status) ?></td>
                <td><?= $order->created->format('d-m-Y H:i') ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="row mb-4">
    <!-- Ventas Totales por Producto - Últimos 7 Días -->
     <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Ventas Totales por Producto (Últimos 7 Días)</h5>

                <a href="/reports/sales-by-product.xlsx"
                class="btn btn-outline-success btn-sm">
                    <i class="bi bi-file-earmark-excel"></i>
                    Exportar Excel
                </a>
            </div>
            <div class="card-body">
                <?php if (!empty($salesLast7DaysByProduct)): ?>
                    <canvas id="salesByProductChart" width="800" height="400"></canvas>

                    <!-- Chart.js desde CDN -->
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                    const ctxProducts = document.getElementById('salesByProductChart').getContext('2d');

                    const productLabels = [
                        <?php foreach ($salesLast7DaysByProduct as $item): ?>
                            "<?= h($item->_matchingData['Products']->name) ?>",
                        <?php endforeach; ?>
                    ];

                    const productData = [
                        <?php foreach ($salesLast7DaysByProduct as $item): ?>
                            <?= $item->total_quantity ?>,
                        <?php endforeach; ?>
                    ];

                    new Chart(ctxProducts, {
                        type: 'bar',
                        data: {
                            labels: productLabels,
                            datasets: [{
                                label: 'Cantidad Vendida',
                                data: productData,
                                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            indexAxis: 'y', 
                            responsive: true,
                            plugins: {
                                legend: { display: false },
                                title: { display: true, text: 'Top 5 productos' }
                            },
                            scales: {
                                x: { beginAtZero: true }
                            }
                        }
                    });
                    </script>
                <?php else: ?>
                    <p class="text-muted mb-0">No hay ventas registradas en los últimos 7 días.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Ventas Totales por Producto - Últimos 30 Días -->
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Ventas Totales por Producto (Últimos 30 Días)</h5>

                <a href="/reports/sales-by-product-month.xlsx"
                class="btn btn-outline-success btn-sm">
                    <i class="bi bi-file-earmark-excel"></i>
                    Exportar Excel
                </a>
            </div>
            <div class="card-body">
                <?php if (!empty($salesLast30DaysTop5)): ?>
                    <canvas id="salesByProduct30DaysChart" width="800" height="400"></canvas>

                    <!-- Chart.js desde CDN -->
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                    const ctxProducts30 = document.getElementById('salesByProduct30DaysChart').getContext('2d');

                    const productLabels30 = [
                        <?php foreach ($salesLast30DaysTop5 as $item): ?>
                            "<?= h($item->_matchingData['Products']->name) ?>",
                        <?php endforeach; ?>
                    ];

                    const productData30 = [
                        <?php foreach ($salesLast30DaysTop5 as $item): ?>
                            <?= $item->total_quantity ?>,
                        <?php endforeach; ?>
                    ];

                    new Chart(ctxProducts30, {
                        type: 'bar',
                        data: {
                            labels: productLabels30,
                            datasets: [{
                                label: 'Cantidad Vendida',
                                data: productData30,
                                backgroundColor: 'rgba(255, 159, 64, 0.7)',
                                borderColor: 'rgba(255, 159, 64, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            indexAxis: 'y',
                            responsive: true,
                            plugins: {
                                legend: { display: false },
                                title: { display: true, text: 'Top 5 productos' }
                            },
                            scales: {
                                x: { beginAtZero: true }
                            }
                        }
                    });
                    </script>
                <?php else: ?>
                    <p class="text-muted mb-0">No hay ventas registradas en los últimos 30 días.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>    
</div>
<div class="row mb-4">
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Ventas Totales por Categoría (Últimos 7 Días)</h5>
            </div>
            <div class="card-body">
                <?php if (!empty($salesLast7DaysByCategory)): ?>
                    <canvas id="salesByCategory7DaysChart" width="800" height="400"></canvas>

                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                    const ctxCat7 = document.getElementById('salesByCategory7DaysChart').getContext('2d');

                    const categoryLabels7 = [
                        <?php foreach ($salesLast7DaysByCategory as $item): ?>
                            "<?= h($item->_matchingData['Categories']->name) ?>",
                        <?php endforeach; ?>
                    ];

                    const categoryData7 = [
                        <?php foreach ($salesLast7DaysByCategory as $item): ?>
                            <?= $item->total_quantity ?>,
                        <?php endforeach; ?>
                    ];

                    new Chart(ctxCat7, {
                        type: 'bar',
                        data: {
                            labels: categoryLabels7,
                            datasets: [{
                                label: 'Cantidad Vendida',
                                data: categoryData7,
                                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            indexAxis: 'y',
                            responsive: true,
                            plugins: {
                                legend: { display: false },
                                title: { display: true, text: 'Top 5 categorías' }
                            },
                            scales: {
                                x: { beginAtZero: true }
                            }
                        }
                    });
                    </script>
                <?php else: ?>
                    <p class="text-muted mb-0">No hay ventas registradas en los últimos 7 días.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Ventas Totales por Categoría (Últimos 30 Días)</h5>
            </div>
            <div class="card-body">
                <?php if (!empty($salesLast30DaysByCategory)): ?>
                    <canvas id="salesByCategory30DaysChart" width="800" height="400"></canvas>

                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                    const ctxCat30 = document.getElementById('salesByCategory30DaysChart').getContext('2d');

                    const categoryLabels30 = [
                        <?php foreach ($salesLast30DaysByCategory as $item): ?>
                            "<?= h($item->_matchingData['Categories']->name) ?>",
                        <?php endforeach; ?>
                    ];

                    const categoryData30 = [
                        <?php foreach ($salesLast30DaysByCategory as $item): ?>
                            <?= $item->total_quantity ?>,
                        <?php endforeach; ?>
                    ];

                    new Chart(ctxCat30, {
                        type: 'bar',
                        data: {
                            labels: categoryLabels30,
                            datasets: [{
                                label: 'Cantidad Vendida',
                                data: categoryData30,
                                backgroundColor: 'rgba(255, 159, 64, 0.7)',
                                borderColor: 'rgba(255, 159, 64, 1)',
                                borderWidth: 1
                            }] 
                        },
                        options: {
                            indexAxis: 'y',
                            responsive: true,
                            plugins: {
                                legend: { display: false },
                                title: { 
                                    display: true, 
                                    text: 'Top 5 categorías' 
                                }
                            },
                            scales: {
                                x: { beginAtZero: true }
                            }
                        }
                    });
                    </script>
                <?php else: ?>
                    <p class="text-muted mb-0">No hay ventas registradas en los últimos 30 días.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Evolución de ventas -->
<div class="card mb-4">
    <div class="card-header">
        <h5 class="mb-0">Evolución de Ventas</h5>
    </div>
    <div class="card-body">
        <?php if (!empty($salesEvolution)): ?>
            <canvas id="salesChart" width="800" height="400"></canvas>

            <!-- Chart.js desde CDN -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
            const ctx = document.getElementById('salesChart').getContext('2d');

            const labels = [
                <?php foreach ($salesEvolution as $item): ?>
                    "<?= !empty($item->date) ? (new \DateTime($item->date))->format('d-m-Y') : '' ?>",
                <?php endforeach; ?>
            ];

            const data = [
                <?php foreach ($salesEvolution as $item): ?>
                    <?= $item->total_quantity ?? 0 ?>,
                <?php endforeach; ?>
            ];

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Cantidad Vendida',
                        data: data,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        fill: true,
                        tension: 0.3
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { position: 'top' },
                        title: { display: true, text: 'Evolución de Ventas' }
                    },
                    scales: { y: { beginAtZero: true } }
                }
            });
            </script>
        <?php else: ?>
            <p class="text-muted mb-0">No hay ventas registradas para mostrar la evolución.</p>
        <?php endif; ?>
    </div>
</div>

<style>
    
</style>