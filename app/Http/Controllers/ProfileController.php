<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /* @var \App\User $user */
    protected $user;

    /**
     * ProfileController constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->user = $request->user();
    }

    /**
     * 查看會員資料
     *
     * @return \Illuminate\View\View
     */
    public function getProfile()
    {
        return view('profile.index', ['user' => $this->user]);
    }

    /**
     * 個人資料編輯頁面
     *
     * @return \Illuminate\View\View
     */
    public function getEditProfile()
    {
        return view('profile.edit', ['user' => $this->user]);
    }

    /**
     * 編輯個人資料
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        $this->user->update([
            'name' => $request->get('name'),
        ]);

        return redirect()->route('profile')->with('global', '資料修改完成。');
    }
}
