<?php

namespace Phalcon\Init\Dashboard\Models;

use Phalcon\Mvc\Model;
use Phalcon\Events\Manager as EventsManager;

class Logs extends Model
{
	public function initialize()
    {
        $this->setSource('logs');
    }
    
    public $id;
    public $activity;
    public $timestamp;

}  