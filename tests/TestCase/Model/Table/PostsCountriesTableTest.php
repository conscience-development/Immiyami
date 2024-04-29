<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PostsCountriesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PostsCountriesTable Test Case
 */
class PostsCountriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PostsCountriesTable
     */
    protected $PostsCountries;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.PostsCountries',
        'app.Countries',
        'app.Posts',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PostsCountries') ? [] : ['className' => PostsCountriesTable::class];
        $this->PostsCountries = $this->getTableLocator()->get('PostsCountries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->PostsCountries);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PostsCountriesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\PostsCountriesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
