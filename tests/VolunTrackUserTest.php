<?php
require dirname(__DIR__) . '/src/voluntrack/user.php';

use \voluntrack\User;

class VoluntrackUserTest extends PHPUnit_Framework_TestCase
{
    protected $dummyUser;

    protected function setUp()
    {
        $this->dummyUser = new \voluntrack\User('Example', '','User', 'test@example.com');
    }
    // Individual tests go here
    public function testUser($value='')
    {
        $this->assertEquals($this->dummyUser->first_name, 'Example');
        $this->assertEquals($this->dummyUser->last_name, 'User');
        $this->assertEquals($this->dummyUser->email, 'test@example.com');
    }

    public function testUserFirstName()
    {
        $this->dummyUser->setFirstName("John");
        $this->assertEquals($this->dummyUser->getFirstName(), "John");
    }

    public function testUserLastName()
    {
        $this->dummyUser->setLastName("Doe");
        $this->assertEquals($this->dummyUser->getLastName(), "Doe");
    }

    public function testMiddleLastName()
    {
        $this->dummyUser->setMiddleName("Quincy");
        $this->assertEquals($this->dummyUser->getMiddleName(), "Quincy");
    }
/*
    public function testDBConnection($value='')
    {
        $servername = "localhost";
        $username = "voluntrack";
        $password = "voluntrack";

        try
        {
            $conn = new PDO("mysql:host=$servername;dbname=voluntrack", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }

    }
    */
}
