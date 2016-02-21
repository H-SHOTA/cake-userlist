<?php
namespace App\Model\Table;

use App\Model\Entity\SectionMaster;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SectionMasters Model
 *
 */
class SectionMastersTable extends Table
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

        $this->table('section_masters');
        $this->displayField('sectioncd');
        $this->primaryKey('sectioncd');
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
            ->integer('sectioncd')
            ->allowEmpty('sectioncd', 'create');

        $validator
            ->requirePresence('sectionname', 'create')
            ->notEmpty('sectionname');

        return $validator;
    }
}
