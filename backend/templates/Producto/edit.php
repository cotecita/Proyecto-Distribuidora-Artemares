<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Producto $producto
 * @var string[]|\Cake\Collection\CollectionInterface $receta
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $producto->id_producto],
                ['confirm' => __('Are you sure you want to delete # {0}?', $producto->id_producto), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Producto'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="producto form content">
            <?= $this->Form->create($producto) ?>
            <fieldset>
                <legend><?= __('Edit Producto') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('descripcion');
                    echo $this->Form->control('precio');
                    echo $this->Form->control('stock');
                    echo $this->Form->control('cantidad_formato');
                    echo $this->Form->control('formato');
                    echo $this->Form->control('id_categoria');
                    echo $this->Form->control('receta._ids', ['options' => $receta]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
