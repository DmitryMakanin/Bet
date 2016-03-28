<?php

class ParamSports extends \Phalcon\Mvc\Model
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
    protected $kind_of_sport_id;

    /**
     *
     * @var integer
     */
    protected $parametrs_id;

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
     * Method to set the value of field kind_of_sport_id
     *
     * @param integer $kind_of_sport_id
     * @return $this
     */
    public function setKindOfSportId($kind_of_sport_id)
    {
        $this->kind_of_sport_id = $kind_of_sport_id;

        return $this;
    }

    /**
     * Method to set the value of field parametrs_id
     *
     * @param integer $parametrs_id
     * @return $this
     */
    public function setParametrsId($parametrs_id)
    {
        $this->parametrs_id = $parametrs_id;

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
     * Returns the value of field kind_of_sport_id
     *
     * @return integer
     */
    public function getKindOfSportId()
    {
        return $this->kind_of_sport_id;
    }

    /**
     * Returns the value of field parametrs_id
     *
     * @return integer
     */
    public function getParametrsId()
    {
        return $this->parametrs_id;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'MatchStat', 'param_sports_id', array('alias' => 'MatchStat'));
        $this->belongsTo('kind_of_sport_id', 'SportKind', 'id', array('alias' => 'SportKind'));
        $this->belongsTo('parametrs_id', 'Parametrs', 'id', array('alias' => 'Parametrs'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'param_sports';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ParamSports[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ParamSports
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
