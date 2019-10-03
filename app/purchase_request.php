<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class purchase_request extends Model
{
    protected $fillable = [
        'title','user_id'
    ];
    
    public function user(){      
       
        return $this->belongsTo('\App\User' , 'user_id' , 'id');
        
    }
}
