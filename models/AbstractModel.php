<?php

require_once __DIR__ . '/../src/Core/Database.php';



class AbstractModel
{
    protected Database $db;

    function __construct()
    {
        $this->db = new Database();
    }
}
