<?php
require dirname(__DIR__) . '/src/voluntrack\user.php';

use \voluntrack\User;

class VoluntrackTest extends PHPUnit_Framework_TestCase
{
    // Individual tests go here
    public function testUser($value='')
    {
        $dummyUser = new \voluntrack\User('Example', 'User', 'test@example.com');
        $this->assertEquals($dummyUser->first_name, 'Example');
        $this->assertEquals($dummyUser->last_name, 'User');
        $this->assertEquals($dummyUser->email, 'test@example.com');
    }
}
