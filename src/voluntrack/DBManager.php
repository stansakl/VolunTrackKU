<?php
namespace voluntrack;
//session_start();
require_once "htmlconstants.php";
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
            //$conn = new \PDO("mysql:host=$servername;dbname=ebdb", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";

        }
        catch(\PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
           // $_SESSION['error'] = "Connection failed";
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
                $conn = $this->get_connection();
                if($conn != null) {
                    $stmt = $conn->prepare("INSERT INTO USERS (NAME_FIRST, NAME_LAST, NAME_MIDDLE, USERNAME, PASSWORD )
                    VALUES (:firstname, :lastname, :middlename, :username, :password)");
                    $stmt->bindParam(':firstname', $first);
                    $stmt->bindParam(':lastname', $last);
                    $stmt->bindParam(':middlename', $middle);
                    $stmt->bindParam(':username', $username);
                    $stmt->bindParam(':password', $password);
                    $stmt->execute();
                }   else {
                    $_SESSION['error'] = "Unable to establish a database connection";
                    throw new \Exception("No connection!");
                }            
    
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
    public function add_time_for_user($username, $projectName, $start, $end){
        $retVal = "";

        $end = date("Y-m-d H:i:s", $end);
        $start = date("Y-m-d H:i:s", $start); //date ("Y-m-d H:i:s", $phptime);

        echo $start . "<br>";
        echo $end . "<br>";
        echo $username . "<br>";
        echo $projectName . "<br>";
        

        //return;

        try {
            $conn = $this->get_connection();
            $stmt = $conn->prepare("insert into USER_PROJECT (USER_ID, PROJECT_ID, PROJECT_START_DATE_TIME, PROJECT_END_DATE_TIME)
                                    SELECT USER_ID,
                                        Project_id,
                                        :start,
                                        :end       
                                    FROM USERS,
                                        PROJECT
                                    where username = :username
                                    and Project_Name = :project");
            $stmt->bindParam(':start', $start);
            $stmt->bindParam(':end', $end);
            $stmt->bindParam(':project', $projectName);
            $stmt->bindParam(':username', $username);
            $stmt->execute();

        } catch (\Exception $e) {
            //echo $start;
            
            echo $e->getMessage() . "<br>" . $e->getFile() . ": " . $e->getLine();
            throw new \Exception("Error entering time!", 1);
            

        }
    }

    /**
     * Reports time for a single user.
     */
    public function report_time_for_user($username, $start_date, $end_date){
        $retVal = "";
        $adoptionEventHours = 0;
        $clinicHours = 0;
        $fundRaisingHours = 0;
        $groundsMaintHours = 0;
        $officeWorkHours = 0;
        $socializationHours = 0;
        $totalHours = 0;
        
        
        try {
            $conn = $this->get_connection();
            $stmt = $conn->prepare(
                "select p.Project_Name,
                TIME_TO_SEC(TIMEDIFF(PROJECT_END_DATE_TIME, PROJECT_START_DATE_TIME))/3600 as hours
                from USER_PROJECT up
                left outer join USERS u on u.user_id = up.user_id
                left outer join PROJECT p on up.project_id = p.project_id
                where u.username = :username
                    and up.PROJECT_START_DATE_TIME >= :project_start
                    and up.PROJECT_END_DATE_TIME <= :project_end
                order by Project_Name"
            );
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':project_start', $start_date);
            $stmt->bindParam(':project_end', $end_date);
            $stmt->execute();
            
            
            while ($row = $stmt->fetch()) {
             
                switch($row['Project_Name']) {
                    case \ADOPTION_EVENT:
                        $adoptionEventHours += $row['hours'];
                        break;
                    case \CLINIC:
                        $clinicHours += $row['hours'];
                        break;
                    case \FUNDRAISING:
                        $fundRaisingHours += $row['hours'];
                        break;
                    case \GROUNDS:
                        $groundsMaintHours += $row['hours'];
                        break;
                    case \OFFICE:
                        $officeWorkHours += $row['hours'];
                        break;
                    case \SOCIALIZATION:
                        $socializationHours += $row['hours'];
                        break;
                    default:
                        break;
                }

                $retVal = "<tr><td>" .  \ADOPTION_EVENT . "</td><td>" . $adoptionEventHours .  "</td></tr>";
                $retVal = $retVal . "<tr><td>" .  \CLINIC . "</td><td>" . $clinicHours .  "</td></tr>";
                $retVal = $retVal . "<tr><td>" .  \FUNDRAISING . "</td><td>" . $fundRaisingHours .  "</td></tr>";
                $retVal = $retVal . "<tr><td>" .  \GROUNDS . "</td><td>" . $groundsMaintHours .  "</td></tr>";
                $retVal = $retVal . "<tr><td>" .  \OFFICE . "</td><td>" . $officeWorkHours .  "</td></tr>";
                $retVal = $retVal . "<tr><td>" .  \SOCIALIZATION . "</td><td>" . $socializationHours .  "</td></tr>";
            }
            
            $totalHours = $adoptionEventHours + $clinicHours + $fundRaisingHours + $groundsMaintHours + $officeWorkHours + $socializationHours;
            $retVal = $retVal . "<tr><td><strong>Total Hours</strong></td><td>" . $totalHours .  "</td></tr>";

        } catch (\Exception $e) {
            throw $e;
        }
                
        return $retVal;
    }

    /**
     * Reports time for a single user for a single project
     */
    public function report_time_for_user_by_project($username, $start_date, $end_date, $project_name){
        $retVal = "";
        $totalHours = 0;

        $project_name = trim($project_name);
                try {
                    $conn = $this->get_connection();
                    $stmt = $conn->prepare(
                        "select p.Project_Name,
                        TIME_TO_SEC(TIMEDIFF(PROJECT_END_DATE_TIME, PROJECT_START_DATE_TIME))/3600 as hours
                        from USER_PROJECT up
                        left outer join USERS u on u.user_id = up.user_id
                        left outer join PROJECT p on up.project_id = p.project_id
                        where u.username = :username
                          and p.Project_Name = :project_name
                          and up.PROJECT_START_DATE_TIME >= :project_start
                          and up.PROJECT_END_DATE_TIME <= :project_end
                        order by Project_Name"
                    );
                    $stmt->bindParam(':username', $username);
                    $stmt->bindParam(':project_start', $start_date);
                    $stmt->bindParam(':project_end', $end_date);
                    $stmt->bindParam(':project_name', $project_name);
                    $stmt->execute();
                    
                   
                    while ($row = $stmt->fetch()) {
                        $totalHours += $row['hours'];
                    }

                    $retVal = $retVal . "<tr><td>" . $project_name . "</td><td>" . $totalHours . "</td></tr>";        
                   
                } catch (\Exception $e) {
                    throw $e;
                }
                
            return $retVal;
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
                PROJECT_START_DATE_TIME,
                PROJECT_END_DATE_TIME,
                TIME_TO_SEC(TIMEDIFF(PROJECT_END_DATE_TIME, PROJECT_START_DATE_TIME))/3600 as hours
                from USER_PROJECT up
                left outer join USERS u on u.user_id = up.user_id
                left outer join PROJECT p on up.project_id = p.project_id
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
                    $row['PROJECT_START_DATE_TIME'] . "</td><td>" . 
                    $row['PROJECT_END_DATE_TIME'] . "</td><td>" .
                    $row['hours'] .
                    "</td></tr>";
                }
            return $retVal;
           

        } catch (\Exception $e) {
            throw $e;
        }
    }
}
