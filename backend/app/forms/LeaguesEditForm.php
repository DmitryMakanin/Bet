<?php

class LeaguesEditForm extends \Phalcon\Forms\Form {
	public function initialize( $entity = null, $options = array() ) {
		
		 $sport_kind_id = new \Phalcon\Forms\Element\Select('sport_kind_id', SportKind::find(), array(
            'using' => array('id', 'name'),
            'useEmpty' => true,
            'emptyText' => '...выберите вид спорта...',
            'emptyValue' => '',
            'class' => 'form-control'
        ));
		$sport_kind_id->setLabel("Вид спорта");
		$sport_kind_id->addValidator(new \Phalcon\Validation\Validator\PresenceOf(array('message' => 'поле Вид спорта не заполнено')));
		$this->add($sport_kind_id);
		
		$country_id = new \Phalcon\Forms\Element\Select('country_id', Country::find(), array(
            'using' => array('id', 'country_name'),
            'useEmpty' => true,
            'emptyText' => '...выберите страну...',
            'emptyValue' => '',
            'class' => 'form-control'
        ));
        $country_id->setLabel("Страна");
        $country_id->addValidator(new \Phalcon\Validation\Validator\PresenceOf(array('message' => 'Поле Страна не заполнено')));
        $this->add($country_id);
		
		$name = new \Phalcon\Forms\Element\Text("leaguename", array('class' => 'form-control'));
		$name->setLabel("Название лиги");
		$name->addValidator( new \Phalcon\Validation\Validator\PresenceOf(array('message' => 'Поле Название лиги не заполнено')) );
		$this->add($name);
	}
}