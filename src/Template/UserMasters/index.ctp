<div class="ctrlArea" >
    <form method='post' action='/top'> 
        <select name = "department">
            <option value=""></option>  
                <?php foreach ($sections as $section): ?>
                    <option value='<?= $section->section_master->sectionname.'/'.$section->departmentname ?>'>
                        <?= $section->section_master->sectionname.' '.$section->departmentname ?>
                    </option>
                <?php endforeach; ?>   
        </select>
        <input type="submit" value="検索"><br>
        <input type="hidden" name="containDlt" value='off'/>
        <input type="checkbox" name="containDlt">削除済みを含める</input>
    </form>
    <input type="button" value="新規登録" onclick="location.href='edit/'">
</div>
<div class="ctrlArea">
    <table cellpadding="0" cellspacing="0" class="tableAlign">
        <thead class="tableHeader userlist">
            <tr class="userlist">
                <td class='userlist'><?= h('名前') ?></td>
                <td class='userlist'><?= h('所属') ?></td>
                <td class='userlist'><?= h('メールアドレス') ?></td>
                <td class='userlist'><?= h('削除フラグ') ?></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userMasters as $userMaster): ?>
            <tr class="userlist">
                <td class="userlist">
                    <?= $this->Html->link(__(h($userMaster['familyname'].' '.$userMaster['firstname'])), ['action' => 'edit', $userMaster['uid']]) ?>
                </td>
                <td class="userlist"><?= h($userMaster['sectionname'].' '.$userMaster['departmentname']) ?></td>
                <td class="userlist"><?= h($userMaster['mailaddress']) ?></td>
                <td class="userlist">
                    <?php 
                        if ($this->Number->format($userMaster['deleteflg']) == 0){
                            echo '未削除';
                        } else {
                            echo '削除済み';
                        }
                    ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
