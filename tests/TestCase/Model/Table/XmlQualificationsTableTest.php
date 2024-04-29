<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\XmlQualificationsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\XmlQualificationsTable Test Case
 */
class XmlQualificationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\XmlQualificationsTable
     */
    protected $XmlQualifications;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.XmlQualifications',
        'app.XmlVisatypes',
        'app.XmlQualifPoints',
        'app.XmlCriterias',
        'app.XmlSubmissions',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('XmlQualifications') ? [] : ['className' => XmlQualificationsTable::class];
        $this->XmlQualifications = $this->getTableLocator()->get('XmlQualifications', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->XmlQualifications);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\XmlQualificationsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\XmlQualificationsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
