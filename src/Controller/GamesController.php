<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Games Controller
 *
 * @property \App\Model\Table\GamesTable $Games
 */
class GamesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('games', $this->paginate($this->Games));
        $this->set('_serialize', ['games']);
    }

    /**
     * View method
     *
     * @param string|null $id Game id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $game = $this->Games->get($id, [
            'contain' => ['Categories']
        ]);
        $this->set('game', $game);
        $this->set('_serialize', ['game']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $game = $this->Games->newEntity();
        if ($this->request->is('post')) {
            $game = $this->Games->patchEntity($game, $this->request->data);
            if ($this->Games->save($game)) {
                $this->Flash->success(__('The game has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The game could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Games->Categories->find('list', ['limit' => 200]);
        $this->set(compact('game', 'categories'));
        $this->set('_serialize', ['game']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Game id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $game = $this->Games->get($id, [
            'contain' => ['Categories']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $game = $this->Games->patchEntity($game, $this->request->data);
            if ($this->Games->save($game)) {
                $this->Flash->success(__('The game has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The game could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Games->Categories->find('list', ['limit' => 200]);
        $this->set(compact('game', 'categories'));
        $this->set('_serialize', ['game']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Game id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $game = $this->Games->get($id);
        if ($this->Games->delete($game)) {
            $this->Flash->success(__('The game has been deleted.'));
        } else {
            $this->Flash->error(__('The game could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
