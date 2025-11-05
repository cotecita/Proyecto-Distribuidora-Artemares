<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 * @var \Cake\Collection\CollectionInterface|string[] $products
 */
?>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 * @var array $products
 * @var array $statuses
 */
?>

<div class="orders form content">
    <?= $this->Form->create($order) ?>
    <fieldset>
        <legend><?= __('Nuevo Pedido') ?></legend>

        <!-- Estado del pedido -->
        <?= $this->Form->control('status', [
            'label' => 'Estado del pedido',
            'options' => $statuses,
            'empty' => false
        ]) ?>

        <h4><?= __('Selecciona los productos para este pedido') ?></h4>

        <table>
            <thead>
                <tr>
                    <th>Seleccionar</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $i => $product): ?>
                <tr>
                    <td>
                        <?= $this->Form->checkbox("products.$i.id", [
                            'value' => $product->id,
                            'hiddenField' => false
                        ]) ?>
                    </td>
                    <td><?= h($product->name) ?></td>
                    <td>$<?= $this->Number->format($product->price) ?></td>
                    <td>
                        <?= $this->Form->number("products.$i._joinData.quantity", [
                            'value' => 1,
                            'min' => 1,
                            'label' => false,
                            'style' => 'width: 70px; text-align: center;'
                        ]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </fieldset>

    <?= $this->Form->button(__('Guardar Pedido')) ?>
    <?= $this->Form->end() ?>
</div>
