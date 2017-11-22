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
        //$servername = "aa10nntj8dofc1n.cixyo4eg79dc.us-east-2.rds.amazonaws.com";
        $username = "voluntrack";
        $password = "voluntrack";
        $conn = null;


        try
        {
            $conn = new \PDO("mysql:host=$servername;dbname=voluntrack", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";

        }
        catch(\PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
        finally {
            return $conn;
        }
    }

    /**
     * Adds the user to the USERS table in the database.
     * Duplicates are handled at the database level. The username MUST
     * be unique.
     */
    public function register_user($first, $last, $middle, $username, $password)
    {
        
        $password = password_hash($password, PASSWORD_DEFAULT);

        try {
            $conn = self::get_connection();
            $stmt = $conn->prepare("INSERT INTO USERS (NAME_FIRST, NAME_LAST, NAME_MIDDLE, USERNAME, PASSWORD )
            VALUES (:firstname, :lastname, :middlename, :username, :password)");
            $stmt->bindParam(':firstname', $first);
            $stmt->bindParam(':lastname', $last);
            $stmt->bindParam(':middlename', $middle);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

        } catch (\Exception $e) {
            throw new \Exception("Error registering user!", 1);

        }
    }

    /**
     * Returns tghe user id if the user is allowed to login, else 0;
     */
    public function attempt_login($user, $password)
    {

        $hash = password_hash($password, PASSWORD_DEFAULT);

        try {
            $conn = $this->get_connection();
            $stmt = $conn->prepare("SELECT USERNAME, USER_ID, PASSWORD, IS_ADMIN FROM USERS WHERE USERNAME = :username");
            $stmt->bindParam(':username', $user);
            $stmt->execute();

            $count = $stmt->rowCount();

            //If there is exactly 1 user that matches, verify password
            if ($count == 1) {
                while ($row = $stmt->fetch()) {

                    if (password_verify($password, $row['PASSWORD'])) {
                        //it's a valid user, set the is_admin flag and return the user ID
                        $_SESSION['is_admin'] = $row['IS_ADMIN'];
                        return $row['USER_ID'];
                    }
                    else {
                        return 0;
                    }
                }
            }
            else {
                return 0;
            }

        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * Adds a time entry for a single user
     */
    public function add_time_for_user($user_id, $project, $start, $end){

    }

    /**
     * Reports time for a single user.
     */
    public function report_time_for_user($user_id, $start, $end){
        
    }

    /**
     * Reports time for a single user for all projects across a date range.
     */
    public function report_time_for_user_by_project($user_id, $start, $end, $project_name){
        
    }

    /**
     * Reports time for all users across all projects
     */
    public function report_time_for_all_users () {
        $retVal = "";

        try {
            $conn = $this->get_connection();
            $stmt = $conn->prepare(
                "select u.user_id,
                u.NAME_FIRST,
                u.NAME_MIDDLE,
                u.NAME_LAST,
                up.project_id,
                p.Project_Name,
                TIME_TO_SEC(TIMEDIFF(PROJECT_END_DATE_TIME, PROJECT_START_DATE_TIME))/3600 as hours
                from user_project up
                left outer join users u on u.user_id = up.user_id
                left outer join project p on up.project_id = p.project_id
                order by Project_Name"
            );

            $stmt->execute();

            $count = $stmt->rowCount();

                while ($row = $stmt->fetch()) {
                    $retVal = $retVal . "<tr><td>" . 
                    $row['NAME_FIRST'] . "</td><td>" . 
                    $row['NAME_MIDDLE'] . "</td><td>" .
                    $row['NAME_LAST'] . "</td><td>" . 
                    $row['Project_Name'] . "</td><td>" .
                    $row['hours'] .
                    "</td></tr>";
                }
            return $retVal;
           

        } catch (\Exception $e) {
            throw $e;
        }
    }
}
