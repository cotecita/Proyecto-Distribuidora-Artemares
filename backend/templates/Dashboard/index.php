<?php
/**
 * Vista: Dashboard
 */
?>

<h1 class="mb-4">Dashboard</h1>

<div class="row mb-4">
    <!-- Total de Productos -->
    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5 class="card-title">Total de Productos</h5>
                <p class="card-text fs-3"><?= $totalProducts ?></p>
            </div>
        </div>
    </div>

    <!-- Total de Categorías -->
    <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5 class="card-title">Total de Categorías</h5>
                <p class="card-text fs-3"><?= $totalCategories ?></p>
            </div>
        </div>
    </div>

    <!-- Pedidos Pendientes -->
    <div class="col-md-4">
        <div class="card text-white bg-warning mb-3">
            <div class="card-body">
                <h5 class="card-title">Pedidos Pendientes</h5>
                <p class="card-text fs-3"><?= $alerts->count() ?></p>
            </div>
        </div>
    </div>
</div>
<!-- Accesos rápidos -->
<h2 class="mb-3">Accesos Rápidos</h2>
<div class="mb-4">
    <?php foreach ($quickAccess as $link): ?>
        <a class="btn btn-outline-primary me-2 mb-2" href="<?= $this->Url->build($link['url']) ?>">
            <?= h($link['label']) ?>
        </a>
    <?php endforeach; ?>
</div>

<!-- Alertas de pedidos pendientes -->
<h2 class="mb-3">Pedidos Pendientes</h2>
<ul class="list-group mb-4">
    <?php 
        // mapear estados
        $statusLabels = [
            'pending' => 'Pendiente',
            'in_process' => 'En proceso',
            'closed' => 'Cerrado',
            'cancelled' => 'Cancelado',
            'completed' => 'Completado'
        ];
    ?>
    <?php foreach ($alerts as $order): ?>
        <li class="list-group-item list-group-item-warning">
            Pedido #<?= $order->id ?> - <?= $statusLabels[$order->status] ?? ucfirst($order->status) ?> - <?= $order->created->format('d-m-Y') ?>
        </li>
    <?php endforeach; ?>
</ul>

<!-- Productos más vendidos -->
<h2 class="mb-3">Productos más vendidos</h2>
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
</script>
