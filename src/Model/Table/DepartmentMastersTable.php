<?php
namespace App\Model\Table;

use App\Model\Entity\DepartmentMaster;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DepartmentMasters Model
 *
 */
class DepartmentMastersTable extends Table
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

        $this->table('department_masters');
        $this->displayField('departmentcd');
        $this->primaryKey('departmentcd');
        $this->belongsTo('SectionMasters', [
            'foreignKey' => 'sectioncd'
        ]);
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
            ->integer('departmentcd')
            ->allowEmpty('departmentcd', 'create');

        $validator
            ->integer('sectioncd')
            ->requirePresence('sectioncd', 'create')
            ->notEmpty('sectioncd');

        $validator
            ->allowEmpty('departmentname');

        return $validator;
    }
}
