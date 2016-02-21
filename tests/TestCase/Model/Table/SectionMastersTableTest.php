<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SectionMastersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SectionMastersTable Test Case
 */
class SectionMastersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SectionMastersTable
     */
    public $SectionMasters;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.section_masters'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SectionMasters') ? [] : ['className' => 'App\Model\Table\SectionMastersTable'];
        $this->SectionMasters = TableRegistry::get('SectionMasters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SectionMasters);

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
