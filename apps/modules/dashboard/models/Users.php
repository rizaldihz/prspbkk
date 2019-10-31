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
}