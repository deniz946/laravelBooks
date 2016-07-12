<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission_Role extends Model
{
    protected $table = 'permission_role';

    public function role() 
    { 
    	return $this->belongsTo('App\Role'); 
    }

    public function permission() 
    {
    	return $this->belongsTo('App\Permission'); 
 	}
}

