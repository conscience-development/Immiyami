<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * XmlCriteria Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $tagname
 * @property string $useForSuggestions
 * @property string|null $maxpoint
 * @property string $question
 * @property int|null $xml_qualification_id
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\XmlQualification $xml_qualification
 */
class XmlCriteria extends Entity
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
        'useForSuggestions' => true,
        'maxpoint' => true,
        'question' => true,
        'help_link' => true,
        'xml_qualification_id' => true,
        'created' => true,
        'xml_qualification' => true,
    ];
}
