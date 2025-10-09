<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Recetum> $receta
 */
?>
<div class="receta index content">
    <?= $this->Html->link(__('New Recetum'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Receta') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id_receta') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($receta as $recetum): ?>
                <tr>
                    <td><?= $this->Number->format($recetum->id_receta) ?></td>
                    <td><?= h($recetum->nombre) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $recetum->id_receta]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $recetum->id_receta]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $recetum->id_receta],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $recetum->id_receta),
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