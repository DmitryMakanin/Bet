/<?php

class Match extends \Phalcon\Mvc\Model
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
    protected $home_team_id;

    /**
     *
     * @var integer
     */
    protected $guest_team_id;

    /**
     *
     * @var integer
     */
    protected $season_id;

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
     *
     * @var string
     */
    protected $dt_start;

    /**
     *
     * @var string
     */
    protected $dt_end;

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
     * Method to set the value of field home_team_id
     *
     * @param integer $home_team_id
     * @return $this
     */
    public function setHomeTeamId($home_team_id)
    {
        $this->home_team_id = $home_team_id;

        return $this;
    }

    /**
     * Method to set the value of field guest_team_id
     *
     * @param integer $guest_team_id
     * @return $this
     */
    public function setGuestTeamId($guest_team_id)
    {
        $this->guest_team_id = $guest_team_id;

        return $this;
    }

    /**
     * Method to set the value of field season_id
     *
     * @param integer $season_id
     * @return $this
     */
    public function setSeasonId($season_id)
    {
        $this->season_id = $season_id;

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
     * Method to set the value of field dt_start
     *
     * @param string $dt_start
     * @return $this
     */
    public function setDtStart($dt_start)
    {
        $this->dt_start = $dt_start;

        return $this;
    }

    /**
     * Method to set the value of field dt_end
     *
     * @param string $dt_end
     * @return $this
     */
    public function setDtEnd($dt_end)
    {
        $this->dt_end = $dt_end;

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
     * Returns the value of field home_team_id
     *
     * @return integer
     */
    public function getHomeTeamId()
    {
        return $this->home_team_id;
    }

    /**
     * Returns the value of field guest_team_id
     *
     * @return integer
     */
    public function getGuestTeamId()
    {
        return $this->guest_team_id;
    }

    /**
     * Returns the value of field season_id
     *
     * @return integer
     */
    public function getSeasonId()
    {
        return $this->season_id;
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
     * Returns the value of field dt_start
     *
     * @return string
     */
    public function getDtStart()
    {
        return $this->dt_start;
    }

    /**
     * Returns the value of field dt_end
     *
     * @return string
     */
    public function getDtEnd()
    {
        return $this->dt_end;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'MatchStat', 'match_id', array('alias' => 'MatchStat'));
        $this->belongsTo('home_team_id', 'Team', 'id', array('alias' => 'Team'));
        $this->belongsTo('guest_team_id', 'Team', 'id', array('alias' => 'Team'));
        $this->belongsTo('season_id', 'Season', 'id', array('alias' => 'Season'));
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
        return 'match';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Match[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Match
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
