<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BannersFixture
 */
class BannersFixture extends TestFixture
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
                'title' => 'Lorem ipsum dolor sit amet',
                'sponsor_name' => 'Lorem ipsum dolor sit amet',
                'photo' => 'Lorem ipsum dolor sit amet',
                'photo_dir' => 'Lorem ipsum dolor sit amet',
                'start_date' => '2022-08-01 06:47:10',
                'end_date' => '2022-08-01 06:47:10',
                'url' => 'Lorem ipsum dolor sit amet',
                'position' => 'Lorem ipsum dolor sit amet',
                'price' => 1.5,
                'status' => 'Lorem ipsum dolor sit amet',
                'banner_type_id' => 1,
                'user_id' => 1,
                'created' => 1659336430,
            ],
        ];
        parent::init();
    }
}
