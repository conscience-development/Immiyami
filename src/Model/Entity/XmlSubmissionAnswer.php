<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * XmlSubmissionAnswer Entity
 *
 * @property int $id
 * @property int $criteria_id
 * @property int $criteria_answer_id
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\XmlCriteria $xml_criteria
 * @property \App\Model\Entity\XmlCriteriaAnswer $xml_criteria_answer
 */
class XmlSubmissionAnswer extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'criteria_id' => true,
        'criteria_answer_id' => true,
        'xml_submission_id' => true,
        'created' => true,
        'xml_criteria' => true,
        'xml_criteria_answers' => true,
        'xml_submission' => true,
    ];
}
