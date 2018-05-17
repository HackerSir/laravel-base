<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\User;

class ProfileController extends Controller
{
    /**
     * 查看會員資料
     *
     * @return \Illuminate\View\View
     */
    public function getProfile()
    {
        $user = auth()->user();

        return view('profile.index', compact('user'));
    }

    /**
     * 個人資料編輯頁面
     *
     * @return \Illuminate\View\View
     */
    public function getEditProfile()
    {
        $user = auth()->user();

        return view('profile.edit', compact('user'));
    }

    /**
     * 編輯個人資料
     *
     * @param ProfileUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(ProfileUpdateRequest $request)
    {
        /* @var User $user */
        $user = auth()->user();
        $user->update($request->only('name'));

        return redirect()->route('profile')->with('success', '資料修改完成。');
    }
}
