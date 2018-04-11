<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;


class UserSocial extends Model
{
    use SoftDeletes;
    use Notifiable;
    
    /**
     * ============================================================================================= *
     * The ORM database attributes
     * ============================================================================================= *
     */

    public     $timestamps     = true;
    protected  $table          = 'users';
    protected  $fillable       = ['social_network', 'social_id', 'social_id', 'social_email', 'social_avatar'];
    protected  $hidden         = ['password', 'remember_token'];

}
