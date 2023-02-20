<?php

require_once 'base/BaseModel.php';

class Category extends BaseModel
{
    public $name;
    public $active;

    protected function getTableName()
    {
        return "categories";
    }

    public function getAllActive()
    {
        return $this->pm->run("SELECT * FROM categories where active = 1");
    }

    protected function addNewRec()
    {
    }

    protected function updateRec()
    {
    }
}
