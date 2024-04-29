<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ControllerFuncFixture
 */
class ControllerFuncFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'controller_func';
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
                'controller' => 'Lorem ipsum dolor sit amet',
                'func' => 'Lorem ipsum dolor sit amet',
                'created' => 1659595455,
            ],
        ];
        parent::init();
    }
}
