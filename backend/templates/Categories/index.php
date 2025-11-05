<div class="card shadow-sm border-0">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-hover align-middle">
        <thead style="background: linear-gradient(90deg, #009FE3 0%, #4CC3FF 100%); color:#fff;">
          <tr>
            <th><?= $this->Paginator->sort('id', 'ID') ?></th>
            <th><?= $this->Paginator->sort('name', 'Nombre') ?></th>
            <th class="text-center">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($categories as $category): ?>
            <tr>
              <td><?= h($category->id) ?></td>
              <td><?= h($category->name) ?></td>
              <td class="text-center">
                <div class="btn-group">
                  <?= $this->Html->link('<i class="bi bi-eye"></i>', ['action' => 'view', $category->id], ['class'=>'btn btn-outline-primary btn-sm','escape'=>false,'title'=>'Ver']) ?>
                  <?= $this->Html->link('<i class="bi bi-pencil"></i>', ['action' => 'edit', $category->id], ['class'=>'btn btn-outline-warning btn-sm','escape'=>false,'title'=>'Editar']) ?>
                  <?= $this->Form->postLink('<i class="bi bi-trash"></i>', ['action' => 'delete', $category->id], ['confirm'=>'¿Seguro que deseas eliminar esta categoría?','class'=>'btn btn-outline-danger btn-sm','escape'=>false,'title'=>'Eliminar']) ?>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-4 flex-wrap gap-2">
      <div>
        <?= $this->Paginator->prev('< Anterior', ['class'=>'btn btn-outline-secondary btn-sm']) ?>
        <?= $this->Paginator->numbers(['class'=>'pagination pagination-sm d-inline-flex']) ?>
        <?= $this->Paginator->next('Siguiente >', ['class'=>'btn btn-outline-secondary btn-sm']) ?>
      </div>
      <p class="text-muted mb-0 small">
        Página <?= $this->Paginator->counter('{{page}} de {{pages}}') ?>
      </p>
    </div>
  </div>
</div>
