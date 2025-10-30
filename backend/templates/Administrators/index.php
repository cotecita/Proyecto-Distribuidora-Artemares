<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Administrator> $administrators
 */
?>
<div class="administrators index content">
    <?= $this->Html->link(__('Añadir Administrador'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Administradores') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('username', ['label' => 'Usuario']) ?></th>
                    <th><?= $this->Paginator->sort('email', ['label' => 'Correo']) ?></th>
                    <th><?= $this->Paginator->sort('full_name', ['label' => 'Nombre']) ?></th>
                    <th><?= $this->Paginator->sort('created', ['label' => 'Creado']) ?></th>
                    <th><?= $this->Paginator->sort('modified', ['label' => 'Modificado']) ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($administrators as $administrator): ?>
                <tr>
                    <td><?= $this->Number->format($administrator->id) ?></td>
                    <td><?= h($administrator->username) ?></td>
                    <td><?= h($administrator->email) ?></td>
                    <td><?= h($administrator->full_name) ?></td>
                    <td><?= h($administrator->created) ?></td>
                    <td><?= h($administrator->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $administrator->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $administrator->id]) ?>
                        <?= $this->Form->postLink(
                            __('Eliminar'),
                            ['action' => 'delete', $administrator->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $administrator->id),
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