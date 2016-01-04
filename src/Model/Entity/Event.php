<?php
namespace App\Model\Entity;

use Cake\I18n\Time;
use Cake\ORM\Entity;

/**
 * Event Entity.
 *
 * @property int $id
 * @property string $title
 * @property text $description
 * @property \Cake\I18n\Time $start
 * @property \Cake\I18n\Time $end
 * @property int $nb_min
 * @property int $nb_max
 * @property int $age_min
 * @property int $age_max
 * @property \App\Model\Entity\Game[] $games
 * @property \App\Model\Entity\User[] $users
 */
class Event extends Entity
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

    public function isFull() {
        return count($this->_properties['users']) == $this->_properties['nb_max'];
    }

    public function isPast() {
        return $this->_properties['start']->toUnixString() <= Time::now()->toUnixString() ;
    }
}
