<?php
namespace App\Models\models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Kabupaten extends Model
{
    use HasFactory;
    use SoftDeletes;
	protected $table      = 'kabupatens';
	protected $dates      = ['created_at','updated_at','deleted_at'];
	protected $primaryKey = 'id';
    protected $fillable   = [
        'id','nama', 'id_provinsi','id_ad', 'id_de',         
    ];
    public function kabadminad()
    {
        return $this->belongsTo('App\Models\User','id_ad');
    }
    public function kabadminde()
    {
        return $this->belongsTo('App\Models\User','id_de');
    }
    public function kabidprov()
    {
        return $this->belongsTo('App\Models\models\Provinsi','id_provinsi');
    }
    public function kabidkec()
    {
        return $this->hasMany('App\Models\models\Kecamatan','id_kabupaten');
    }
}
