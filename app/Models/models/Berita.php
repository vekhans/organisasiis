<?php

namespace App\Models\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Berita extends Model
{
    use HasFactory;
    use SoftDeletes;
	protected $table      = 'beritas';
	protected $dates      = ['created_at','updated_at','deleted_at'];
	protected $primaryKey = 'id';
    protected $fillable   = [
       'id_jenis', 'judul', 'deskripsi', 'keterangan', 'id_admin','id_ad', 'rating', 
    ];
    public function admin()
    {
        return $this->belongsTo('App\Models\User','id_admin');
    }
    public function admina()
    {
        return $this->belongsTo('App\Models\User','id_ad');
    } 
    public function adminoo()
    {
        return $this->belongsTo('App\Models\User','id_publish');
    }
    public function jenis_berita()
    {
        return $this->belongsTo('App\Models\models\JenisBerita','id_jenis');
    }
    public function media_berita()
    {
        return $this->hasMany('App\Models\models\MediaBerita','id_berita');
    }
    
    public function allKomentar()
    {
        return $this->hasMany('App\Models\models\KomentarBerita','id_berita');
    }
    public function komentar()
    {
        return $this->allKomentar()->where('id_komentar','=',null);
    }
}
