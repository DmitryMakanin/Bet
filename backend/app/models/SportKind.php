<?php

class SportKind extends \Phalcon\Mvc\Model {
	private $id;
	private $name;
	
	public function getID() {
		return $this->id;
	}
	
	public function getName() {
		return $this->name;
	}
	
	public function setName($new_name) {
		$filter = new \Phalcon\Filter();
		$this->name = $filter->sanitize($new_name, 'string');
	}

	public function initialize(){
		$this->hasMany("id", "League", "sport_kind_id");
	}
}