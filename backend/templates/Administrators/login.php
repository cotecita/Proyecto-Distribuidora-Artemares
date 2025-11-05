<div class="administrators form content">
    <?= $this->Flash->render() ?>
    <h3><?= __('Iniciar sesión') ?></h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Ingrese sus credenciales') ?></legend>
        <?= $this->Form->control('username', ['required' => true]) ?>
        <?= $this->Form->control('password', ['required' => true]) ?>
    </fieldset>
    <?= $this->Form->submit(__('Entrar')); ?>
    <?= $this->Form->end() ?>
    <br>
    <?= $this->Html->link('Registrar nuevo administrador', ['action' => 'add']) ?>
</div>
