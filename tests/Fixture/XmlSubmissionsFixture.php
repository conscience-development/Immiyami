<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * XmlSubmissionsFixture
 */
class XmlSubmissionsFixture extends TestFixture
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
                'xml_sheet_id' => 1,
                'xml_country_id' => 1,
                'xml_vsatype_id' => 1,
                'xml_qualification_id' => 1,
                'user_id' => 1,
                'created' => 1661232841,
            ],
        ];
        parent::init();
    }
}
