<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * XmlSheet Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $version
 * @property string|null $file
 * @property string|null $file_dir
 * @property string $status
 * @property int|null $user_id
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\XmlCountry[] $xml_countries
 * @property \App\Model\Entity\XmlSubmission[] $xml_submissions
 */
class XmlSheet extends Entity
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
        'version' => true,
        'file' => true,
        'file_dir' => true,
        'status' => true,
        'user_id' => true,
        'created' => true,
        'user' => true,
        'xml_countries' => true,
        'xml_submissions' => true,
    ];
}
