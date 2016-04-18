<?php

class ParamsportsEditForm extends Phalcon\Forms\Form{
    public function initialize ($entity = null, $options = array()) {
        $params_arr = array();
        $all_params = Parametrs::find();
        foreach ( $all_params as $curr_param ) {
            $params_arr[] = array( $curr_param->getId() => $curr_param->getNameParam() . ' [' . $curr_param->getId() . ']' );
        }

        $param_id = new Phalcon\Forms\Element\Select('param_id', $params_arr, array(
            //'using' => array( 'name_param' ),
            'useEmpty' => true,
            'emptyText' => '...выберите параметр...',
            'emptyValue' => '',
            'class' => 'form-control'
        ));
        $param_id->setLabel('Параметр');
        $param_id->addValidator( new \Phalcon\Validation\Validator\PresenceOf( array(
            'message' => 'Заполните поле Параметр'
        )) );
        $this->add($param_id);

        $sports_arr = array();
        $all_sports = SportKind::find();
        foreach ( $all_sports as $curr_sport ) {
            $sports_arr[] = array( $curr_sport->getId() => $curr_sport->getName() . ' [' . $curr_sport->getId() . ']' );
        }

        $sport_id = new Phalcon\Forms\Element\Select('sport_id', $sports_arr, array(
            'useEmpty' => true,
            'emptyText' => '...выберите параметр...',
            'emptyValue' => '',
            'class' => 'form-control'
        ));
        $sport_id->setLabel('Вид спорта');
        $sport_id->addValidator( new \Phalcon\Validation\Validator\PresenceOf( array(
            'message' => 'Заполните поле Вид спорта'
        )) );
        $this->add($sport_id);
    }
}
