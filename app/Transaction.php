<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function transaction_user(){

        return $this->hasMany('App\Transaction_user');

    }
}
