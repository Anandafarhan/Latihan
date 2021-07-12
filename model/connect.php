<?php

class Database
{

    protected $host = 'localhost';
    protected $user = 'root';
    protected $pass = 'root';
    protected $dbnm = 'latihandb';

    public $con;

    function __construct()
    {
        $this->con = new mysqli($this->host, $this->user, $this->pass, $this->dbnm);
    }
}
