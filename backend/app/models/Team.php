<?php

class Team extends \Phalcon\Mvc\Model
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
    protected $name_team;

    /**
     *
     * @var string
     */
    protected $info;

    /**
     *
     * @var integer
     */
    protected $league_id;

    /**
     *
     * @var integer
     */
    protected $league_kind_sport_id;

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
     * Method to set the value of field name_team
     *
     * @param string $name_team
     * @return $this
     */
    public function setNameTeam($name_team)
    {
        $this->name_team = $name_team;

        return $this;
    }

    /**
     * Method to set the value of field info
     *
     * @param string $info
     * @return $this
     */
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * Method to set the value of field league_id
     *
     * @param integer $league_id
     * @return $this
     */
    public function setLeagueId($league_id)
    {
        $this->league_id = $league_id;

        return $this;
    }

    /**
     * Method to set the value of field league_kind_sport_id
     *
     * @param integer $league_kind_sport_id
     * @return $this
     */
    public function setLeagueKindSportId($league_kind_sport_id)
    {
        $this->league_kind_sport_id = $league_kind_sport_id;

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
     * Returns the value of field name_team
     *
     * @return string
     */
    public function getNameTeam()
    {
        return $this->name_team;
    }

    /**
     * Returns the value of field info
     *
     * @return string
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Returns the value of field league_id
     *
     * @return integer
     */
    public function getLeagueId()
    {
        return $this->league_id;
    }

    /**
     * Returns the value of field league_kind_sport_id
     *
     * @return integer
     */
    public function getLeagueKindSportId()
    {
        return $this->league_kind_sport_id;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'Match', 'home_team_id', array('alias' => 'Match'));
        $this->hasMany('id', 'Match', 'guest_team_id', array('alias' => 'Match'));
        $this->belongsTo('league_id', 'League', 'id', array('alias' => 'League'));
        $this->belongsTo('league_kind_sport_id', 'SportKind', 'id', array('alias' => 'SportKind'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'team';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Team[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Team
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
