<?php

class Season extends \Phalcon\Mvc\Model
{
    const DELETED = 'D';

    /**
     * @var string
     */
    private $status;

    /**
     *
     * @var integer
     */
    protected $id;

    /**
     *
     * @var string
     */
    protected $name_season;

    /**
     *
     * @var integer
     */
    protected $league_id;

    /**
     *
     * @var integer
     */
    protected $league_sport_kind_id;

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

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
     * Method to set the value of field name_season
     *
     * @param string $name_season
     * @return $this
     */
    public function setNameSeason($name_season)
    {
        $this->name_season = $name_season;

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
     * Method to set the value of field league_sport_kind_id
     *
     * @param integer $league_sport_kind_id
     * @return $this
     */
    public function setLeagueSportKindId($league_sport_kind_id)
    {
        $this->league_sport_kind_id = $league_sport_kind_id;

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
     * Returns the value of field name_season
     *
     * @return string
     */
    public function getNameSeason()
    {
        return $this->name_season;
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
     * Returns the value of field league_sport_kind_id
     *
     * @return integer
     */
    public function getLeagueSportKindId()
    {
        return $this->league_sport_kind_id;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'Match', 'season_id', array('alias' => 'Match'));
        $this->belongsTo('league_id', 'League', 'id', array('alias' => 'League'));
        $this->belongsTo('league_sport_kind_id', 'SportKind', 'id', array('alias' => 'SportKind'));
        $this->addBehavior(
            new SoftDelete(
                array(
                    'field' => 'status',
                    'value' => Season::DELETED
                )
            )
        );
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'season';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Season[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Season
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public function getSport()
    {
        $query = $this->getModelsManager()->createQuery("SELECT name FROM SportKind WHERE id = :league_sport_kind_id:");
        $sport = $query->execute(
            array(
                'league_sport_kind_id' => $this->league_sport_kind_id
            )
        );
        return $sport->getFirst()->readAttribute('name');
    }

    public function getLeague()
    {
        $query = $this->getModelsManager()->createQuery("SELECT name_league FROM League WHERE id = :league_id:");
        $league = $query->execute(
            array(
                'league_id' => $this->league_id
            )
        );
        return $league->getFirst()->readAttribute('name_league');
    }
}
