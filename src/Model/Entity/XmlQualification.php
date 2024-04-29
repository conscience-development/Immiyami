<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * XmlQualification Entity
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $xml_visatype_id
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\XmlVisatype $xml_visatype
 * @property \App\Model\Entity\XmlQualifPoint $xml_qualif_point
 * @property \App\Model\Entity\XmlCriteria[] $xml_criterias
 * @property \App\Model\Entity\XmlSubmission[] $xml_submissions
 */
class XmlQualification extends Entity
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
        'xml_visatype_id' => true,
        'created' => true,
        'xml_visatype' => true,
        'xml_qualif_point' => true,
        'xml_criterias' => true,
        'xml_submissions' => true,
    ];
}
