<?php

/**
 * Description of DB_core Class controller for connections and requests to DB
 * @property STRING $host host name 
 * @property STRING $user username connecting
 * @property STRING $password user password
 * @property STRING $database DB name to connect
 * @property STRING $connection Connection established with DB in connect function
 * @copyright (c) 2016, Alexia C. Durá
 * @author AlexiaDura
 */
class DB_core {

    private $host, $user, $password, $database, $connection;

    function __construct($host, $user, $password, $database) {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
    }

    // function to connect to DB
    private function connect() {
        $this->connection = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        mysqli_query($this->connection, "SET NAMES 'utf8'");
    }

    // function to disconnect to DB
    private function disconnect() {
        mysqli_close($this->connection);
    }

    //function te execute insert,update or delete query
    function executeQuery($query) {
        $this->connect();
        $result = mysqli_query($this->connection, $query);
        $this->disconnect();

        //returns true or false
        return $result;
    }

    //function to execute select query
    function executeSelectQuery($query) {
        $this->connect();
        $result = mysqli_query($this->connection, $query);
        $rows = mysqli_num_rows($result);
        $resultArray = array();
        for ($i = 0; $i < $rows; $i++) {
            $resultArray [] = mysqli_fetch_assoc($result);
        }
        $this->disconnect();

        //returns Multidimensional Array
        return $resultArray;
    }

}
