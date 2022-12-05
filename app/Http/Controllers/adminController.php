<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

// User Model
use App\Models\app_account;


class adminController extends Controller
{


    /**
     * Store a newly created record in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $response)
    {
        //Validating Form 
        $response->validate(
            [
                "user_name" => ["required"],
                "email_address" => ["required", "unique:app_accounts"],
                "phone" => ["required"],
                "password" => ["required"],
                "account_role" => ["required"],
            ],
            [
                // User Who Already Exist Email Error Message 
                "email_address.unique" => "User With This Email already Register with Our System",
            ]
        );

        // Form Inputs
        $UserInputs = $response->only("user_name", "email_address", "phone", "account_role", "password");

        // If Admin Upload Form With Profile Pic
        if ($response->file("profile_pic") != '') {
            // Profile Pic
            $profilePic = $response->file('profile_pic');
            // Profile Pic New Name
            $picNewName = Date('Ymd_his') . '.' . $profilePic->getClientOriginalExtension();
            $movingPic = $profilePic->move(public_path('asset\img'), $picNewName);
            // If Move
            if ($movingPic) {
                $creatingUser = $this->createUser($UserInputs, $picNewName);
                if ($creatingUser) {
                    $Mail_data = [
                        "name" => $response->user_name,
                        "email" => $response->email_address,
                        "password" => $response->password,
                    ];
                    $user = $response->email_address;
                    Mail::send('layout/mail_template', $Mail_data, function ($message) use ($user) {
                        $message->to($user);
                        $message->subject('Login Credentials Of System App');
                    });
                    return back()->with("success", "User Successfully Created");
                } else {
                    return back()->with("error", "Failed to Create User Please Try Again");
                }
            } else {
                return back()->with("error", "Something Went Wrong Please Try Later");
            }
        } else {
            // Create new User Without Profile Photo
            $picNewName = null;
            $creatingUser = $this->createUser($UserInputs, $picNewName);
            if ($creatingUser) {
                $Mail_data = [
                    "name" => $response->user_name,
                    "email" => $response->email_address,
                    "password" => $response->password,
                ];
                $user = $response->email_address;
                Mail::send('layout/mail_template', $Mail_data, function ($message) use ($user) {
                    $message->to($user);
                    $message->subject('Login Credentials Of System App');
                });
                return back()->with("success", "User Successfully Created");
            } else {
                return back()->with("error", "Failed to Create User Please Try Again");
            }
        }
    }


    // Insert User Record Into Database
    private function createUser(array $userData, $ProfilePicture)
    {
        // Store Data Into Database
        return app_account::create([
            "User_Name" => $userData['user_name'],
            "Email_Address" => $userData['email_address'],
            "Phone" => $userData['phone'],
            "Password" => Hash::make($userData['password']),
            "account_role" => $userData['account_role'],
            "profile_pic" => $ProfilePicture,
            "Account_Status" => 1,
        ]);
    }



    /**
     * Display a listing of the record.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllUser()
    {
        //Getting All User Records
        $users = app_account::where('account_role', "user")->paginate(5);
        return view(
            "app_pages/admin/app_users_pages/view_user",
            ["users" => $users]
        );
    }


    /**
     * Changing the status of users Account.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function statusChange($id, $status_code)
    {
        // Changing Status Code
        $newStatus = $status_code == 1 ? 0 : 1;
        $changingStatus = app_account::where("id", $id)->update([
            "account_status" => $newStatus,
        ]);
        return back();
    }


    /**
     * Changing Password of Admin Account.
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
            return back()->with('error', "Current Password is Invalid Please Enter Correct Password");
        }
    }

    /**
     * Remove the specified record from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = app_account::where('id', $id)->delete();
        return back()->with('success', 'User Deleted Successfuly');
    }


    /**
     * Count User and Blocked User
     */
    public function getUserCount()
    {
        $userCount = app_account::where("account_role", "user")->count();
        $blockuserCount = app_account::where("account_role", "user")->where("account_status", "0")->count();
        return view("app_pages/admin/dashboard", [
            "totalUsers" => $userCount,
            "blockUsers" => $blockuserCount,
        ]);
    }



    /**
     * Update Account of Admin Account.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCurrentAdmin(Request $response)
    {
        $response->validate([
            "admin_name" => ["required"],
            "email_address" => ["required", "email"],
            "phone_number" => ["required"]
        ]);

        $userID = session('id');
        $updateAdmin = app_account::where('id', $userID)->update([
            "user_name" => $response->admin_name,
            "email_address" => $response->email_address,
            "phone" => $response->phone_number,
        ]);

        if ($updateAdmin) {
            session()->put([
                'name' => $response->admin_name,
                'email' => $response->email_address,
                'phone' => $response->phone_number,
            ]);
            return back()->with("success", "Account Information Updated Successfuly");
        }
    }
}
