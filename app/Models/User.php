<?php

namespace App\Models;

use App\Actions\Quota;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'referred_by',
        'enrolled_date'
    ];



    function category(){
        
        return $this->belongsToMany(Categorie::class,"user_category","user_id","category_id");
    }

    function getPercentageAttribute(){
        return Quota::getQuota($this->countDistributor());
    }
    function getDistributor(){
        $user = User::query()->where("id","=",$this->referred_by)->first();
        // dd($user);
        return $user;
    }

    function countDistributor(){
        return User::query()->selectRaw("count(referred_by) as nb")->where("referred_by","=",$this->referred_by)->first("nb")->nb;
    }    



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
        'enrolled_date' => 'date',
    ];
}
