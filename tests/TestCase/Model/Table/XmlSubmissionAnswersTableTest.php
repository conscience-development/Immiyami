<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\XmlSubmissionAnswersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\XmlSubmissionAnswersTable Test Case
 */
class XmlSubmissionAnswersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\XmlSubmissionAnswersTable
     */
    protected $XmlSubmissionAnswers;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.XmlSubmissionAnswers',
        'app.XmlCriterias',
        'app.XmlCriteriaAnswers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('XmlSubmissionAnswers') ? [] : ['className' => XmlSubmissionAnswersTable::class];
        $this->XmlSubmissionAnswers = $this->getTableLocator()->get('XmlSubmissionAnswers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->XmlSubmissionAnswers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\XmlSubmissionAnswersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\XmlSubmissionAnswersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
