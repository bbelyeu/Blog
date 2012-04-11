<?php
App::uses('BlogAppController', 'Blog.Controller');

class PostsController extends BlogAppController 
{
	public $name = 'Posts';

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
	}

	public function view($id = null) 
	{
		if (!$id) {
			$this->Session->setFlash(__('Invalid post', true));
			$this->redirect(array('action' => 'index'));
		} else {
			$this->set('post', $this->Post->read(null, $id));
		}
	}

	public function admin_index() 
	{
		$this->Post->recursive = 0;
		$this->set('posts', $this->paginate());
	}

	public function admin_view($id = null) 
	{
		if (!$id) {
			$this->Session->setFlash(__('Invalid post', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('post', $this->Post->read(null, $id));
	}

	public function admin_add() 
	{
		if (!empty($this->data)) {
			$this->Post->create();
			if ($this->Post->save($this->data)) {
				$this->Session->setFlash(__('The post has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.', true));
			}
		}
	}

	public function admin_edit($id = null) 
	{
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid post', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Post->save($this->data)) {
				$this->Session->setFlash(__('The post has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Post->read(null, $id);
		}
	}

	public function admin_delete($id = null) 
	{
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for post', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Post->delete($id)) {
			$this->Session->setFlash(__('Post deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Post was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

}
