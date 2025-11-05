<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<div class="related">
    <h4><?= __('Productos del Pedido') ?></h4>
    <?php if (!empty($order->products)) : ?>
    <div class="table-responsive">
        <table>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Nombre') ?></th>
                <th><?= __('Cantidad') ?></th>
                <th><?= __('Precio Unitario') ?></th>
                <th><?= __('Subtotal') ?></th>
            </tr>
            <?php foreach ($order->products as $product) : ?>
            <tr>
                <td><?= h($product->id) ?></td>
                <td><?= h($product->name) ?></td>
                <td><?= h($product->_joinData->quantity) ?></td>
                <td>$<?= number_format($product->price, 0, ',', '.') ?></td>
                <td>$<?= number_format($product->price * $product->_joinData->quantity, 0, ',', '.') ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php else: ?>
        <p>No hay productos en este pedido.</p>
    <?php endif; ?>
</div>
