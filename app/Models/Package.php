<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
   
    use HasFactory;
    protected $fillable=['name','price','description','plan_info'];
    public function users(){
        return $this->hasMany(User::class);
    }
}
