<?php

class SportKindEditForm extends \Phalcon\Forms\Form {
	public function initialize( $entity = null, $options = array() ) {
		$name = new \Phalcon\Forms\Element\Text("name", array('class' => 'form-control'));
		$name->setLabel("Название вида спорта");
		$name->addValidator( new \Phalcon\Validation\Validator\PresenceOf(array('message' => 'Поле Название вида спорта не заполнено')) );
		$this->add($name);
	}
}