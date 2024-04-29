<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * XmlCountriesFixture
 */
class XmlCountriesFixture extends TestFixture
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
                'imglink' => 'Lorem ipsum dolor sit amet',
                'xml_sheet_id' => 1,
                'created' => 1661232746,
            ],
        ];
        parent::init();
    }
}
