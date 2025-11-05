<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 * @var \Cake\Collection\CollectionInterface|string[] $categories
 * @var \Cake\Collection\CollectionInterface|string[] $orders
 * @var \Cake\Collection\CollectionInterface|string[] $recipes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <!--<h4 class="heading"><?= __('Actions') ?></h4> -->
           <!-- <?= $this->Html->link(__('List Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>  -->
        </div>
    </aside>
    <div class="column column-80">
        <div class="products form content">
            <?= $this->Form->create($product, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Añadir Producto') ?></legend>
                <?php
                    echo $this->Form->control('name', ['label' => 'Nombre']);
                    echo $this->Form->control('description', ['label' => 'Descripción']);
                    echo $this->Form->control('price', ['label' => 'Precio']);
                    echo $this->Form->control('stock', ['label' => 'Stock']);
                    echo $this->Form->control('unit_quantity', ['label' => 'Formato']);
                    echo $this->Form->control('unit', ['label' => 'Unidad']);
                    echo $this->Form->control('category_id', ['label' => 'Categoría', 'options' => $categories]);
                    #echo $this->Form->control('orders._ids', ['options' => $orders]);
                    #echo $this->Form->control('recipes._ids', ['options' => $recipes]);
                    // campo para la imagen
                    echo $this->Form->control('image_file', [
                        'type' => 'file',
                        'label' => 'Imagen del producto',
                    ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

