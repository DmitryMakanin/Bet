<?php

class Sport extends \Phalcon\Mvc\Model {
	private $id;
	private $name;
	
	public function getID() {
		return $this->id;
	}
	
	public function getName() {
		return $this->name;
	}
}