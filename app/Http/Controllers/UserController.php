<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Model 
use App\Models\app_account;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    /**
     * Changing Password of User Account.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function UpdatePassword(Request $response, $id)
    {
        // validating
        $response->validate([
            "current_password" => "required",
            "new_password" => "required",
            "confirm_password" => ["required", "same:new_password"]
        ]);

        $verifyOldPassword = app_account::where("id", $id)->first();
        if (Hash::check($response->current_password, $verifyOldPassword->password)) {
            $updatePassword = app_account::where("id", $id)->update([
                "password" => Hash::make($response->new_password),
            ]);
            if ($updatePassword) {
                return back()->with('success', "Password Updated Successfuly");
            }
        } else {
            return back()->with('error', "Current Is Wrong Please Enter Correct Password");
        }
    }




    /**
     * Update Account of Admin Account.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCurrentUser(Request $response)
    {
        $response->validate([
            "user_name" => ["required"],
            "email_address" => ["required", "unique:app_accounts"],
            "phone_number" => ["required"]
        ]);

        $userID = session('id');
        $updateAdmin = app_account::where('id', $userID)->update([
            "user_name" => $response->user_name,
            "email_address" => $response->email_address,
            "phone" => $response->phone_number,
        ]);

        if ($updateAdmin) {
            return back()->with("success", "Account Information Updated Successfuly");
        }
    }
}
