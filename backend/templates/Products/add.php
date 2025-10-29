<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 * @var \Cake\Collection\CollectionInterface|string[] $categories
 * @var \Cake\Collection\CollectionInterface|string[] $orders
 * @var \Cake\Collection\CollectionInterface|string[] $recipes
 */
?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><?= __('Añadir Producto') ?></h4>
            </div>
            <div class="card-body">
                <?= $this->Form->create($product, ['class' => 'needs-validation', 'novalidate' => true]) ?>
                
                <div class="mb-3">
                    <?= $this->Form->control('name', ['label' => 'Nombre', 'class' => 'form-control']) ?>
                </div>
                
                <div class="mb-3">
                    <?= $this->Form->control('description', ['label' => 'Descripción', 'class' => 'form-control', 'type' => 'textarea']) ?>
                </div>
                
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <?= $this->Form->control('price', ['label' => 'Precio', 'class' => 'form-control']) ?>
                    </div>
                    <div class="col-md-4 mb-3">
                        <?= $this->Form->control('stock', ['label' => 'Stock', 'class' => 'form-control']) ?>
                    </div>
                    <div class="col-md-4 mb-3">
                        <?= $this->Form->control('unit_quantity', ['label' => 'Formato', 'class' => 'form-control']) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <?= $this->Form->control('unit', ['label' => 'Unidad', 'class' => 'form-select']) ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <?= $this->Form->control('category_id', ['label' => 'Categoría', 'options' => $categories, 'class' => 'form-select']) ?>
                    </div>
                </div>

                <!-- Relaciones Many-to-Many -->
                 <!--
                <div class="mb-3">
                    <?= $this->Form->control('orders._ids', ['label' => 'Pedidos', 'options' => $orders, 'class' => 'form-select', 'multiple' => true]) ?>
                </div>
                <div class="mb-3">
                    <?= $this->Form->control('recipes._ids', ['label' => 'Recetas', 'options' => $recipes, 'class' => 'form-select', 'multiple' => true]) ?>
                </div> -->

                <div class="d-grid">
                    <?= $this->Form->button(__('Guardar'), ['class' => 'btn btn-success']) ?>
                </div>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
