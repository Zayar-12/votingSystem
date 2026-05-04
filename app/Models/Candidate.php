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
    'email',
    'password',
    'candidates_id', // ထပ်ဖြည့်ပါ
    'imgpath',       // ထပ်ဖြည့်ပါ
];

    public function users(){
        return $this->hasMany(User::class,'candidates_id');
    }
}
