<?php
require dirname(__DIR__) . '/src/voluntrack\user.php';

use \voluntrack\User;

class VoluntrackTest extends PHPUnit_Framework_TestCase
{
    protected $dummyUser;

    protected function setUp()
    {
        $this->dummyUser = new \voluntrack\User('Example', 'User', 'test@example.com');
    }
    // Individual tests go here
    public function testUser($value='')
    {
        $this->assertEquals($this->dummyUser->first_name, 'Example');
        $this->assertEquals($this->dummyUser->last_name, 'User');
        $this->assertEquals($this->dummyUser->email, 'test@example.com');
    }
}
