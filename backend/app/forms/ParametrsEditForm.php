<?php

class ParametrsEditForm extends \Phalcon\Forms\Form {
	public function initialize( $entity = null, $options = array() ) {
		$name = new \Phalcon\Forms\Element\Text("name", array('class' => 'form-control'));
		$name->setLabel("Название параметра");
		$name->addValidator( new \Phalcon\Validation\Validator\PresenceOf(array('message' => 'Поле Название параметра не заполнено')) );
		$this->add($name);
	}
}