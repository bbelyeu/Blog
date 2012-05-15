<?php
App::uses('BlogAppController', 'Blog.Controller');
/**
 * Posts Controller
 *
 * @property Post $Post
 */
class PostsController extends BlogAppController
{
    public $components = array('RequestHandler');

    public $helpers = array('Text');

    /**
     * If auth component is turned on allow index & view without authorization
     *
     * @return null
     */
    public function beforeFilter()
    {
        if (!empty($this->Auth)) {
            $this->Auth->allow('index', 'view');
        }
        parent::beforeFilter();
    }

    /**
     * index method
     *
     * @return void
     */
	public function index()
    {
        $this->paginate = array(
            'Post' => array(
                'conditions' => 'Post.publish <= NOW()',
                'order' => array('Post.publish' => 'desc'),
            ),
        );

		$this->Post->recursive = 0;
		$this->set('posts', $this->paginate());

        // if used in conjunction with MysqlImageStorage plugin
        if (App::import('Model', 'MysqlImageStorage.Image')) {
        }
	}

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
	public function view($id = null)
    {
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}

        $post = $this->Post->read(null, $id);

        // if used in conjunction with MysqlImageStorage plugin
        if (App::import('Model', 'MysqlImageStorage.Image')) {
        }

		$this->set('post', $post);
	}

    /**
     * admin_index method
     *
     * @return void
     */
	public function admin_index() 
    {
        $this->helpers[] = 'Text';
		$this->Post->recursive = 0;
		$this->set('posts', $this->paginate());
	}

    /**
     * admin_view method
     *
     * @param string $id
     * @return void
     */
	public function admin_view($id = null) 
    {
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}

        $post = $this->Post->read(null, $id);

        // if used in conjunction with MysqlImageStorage plugin
        if (App::import('Model', 'MysqlImageStorage.Image')) {
        }

		$this->set('post', $post);
	}

    /**
     * admin_add method
     *
     * @return void
     */
	public function admin_add() 
    {
		if ($this->request->is('post')) {
            // if used in conjunction with MysqlImageStorage plugin
            if (App::import('Model', 'MysqlImageStorage.Image')) {
                $this->ImageComponent = $this->Components->load('MysqlImageStorage.Image');
                $this->request->data['Post']['image_id'] = $this->ImageComponent->process($this->request->data['Post']);
            }

			$this->Post->create();
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('The post has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		}
		$tags = $this->Post->Tag->find('list');
		$this->set(compact('tags'));
	}

    /**
     * admin_edit method
     *
     * @param string $id
     * @return void
     */
	public function admin_edit($id = null) 
    {
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
            // if used in conjunction with MysqlImageStorage plugin
            if (App::import('Model', 'MysqlImageStorage.Image')) {
                $this->ImageComponent = $this->Components->load('MysqlImageStorage.Image');
                $this->request->data['Post']['image_id'] = $this->ImageComponent->process($this->request->data['Post']);
            }

			if ($this->Post->save($this->request->data)) {

                // if used in conjunction with MysqlImageStorage plugin
                if (App::import('Model', 'MysqlImageStorage.Image')) {
                }
				$this->Session->setFlash(__('The post has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Post->read(null, $id);
		}
	}

    /**
     * admin_delete method
     *
     * @param string $id
     * @return void
     */
	public function admin_delete($id = null) 
    {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
        $imageId = $this->Post->image_id;
		if ($this->Post->delete()) {
            // if used in conjunction with MysqlImageStorage plugin
            // then delete the image also
            if (App::import('Model', 'MysqlImageStorage.Image')) {
                $Image = new Image();
                $Image->id = $imageId;
                if ($Image->exists()) {
                    $Image->delete();
                }
            }

			$this->Session->setFlash(__('Post deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Post was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}
