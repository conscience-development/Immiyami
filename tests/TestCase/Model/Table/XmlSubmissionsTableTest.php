<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\XmlSubmissionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\XmlSubmissionsTable Test Case
 */
class XmlSubmissionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\XmlSubmissionsTable
     */
    protected $XmlSubmissions;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.XmlSubmissions',
        'app.XmlSheets',
        'app.XmlCountries',
        'app.XmlVisatypes',
        'app.XmlQualifications',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('XmlSubmissions') ? [] : ['className' => XmlSubmissionsTable::class];
        $this->XmlSubmissions = $this->getTableLocator()->get('XmlSubmissions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->XmlSubmissions);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\XmlSubmissionsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\XmlSubmissionsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
