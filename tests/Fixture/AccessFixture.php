<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AccessFixture
 */
class AccessFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'access';
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
                'status' => 'Lorem ipsum dolor sit amet',
                'user_id' => 1,
                'controller_func_id' => 1,
                'created' => 1659595460,
            ],
        ];
        parent::init();
    }
}
