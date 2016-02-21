<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DepartmentMastersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DepartmentMastersTable Test Case
 */
class DepartmentMastersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DepartmentMastersTable
     */
    public $DepartmentMasters;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.department_masters'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DepartmentMasters') ? [] : ['className' => 'App\Model\Table\DepartmentMastersTable'];
        $this->DepartmentMasters = TableRegistry::get('DepartmentMasters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DepartmentMasters);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
