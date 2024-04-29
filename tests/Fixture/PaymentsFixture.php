<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PaymentsFixture
 */
class PaymentsFixture extends TestFixture
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
                'price' => 1.5,
                'payment_date' => '2022-08-01 05:19:59',
                'type' => 'Lorem ipsum dolor sit amet',
                'package' => 'Lorem ipsum dolor sit amet',
                'status' => 'Lorem ipsum dolor sit amet',
                'user_id' => 1,
                'created' => 1659331199,
            ],
        ];
        parent::init();
    }
}
