<?php

class CommentsController extends AppController {
	public $helpers = array('Js' => array('Jquery'));
	public $components = array('RequestHandler');
	
	public function save() {
  $this->Comment->save($this->request->data);
  if ($this->Comment->save($this->request->data)) {
      $this->Session->setFlash(__('The project note has been saved.', true), 'flash_success');
    } else {
     $this->Session->setFlash(__('The note could not be saved. Please, try again.', true), 'flash_error');
    }
  }
}