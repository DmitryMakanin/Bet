<?php

class TeamEditForm extends \Phalcon\Forms\Form {
	public function initialize ($entity = null, $options = array() ) {
		$league_kind_sport_id = new \Phalcon\Forms\Element\Select('league_kind_of_sport_id', SportKind::find(), array(
				'using' => array('id', 'name'),
				'useEmpty' => true,
				'emptyText' => '...выберите вид спорта...',
				'emptyValue' => '',
				'class' => 'form-control'
		));
		
		$league_kind_sport_id->setLabel("Вид спорта");
		$league_kind_sport_id->addValidator(new \Phalcon\Validation\Validator\PresenceOf(array('message' => 'поле Вид спорта не заполнено')));
		$this->add($league_kind_sport_id);
		
		$league_id = new \Phalcon\Forms\Element\Select('league_id', League::find(), array(
				'using' => array('id', 'name_league'),
				'useEmpty' => true,
				'emptyText' => '...выберите лигу...',
				'emptyValue' => '',
				'class' => 'form-control'
		));
		
		$league_id->setLabel("Лига");
		$league_id->addValidator(new \Phalcon\Validation\Validator\PresenceOf(array('message' => 'Поле Лига не заполнено')));
		$this->add($league_id);
		
		$name_team = new \Phalcon\Forms\Element\Text("name_team", array('class' => 'form-control'));
		$name_team->setLabel("Название команды");
		$name_team->addValidator( new \Phalcon\Validation\Validator\PresenceOf(array('message' => 'Поле Название команды не заполнено!')) );
		$this->add($name_team);
		
		$info = new \Phalcon\Forms\Element\Text("info", array('class' => 'form-control'));
		$info->setLabel("Информация о команде");
		$info->addValidator( new \Phalcon\Validation\Validator\PresenceOf(array('message' => 'Поле Информация о команде не заполнено!')) );
		$this->add($info);
	}	
}
