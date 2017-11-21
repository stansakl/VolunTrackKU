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

    /**
     * @param string $first
     * @param string $middle
     * @param string $last_name
     * @param string $email
     */
    function __construct($first, $middle, $last, $email) {
        $this->first_name = $first;
        $this->midde_name = $middle;
        $this->last_name = $last;
        $this->email = $email;
    }

    function getFirstName()
    {
        return $this->first_name;
    }

    function setFirstName($first)
    {
        $this->first_name = $first;
    }

    function getLastName()
    {
        return $this->last_name;
    }

    function setLastName($last)
    {
        $this->last_name = $last;
    }

    function getMiddleName()
    {
        return $this->midde_name;
    }

    function setMiddleName($middle)
    {
        $this->midde_name = $middle;
    }

    function __destruct()
    {

    }
}
