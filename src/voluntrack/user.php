<?php
/*
The MIT License (MIT)

Copyright (c) 2017 CodeHawk810

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
*/
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
