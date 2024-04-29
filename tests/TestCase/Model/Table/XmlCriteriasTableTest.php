<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\XmlCriteriasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\XmlCriteriasTable Test Case
 */
class XmlCriteriasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\XmlCriteriasTable
     */
    protected $XmlCriterias;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.XmlCriterias',
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
        $config = $this->getTableLocator()->exists('XmlCriterias') ? [] : ['className' => XmlCriteriasTable::class];
        $this->XmlCriterias = $this->getTableLocator()->get('XmlCriterias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->XmlCriterias);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\XmlCriteriasTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\XmlCriteriasTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
