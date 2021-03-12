<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Offer extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'offers';
    protected $fillable = [
      'from_date',
      'to_date',
      'discount',
      'conten',
      'active',
      'item_id'
    ];
    public function scopeActive($query){
        return $query->where('active', 1);
    }
    public function getActive(){
        return $this->active == 1 ?'غير مفعل': 'مفعل';
    }
    public function itemof(){
        return $this->belongsTo('App\Models\Item', 'item_id', 'id');
    }
}
