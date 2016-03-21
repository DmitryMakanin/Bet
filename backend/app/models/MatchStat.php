<?php

class MatchStat extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id;

    /**
     *
     * @var integer
     */
    protected $match_id;

    /**
     *
     * @var integer
     */
    protected $match_league_id;

    /**
     *
     * @var integer
     */
    protected $match_league_kind_sport_id;

    /**
     *
     * @var double
     */
    protected $value;

    /**
     *
     * @var integer
     */
    protected $param_sports_id;

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
     * Method to set the value of field match_id
     *
     * @param integer $match_id
     * @return $this
     */
    public function setMatchId($match_id)
    {
        $this->match_id = $match_id;

        return $this;
    }

    /**
     * Method to set the value of field match_league_id
     *
     * @param integer $match_league_id
     * @return $this
     */
    public function setMatchLeagueId($match_league_id)
    {
        $this->match_league_id = $match_league_id;

        return $this;
    }

    /**
     * Method to set the value of field match_league_kind_sport_id
     *
     * @param integer $match_league_kind_sport_id
     * @return $this
     */
    public function setMatchLeagueKindSportId($match_league_kind_sport_id)
    {
        $this->match_league_kind_sport_id = $match_league_kind_sport_id;

        return $this;
    }

    /**
     * Method to set the value of field value
     *
     * @param double $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Method to set the value of field param_sports_id
     *
     * @param integer $param_sports_id
     * @return $this
     */
    public function setParamSportsId($param_sports_id)
    {
        $this->param_sports_id = $param_sports_id;

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
     * Returns the value of field match_id
     *
     * @return integer
     */
    public function getMatchId()
    {
        return $this->match_id;
    }

    /**
     * Returns the value of field match_league_id
     *
     * @return integer
     */
    public function getMatchLeagueId()
    {
        return $this->match_league_id;
    }

    /**
     * Returns the value of field match_league_kind_sport_id
     *
     * @return integer
     */
    public function getMatchLeagueKindSportId()
    {
        return $this->match_league_kind_sport_id;
    }

    /**
     * Returns the value of field value
     *
     * @return double
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Returns the value of field param_sports_id
     *
     * @return integer
     */
    public function getParamSportsId()
    {
        return $this->param_sports_id;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('match_id', 'Match', 'id', array('alias' => 'Match'));
        $this->belongsTo('match_league_id', 'League', 'id', array('alias' => 'League'));
        $this->belongsTo('match_league_kind_sport_id', 'SportKind', 'id', array('alias' => 'SportKind'));
        $this->belongsTo('param_sports_id', 'ParamSports', 'id', array('alias' => 'ParamSports'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'match_stat';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return MatchStat[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return MatchStat
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
