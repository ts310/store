<?php

class ProductsController extends AppController {
	public $helpers = array('Html', 'Form');
	
	public function index() {
		$this->set('products', $this->Product->find('all'));
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