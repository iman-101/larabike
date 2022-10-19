<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Bike extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable=['marca','modelo','kms','precio','matriculada',
        'imagen','matricula','color','user_id'];
    
    public function user(){
        return $this->belongsTo('\App\Models\User');
    }
}
