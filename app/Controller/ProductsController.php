<?php

class ProductsController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Paginator');
	
	public $paginate = array('limit' => 20, 'order' => array('Product.id' => 'asc'));
	
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
		
		$this->set('product', $product);
	}
}