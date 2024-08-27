<?php

namespace App\Models\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class MediaProfil extends Model
{
    use HasFactory;
    use SoftDeletes;
	protected $table      = 'media_profils';
	protected $dates      = ['created_at','updated_at','deleted_at'];
	protected $primaryKey = 'id';
    protected $fillable   = [
        'id','caption',
        'id_profil',
        'file',
        'id_ad',         
    ];
    public function adminadmp()
    {
        return $this->belongsTo('App\Models\User','id_ad');
    }
    public function admindelmp()
    {
        return $this->belongsTo('App\Models\User','id_de');
    }
    public function media_profil()
    {
        return $this->belongsTo('App\Models\models\Profil','id_profil');
    }
    public function getLinkAttribute($value)
    {
        if (!preg_match("~^(?:f|ht)tps?://~i", $value)) {
            return "https://".$value;
        }else{
        	return $value;
        }
    }
}
