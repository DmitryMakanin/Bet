<?php

class CountriesEditForm extends \Phalcon\Forms\Form {
	public function initialize( $entity = null, $options = array() ) {
		$name = new \Phalcon\Forms\Element\Text("countryname", array('class' => 'form-control'));
		$name->setLabel("Название страны");
		$name->addValidator( new \Phalcon\Validation\Validator\PresenceOf(array('message' => 'Поле Название страны не заполнено')) );
		$this->add($name);
	}
}