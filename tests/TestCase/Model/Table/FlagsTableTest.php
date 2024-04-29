<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FlagsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FlagsTable Test Case
 */
class FlagsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FlagsTable
     */
    protected $Flags;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Flags',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Flags') ? [] : ['className' => FlagsTable::class];
        $this->Flags = $this->getTableLocator()->get('Flags', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Flags);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\FlagsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
