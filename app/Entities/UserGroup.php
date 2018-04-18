<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    use Notifiable;

    /**
     * The ORM attributes
     */

     public $timestamps     = true;
     protected $table       = 'user_groups';
     protected $fillable    = ['user_id', 'group_id', '_permision'];
}
