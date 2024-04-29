<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CouponsFixture
 */
class CouponsFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'code' => 'Lorem ipsum dolor sit amet',
                'start_date' => '2022-08-01',
                'end_date' => '2022-08-01',
                'status' => 'Lorem ipsum dolor sit amet',
                'created' => 1659331199,
            ],
        ];
        parent::init();
    }
}
