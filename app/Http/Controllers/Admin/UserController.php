<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $user = $user->toArray();
        $user['created_at'] = Carbon::parse($user['created_at'], 'UTC')->locale('ru')->isoFormat('MMMM Do YYYY');
        $user['updated_at'] = Carbon::parse($user['updated_at'], 'UTC')->locale('ru')->isoFormat('MMMM Do YYYY');
        return view('admin.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $params = $request->all();
        if ($user->id === 1 || $user->id === Auth::user()->id) {
            return redirect()->route('user.index')->with('error', 'У этого пользователя нельзя менять информацию');
        }
        $user->update($params);
        return redirect()->back()->withSuccess('Информация о юзере успешно обновлена.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->withSuccess('Пользователь удалён');
    }
}
