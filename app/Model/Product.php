<?php

class Product extends AppModel {
	public $belongsTo = array('Brand', 'Buyer');
	
	public $validate = array(
			'item_title' => array('titleCharacter' => array('rule' => array('maxLength', 60), 'message' => 'title should be less than 60 characters'), 'titleEmpty' => array('rule' => 'notEmpty') ),
			'item_comment' => array('commentCharacter' => array('rule' => array('maxLength', 200), 'message' => 'comment should be less than 200 characters'), 'commentEmpty' => array('rule' => 'notEmpty') ),
			'price' => array('rule' => array('range', 4999, 1000001), 'message' => 'price should be between 5000 to 1000000'),
			'stock' => array('rule' => array('range', 0, 100), 'message' => 'stock should be between 1 to 99'),
	);
}