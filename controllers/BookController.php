<?php

namespace controllers;

use database\Database;

class BookController
{
    public $db;

    public function __construct()
    {
        $config = require 'config.php';

        $this->db = new Database($config);
    }


    public function index()
    {
        $data = $this->db->query('select * from books')->get();

        require 'views/home.view.php';
    }


    public function about($data)
    {
        $data = $data;

        require 'views/about.view.php';
    }


    public function contact($data)
    {
        $data = $data;

        require 'views/contact.view.php';
    }
}
