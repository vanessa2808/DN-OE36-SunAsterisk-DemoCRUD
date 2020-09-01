<?php

namespace config;

class ConnectDB
{
    private $server = 'localhost';
    private $username = 'root';
    private $password = 'root';
    private $database = 'helloWorld1';

    protected function connect()
    {
        $connect = mysqli_connect($this->server, $this->username, $this->password, $this->database);
        mysqli_set_charset($connect, "utf8mb4");
        if ($connect === true) {
            echo "connection fail" . mysqli_connect_error();
        } else {
            return $connect;
        }
    }
}


