<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Administrator $administrator
 */
?>
<div class="administrators form content">
    <?= $this->Flash->render() ?>
    <h3><?= __('Registrar nuevo administrador') ?></h3>
    <?= $this->Form->create($administrator) ?>
    <fieldset>
        <legend><?= __('Datos del nuevo administrador') ?></legend>
        <?= $this->Form->control('full_name') ?>
        <?= $this->Form->control('email') ?>
        <?= $this->Form->control('username') ?>
        <?= $this->Form->control('password', ['type' => 'password']) ?>
    </fieldset>
    <?= $this->Form->submit(__('Registrar')) ?>
    <?= $this->Form->end() ?>
</div>

