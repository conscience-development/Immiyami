<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ControllerFuncTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ControllerFuncTable Test Case
 */
class ControllerFuncTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ControllerFuncTable
     */
    protected $ControllerFunc;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.ControllerFunc',
        'app.Access',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ControllerFunc') ? [] : ['className' => ControllerFuncTable::class];
        $this->ControllerFunc = $this->getTableLocator()->get('ControllerFunc', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ControllerFunc);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ControllerFuncTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
