<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\DetallePedido> $detallePedido
 */
?>
<div class="detallePedido index content">
    <?= $this->Html->link(__('New Detalle Pedido'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Detalle Pedido') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id_detalle') ?></th>
                    <th><?= $this->Paginator->sort('id_pedido') ?></th>
                    <th><?= $this->Paginator->sort('id_producto') ?></th>
                    <th><?= $this->Paginator->sort('cantidad') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($detallePedido as $detallePedido): ?>
                <tr>
                    <td><?= $this->Number->format($detallePedido->id_detalle) ?></td>
                    <td><?= $this->Number->format($detallePedido->id_pedido) ?></td>
                    <td><?= $this->Number->format($detallePedido->id_producto) ?></td>
                    <td><?= $this->Number->format($detallePedido->cantidad) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $detallePedido->id_detalle]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $detallePedido->id_detalle]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $detallePedido->id_detalle],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $detallePedido->id_detalle),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>