<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Product> $products
 */
?>
<div class="products index content">
    <?= $this->Html->link(__('Añadir Producto'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Productos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name', ['label' => 'Nombre']) ?></th>
                    <th><?= $this->Paginator->sort('price', ['label' => 'Precio']) ?></th>
                    <th><?= $this->Paginator->sort('stock', ['label' => 'Stock']) ?></th>
                    <th><?= $this->Paginator->sort('unit_quantity', ['label' => 'Formato']) ?></th>
                    <th><?= $this->Paginator->sort('unit', ['label' => 'Unidad']) ?></th>
                    <th><?= $this->Paginator->sort('category_id', ['label' => 'Categoría']) ?></th>
                    <th><?= $this->Paginator->sort('created', ['label' => 'Creado']) ?></th>
                    <th><?= $this->Paginator->sort('modified', ['label' => 'Modificado']) ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $this->Number->format($product->id) ?></td>
                    <td><?= h($product->name) ?></td>
                    <td><?= $this->Number->format($product->price) ?></td>
                    <td><?= $this->Number->format($product->stock) ?></td>
                    <td><?= $this->Number->format($product->unit_quantity) ?></td>
                    <td><?= h($product->unit) ?></td>
                    <td><?= $product->hasValue('category') ? $this->Html->link($product->category->name, ['controller' => 'Categories', 'action' => 'view', $product->category->id]) : '' ?></td>
                    <td><?= h($product->created) ?></td>
                    <td><?= h($product->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $product->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $product->id]) ?>
                        <?= $this->Form->postLink(
                            __('Eliminar'),
                            ['action' => 'delete', $product->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('¿Estás seguro de eliminar # {0}?', $product->id),
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