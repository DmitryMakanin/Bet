<<<<<<< HEAD
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
=======
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
>>>>>>> upstream/master
