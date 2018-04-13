<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use SoftDeletes;

    /**
     * ============================================================================================= *
     * The ORM database attributes
     * ============================================================================================= *
     */

     // Define detalhes de alteração/deletes na tabela 
     public     $timestamps     = true;
     // Nome da tabela
     protected  $table          = 'users';
     // Atributos da tabela
     protected  $fillable       = ['cpf', 'name', 'phone', 'birth', 'gender', 'notes', 'email', 'password', 'status', 'permission'];
     // Dados sensíveis
     protected  $hidden         = ['password', 'remember_token'];

    public function setPasswordAttribute($value) {

        $this->attributes['password'] = env('PASSWORD_HASH') ? bcrypt($value) : $value;

    }

    public function getMaskBirthAttribute() {
        return date('d/m/Y', strtotime($this->attributes['birth']));
    }

    public function getMaskCpfAttribute() {

        $cpf = $this->attributes['cpf'];

        return substr($cpf, 0, 3) . "." . substr($cpf, 3, 3) . "." . substr($cpf, 7, 3) . "-" . substr($cpf, 9);

        return "CPF";
    }

     
}
