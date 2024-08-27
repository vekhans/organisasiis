<?php

namespace App\Models\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Arsip extends Model
{
    use HasFactory;
    use SoftDeletes;
	protected $table      = 'arsips';
	protected $dates      = ['created_at','updated_at','deleted_at'];
	protected $primaryKey = 'id';
    protected $fillable   = [
       'id','id_jenis', 'judul', 'deskripsi', 'id_admin', 'id_ad', 'keterangan', 'file', 
    ];
    public function admin()
    {
    	
        return $this->belongsTo('App\Models\User','id_admin');
    }
    public function admins()
    {
        return $this->belongsTo('App\Models\User','id_ad');
    }
    public function adminoo()
    {
        return $this->belongsTo('App\Models\User','id_publish');
    }
    public function jenis_arsip()
    {
        return $this->belongsTo('App\Models\models\JenisArsip','id_jenis');
    } 
}
