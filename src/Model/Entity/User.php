<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity.
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $lastname
 * @property string $firstname
 * @property bool $gender
 * @property \Cake\I18n\Time $birthday
 * @property string $email
 * @property string $role
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
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    protected function _getUsername($username) {
        if(isset($this->_properties['role']) && $this->_properties['role'] === 'admin')
            return '<i class="fa fa-star fa-fw"></i> ' . h($username);
        else
            return h($username);
    }

    protected function _setEmail($email) {
        if (strlen($email) > 0) {
            return h($email);
        }
    }

    protected function _setPassword($password) {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }
}
