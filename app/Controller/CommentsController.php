<?php

class CommentsController extends AppController {
	public $helpers = array('Js' => array('Jquery'));
	public $components = array('RequestHandler');
	
	public function beforeFilter() {
		$this->Auth->allow('save');
	}
	
	public function save() {
		$this->autoRender = false;
		App::uses('CakeTime', 'Utility');
		
		$this->Comment->create();
		$this->request->data['Comment']['user_id'] = $this->Auth->user('id');
	  	if ($this->Comment->save($this->request->data)) {
	    	$comment = $this->Comment->find('first', array('order' => array('Comment.id' => 'desc')));
	    	$response['success'] = true;
	    	$response['comment'] = $comment['Comment']['comment'];
	    	$response['created'] = CakeTime::format($comment['Comment']['created'],'%Y/%m/%d');
	    	$response['username'] = $comment['User']['username'];
	    } else {
	     	$response['success'] = false;
	    }
	    
	    echo json_encode($response);
	}
}