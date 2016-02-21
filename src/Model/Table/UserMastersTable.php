<?php
namespace App\Model\Table;

use App\Model\Entity\UserMaster;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserMasters Model
 *
 */
class UserMastersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('user_masters');
        $this->displayField('uid');
        $this->primaryKey('uid');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('uid')
            ->allowEmpty('uid', 'create');

        $validator
            ->integer('departmentcd')
            ->allowEmpty('departmentcd');

        $validator
            ->requirePresence('familyname', 'create')
            ->notEmpty('familyname');

        $validator
            ->allowEmpty('firstname');

        $validator
            ->allowEmpty('familykana');

        $validator
            ->allowEmpty('firstkana');

        $validator
            ->allowEmpty('mailaddress');

        $validator
            ->integer('deleteflg')
            ->requirePresence('deleteflg', 'create')
            ->notEmpty('deleteflg');

        $validator
            ->date('insdate')
            ->requirePresence('insdate', 'create')
            ->notEmpty('insdate');

        $validator
            ->requirePresence('lastupdate', 'create')
            ->notEmpty('lastupdate');

        return $validator;
    }
}
