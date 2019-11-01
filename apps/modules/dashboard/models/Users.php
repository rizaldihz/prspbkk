<?php

namespace Phalcon\Init\Dashboard\Models;

use Phalcon\Mvc\Model;
use Phalcon\Init\Dashboard\Models\Logs;

class Users extends Model
{
	public function initialize()
    {
        $this->setSource('users');
    }
    
    public $id;
    public $username;
    public $email;
    public $pass;

    public function gen_uuid() {
        return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            // 32 bits for "time_low"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
    
            // 16 bits for "time_mid"
            mt_rand( 0, 0xffff ),
    
            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand( 0, 0x0fff ) | 0x4000,
    
            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand( 0, 0x3fff ) | 0x8000,
    
            // 48 bits for "node"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
        );
    }

    public function beforeCreate()
    {
        $this->id = $this->gen_uuid();
    }

    public function afterCreate()
    {
        $log = new Logs();
        $log->activity = 'Create User';
        $log->timestamp = date('Y-m-d H:i:s');
        $log->save();
    }

}