<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DetallePedido $detallePedido
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Detalle Pedido'), ['action' => 'edit', $detallePedido->id_detalle], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Detalle Pedido'), ['action' => 'delete', $detallePedido->id_detalle], ['confirm' => __('Are you sure you want to delete # {0}?', $detallePedido->id_detalle), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Detalle Pedido'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Detalle Pedido'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="detallePedido view content">
            <h3><?= h($detallePedido->id_detalle) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id Detalle') ?></th>
                    <td><?= $this->Number->format($detallePedido->id_detalle) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Pedido') ?></th>
                    <td><?= $this->Number->format($detallePedido->id_pedido) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Producto') ?></th>
                    <td><?= $this->Number->format($detallePedido->id_producto) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cantidad') ?></th>
                    <td><?= $this->Number->format($detallePedido->cantidad) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>