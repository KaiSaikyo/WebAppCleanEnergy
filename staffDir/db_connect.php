<?php

class DB_CONNECT {
    var $myconn;

    function connect() {
        define('DB_USER', "root");
        define('DB_PASSWORD', "");
        define('DB_DATABASE', "mydatabase");
        define('DB_SERVER', "localhost");

        $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE) or die(mysqli_error($con));
        $this->myconn = $con;
        return $this->myconn;
    }

    function close($myconn) {
        mysqli_close($myconn);
    }
}
?>