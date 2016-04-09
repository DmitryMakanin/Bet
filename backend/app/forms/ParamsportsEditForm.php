<?php

class ParamsportsEditForm extends \Phalcon\Forms\Form {
	public function initialize( $entity = null, $options = array() ) {
		$temp_arr = array(
				'1' => '2',
				'3' => '4',
				'5' => '6'
		);
		
		$parameter = new \Phalcon\Forms\Element\Select('param', Parametrs::find(), array(
			'using' => array('id', 'name_param'),
			'useEmpty' => true,
			'emptyText' => '...выберите параметр...',
			'emptyValue' => '',
			'class' => 'form-control'
		));
		$parameter->setLabel('Параметр');
		$parameter->addValidator( new \Phalcon\Validation\Validator\PresenceOf( array('message' => 'Поле Параметр необходимо для заполнения!') ) );
		$this->add($parameter);
		
		$kind =  new \Phalcon\Forms\Element\Select('kind', SportKind::find(), array(
			'using' => array('id', 'name'),
			'useEmpty' => true,
			'emptyText' => '...выберите вид спорта...',
			'emptyValue' => '',
			'class' => 'form-control'
		));
		$kind->setLabel('Вид спорта');
		$kind->addValidator( new \Phalcon\Validation\Validator\PresenceOf( array('message' => 'Поле Вид спорта необходимо для заполнения!') ) );
		$this->add($kind); 
		
		$del = new \Phalcon\Forms\Element\Check('del');
		$del->setLabel('Удалён?');
		$this->add($del);
	}
}