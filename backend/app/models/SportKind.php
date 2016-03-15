<?php

class SportKind extends \Phalcon\Mvc\Model {
	private $id;
	private $name_sport;
	
	public function getID() {
		return $this->id;
	}
	
	public function getName() {
		return $this->name_sport;
	}
	
	public function setName( $new_name ) {
		$filter = new \Phalcon\Filter();
		$this->name_sport = $filter->sanitize($new_name, 'string');
	}
}