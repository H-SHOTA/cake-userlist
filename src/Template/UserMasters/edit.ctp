<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userMaster->uid],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userMaster->uid)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List User Masters'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="userMasters form large-9 medium-8 columns content">
    <?= $this->Form->create($userMaster) ?>
    <fieldset>
        <legend><?= __('Edit User Master') ?></legend>
        <?php
            echo $this->Form->input('departmentcd');
            echo $this->Form->input('familyname');
            echo $this->Form->input('firstname');
            echo $this->Form->input('familykana');
            echo $this->Form->input('firstkana');
            echo $this->Form->input('mailaddress');
            echo $this->Form->input('deleteflg');
            echo $this->Form->input('insdate');
            echo $this->Form->input('lastupdate');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
