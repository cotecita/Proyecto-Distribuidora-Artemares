<?php
/**
 * Vista: Listado de Recetas
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recipe[]|\Cake\Collection\CollectionInterface $recipes
 */
use Cake\Utility\Text;
?>
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mt-3 mb-4">
        <h2 class="fw-semibold text-dark">Gestión de Recetas</h2>
        <?= $this->Html->link(
            '<i class="bi bi-plus-circle me-1"></i> Nueva Receta',
            ['action' => 'add'],
            ['class' => 'btn btn-primary shadow-sm', 'escape' => false]
        ) ?>
    </div>

    <div class="mb-3">
        <?= $this->Form->create(null, ['type' => 'get', 'class' => 'd-flex']) ?>
            <?= $this->Form->control('search', [
                'label' => false,
                'value' => $search ?? '',
                'placeholder' => 'Buscar receta...',
                'class' => 'form-control me-2'
            ]) ?>
            <?= $this->Form->button('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= $this->Form->end() ?>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead style="background: linear-gradient(90deg, #009FE3 0%, #4CC3FF 100%); color: #fff;">
                        <tr>
                            <th><?= $this->Paginator->sort('id', 'ID') ?></th>
                            <th><?= $this->Paginator->sort('name', 'Nombre') ?></th>
                            <th><?= $this->Paginator->sort('description', 'Descripción') ?></th>
                            <th><?= $this->Paginator->sort('created', 'Creada') ?></th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($recipes as $recipe): ?>
                            <tr>
                                <td><?= h($recipe->id) ?></td>
                                <td><?= h($recipe->name) ?></td>
                                <td><?= h(Text::truncate($recipe->description, 60, ['ellipsis' => '…'])) ?></td>
                                <td><?= $recipe->created ? $recipe->created->format('d/m/Y') : '' ?></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <?= $this->Html->link(
                                            '<i class="bi bi-eye"></i>',
                                            ['action' => 'view', $recipe->id],
                                            ['class' => 'btn btn-outline-primary btn-sm rounded shadow-sm', 'escape' => false, 'title' => 'Ver']
                                        ) ?>
                                        <?= $this->Html->link(
                                            '<i class="bi bi-pencil"></i>',
                                            ['action' => 'edit', $recipe->id],
                                            ['class' => 'btn btn-outline-warning btn-sm rounded shadow-sm', 'escape' => false, 'title' => 'Editar']
                                        ) ?>
                                        <?= $this->Form->postLink(
                                            '<i class="bi bi-trash"></i>',
                                            ['action' => 'delete', $recipe->id],
                                            ['confirm' => '¿Seguro que deseas eliminar esta receta?', 'class' => 'btn btn-outline-danger btn-sm rounded shadow-sm', 'escape' => false, 'title' => 'Eliminar']
                                        ) ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4 flex-wrap gap-2">
                <div>
                    <?= $this->Paginator->prev('< Anterior', ['class' => 'btn btn-outline-secondary btn-sm']) ?>
                    <?= $this->Paginator->numbers(['class' => 'pagination pagination-sm d-inline-flex']) ?>
                    <?= $this->Paginator->next('Siguiente >', ['class' => 'btn btn-outline-secondary btn-sm']) ?>
                </div>
                <p class="text-muted mb-0 small">
                    Página <?= $this->Paginator->counter('{{page}} de {{pages}}') ?>
                </p>
            </div>
        </div>
    </div>
</div>
