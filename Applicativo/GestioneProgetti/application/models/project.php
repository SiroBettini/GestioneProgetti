<?php

class Project
{
    private $id;
    private $title;
    private $desc;
    private $start;
    private $contributorId;
    private $state;

    /**
     * @param $id
     * @param $title
     * @param $desc
     * @param $start
     * @param $contributorId
     * @param $state
     */
    public function __construct($id, $title, $desc, $start, $contributorId,$state)
    {
        $this->id = $id;
        $this->title = $title;
        $this->desc = $desc;
        $this->start = $start;
        $this->contributorId = $contributorId;
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * @return string
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @return mixed
     */
    public function getContributorId()
    {
        return $this->contributorId;
    }
}