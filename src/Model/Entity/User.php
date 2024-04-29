<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $email
 * @property string|null $password
 * @property string|null $bio
 * @property string|null $contact
 * @property string|null $photo
 * @property string|null $photo_dir
 * @property \Cake\I18n\FrozenTime|null $last_login
 * @property string|null $password_reset_token
 * @property string|null $company_name
 * @property string $status
 * @property string $role
 * @property int|null $category_id
 * @property int|null $country_id
 * @property int|null $preferred_country_id
 * @property int|null $coupon_id
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Country $country
 * @property \App\Model\Entity\PreferredCountry $preferred_country
 * @property \App\Model\Entity\Coupon $coupon
 * @property \App\Model\Entity\Article[] $articles
 * @property \App\Model\Entity\Banner[] $banners
 * @property \App\Model\Entity\Gallery[] $galleries
 * @property \App\Model\Entity\Payment[] $payments
 * @property \App\Model\Entity\Post[] $posts
 */
class User extends Entity
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
        'first_name' => true,
        'last_name' => true,
        'email' => true,
        'password' => true,
        'bio' => true,
        'contact' => true,
        'photo' => true,
        'photo_dir' => true,
        'last_login' => true,
        'password_reset_token' => true,
        'company_name' => true,
        'status' => true,
        'q' => true,
        'q_active' => true,
        'qm' => true,
        'sup_p' => true,
        'role' => true,
        'category_id' => true,
        'country_id' => true,
        'preferred_country_id' => true,
        'coupon_id' => true,
        'created' => true,
        'category' => true,
        'country' => true,
        'preferred_country' => true,
        'coupon' => true,
        'articles' => true,
        'banners' => true,
        'galleries' => true,
        'payments' => true,
        'xmlsubmissions' => true,
        'posts' => true,
        'UserLogs' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password',
    ];
    protected function _setPassword($value)
    {
        if (strlen($value)) {
            $hasher = new DefaultPasswordHasher();

            return $hasher->hash($value);
        }
    }
}
