<?php

namespace controllers;

use database\Database;
use PDO;

class AuthorController
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


    public function show($data)
    {
        $result = $this->db->query('select * from authors where id = :id', ['id' => $data['id']])->findOrFail();

        require 'views/author.show.view.php';
    }
}
