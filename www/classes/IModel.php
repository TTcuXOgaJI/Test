<?php

interface IModel
{
    public function findAll();

    public function findOneByPK();

    public function insert();

    public function deleteRow();

    public function updateRow();
}