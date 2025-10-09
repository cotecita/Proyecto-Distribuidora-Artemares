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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $detallePedido->id_detalle],
                ['confirm' => __('Are you sure you want to delete # {0}?', $detallePedido->id_detalle), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Detalle Pedido'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="detallePedido form content">
            <?= $this->Form->create($detallePedido) ?>
            <fieldset>
                <legend><?= __('Edit Detalle Pedido') ?></legend>
                <?php
                    echo $this->Form->control('id_pedido');
                    echo $this->Form->control('id_producto');
                    echo $this->Form->control('cantidad');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
