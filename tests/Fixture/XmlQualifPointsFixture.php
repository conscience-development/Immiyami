<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * XmlQualifPointsFixture
 */
class XmlQualifPointsFixture extends TestFixture
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
                'color' => 'Lorem ipsum dolor sit amet',
                'points' => 'Lorem ipsum dolor sit amet',
                'xml_qualification_id' => 1,
                'created' => 1662531938,
            ],
        ];
        parent::init();
    }
}
