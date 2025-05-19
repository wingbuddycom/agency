<?php

// app/Models/Agent.php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Agent extends Authenticatable
{
    protected $table      = 'wingbuddy_wbr';   // ← physical table name
    protected $primaryKey = 'id';              // default, but explicit is fine
    public    $timestamps = false;             // unless you really have created_at/updated_at

    protected $fillable = ['email', 'pass_hash', 'first_name'];
    protected $hidden   = ['pass_hash'];       // never expose hashes in JSON

    /** Tell Laravel the column that stores the password hash */
    public function getAuthPassword()
    {
        return $this->pass_hash;               // not “password”
    }

    /** Simple one-to-many to the commissions table */
    public function commissions()
    {
        return $this->hasMany(
            Commission::class,         // see step 4
            'wbr_id',                  // FK on wingbuddy_commissions
            'id'                       // PK on wingbuddy_wbr
        )->latest('earned_at');
    }
}
