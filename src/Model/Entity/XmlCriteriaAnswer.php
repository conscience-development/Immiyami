<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * XmlCriteriaAnswer Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $tagname
 * @property string|null $answer
 * @property string|null $point
 * @property int|null $criteria_id
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\XmlCriteria $xml_criteria
 */
class XmlCriteriaAnswer extends Entity
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
        'name' => true,
        'tagname' => true,
        'answer' => true,
        'point' => true,
        'criteria_id' => true,
        'created' => true,
        'xml_criteria' => true,
    ];
}
