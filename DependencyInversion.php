<?php

interface MysqlInterface
{
    public function getData();
}

class Mysql implements MysqlInterface
{
    public function getData()
    {
        return 'some data from database';
    }
}

class Controller
{
    private $adapter;

    public function __construct(MysqlInterface $mysql)
    {
        $this->adapter = $mysql;
    }

    function getData()
    {
        $this->adapter->getData();
    }
}