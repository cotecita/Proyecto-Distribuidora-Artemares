<h2>Cuadratura de Caja – Ventas del Día</h2>

<h3>Total del día: $<?= number_format($totalDia, 0, ',', '.') ?></h3>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Pedido</th>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($detalles as $d): ?>
        <tr>
            <td><?= $d['order_id'] ?></td>
            <td><?= h($d['producto']) ?></td>
            <td><?= number_format($d['precio'], 0, ',', '.') ?></td>
            <td><?= $d['cantidad'] ?></td>
            <td><?= number_format($d['total_linea'], 0, ',', '.') ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h4>Totales por pedido:</h4>
<ul>
    <?php foreach ($orders as $o): ?>
        <li>Pedido #<?= $o->id ?> — $<?= number_format($o->total, 0, ',', '.') ?></li>
    <?php endforeach; ?>
</ul>
