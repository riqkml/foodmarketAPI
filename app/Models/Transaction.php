<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name','description','ingredient','price','rate','types'
    ];

    public function getCreatedAtAttribute($values)
    {
        return Carbon::parse($values)->timestamp;
    }

    public function getUpdatedAtAttribute($values)
    {
        return Carbon::parse($values)->timestamp;
    }

    public function food()
    {
        return $this->hasOne(Food::class,'id','food_id');
    }
    
    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
