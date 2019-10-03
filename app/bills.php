<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bills extends Model
{
    protected $fillable = [
        'title', 'amount', 'total_days_est','amount_per_days',
    ];

    public function bill_users(){

        return $this->hasMany('App\bill_users','bill_id');

    }
    

}
