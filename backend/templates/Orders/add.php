<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 * @var \Cake\Collection\CollectionInterface|string[] $products
 */
?>
<?= $this->Form->create($order) ?>
<fieldset>
    <legend><?= __('Nuevo Pedido') ?></legend>

    <?= $this->Form->control('status', [
        'label' => 'Estado',
        'options' => [
            'in_process' => 'En proceso',
            'closed' => 'Cerrado',
            'cancelled' => 'Cancelado'
        ]
    ]) ?>

    <h4>Productos</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Seleccionar</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $this->Form->checkbox("products.{$product->id}.id", ['value' => $product->id]) ?></td>
                <td><?= h($product->name) ?></td>
                <td>$<?= number_format($product->price, 0, ',', '.') ?></td>
                <td><?= $this->Form->number("products.{$product->id}._joinData.quantity", ['min' => 1, 'value' => 1]) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</fieldset>

<?= $this->Form->button(__('Guardar Pedido')) ?>
<?= $this->Form->end() ?>

