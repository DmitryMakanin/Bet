<?php

/**
 * Created by PhpStorm.
 * User: Darya Busel
 * Date: 15.03.2016
 * Time: 11:15
 */
class League extends \Phalcon\Mvc\Model
{
    private $id;
    private $nameleague;
    private $sport_kind_id;
    private $country_id;

    public function getID() {
        return $this->id;
    }

    public function getNameLeague() {
        return $this->nameleague;
    }

    public function getSportKindID() {
        return $this->sport_kind_id;
    }

    public function getCountryID()
    {
        return $this->country_id;
    }

    public function setNameLeague($new_nameleague) {
        $filter = new \Phalcon\Filter();
        $this->nameleague = $filter->sanitize($new_nameleague, 'string');
    }

    public function setSportKindID($new_sport_kind_id) {
        $this->sport_kind_id = (int) $new_sport_kind_id;
    }

    public function setCountryID($country_id)
    {
        $this->country_id = (int) $country_id;
    }

    /*public function initialize(){
        $this->belongsTo("sport_kind_id", "SportKinds", "id");
        $this->hasOne("country_id", "Country", "id");
    }*/

    /*public function getSportKind(){
        $sportkind = SportKind::findFirst( (int)$this->sport_kind_id );
    }*/
}