<?php

class League extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id;

    /**
     *
     * @var string
     */
    protected $name_league;

    /**
     *
     * @var integer
     */
    protected $sport_kind_id;

    /**
     *
     * @var integer
     */
    protected $country_id;

    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field name_league
     *
     * @param string $name_league
     * @return $this
     */
    public function setNameLeague($name_league)
    {
        $this->name_league = $name_league;

        return $this;
    }

    /**
     * Method to set the value of field sport_kind_id
     *
     * @param integer $sport_kind_id
     * @return $this
     */
    public function setSportKindId($sport_kind_id)
    {
        $this->sport_kind_id = $sport_kind_id;

        return $this;
    }

    /**
     * Method to set the value of field country_id
     *
     * @param integer $country_id
     * @return $this
     */
    public function setCountryId($country_id)
    {
        $this->country_id = $country_id;

        return $this;
    }

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field name_league
     *
     * @return string
     */
    public function getNameLeague()
    {
        return $this->name_league;
    }

    /**
     * Returns the value of field sport_kind_id
     *
     * @return integer
     */
    public function getSportKindId()
    {
        return $this->sport_kind_id;
    }

    /**
     * Returns the value of field country_id
     *
     * @return integer
     */
    public function getCountryId()
    {
        return $this->country_id;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'Match', 'league_id', array('alias' => 'Match'));
        $this->hasMany('id', 'MatchStat', 'match_league_id', array('alias' => 'MatchStat'));
        $this->hasMany('id', 'Season', 'league_id', array('alias' => 'Season'));
        $this->hasMany('id', 'Team', 'league_id', array('alias' => 'Team'));
        $this->belongsTo('sport_kind_id', 'SportKind', 'id', array('alias' => 'SportKind'));
        $this->belongsTo('country_id', 'Country', 'id', array('alias' => 'Country'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'league';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return League[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return League
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}