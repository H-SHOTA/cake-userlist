<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User Master'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userMasters index large-9 medium-8 columns content">
    <h3><?= __('User Masters') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('uid') ?></th>
                <th><?= $this->Paginator->sort('departmentcd') ?></th>
                <th><?= $this->Paginator->sort('deleteflg') ?></th>
                <th><?= $this->Paginator->sort('insdate') ?></th>
                <th><?= $this->Paginator->sort('lastupdate') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userMasters as $userMaster): ?>
            <tr>
                <td><?= $this->Number->format($userMaster->uid) ?></td>
                <td><?= $this->Number->format($userMaster->departmentcd) ?></td>
                <td><?= $this->Number->format($userMaster->deleteflg) ?></td>
                <td><?= h($userMaster->insdate) ?></td>
                <td><?= h($userMaster->lastupdate) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userMaster->uid]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userMaster->uid]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userMaster->uid], ['confirm' => __('Are you sure you want to delete # {0}?', $userMaster->uid)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
