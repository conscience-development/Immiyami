<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * XmlQualifPoint Entity
 *
 * @property int $id
 * @property string|null $color
 * @property string|null $points
 * @property int|null $xml_qualification_id
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\XmlQualification[] $xml_qualifications
 */
class XmlQualifPoint extends Entity
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
        'color' => true,
        'points' => true,
        'xml_qualification_id' => true,
        'created' => true,
        'xml_qualifications' => true,
    ];
}
