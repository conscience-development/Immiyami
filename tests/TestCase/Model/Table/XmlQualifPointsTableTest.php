<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\XmlQualifPointsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\XmlQualifPointsTable Test Case
 */
class XmlQualifPointsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\XmlQualifPointsTable
     */
    protected $XmlQualifPoints;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.XmlQualifPoints',
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
        $config = $this->getTableLocator()->exists('XmlQualifPoints') ? [] : ['className' => XmlQualifPointsTable::class];
        $this->XmlQualifPoints = $this->getTableLocator()->get('XmlQualifPoints', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->XmlQualifPoints);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\XmlQualifPointsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
