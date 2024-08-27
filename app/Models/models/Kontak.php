<?php
namespace App\Models\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Kontak extends Model
{
	use SoftDeletes;
	protected $table = 'kontaks';
	protected $dates      = ['created_at','updated_at','deleted_at'];
    protected $fillable =[
    	'id','nama','email','perihal','komentar',
    ];
    public function getGravatarAttribute()
    {
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "https://www.gravatar.com/avatar/$hash";
    }    
}
