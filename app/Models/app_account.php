<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class app_account extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        "User_Name",
        "Email_Address",
        "Phone",
        "Password",
        "profile_pic",
        "account_role",
        "Account_Status"
    ];

    /**
     * The attributes that should be hidden for serialization
     */
    protected $hidden = [
        "Password"
    ];
}
