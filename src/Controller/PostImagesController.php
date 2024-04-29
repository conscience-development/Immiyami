<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PostImages Controller
 *
 * @property \App\Model\Table\PostImagesTable $PostImages
 * @method \App\Model\Entity\PostImage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PostImagesController extends AppController
{
    public function initialize(): void
	{
		parent::initialize();

		$this->loadComponent('Search.Search', [
			// This is default config. You can modify "actions" as needed to make
			// the Search component work only for specified methods.
			'actions' => ['index'],
		]);
	}
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
		$query = $this->PostImages
        // Use the plugins 'search' custom finder and pass in the
        // processed query params
        ->find('search', ['search' => $this->request->getQueryParams()])
        // You can add extra things to the query if you need to
        ->contain(['Posts']);

		$this->set('postImages', $this->paginate($query));
		
		
        //~ $this->paginate = [
            //~ 'contain' => ['Posts'],
        //~ ];
        //~ $postImages = $this->paginate($this->PostImages);

        //~ $this->set(compact('postImages'));
    }

    /**
     * View method
     *
     * @param string|null $id Post Image id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $postImage = $this->PostImages->get($id, [
            'contain' => ['Posts'],
        ]);

        $this->set(compact('postImage'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $postImage = $this->PostImages->newEmptyEntity();
        if ($this->request->is('post')) {
            $postImage = $this->PostImages->patchEntity($postImage, $this->request->getData());
            if ($this->PostImages->save($postImage)) {
                $this->Flash->success(__('The post image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post image could not be saved. Please, try again.'));
        }
        $posts = $this->PostImages->Posts->find('list', ['limit' => 200])->all();
        $this->set(compact('postImage', 'posts'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Post Image id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $postImage = $this->PostImages->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $postImage = $this->PostImages->patchEntity($postImage, $this->request->getData());
            if ($this->PostImages->save($postImage)) {
                $this->Flash->success(__('The post image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post image could not be saved. Please, try again.'));
        }
        $posts = $this->PostImages->Posts->find('list', ['limit' => 200])->all();
        $this->set(compact('postImage', 'posts'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Post Image id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $postImage = $this->PostImages->get($id);
        if ($this->PostImages->delete($postImage)) {
            $this->Flash->success(__('The post image has been deleted.'));
        } else {
            $this->Flash->error(__('The post image could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function deletePImg($id = null,$userID = null)
    {
        // $this->request->allowMethod(['post', 'delete']);
        $postImage = $this->PostImages->get($id);
        $postId = $postImage->post_id;

        $this->loadModel('Users');
        $user = $this->Users->get($this->Auth->user('id'));

        if ($this->PostImages->delete($postImage)) {
            $this->Flash->success(__('The post image has been deleted.'));
        } else {
            $this->Flash->error(__('The post image could not be deleted. Please, try again.'));
        }
    // $this->redirect( Router::url( $this->referer(), true ) );
    // $this->redirect($this->referer().'#edit-post');
        if($user->role=='supplier' || $user->role=='superuser'){
            $this->redirect('/supplierProfile?post-id='.$postId.'#edit-post');
        }else{
            $this->redirect('/posts/edit/'.$postId);
        }
        
        // return $this->redirect(['action' => 'index']);
    }
//     public function deletePImg($id = null)
// {
//     // Ensure the request is a POST request
//     if ($this->request->is(['post', 'delete'])) {
//         // Fetch the post image along with its associated post
//         $postImage = $this->PostImages->get($id, ['contain' => 'Post']);
        
//         // Retrieve the post ID
//         $postId = $postImage->post->id;

//         // Attempt to delete the post image
//         if ($this->PostImages->delete($postImage)) {
//             $this->Flash->success(__('The post image has been deleted.'));
//         } else {
//             $this->Flash->error(__('The post image could not be deleted. Please, try again.'));
//         }
//     }

//     // Redirect back to the supplier profile with the post ID
//     return $this->redirect(['controller' => 'Supplier', 'action' => 'profile', '?' => ['post_id' => $postId], '#' => 'edit-post']);
// }
    //Multi Action
    public function multiAction()
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
			//~ print_r($this->request->getData());
			$statusGet = $this->request->getData('status');
			foreach($this->request->getData('info') as $id){
				$get_data = $this->PostImages->get($id);
				if ($statusGet == '2') {
					if ($this->PostImages->delete($get_data)) {
						echo '1';
					} else {
						echo '0';
					}
				}else{
						$get_data->status = $statusGet;
						if ($this->PostImages->save($get_data)) {
							echo '1';
						} else {
							echo '0';
						}
				}
			}
			
		}else{
			echo 'not Post';
		}
        die();
    }
}