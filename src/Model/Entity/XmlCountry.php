<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * XmlCountry Entity
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $xml_sheet_id
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\XmlSheet $xml_sheet
 * @property \App\Model\Entity\XmlSubmission[] $xml_submissions
 * @property \App\Model\Entity\XmlVisatype[] $xml_visatypes
 */
class XmlCountry extends Entity
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
        'xml_sheet_id' => true,
        'created' => true,
        'xml_sheet' => true,
        'xml_submissions' => true,
        'xml_visatypes' => true,
    ];
}
