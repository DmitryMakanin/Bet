<?php

/**
 * Created by PhpStorm.
 * User: asd
 * Date: 23.03.2016
 * Time: 0:56
 */
class SeasonEditForm extends \Phalcon\Forms\Form {
    public function initialize( $entity = null, $options = array() ) {
        $name_season = new \Phalcon\Forms\Element\Text("name_season", array('class' => 'form-control'));
        $name_season->setLabel("Название сезона");
        $name_season->addValidator( new \Phalcon\Validation\Validator\PresenceOf(array('message' => 'Поле Название сезона не заполнено')) );
        $this->add($name_season);

        $sport_kind = new \Phalcon\Forms\Element\Select("league_sport_kind_id", SportKind::find(), array(
            'using' => array('id', 'name'),
            'useEmpty' => true,
            'emptyText' => '...выберите вид спорта...',
            'emptyValue' => '',
            'class' => 'form-control'
        ));
        $sport_kind->setLabel("Вид спорта");
        $sport_kind->addValidator(new \Phalcon\Validation\Validator\PresenceOf(array('message' => 'Поле Вид спорта не заполнено')));
        $this->add($sport_kind);

        $league = new \Phalcon\Forms\Element\Select("league_id", League::find(), array(
            'using' => array('id', 'name_league'),
            'useEmpty' => true,
            'emptyText' => '...выберите лигу...',
            'emptyValue' => '',
            'class' => 'form-control'
        ));
        $league->setLabel("Лига");
        $league->addValidator(new \Phalcon\Validation\Validator\PresenceOf(array('message' => 'Поле Лига не заполнено')));
        $this->add($league);
    }
}