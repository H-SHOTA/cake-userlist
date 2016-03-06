    <div class="ctrlArea" >
    <form method='post' action='/user-masters/add/'> 
        <table  class='tableAlign'> 
            <tr class='useredit'>
                <th class='useredit'>名前：</th>
                <th class='useredit'>
                    <input type='textbox' 
                           name='sei' 
                           value=''/>
                </th>
                <th class='useredit'>
                    <input 
                        type='textbox' 
                        name='mei' 
                        value=''/>
                </th>
            </tr>
            <tr class='useredit'>
                <th class='useredit'>カナ：</th>
                <th class='useredit'>
                    <input 
                        type='textbox' 
                        name='seiKana' 
                        value=''/>
                </th>
                <th class='useredit'>
                    <input 
                        type='textbox' 
                        name='meiKana' 
                        value=''/>
                </th>
            </tr>
            <tr class='useredit'>
                <th class='useredit'>所属：</th>
                <th class='useredit' colspan="2">
                    <select name = "department">
                        <option value=""></option>  
                            <?php foreach ($sections as $section): ?>
                                <option value='<?= $section->departmentcd ?>'>
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
                        value=''/>
                </th>
            </tr>
            <tr class='useredit'>
                <th class='useredit'>削除フラグ：</th>
                <th class='useredit' colspan="2">
                    <input type="radio" name="deleteflg" value="nodelete" > 未削除
                    <input type="radio" name="deleteflg" value="deleted"　> 削除済み
                </th>
            </tr>
            <tr>
                <th colspan="3" class='registBtn'>
                    <input name='confirm' type="submit" value="登録">
                </th>
            </tr>
        </table><br>
        </form>
    </div>