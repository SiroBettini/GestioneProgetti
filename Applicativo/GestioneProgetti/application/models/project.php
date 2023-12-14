<?php

class Project
{
    private $id;
    private $title;
    private $desc;
    private $start;
    private $contributorId;

    /**
     * @param $id
     * @param $title
     * @param $desc
     * @param $start
     * @param $contributorId
     */
    public function __construct($id, $title, $desc, $start, $contributorId)
    {
        $this->id = $id;
        $this->title = $title;
        $this->desc = $desc;
        $this->start = $start;
        $this->contributorId = $contributorId;
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