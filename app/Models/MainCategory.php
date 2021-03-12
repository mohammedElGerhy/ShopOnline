<?php

namespace App\Models;
use App\Observers\MainCategoryObserve;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class MainCategory extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'main_categories';

    protected $fillable = [

    'name_ar',
    'name_en',
    'active',
    'translation_of'
    ];
    protected static function boot(){
    parent::boot();
    MainCategory::observe(MainCategoryObserve::class);
    }
    public function scopeActive($query)
{
    return $query->where('active', 1);
}
    public function getActive (){
        return $this->active == 1 ? 'غير مفعل': 'مفعل';
    }
    public function supcategory () {
        return $this->hasMany('App\Models\Supcategory', 'maincategory_id','id');
    }
    public function categories()
    {
        return $this->hasMany(self::class, 'translation_of');
    }
    public function subcategory()
    {
        return $this->belongsTo(self::class, 'translation_of');
    }
    public function scopeDefaultCategory($query){
        return  $query -> where('translation_of',0);
    }

}
