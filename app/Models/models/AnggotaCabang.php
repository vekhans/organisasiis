<?php

namespace App\Models\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class AnggotaCabang extends Model
{
    use HasFactory;
    use SoftDeletes;
	protected $table      = 'anggota_cabangs';
	protected $dates      = ['created_at','updated_at','deleted_at'];
	protected $primaryKey = 'id';
    protected $fillable   = [ 'id',
    	'id_cabang','id_anggota','id_ad','id_de',         
    ];
    public function angotacabadminad()
    {
        return $this->belongsTo('App\Models\User','id_ad');
    }
    public function angotacabadminde()
    {
        return $this->belongsTo('App\Models\User','id_de');
    }
    public function angotacabcabang()
    {
        return $this->belongsTo('App\Models\models\Cabang','id_cabang');
    }
    public function angotacabanggota()
    {
        return $this->belongsTo('App\Models\models\Anggota','id_anggota');
    }
     

     
     

}
