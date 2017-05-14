<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('users');
        $this->displayField('username');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('username', 'create')
            ->notEmpty('username', __('Un pseudonyme est nécessaire.'));

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password', __('Un mot de passe est nécessaire.'));

        $validator
            ->requirePresence('lastname', 'create')
            ->notEmpty('lastname', __('Un nom est nécessaire.'));

        $validator
            ->requirePresence('firstname', 'create')
            ->notEmpty('firstname', __('Un prénom est nécessaire.'));

        $validator
            ->add('gender', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('gender');

        $validator
            ->add('birthday', 'valid', ['rule' => 'date', 'message' => __('La date n\'est pas valide.')])
            ->requirePresence('birthday', 'create')
            ->notEmpty('birthday', __('Une date de naissance est nécessaire.'));

        $validator
            ->add('email', 'valid', ['rule' => 'email'])
            ->requirePresence('email', 'create')
            ->notEmpty('email', __('Une adresse email est nécessaire.'))
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => __('Cette adresse email est déjà utilisée.')]);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        return $rules;
    }
}
