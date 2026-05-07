<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use PhpParser\Node\Expr\FuncCall;

class Candidate extends Model
{
    //
    use HasFactory;
   protected $fillable = [
   'name', 
        'age', 
        'nation', 
        'height', 
        'hobby', 
        'bio', 
        'imagepath'      
];

    public function users(){
        return $this->hasMany(User::class,'candidates_id');
    }
}
