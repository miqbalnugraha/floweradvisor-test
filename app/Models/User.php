<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password', 'membership',
        'avatar', 'provider_id', 'provider',
        'access_token'
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

    public function userMember1(){
        return DB::table('users')
                ->leftJoin('membership', 'users.membership', '=', 'membership.id')
                ->where('membership', '=', 1)
                ->select('membership.name')
                ->get();
    }
    public function userMember2(){
        return DB::table('users')
                ->leftJoin('membership', 'users.membership', '=', 'membership.id')
                ->where('membership', '=', 2)
                ->select('membership.name')
                ->get();
    }
    public function userMember3(){
        return DB::table('users')
                ->leftJoin('membership', 'users.membership', '=', 'membership.id')
                ->where('membership', '=', 3)
                ->select('membership.name')
                ->get();
    }
    public function userMember4(){
        return DB::table('users')
                ->leftJoin('membership', 'users.membership', '=', 'membership.id')
                ->where('membership', '=', 4)
                ->select('membership.name')
                ->get();
    }
    public function updateData($id,$data){
       return DB::table('users')
        ->where('id', $id)
        ->update($data);
    }   

}
