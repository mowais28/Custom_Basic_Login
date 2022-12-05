<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Session\Middleware\StartSession;


// Model
use App\Models\app_account;


class AuthController extends Controller
{

    /**
     * Checking User Credentials
     * @param Request
     * @response $response
     */
    public function login(Request $response)
    {
        $response->validate([
            "login_email" => "required",
            "login_password" => "required"
        ]);
        $fetchAccount = app_account::where('email_address', $response->login_email)->first();
        if ($fetchAccount) {
            if (Hash::check($response->login_password, $fetchAccount->password)) {
                // Save Login Session
                session()->put([
                    "id" => $fetchAccount->id,
                    "name" => $fetchAccount->user_name,
                    "email" => $fetchAccount->email_address,
                    "phone" => $fetchAccount->phone,
                    "user_role" => $fetchAccount->account_role,
                    "profile_pic" => $fetchAccount->profile_pic,
                ]);
                // If Admin Logged In
                if ($fetchAccount->account_role == "admin") {
                    return redirect()->route("admin/dashboard");
                }
                // If User Logged In
                else if ($fetchAccount->account_role == "user" && $fetchAccount->account_status == 1) {
                    return redirect()->route("user/dashboard");
                } else if ($fetchAccount->account_status == 0) {
                    session_unset();
                    session()->flush();
                    return back()->with("error", "Sorry Your Account Is Blocked For Some Reason");
                }
            } else {
                return back()->with("error", "Invalid Email Address or Password ");
            }
        } else {
            return back()->with("error", "Invalid Email Address or Password ");
        }
    }



    /**
     * Logging Out Account
     */
    public function logout()
    {
        session_unset();
        session()->flush();
        return redirect()->route("/");
    }
}
