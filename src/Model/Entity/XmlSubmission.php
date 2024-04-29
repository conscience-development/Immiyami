<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * XmlSubmission Entity
 *
 * @property int $id
 * @property int $xml_sheet_id
 * @property int $xml_country_id
 * @property int $xml_vsatype_id
 * @property int $xml_qualification_id
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\XmlSheet $xml_sheet
 * @property \App\Model\Entity\XmlCountry $xml_country
 * @property \App\Model\Entity\XmlVisatype $xml_visatype
 * @property \App\Model\Entity\XmlQualification $xml_qualification
 * @property \App\Model\Entity\User $user
 */
class XmlSubmission extends Entity
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
        'xml_sheet_id' => true,
        'xml_country_id' => true,
        'xml_vsatype_id' => true,
        'xml_qualification_id' => true,
        'user_id' => true,
        'created' => true,
        'xml_sheet' => true,
        'xml_country' => true,
        'xml_visatype' => true,
        'xml_qualification' => true,
        'user' => true,
        'xml_submissions' => true,
        'xml_submission_answers' => true,
    ];
}
