<?php

namespace App\Models\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class JenisBerita extends Model
{
    use HasFactory;
    use SoftDeletes;
	protected $table      = 'jenis_beritas';
	protected $dates      = ['created_at','updated_at','deleted_at'];
	protected $primaryKey = 'id';
    protected $fillable   = [
        'id','jenis', 'id_admin', 'id_ad',         
    ];
    public function admin()
    {
        return $this->belongsTo('App\Models\User','id_admin');
    }
    
    public function jenis_berita()
    {
        return $this->hasMany('App\Models\models\Berita','id_jenis');
    }
}
