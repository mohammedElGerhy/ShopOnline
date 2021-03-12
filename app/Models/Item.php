<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Item extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table ='items';
    protected $fillable = [
    'name_ar',
    'name_en',
    'quantity',
    'price',
    'subcat_id'
    ];

    public function subcat(){
        return $this->belongsTo('App\Models\Supcategory', 'subcat_id', 'id');
    }
public function offer(){
        return $this->hasMany('App\Models\Offer', 'item_id', 'id');
}

}
