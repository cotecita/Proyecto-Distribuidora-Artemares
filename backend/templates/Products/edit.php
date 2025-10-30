<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 * @var string[]|\Cake\Collection\CollectionInterface $categories
 * @var string[]|\Cake\Collection\CollectionInterface $orders
 * @var string[]|\Cake\Collection\CollectionInterface $recipes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <!--<h4 class="heading"><?= __('Actions') ?></h4> -->
            <?= $this->Form->postLink(
                __('Eliminar'),
                ['action' => 'delete', $product->id],
                ['confirm' => __('¿Estás seguro de eliminar # {0}?', $product->id), 'class' => 'side-nav-item']
            ) ?>
            <!--<?= $this->Html->link(__('List Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>-->
        </div>
    </aside>
    <div class="column column-80">
        <div class="products form content">
            <?= $this->Form->create($product) ?>
            <fieldset>
                <legend><?= __('Editar Producto') ?></legend>
                <?php
                    echo $this->Form->control('name', ['label' => 'Nombre']);
                    echo $this->Form->control('description', ['label' => 'Descripción']);
                    echo $this->Form->control('price', ['label' => 'Precio']);
                    echo $this->Form->control('stock', ['label' => 'stock']);
                    echo $this->Form->control('unit_quantity', ['label' => 'Formato']);
                    echo $this->Form->control('unit', ['label' => 'Unidad']);
                    echo $this->Form->control('category_id', ['label' => 'Categoría','options' => $categories]);
                    echo $this->Form->control('orders._ids', ['label' => 'Pedidos','options' => $orders]);
                    echo $this->Form->control('recipes._ids', ['label' => 'Recetas','options' => $recipes]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
