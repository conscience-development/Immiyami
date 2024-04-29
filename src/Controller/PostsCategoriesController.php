<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PostsCategories Controller
 *
 * @property \App\Model\Table\PostsCategoriesTable $PostsCategories
 * @method \App\Model\Entity\PostsCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PostsCategoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Posts', 'Categories'],
        ];
        $postsCategories = $this->paginate($this->PostsCategories);

        $this->set(compact('postsCategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Posts Category id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $postsCategory = $this->PostsCategories->get($id, [
            'contain' => ['Posts', 'Categories'],
        ]);

        $this->set(compact('postsCategory'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $postsCategory = $this->PostsCategories->newEmptyEntity();
        if ($this->request->is('post')) {
            $postsCategory = $this->PostsCategories->patchEntity($postsCategory, $this->request->getData());
            if ($this->PostsCategories->save($postsCategory)) {
                $this->Flash->success(__('The posts category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The posts category could not be saved. Please, try again.'));
        }
        $posts = $this->PostsCategories->Posts->find('list', ['limit' => 200])->all();
        $categories = $this->PostsCategories->Categories->find('list', ['limit' => 200])->all();
        $this->set(compact('postsCategory', 'posts', 'categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Posts Category id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $postsCategory = $this->PostsCategories->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $postsCategory = $this->PostsCategories->patchEntity($postsCategory, $this->request->getData());
            if ($this->PostsCategories->save($postsCategory)) {
                $this->Flash->success(__('The posts category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The posts category could not be saved. Please, try again.'));
        }
        $posts = $this->PostsCategories->Posts->find('list', ['limit' => 200])->all();
        $categories = $this->PostsCategories->Categories->find('list', ['limit' => 200])->all();
        $this->set(compact('postsCategory', 'posts', 'categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Posts Category id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $postsCategory = $this->PostsCategories->get($id);
        if ($this->PostsCategories->delete($postsCategory)) {
            $this->Flash->success(__('The posts category has been deleted.'));
        } else {
            $this->Flash->error(__('The posts category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
