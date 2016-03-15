<?php

/**
 * Created by PhpStorm.
 * User: Darya Busel
 * Date: 15.03.2016
 * Time: 12:04
 */
class LeagueEditForm extends \Phalcon\Forms\Form {
    public function initialize( $entity = null, $options = array() ) {
        $name_league = new \Phalcon\Forms\Element\Text("nameleague", array('class' => 'form-control'));
        $name_league->setLabel("Название лиги");
        $name_league->addValidator( new \Phalcon\Validation\Validator\PresenceOf(array('message' => 'Поле Название лиги не заполнено')) );
        $this->add($name_league);

        $sport_kind = new \Phalcon\Forms\Element\Select("sport_kind_id", SportKind::find(), array(
            'using' => array('id', 'name'),
            'useEmpty' => true,
            'emptyText' => '...выберите вид спорта...',
            'emptyValue' => '',
            'class' => 'form-control'
        ));
        $sport_kind->setLabel("Вид спорта");
        $sport_kind->addValidator(new \Phalcon\Validation\Validator\PresenceOf(array('message' => 'Поле Вид спорта не заполнено')));
        $this->add($sport_kind);

        $country = new \Phalcon\Forms\Element\Select("country", Country::find(), array(
            'using' => array('id', 'countryname'),
            'useEmpty' => true,
            'emptyText' => '...выберите страну...',
            'emptyValue' => '',
            'class' => 'form-control'
        ));
        $country->setLabel("Страна");
        $country->addValidator(new \Phalcon\Validation\Validator\PresenceOf(array('message' => 'Поле Страна не заполнено')));
        $this->add($country);
    }
}