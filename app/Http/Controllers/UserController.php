<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Routing\Redirector;

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
        return view('usuarios.index', ['users' => $users]);
    }

    /**
     * @return View
     */
    public function create()
    {
        return view('usuarios.create');
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
        $usuario->password =bcrypt(request('password'));

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
        return view('usuarios.edit', ['user' => User::findOrFail($id)]);
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
