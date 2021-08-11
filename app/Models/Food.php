<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Food extends Model
{
    use HasFactory;

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

    public function toArray()
    {
        $toArray = parent::toArray();
        $toArray['picturePath'] =  $this->picturePath;
        return $toArray;
    }

    public function getPicturePathAttribute(){
        return url('') . Storage::url($this->attributes['picturePath']);
    }
}
