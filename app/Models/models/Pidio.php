<?php
namespace App\Models\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Pidio extends Model
{
	use SoftDeletes;
	protected $table      = 'pidios';
    
	protected $primaryKey = 'id';
    protected $fillable   = [
        'id','caption', 'file', 'sumber', 'id_admin', 'id_ad',        
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
}
