<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PostsCountriesFixture
 */
class PostsCountriesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'country_id' => 1,
                'post_id' => 1,
                'created' => 1695485501,
            ],
        ];
        parent::init();
    }
}
