<?php

namespace App\Models\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provinsi extends Model
{
    use HasFactory;
    use SoftDeletes;
	protected $table      = 'provinsis';
	protected $dates      = ['created_at','updated_at','deleted_at'];
	protected $primaryKey = 'id';
    protected $fillable   = [
        'id','nama', 'id_ad', 'id_de',         
    ];
    public function provadminad()
    {
        return $this->belongsTo('App\Models\User','id_ad');
    }
    public function provadminde()
    {
        return $this->belongsTo('App\Models\User','id_de');
    }
    public function providkab()
    {
        return $this->hasMany('App\Models\models\Kabupaten','id_provinsi');
    }
}
