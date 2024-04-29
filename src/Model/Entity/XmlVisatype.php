<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * XmlVisatype Entity
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $xml_country_id
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\XmlCountry $xml_country
 * @property \App\Model\Entity\XmlQualification[] $xml_qualifications
 */
class XmlVisatype extends Entity
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
        'xml_country_id' => true,
        'created' => true,
        'xml_country' => true,
        'xml_qualifications' => true,
    ];
}
