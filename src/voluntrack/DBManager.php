<?php
namespace voluntrack;

/**
 * DBManager handles all of the database
 * connections and queries for voluntrack.
 */
class DBManager
{

    public function __construct($value='')
    {

    }

    public function connect_to_database($value='')
    {
        $servername = "localhost";
        $username = "voluntrack";
        $password = "voluntrack";
        $conn = null;

        try
        {
            $conn = new \PDO("mysql:host=$servername;dbname=voluntrack", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
            return $conn;
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
        finally {
            return $conn;
        }
    }

}


 ?>
