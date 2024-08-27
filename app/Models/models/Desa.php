<?php
namespace App\Models\models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Desa extends Model
{
    use HasFactory;
    use SoftDeletes;
	protected $table      = 'desas';
	protected $dates      = ['created_at','updated_at','deleted_at'];
	protected $primaryKey = 'id';
    protected $fillable   = [
        'id','nama', 'id_kecamatan', 'id_ad','id_de',         
    ];
    public function desaadminad()
    {
        return $this->belongsTo('App\Models\User','id_ad');
    }
    public function desaadminde()
    {
        return $this->belongsTo('App\Models\User','id_de');
    }
    public function desaidkec()
    {
        return $this->belongsTo('App\Models\models\Kecamatan','id_kecamatan');
    }
    public function desaidanggota()
    {
        return $this->hasMany('App\Models\models\Anggota','id_desa');
    }
}
