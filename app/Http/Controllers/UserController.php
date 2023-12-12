<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user->all();
        return view('users', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $this->user;

        $created = $user->create([
            'nome' => $request->input('nome'),
            'cpf_cnpj' => $request->input('cpf_cnpj'),
            'nome_social' => $request->input('nome_social'),
            'data_nascimento' => $request->input('data_nascimento'),
            'foto' => $request->input('foto'),
        ]);

        if ($created) {
            return redirect('users');
        }

        return redirect()->back()->with('error', 'Error created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user_edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = $this->user;
        $updated = $user->where('id', $id)->update($request->except(['_token', '_method']));
        
        if ($updated) {
            return redirect('users')->with('message', 'Cadastro atualizado!');
        }

        return redirect()->back()->with('message', 'Error update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->user->where('id', $id)->delete();

        return redirect('users');
    }
}
