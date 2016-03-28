<?php

class SportKind extends \Phalcon\Mvc\Model
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
    protected $name;

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
     * Method to set the value of field name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

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
     * Returns the value of field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'League', 'sport_kind_id', array('alias' => 'League'));
        $this->hasMany('id', 'Match', 'league_kind_sport_id', array('alias' => 'Match'));
        $this->hasMany('id', 'MatchStat', 'match_league_kind_sport_id', array('alias' => 'MatchStat'));
        $this->hasMany('id', 'ParamSports', 'kind_of_sport_id', array('alias' => 'ParamSports'));
        $this->hasMany('id', 'Season', 'league_sport_kind_id', array('alias' => 'Season'));
        $this->hasMany('id', 'Team', 'league_kind_sport_id', array('alias' => 'Team'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'sport_kind';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return SportKind[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return SportKind
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
