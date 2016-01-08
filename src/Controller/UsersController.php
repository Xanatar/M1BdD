<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Network\Http\Client;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['add']);
    }

    public function isAuthorized($user = null)
    {
        if (in_array($this->request->action, ['index', 'view', 'logout'])) {
            return true;
        }

        if (in_array($this->request->action, ['edit', 'delete'])) {
            $userid = (int)$this->request->params['pass'][0];
            if ($userid == $user['id']) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if($this->Auth->user()) {
            $this->Flash->error(__('Vous êtes déjà connecté.'));
            return $this->redirect('/');
        }
        $this->set('h1', __('Inscription'));
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if (empty($data['username']) || empty($data['password']) || empty($data['email']) || empty($data['firstname']) || empty($data['lastname']) || empty($data['birthday']) || empty($data['g-recaptcha-response'])) {
                $this->Flash->error(__('Tous les champs obligatoires n\'ont pas été remplis.'));
            } elseif($data['password'] != $data['password_confirm']) {
                $this->Flash->error(__('Les mots-de-passe ne sont pas identiques.'));
            } else {
                $http = new Client();
                $reCaptcha = Configure::read('reCAPTCHA');
                $response = $http->post($reCaptcha['requestUrl'], [
                    'secret' => $reCaptcha['privateKey'],
                    'response' => $data['g-recaptcha-response'],
                    'remoteip' => $this->request->env('REMOTE_ADDR')
                ])->json;
                if (!$response['success']) {
                    $this->Flash->error(__('La vérification anti-bot a retourné une erreur. Veuillez réessayer.'));
                    debug($response);
                } else {
                    $user = $this->Users->patchEntity($user, $this->request->data);
                    if ($this->Users->save($user)) {
                        $this->Flash->success(__('Le compte a été créé.'));
                        return $this->redirect('/');
                    } else {
                        debug($data);
                        $this->Flash->error(__('L\'opération a rencontré un problème. Veuillez réessayer.'));
                    }
                }
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function login() {
        if($this->Auth->user()) {
            $this->Flash->error(__('Vous êtes déjà connecté.'));
            return $this->redirect('/');
        }
        $this->set('h1', __('Connexion'));
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $this->Flash->success(__('Connexion réussie.'));
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(__('Identifiants incorrects.'));
            }
        }
        $user = $this->Users->newEntity();
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('Le compte a été supprimé.'));
        } else {
            $this->Flash->error(__('Le compte n\'a pas pu être supprimé. Veuillez réessayer..'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function promote($id = null) {
        if($this->Auth->user('role') !== 'admin') {
            $this->Flash->error(__('Vous n\'avez pas les droits pour faire cela.'));
        } else {
            $user = $this->Users->get($id);
            $user->role = 'admin';
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        return $this->redirect(['action' => 'view', $id]);
    }

    public function demote($id = null) {
        if($this->Auth->user('role') !== 'admin') {
            $this->Flash->error(__('Vous n\'avez pas les droits pour faire cela.'));
        } else {
            $user = $this->Users->get($id);
            $user->role = 'member';
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        return $this->redirect(['action' => 'view', $id]);
    }
}
