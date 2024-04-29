<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PostsCountries Controller
 *
 * @property \App\Model\Table\PostsCountriesTable $PostsCountries
 * @method \App\Model\Entity\PostsCountry[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PostsCountriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Countries', 'Posts'],
        ];
        $postsCountries = $this->paginate($this->PostsCountries);

        $this->set(compact('postsCountries'));
    }

    /**
     * View method
     *
     * @param string|null $id Posts Country id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $postsCountry = $this->PostsCountries->get($id, [
            'contain' => ['Countries', 'Posts'],
        ]);

        $this->set(compact('postsCountry'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $postsCountry = $this->PostsCountries->newEmptyEntity();
        if ($this->request->is('post')) {
            $postsCountry = $this->PostsCountries->patchEntity($postsCountry, $this->request->getData());
            if ($this->PostsCountries->save($postsCountry)) {
                $this->Flash->success(__('The posts country has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The posts country could not be saved. Please, try again.'));
        }
        $countries = $this->PostsCountries->Countries->find('list', ['limit' => 200])->all();
        $posts = $this->PostsCountries->Posts->find('list', ['limit' => 200])->all();
        $this->set(compact('postsCountry', 'countries', 'posts'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Posts Country id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $postsCountry = $this->PostsCountries->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $postsCountry = $this->PostsCountries->patchEntity($postsCountry, $this->request->getData());
            if ($this->PostsCountries->save($postsCountry)) {
                $this->Flash->success(__('The posts country has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The posts country could not be saved. Please, try again.'));
        }
        $countries = $this->PostsCountries->Countries->find('list', ['limit' => 200])->all();
        $posts = $this->PostsCountries->Posts->find('list', ['limit' => 200])->all();
        $this->set(compact('postsCountry', 'countries', 'posts'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Posts Country id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $postsCountry = $this->PostsCountries->get($id);
        if ($this->PostsCountries->delete($postsCountry)) {
            $this->Flash->success(__('The posts country has been deleted.'));
        } else {
            $this->Flash->error(__('The posts country could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
