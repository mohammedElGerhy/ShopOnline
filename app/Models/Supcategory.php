<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Supcategory extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'supcategories';
    protected $fillable = [
      'name_ar',
      'name_en',
      'maincategory_id',
       'active'
    ];
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
    public function getActive (){
        return $this->active == 1 ? 'غير مفعل': 'مفعل';
    }
    public function maincategory (){

        return $this->belongsTo('App\Models\MainCategory', 'maincategory_id', 'id');
    }
    public function item (){
        return $this->hasMany('App\Models\Item', 'subcat_id', 'id');
    }

}
