<?php

require_once 'base/BaseModel.php';

class Post extends BaseModel
{
    public $title;
    public $summary;
    public $body;
    public $breaking_news;
    public $user_id;
    public $cat_id;
    public $image;
    public $status;
    public $selected;

    protected function getTableName()
    {
        return "posts";
    }
    public function getAll()
    {
        return $this->pm->run("SELECT * FROM " . $this->getTableName() . " order by id desc");
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
        $param = array(':title' => $this->title, ':summary' => $this->summary, ':body,' => $this->body, ':breaking_news' => $this->breaking_news, ':user_id' => $this->user_id, ':cat_id' => $this->cat_id, ':image' => $this->image, ':status' => $this->status, ':selected' => $this->selected);
        print_r($param);
        die;

        return $this->pm->run("INSERT INTO posts(title,summary,body,breaking_news,user_id,cat_id,image,status,selected) values(:title,:summary,:body,:breaking_news,:user_id,:cat_id,:image,:status,:selected)", $param);
    }

    protected function updateRec()
    {
    }
}
