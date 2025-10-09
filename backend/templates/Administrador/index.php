<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Administrador> $administrador
 */
?>
<div class="administrador index content">
    <?= $this->Html->link(__('New Administrador'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Administrador') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id_admin') ?></th>
                    <th><?= $this->Paginator->sort('username') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('nombre_completo') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($administrador as $administrador): ?>
                <tr>
                    <td><?= $this->Number->format($administrador->id_admin) ?></td>
                    <td><?= h($administrador->username) ?></td>
                    <td><?= h($administrador->email) ?></td>
                    <td><?= h($administrador->created_at) ?></td>
                    <td><?= h($administrador->nombre_completo) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $administrador->id_admin]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $administrador->id_admin]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $administrador->id_admin],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $administrador->id_admin),
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