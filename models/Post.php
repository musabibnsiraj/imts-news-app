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


    public function getByCatId($catId)
    {
        $param = array(':cat_id' => $catId);
        return $this->pm->run("SELECT * FROM posts WHERE cat_id = :cat_id", $param);
    }

    protected function addNewRec()
    {
    }

    protected function updateRec()
    {
    }
}
