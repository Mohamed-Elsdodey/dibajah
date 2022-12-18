<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $hidden=['password'];

    public function categories()
    {
        return $this->belongsToMany(Category::class,'market_categories');
    }//end fun

}//end class
