<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bill_users extends Model
{
    public function user(){

        return $this->belongsTo('\App\User' , 'user_id' , 'id');

    }

    public function bill(){

        return $this->belongsTo('\App\bills' , 'bill_id' , 'id');

    }
}
