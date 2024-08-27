<?php

namespace App\Models\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class KomentarBerita extends Model
{
    use HasFactory;
    use SoftDeletes;
	protected $table      = 'komentar_beritas';
	protected $dates      = ['created_at','updated_at','deleted_at'];
	protected $primaryKey = 'id';
    public function getGravatarAttribute()
    {
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "https://www.gravatar.com/avatar/$hash";
    }     
    public function balasan()
    {
        return $this->hasMany('App\Models\models\KomentarBerita','id_komentar');
    }
}
