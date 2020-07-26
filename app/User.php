<?php

namespace App;

use Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function getUserByColumn($column, $value)
    {
        $arrUser = self::where($column, '=', $value)->first();
        return ($arrUser ? $arrUser : false);
    }

    //Check whether login user is admin or not
    public function isAdmin()
    {
        $user = Auth::user();
        return ($user->user_type == 'A') ? true : false;
    }

    //Get Login User Type: student/Tutor/Admin
    public static function getUserType()
    {
        $user = Auth::user();
        return $user->user_type;
    }
}
