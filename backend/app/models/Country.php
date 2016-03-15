<?php

class Country extends \Phalcon\Mvc\Model {
	private $id;
	private $countryname;
	
	public function getID() {
		return $this->id;
	}
	
	public function getCountryname() {
		return $this->countryname;
	}
	
	public function setID( $new_id ) {
		$this->id = $new_id;
	}
	
	public function setCountryname( $new_countryname ) {
		$this->countryname = $new_countryname;
	}
}