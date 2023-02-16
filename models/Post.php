<?php

require_once 'base/BaseModel.php';

class Post extends BaseModel
{
    public $title;
    public $summary;

    protected function getTableName()
    {
        return "posts";
    }

    public function getLatest()
    {
        return $this->pm->run("SELECT * FROM posts order by id desc limit 4");
    }

    protected function addNewRec()
    {
    }

    protected function updateRec()
    {
    }
}
