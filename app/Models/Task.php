<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable=['status','title','user_id','exp_date','assign_user_id'];
    public function user(){
  
        return $this->hasMany(User::class,'user_id');
        
    }
    
    public function AsignUser(){
  
        return $this->hasOne(User::class,'assign_user_id');
        
    }
    
    
    

}
