<?php
namespace App\Models\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Slide extends Model
{
	use HasFactory;
	use SoftDeletes;
    protected $table = 'slides';
}
