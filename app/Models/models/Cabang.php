<?php

namespace App\Models\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Cabang extends Model
{
    use HasFactory;
    use SoftDeletes;
	protected $table      = 'cabangs';
	protected $dates      = ['tgl_pelantikan','tgl_pemberhentian','created_at','updated_at','deleted_at'];
	protected $primaryKey = 'id';
    protected $fillable   = [
    	'id','periode','nama', 'id_ad','id_de',         
    ];
    public function cabangadminad()
    {
        return $this->belongsTo('App\Models\User','id_ad');
    }
    public function cabangadminde()
    {
        return $this->belongsTo('App\Models\User','id_de');
    }
    public function cabangidkab()
    {
        return $this->belongsTo('App\Models\models\Kabupaten','id_kabupaten');
    }
    public function cabangpembina()
    {
        return $this->belongsTo('App\Models\models\Anggota','pembina');
    }
    public function cabangketua()
    {
        return $this->belongsTo('App\Models\models\Anggota','ketua');
    }
    public function cabangwakilketua()
    {
        return $this->belongsTo('App\Models\models\Anggota','wakil_ketua');
    }
    public function cabangsek1()
    {
        return $this->belongsTo('App\Models\models\Anggota','sekretaris_1');
    }
    public function cabangsek2()
    {
        return $this->belongsTo('App\Models\models\Anggota','sekretaris_2');
    }
    public function cabangbend1()
    {
        return $this->belongsTo('App\Models\models\Anggota','bendahara_1');
    }
    public function cabangbend2()
    {
        return $this->belongsTo('App\Models\models\Anggota','bendahara_2');
    }
    public function cabangkasekpenerimaan()
    {
        return $this->belongsTo('App\Models\models\Anggota','kasek_penerimaan');
    }
    public function cabangseksekpenerimaan()
    {
        return $this->belongsTo('App\Models\models\Anggota','seksek_penerimaan');
    }
    public function cabangkasekkesehatan()
    {
        return $this->belongsTo('App\Models\models\Anggota','kasek_kesehatan');
    }
    public function cabangseksekkesehatan()
    {
        return $this->belongsTo('App\Models\models\Anggota','seksek_kesehatan');
    }
    public function cabangkaseklogistik()
    {
        return $this->belongsTo('App\Models\models\Anggota','kasek_logistik');
    }
    public function cabangsekseklogistik()
    {
        return $this->belongsTo('App\Models\models\Anggota','seksek_logistik');
    }
    public function cabangkasekpenyegaran()
    {
        return $this->belongsTo('App\Models\models\Anggota','kasek_penyegaran');
    }
    public function cabangseksekpenyegaran()
    {
        return $this->belongsTo('App\Models\models\Anggota','seksek_penyegaran');
    }
    public function cabangkasekdokumentasi()
    {
        return $this->belongsTo('App\Models\models\Anggota','kasek_dokumentasi');
    }
    public function cabangseksekdokumentasi()
    {
        return $this->belongsTo('App\Models\models\Anggota','seksek_dokumentasi');
    }

     
    public function cabanganggotacabang()
    {
        return $this->hasMany('App\Models\models\AnggotaCabang','id_cabang');
    }

}
