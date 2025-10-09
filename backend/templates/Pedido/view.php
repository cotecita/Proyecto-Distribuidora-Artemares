<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido $pedido
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Pedido'), ['action' => 'edit', $pedido->id_pedido], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Pedido'), ['action' => 'delete', $pedido->id_pedido], ['confirm' => __('Are you sure you want to delete # {0}?', $pedido->id_pedido), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pedido'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Pedido'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="pedido view content">
            <h3><?= h($pedido->estado) ?></h3>
            <table>
                <tr>
                    <th><?= __('Estado') ?></th>
                    <td><?= h($pedido->estado) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Pedido') ?></th>
                    <td><?= $this->Number->format($pedido->id_pedido) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha') ?></th>
                    <td><?= h($pedido->fecha) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>