<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Role;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(config('view.paginate'));
        return view('usuarios.index', ['users' => $users]);
    }

    /**
     * @return View
     */
    public function create()
    {
        $roles = Role::all();
        return view('usuarios.create', ['roles' => $roles]);
    }

    /**
     * @param Request $request
     * @return Redirector
     */
    public function store(Request $request)
    {
        $usuario = new User();
        $usuario->name  =request('name');
        $usuario->email =request('email');
        $usuario->password = Hash::make(request('password'));

        $usuario->save();
        return redirect('/usuarios');
    }

    /**
     * @param $id
     * @return View
     */
    public function show($id)
    {
        return view('usuarios.show', ['user' => User::findOrFail($id)]);
    }

    /**
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        $roles = Cache::rememberForever('role', function () {
            return Role::all();
        });

        return view('usuarios.edit', ['user' => User::findOrFail($id), 'roles'=>$roles]);
    }

    /**
     * @param UserFormRequest $request
     * @param $id
     * @return Redirector
     */
    public function update(UserFormRequest $request, $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->name  = $request->get('name');
        $usuario->email =$request->get('email');
        $usuario->status = $request->get('status');
        $usuario->role_id = $request->get('role');

        $usuario->update();

        return redirect('usuarios');
    }

    /**
     * @param $id
     * @return Redirector
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();
        return redirect('/usuarios');
    }
}
