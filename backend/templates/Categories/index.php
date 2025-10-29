<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Category> $categories
 */
?>
<div class="categories index content">
    <?= $this->Html->link(__('Añadir Categoría'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Categorías') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name', ['label' => 'Nombre']) ?></th>
                    <th><?= $this->Paginator->sort('created', ['label' => 'Creada']) ?></th>
                    <th><?= $this->Paginator->sort('modified', ['label' => 'Modificada']) ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?= $this->Number->format($category->id) ?></td>
                    <td><?= h($category->name) ?></td>
                    <td><?= h($category->created) ?></td>
                    <td><?= h($category->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $category->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $category->id]) ?>
                        <?= $this->Form->postLink(
                            __('Eliminar'),
                            ['action' => 'delete', $category->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $category->id),
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