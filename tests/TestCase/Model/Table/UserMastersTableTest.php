<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserMastersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserMastersTable Test Case
 */
class UserMastersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserMastersTable
     */
    public $UserMasters;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_masters'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UserMasters') ? [] : ['className' => 'App\Model\Table\UserMastersTable'];
        $this->UserMasters = TableRegistry::get('UserMasters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserMasters);

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
