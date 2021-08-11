<?php
class DB
{
    public static $conn;

    function __construct() {
       self::$conn = $GLOBALS['conn'];
    }

    public static function connect()
    {
        $servername = "localhost";
        $database = "mydb";
        $username = "root";
        $password = "";
        self::$conn = new mysqli($servername, $username, $password, $database);
        return (self::$conn);
    }

    public static function isConnected()
    {
        if (self::$conn->connect_error) {
            return("");
        } else {
            return("1");
        }
    }

    public static function close()
    {
        self::$conn->close();
    }
}
?>
