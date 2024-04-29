<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * XmlSubmissionAnswersFixture
 */
class XmlSubmissionAnswersFixture extends TestFixture
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
                'criteria_id' => 1,
                'criteria_answer_id' => 1,
                'created' => 1661232853,
            ],
        ];
        parent::init();
    }
}
