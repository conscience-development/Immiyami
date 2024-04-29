<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\XmlCriteriaAnswersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\XmlCriteriaAnswersTable Test Case
 */
class XmlCriteriaAnswersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\XmlCriteriaAnswersTable
     */
    protected $XmlCriteriaAnswers;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.XmlCriteriaAnswers',
        'app.XmlCriterias',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('XmlCriteriaAnswers') ? [] : ['className' => XmlCriteriaAnswersTable::class];
        $this->XmlCriteriaAnswers = $this->getTableLocator()->get('XmlCriteriaAnswers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->XmlCriteriaAnswers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\XmlCriteriaAnswersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\XmlCriteriaAnswersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
