<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\User;
use Auth;
use Hash;
use Alert;
class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    public function changePassword(Request $request)
    {
        $input = $request->all();
        $user_password = Auth::user()->password;
        $check = Hash::check($input['old_password'],$user_password);
        if ($check == false)
        {
            return view('profile.change-password')->with('error','Incorrect old password');
        }
        $update_password = User::where('id',Auth::user()->id)
                            ->update([
                                'password' => Hash::make($input['new_password'])
                            ]);
        Alert::success('Profile', 'Password successfully updated');
        return redirect('profile');
    }

    use SendsPasswordResetEmails;
}
