<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Person extends Entity
{
    // "Renaming" column names for the application
    protected $datamap = [
        'firstName' => 'person_firstname',
        'lastName' => 'person_lastname',
        'email' => 'person_email',
        'password' => 'person_password'
    ];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

    // Mutator for password, when password is set, this method is called automatically, converting the password into hash
    public function setPersonPassword(string $pass)
    {
        $this->attributes['person_password'] = password_hash($pass, PASSWORD_BCRYPT);

        return $this;
    }

    // Accessors, modifying the data before called.
    public function getPersonLastName(){
        // change email to uppercase
        return strtoupper($this->attributes['person_lastname']);
    }

    // Virtual Property
    public function fullName(){
        return strtoupper($this->attributes['person_lastname']). " ".$this->attributes['person_firstname'];
    }
}
