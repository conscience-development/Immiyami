<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BannerTypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BannerTypesTable Test Case
 */
class BannerTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BannerTypesTable
     */
    protected $BannerTypes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.BannerTypes',
        'app.Banners',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('BannerTypes') ? [] : ['className' => BannerTypesTable::class];
        $this->BannerTypes = $this->getTableLocator()->get('BannerTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->BannerTypes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\BannerTypesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
