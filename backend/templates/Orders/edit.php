<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 * @var string[]|\Cake\Collection\CollectionInterface $products
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
        <legend><?= __('Editar Pedido') ?></legend>

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
                <?php
                    // Revisar si el producto ya está en el pedido
                    $selected = false;
                    $quantity = 1;
                    foreach ($order->products as $p) {
                        if ($p->id == $product->id) {
                            $selected = true;
                            $quantity = $p->_joinData->quantity ?? 1;
                            break;
                        }
                    }
                ?>
                <tr>
                    <td>
                        <?= $this->Form->checkbox("products.$i.id", [
                            'value' => $product->id,
                            'hiddenField' => false,
                            'checked' => $selected
                        ]) ?>
                    </td>
                    <td><?= h($product->name) ?></td>
                    <td>$<?= $this->Number->format($product->price) ?></td>
                    <td>
                        <?= $this->Form->number("products.$i._joinData.quantity", [
                            'value' => $quantity,
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
