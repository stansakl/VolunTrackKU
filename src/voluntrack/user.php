<?php
namespace voluntrack;

/**
* The User class holds details of the user.
*/
class User
{
    public $last_name = '';
    public $first_name = '';
    public $email = '';

    function __construct($first, $last, $email) {
        $this->first_name = $first;
        $this->last_name = $last;
        $this->email = $email;
    }
}
