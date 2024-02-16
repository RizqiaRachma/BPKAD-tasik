<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function changePassword(Request $request)
    {
        $request->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required|min:8|regex:/^(?=.*[A-Z])(?=.*\d).+$/',
            'reNewPassword' => 'required|same:newPassword',
        ]);

        $user = Auth::user();

        // Check current password
        if (!Hash::check($request->input('currentPassword'), $user->password)) {
            return redirect()->back()->withErrors(['currentPassword' => 'Kata sandi saat ini salah']);
        }

        // Update password
        $user->update([
            'password' => Hash::make($request->input('newPassword')),
        ]);

        return redirect()->route('dashboard-pengaturan')->with('success', 'Kata sandi berhasil diubah');
    }
}
