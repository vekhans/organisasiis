<?php
namespace App\Models\models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
class Anggota extends Model
{
    use HasFactory;
    use SoftDeletes;
	protected $table      = 'anggotas';
	protected $dates      = ['created_at','updated_at','deleted_at','tanggal_aktanikah','tanggal_rekomcabang', 'tanggal_permandian', 'tanggal_pengesahan'];
	protected $primaryKey = 'id';
    protected $fillable   = [
        'id', 'nama', 'email', 'nik','nokta', 'id_desa','id_ad', 'id_de',         
    ];
    public function angadminad()
    {
        return $this->belongsTo('App\Models\User','id_ad');
    }
    public function angadminde()
    {
        return $this->belongsTo('App\Models\User','id_de');
    }
    public function angiddesa()
    {
        return $this->belongsTo('App\Models\models\Desa','id_desa');
    }
    public function anggotapembina()
    {
        return $this->hasMany('App\Models\models\Cabang','pembina');
    }
    public function anggotaketua()
    {
        return $this->hasMany('App\Models\models\Cabang','ketua');
    }
    public function anggotawakilketua()
    {
        return $this->hasMany('App\Models\models\Cabang','wakil_ketua');
    }
    public function anggotasek1()
    {
        return $this->hasMany('App\Models\models\Cabang','sekretaris_1');
    }
    public function anggotasek2()
    {
        return $this->hasMany('App\Models\models\Cabang','sekretaris_2');
    }
    public function anggotabend1()
    {
        return $this->hasMany('App\Models\models\Cabang','bendahara_1');
    }
    public function anggotabend2()
    {
        return $this->hasMany('App\Models\models\Cabang','bendahara_2');
    }
    public function anggotakasekpenerimaan()
    {
        return $this->hasMany('App\Models\models\Cabang','kasek_penerimaan');
    }
    public function anggotaseksekpenerimaan()
    {
        return $this->hasMany('App\Models\models\Cabang','seksek_penerimaan');
    }
    public function anggotakasekkesehatan()
    {
        return $this->hasMany('App\Models\models\Cabang','kasek_kesehatan');
    }
    public function anggotaseksekkesehatan()
    {
        return $this->hasMany('App\Models\models\Cabang','seksek_kesehatan');
    }
    public function anggotakaseklogistik()
    {
        return $this->hasMany('App\Models\models\Cabang','kasek_logistik');
    }
    public function anggotasekseklogistik()
    {
        return $this->hasMany('App\Models\models\Cabang','seksek_logistik');
    }
    public function anggotakasekpenyegaran()
    {
        return $this->hasMany('App\Models\models\Cabang','kasek_penyegaran');
    }
    public function anggotaseksekpenyegaran()
    {
        return $this->hasMany('App\Models\models\Cabang','seksek_penyegaran');
    }
    public function anggotakasekdokumentasi()
    {
        return $this->hasMany('App\Models\models\Cabang','kasek_dokumentasi');
    }
    public function anggotaseksekdokumentasi()
    {
        return $this->hasMany('App\Models\models\Cabang','seksek_dokumentasi');
    }
    public function anggotasanggotacab()
    {
        return $this->hasMany('App\Models\models\AnggotaCabang','id_anggota');
    }
    
}

