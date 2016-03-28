<?php

class MatchEditForm extends \Phalcon\Forms\Form {
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

        $season_id = new \Phalcon\Forms\Element\Select('season_id', Season::find(), array(
            'using' => array('id', 'name_season'),
            'useEmpty' => true,
            'emptyText' => '...выберите сезон...',
            'emptyValue' => '',
            'class' => 'form-control'
        ));

        $season_id->setLabel("Сезон");
        $season_id->addValidator(new \Phalcon\Validation\Validator\PresenceOf(array('message' => 'Поле Сезон не заполнено')));
        $this->add($season_id);

        $home_team_id = new \Phalcon\Forms\Element\Select("home_team_id", Team::find(), array(
            'using' => array('id', 'name_team'),
            'useEmpty' => true,
            'emptyText' => '...выберите домашнюю команду...',
            'emptyValue' => '',
            'class' => 'form-control'
        ));
        $home_team_id->setLabel("Домашняя команда");
        $home_team_id->addValidator(new \Phalcon\Validation\Validator\PresenceOf(array('message' => 'Поле Домашняя команда не заполнено')));
        $this->add($home_team_id);

        $guest_team_id = new \Phalcon\Forms\Element\Select('guest_team_id', Team::find(), array(
            'using' => array('id', 'name_team'),
            'useEmpty' => true,
            'emptyText' => '...выберите гостевую команду...',
            'emptyValue' => '',
            'class' => 'form-control'
        ));
        $guest_team_id->setLabel("Гостевая команда");
        $guest_team_id->addValidator(new \Phalcon\Validation\Validator\PresenceOf(array('message' => 'Поле Гостевая команда не заполнено')));
        $this->add($guest_team_id);

        //TODO Regex

        $dt_start = new \Phalcon\Forms\Element\Text('dt_start', array(
            'class' => 'form-control'
        ));
        $dt_start->setLabel("Начало проведения в форме dd/mm/yyyy hh:mm:ss");
        $dt_start->addValidator(new \Phalcon\Validation\Validator\PresenceOf(array('message' => 'поле Начало проведения не заполнено!')));
        //$dt_start->addValidator(new \Phalcon\Validation\Validator\Regex(array('message' => 'Введите поле корректно', 'pattern' => "^(?=\d)(?:(?!(?:(?:0?[5-9]|1[0-4])(?:\.|-|\/)10(?:\.|-|\/)(?:1582))|(?:(?:0?[3-9]|1[0-3])(?:\.|-|\/)0?9(?:\.|-|\/)(?:1752)))(31(?!(?:\.|-|\/)(?:0?[2469]|11))|30(?!(?:\.|-|\/)0?2)|(?:29(?:(?!(?:\.|-|\/)0?2(?:\.|-|\/))|(?=\D0?2\D(?:(?!000[04]|(?:(?:1[^0-6]|[2468][^048]|[3579][^26])00))(?:(?:(?:\d\d)(?:[02468][048]|[13579][26])(?!\x20BC))|(?:00(?:42|3[0369]|2[147]|1[258]|09)\x20BC))))))|2[0-8]|1\d|0?[1-9])([-.\/])(1[012]|(?:0?[1-9]))\2((?=(?:00(?:4[0-5]|[0-3]?\d)\x20BC)|(?:\d{4}(?:$|(?=\x20\d)\x20)))\d{4}(?:\x20BC)?)(?:$|(?=\x20\d)\x20))?((?:(?:0?[1-9]|1[012])(?::[0-5]\d){0,2}(?:\x20[aApP][mM]))|(?:[01]\d|2[0-3])(?::[0-5]\d){1,2})?$")));
        $this->add($dt_start);

        $dt_end = new \Phalcon\Forms\Element\Text('dt_end', array(
            'class' => 'form-control'
        ));
        $dt_end->setLabel("Конец проведения");
        $dt_end->addValidator(new \Phalcon\Validation\Validator\PresenceOf(array('message' => 'поле Конец проведения не заполнено!')));
        //$dt_end->addValidator(new \Phalcon\Validation\Validator\Regex(array('message' => 'Заполните поле корректно', 'pattern' => '^(?=\d)(?:(?!(?:(?:0?[5-9]|1[0-4])(?:\.|-|\/)10(?:\.|-|\/)(?:1582))|(?:(?:0?[3-9]|1[0-3])(?:\.|-|\/)0?9(?:\.|-|\/)(?:1752)))(31(?!(?:\.|-|\/)(?:0?[2469]|11))|30(?!(?:\.|-|\/)0?2)|(?:29(?:(?!(?:\.|-|\/)0?2(?:\.|-|\/))|(?=\D0?2\D(?:(?!000[04]|(?:(?:1[^0-6]|[2468][^048]|[3579][^26])00))(?:(?:(?:\d\d)(?:[02468][048]|[13579][26])(?!\x20BC))|(?:00(?:42|3[0369]|2[147]|1[258]|09)\x20BC))))))|2[0-8]|1\d|0?[1-9])([-.\/])(1[012]|(?:0?[1-9]))\2((?=(?:00(?:4[0-5]|[0-3]?\d)\x20BC)|(?:\d{4}(?:$|(?=\x20\d)\x20)))\d{4}(?:\x20BC)?)(?:$|(?=\x20\d)\x20))?((?:(?:0?[1-9]|1[012])(?::[0-5]\d){0,2}(?:\x20[aApP][mM]))|(?:[01]\d|2[0-3])(?::[0-5]\d){1,2})?$')));
        $this->add($dt_end);

    }
}