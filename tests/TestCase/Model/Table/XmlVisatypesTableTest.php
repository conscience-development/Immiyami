<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\XmlVisatypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\XmlVisatypesTable Test Case
 */
class XmlVisatypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\XmlVisatypesTable
     */
    protected $XmlVisatypes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.XmlVisatypes',
        'app.XmlCountries',
        'app.XmlQualifications',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('XmlVisatypes') ? [] : ['className' => XmlVisatypesTable::class];
        $this->XmlVisatypes = $this->getTableLocator()->get('XmlVisatypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->XmlVisatypes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\XmlVisatypesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\XmlVisatypesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
