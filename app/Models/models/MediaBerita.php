<?php
namespace App\Models\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class MediaBerita extends Model
{
    use SoftDeletes;
	protected $table      = 'media_beritas';
	protected $dates      = ['created_at','updated_at','deleted_at'];
	protected $primaryKey = 'id';
    protected $fillable   = [
        'id','caption',
        'id_berita',
        'file',
        'id_ad',         
    ];
    public function admin()
    {
        return $this->belongsTo('App\User','id_ad');
    }
    public function media_berita()
    {
        return $this->belongsTo('App\models\Berita','id_berita');
    }
    public function getLinkAttribute($value)
    {
        if (!preg_match("~^(?:f|ht)tps?://~i", $value)) {
            return "https://".$value;
        }else{
        	return $value;
        }
    }
}
