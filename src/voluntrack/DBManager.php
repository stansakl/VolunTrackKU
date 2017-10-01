<?php
namespace voluntrack;
//session_start();
/**
 * DBManager handles all of the database
 * connections and queries for voluntrack.
 */
class DBManager
{
    private static $conn = null;
    private static $dbm = null;

    public function __construct($value='')
    {

    }

    public static function get_connection() {
        if(self::$conn === null) {
            self::$conn = self::connect_to_database();
        }

        return self::$conn;
    }

    public static function get_instance() {
        if(self::$dbm === null) {
            self::$dbm = new DBManager();
        }

        return self::$dbm;
    }


    private function connect_to_database($value='')
    {
        $servername = "localhost";
        $username = "voluntrack";
        $password = "voluntrack";


        try
        {
            $conn = new \PDO("mysql:host=$servername;dbname=voluntrack", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";

        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
        finally {
            return $conn;
        }
    }

    public function register_user($first, $last, $middle, $username, $password)
    {
        /*
        echo "$first<br>";
        echo "$last<br>";
        echo "$middle<br>";
        echo "$username<br>";
        echo "$password<br>";
        */
        $password = password_hash($password, PASSWORD_DEFAULT);

        try {
            $conn = self::get_connection();
            $stmt = $conn->prepare("INSERT INTO USERS (NAME_FIRST, NAME_LAST, NAME_MIDDLE, USERNAME, PASSWORD );
            VALUES (:firstname, :lastname, :middlename, :username, :password)");
            $stmt->bindParam(':firstname', $first);
            $stmt->bindParam(':lastname', $last);
            $stmt->bindParam(':middlename', $middle);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

        } catch (\Exception $e) {
            throw new \Exception("Error registering user. Username may not be unique!", 1);

        }
    }

    /**
     * Returns 1 if user is allowed to login, else 0;
     */
    public function attempt_login($user, $password)
    {

        $hash = password_hash($password, PASSWORD_DEFAULT);

        try {
            $conn = self::get_connection();
            $stmt = $conn->prepare("SELECT USERNAME, PASSWORD FROM USERS WHERE USERNAME = :username");
            $stmt->bindParam(':username', $user);
            $stmt->execute();

            $count = $stmt->rowCount();

            //If there is exactly 1 user that matches, verify password
            if ($count == 1) {
                while ($row = $stmt->fetch()) {

                    if (password_verify($password, $row['PASSWORD'])) {
                        return 1;
                    }
                    else {
                        return 0;
                    }
                }
            }

        } catch (\Exception $e) {
            throw $e;
        }
    }
}
