<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function provinsiad()
    {
        return $this->hasMany('App\Models\models\Provinsi','id_ad');
    }
    public function propinside()
    {
        return $this->hasMany('App\Models\models\Provinsi','id_de');
    }
    public function kabupatenad()
    {
        return $this->hasMany('App\Models\models\Kabupaten','id_ad');
    }
    public function kabupatende()
    {
        return $this->hasMany('App\Models\models\Kabupaten','id_de');
    }
    public function kecamatanad()
    {
        return $this->hasMany('App\Models\models\Kecamatan','id_ad');
    }
    public function kecamatande()
    {
        return $this->hasMany('App\Models\models\Kecamatan','id_de');
    }
    public function desaad()
    {
        return $this->hasMany('App\Models\models\Desa','id_ad');
    }
    public function desade()
    {
        return $this->hasMany('App\Models\models\Desa','id_de');
    }
    public function anggotaad()
    {
        return $this->hasMany('App\Models\models\Anggota','id_ad');
    }
    public function anggotade()
    {
        return $this->hasMany('App\Models\models\Anggota','id_de');
    }
    public function profil()
    {
        return $this->hasMany('App\Models\models\Profil','id_admin');
    }
    public function mediaprofilad()
    {
        return $this->hasMany('App\Models\models\MediaProfil','id_ad');
    }
    public function mediaprofilde()
    {
        return $this->hasMany('App\Models\models\MediaProfil','id_ad');
    }   
}
