<?php


class Episodes extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $idepisodes;

    /**
     *
     * @var string
     */
    protected $name;

    /**
     *
     * @var string
     */
    protected $episode;

    /**
     *
     * @var string
     */
    protected $air_date;

    /**
     *
     * @var string
     */
    protected $sinopsis;

    /**
     * Method to set the value of field idepisodes
     *
     * @param integer $idepisodes
     * @return $this
     */
    public function setIdepisodes($idepisodes)
    {
        $this->idepisodes = $idepisodes;

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
     * Method to set the value of field episode
     *
     * @param string $episode
     * @return $this
     */
    public function setEpisode($episode)
    {
        $this->episode = $episode;

        return $this;
    }

    /**
     * Method to set the value of field air_date
     *
     * @param string $air_date
     * @return $this
     */
    public function setAirDate($air_date)
    {
        $this->air_date = $air_date;

        return $this;
    }

    /**
     * Method to set the value of field sinopsis
     *
     * @param string $sinopsis
     * @return $this
     */
    public function setSinopsis($sinopsis)
    {
        $this->sinopsis = $sinopsis;

        return $this;
    }

    /**
     * Returns the value of field idepisodes
     *
     * @return integer
     */
    public function getIdepisodes()
    {
        return $this->idepisodes;
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
     * Returns the value of field episode
     *
     * @return string
     */
    public function getEpisode()
    {
        return $this->episode;
    }

    /**
     * Returns the value of field air_date
     *
     * @return string
     */
    public function getAirDate()
    {
        return $this->air_date;
    }

    /**
     * Returns the value of field sinopsis
     *
     * @return string
     */
    public function getSinopsis()
    {
        return $this->sinopsis;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("heroku_c05e2ad9e71b489");
        $this->setSource("episodes");
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Episodes[]|Episodes|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Episodes|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
