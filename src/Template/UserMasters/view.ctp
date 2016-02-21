<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Master'), ['action' => 'edit', $userMaster->uid]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Master'), ['action' => 'delete', $userMaster->uid], ['confirm' => __('Are you sure you want to delete # {0}?', $userMaster->uid)]) ?> </li>
        <li><?= $this->Html->link(__('List User Masters'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Master'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userMasters view large-9 medium-8 columns content">
    <h3><?= h($userMaster->uid) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Uid') ?></th>
            <td><?= $this->Number->format($userMaster->uid) ?></td>
        </tr>
        <tr>
            <th><?= __('Departmentcd') ?></th>
            <td><?= $this->Number->format($userMaster->departmentcd) ?></td>
        </tr>
        <tr>
            <th><?= __('Deleteflg') ?></th>
            <td><?= $this->Number->format($userMaster->deleteflg) ?></td>
        </tr>
        <tr>
            <th><?= __('Insdate') ?></th>
            <td><?= h($userMaster->insdate) ?></td>
        </tr>
        <tr>
            <th><?= __('Lastupdate') ?></th>
            <td><?= h($userMaster->lastupdate) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Familyname') ?></h4>
        <?= $this->Text->autoParagraph(h($userMaster->familyname)); ?>
    </div>
    <div class="row">
        <h4><?= __('Firstname') ?></h4>
        <?= $this->Text->autoParagraph(h($userMaster->firstname)); ?>
    </div>
    <div class="row">
        <h4><?= __('Familykana') ?></h4>
        <?= $this->Text->autoParagraph(h($userMaster->familykana)); ?>
    </div>
    <div class="row">
        <h4><?= __('Firstkana') ?></h4>
        <?= $this->Text->autoParagraph(h($userMaster->firstkana)); ?>
    </div>
    <div class="row">
        <h4><?= __('Mailaddress') ?></h4>
        <?= $this->Text->autoParagraph(h($userMaster->mailaddress)); ?>
    </div>
</div>
