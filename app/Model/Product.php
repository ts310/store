<?php

class Product extends AppModel {
	public $belongsTo = array('Brand', 'Buyer');
}