<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Recipe> $recipes
 */
?>
<div class="recipes index content">
    <?= $this->Html->link(__('Añadir Receta'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Recetas') ?></h3>
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
                <?php foreach ($recipes as $recipe): ?>
                <tr>
                    <td><?= $this->Number->format($recipe->id) ?></td>
                    <td><?= h($recipe->name) ?></td>
                    <td><?= h($recipe->created) ?></td>
                    <td><?= h($recipe->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $recipe->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $recipe->id]) ?>
                        <?= $this->Form->postLink(
                            __('Eliminar'),
                            ['action' => 'delete', $recipe->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $recipe->id),
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