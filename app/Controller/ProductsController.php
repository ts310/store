<?php

class ProductsController extends AppController {
	
	public $helpers = array('Js' => array('Jquery'));
	public $components = array('Paginator', 'RequestHandler');
	
	public $paginate = array('limit' => 20, 'order' => array('Product.id' => 'asc'));
	
	public function beforeFilter() {
		$this->Auth->allow('index', 'detail', 'save');
	}
	
	public function index() {
		$this->Paginator->settings = $this->paginate;
		
		$this->set('products', $this->Paginator->paginate('Product'));
	}
	
	public function detail($id = NULL) {
		if (!$id) {
			throw new NotFoundException(__('This item does not exist'));
		}
		
		$product = $this->Product->findById($id);
		if (!$product) {
			throw new NotFoundException(__('This item does not exist'));
		}
		
		$comments = $this->Product->Comment->findAllByProductId($product['Product']['id']);
		
		$this->set('product', $product);
		$this->set('comments', $comments);
	}
	
	public function add() {
		$brandsTable = $this->Product->Brand->find('all');
		foreach ($brandsTable as $brandsItem) {
			$brands[] = $brandsItem['Brand']['brand_name'];
		}
		$this->set('brands', $brands);
		if ($this->request->is('post')) {
			$this->Product->create();
			$this->request->data['Product']['user_id'] = $this->Auth->user('id');
			$this->request->data['Product']['brand_id']++;
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('The item is created'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Unable to create the item'));
		}
	}
	
	public function edit($id = NULL) {
		if (!$id) {
			throw new NotFoundException(__('This item does not exist'));
		}
		
		$product = $this->Product->findById($id);
		if (!$product) {
			throw new NotFoundException(__('This item does not exist'));
		}
		
		$brandsTable = $this->Product->Brand->find('all');
		foreach ($brandsTable as $brandsItem) {
			$brands[] = $brandsItem['Brand']['brand_name'];
		}
		$this->set('brands', $brands);
		
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->Product->id = $id;
			$this->request->data['Product']['brand_id']++;
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('Item is edited'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Unable to edit the item'));
		}
		
		if (!$this->request->data) {
			$this->request->data = $product;
		}
		
		$this->set('product', $product);
	}
	
	public function save() {
		$this->autoRender = false;
		$this->Session->setFlash(__('The project note has been saved.'));
		$this->Product->create();
  if ($this->Product->save($this->request->data)) {
      $this->Session->setFlash(__('The project note has been saved.', true), 'flash_success');
    } else {
     $this->Session->setFlash(__('The note could not be saved. Please, try again.', true), 'flash_error');
    }
  }
	
	public function isAuthorized($user) {
		if ($this->action === 'add') {
			return 1;
		}
		
		if ($this->action === 'edit') {
			$productId = $this->request->params['pass'][0];
			if ($this->Product->isOwnedBy($productId, $user['id'])) {
				return 1;
			}
		}
		
		return parent::isAuthorized($user);
	}
}