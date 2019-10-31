<?php

namespace Phalcon\Init\Dashboard\Models;

use Phalcon\Mvc\Model;

class Users extends Model
{
	public function initialize()
    {
        $this->setSource('users');
    }

    public $id;
    public $name;
    public $pass;


    // public function setName($name)
    // {
    //     // The name is too short?
    //     if (strlen($name) < 10) {
    //         throw new InvalidArgumentException(
    //             'The name is too short'
    //         );
    //     }

    //     $this->name = $name;
    // }

    // public function setId($name)
    // {
    //     // The name is too short?
    //     if (strlen($name) < 10) {
    //         throw new InvalidArgumentException(
    //             'The name is too short'
    //         );
    //     }

    //     $this->name = $name;
    // }

    // public function getName()
    // {
    //     return $this->name;
    // }

    // public function setPw($pass)
    // {
    //     // Negative prices aren't allowed
    //     if ($pass < 0) {
    //         throw new InvalidArgumentException(
    //             "Price can't be negative"
    //         );
    //     }

    //     $this->pass = $pass;
    // }

    // public function getPass()
    // {
    //     // Convert the value to double before be used
    //     return $this->pass;
    // }
}