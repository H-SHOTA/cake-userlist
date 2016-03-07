    <div class="ctrlArea" >
    <form method='post' action='/user-masters/add/'> 
        <table  class='tableAlign'> 
            <tr class='useredit'>
                <th class='useredit'>名前：</th>
                <th class='useredit'>
                    <input type='textbox' 
                           name='sei' 
                           value='<?= ((is_null($user))? '': $user['familyname']) ?>'/>
                </th>
                <th class='useredit'>
                    <input 
                        type='textbox' 
                        name='mei' 
                        value='<?= ((is_null($user))? '': $user['firstname']) ?>'/>
                </th>
            </tr>
            <tr class='useredit'>
                <th class='useredit'>カナ：</th>
                <th class='useredit'>
                    <input 
                        type='textbox' 
                        name='seiKana' 
                        value='<?= ((is_null($user))? '': $user['familykana']) ?>'/>
                </th>
                <th class='useredit'>
                    <input 
                        type='textbox' 
                        name='meiKana' 
                        value='<?= ((is_null($user))? '': $user['firstkana']) ?>'/>
                </th>
            </tr>
            <tr class='useredit'>
                <th class='useredit'>所属：</th>
                <th class='useredit' colspan="2">
                    <select name = "department">
                        <option value=""></option>  
                            <?php foreach ($sections as $section): ?>
                                <option 
                                    value='<?= $section->departmentcd ?>'
                                    <?= ((!is_null($user) && $user['departmentcd'] == $section->departmentcd)?'selected':'') ?>>
                                    <?= $section->section_master->sectionname.' '.$section->departmentname ?>
                                </option>
                            <?php endforeach; ?>   
                    </select>
                </th>
            </tr>
            <tr class='useredit'>
                <th class='useredit'>メールアドレス：</th>
                <th class='useredit' colspan="2">
                    <input 
                        type='textbox' 
                        name='mailaddress' 
                        class='mailaddressBox'
                        value='<?= ((is_null($user))? '': $user['mailaddress']) ?>'/>
                </th>
            </tr>
            <tr class='useredit'>
                <th class='useredit'>削除フラグ：</th>
                <th class='useredit' colspan="2">
                    <input 
                        type="radio" 
                        name="deleteflg" 
                        value="nodelete" 
                        <?= ((!is_null($user) && $user['deleteflg'] == 0)?'checked="checked"':'') ?>> 未削除
                    <input 
                        type="radio" 
                        name="deleteflg" 
                        value="deleted"　
                        <?= ((!is_null($user) && $user['deleteflg'] == 1)?'checked="checked"':'') ?>> 削除済み
                </th>
            </tr>
            <tr>
                <th colspan="3" class='registBtn'>
                    <input name='confirm' type="submit" value="登録">
                    <?php if (!is_null($user)): ?>
                        <input type='hidden' name='update' value="update"/>
                        <input type='hidden' name='uid' value="<?= $user['uid'] ?>"/>
                    <?php endif; ?>
                </th>
            </tr>
        </table><br>
        </form>
    </div>