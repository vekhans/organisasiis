<?php

namespace App\Models\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kecamatan extends Model
{
    use HasFactory;
    use SoftDeletes;
	protected $table      = 'kecamatans';
	protected $dates      = ['created_at','updated_at','deleted_at'];
	protected $primaryKey = 'id';
    protected $fillable   = [
        'id','nama', 'id_kabupaten','jenis','id_ad', 'id_de',         
    ];
    public function kecadminad()
    {
        return $this->belongsTo('App\Models\User','id_ad');
    }
    public function kecadminde()
    {
        return $this->belongsTo('App\Models\User','id_de');
    }
    public function kecidkab()
    {
        return $this->belongsTo('App\Models\models\Kabupaten','id_kabupaten');
    }
    public function keciddesa()
    {
        return $this->hasMany('App\Models\models\Desa','id_kecamatan');
    }
}
