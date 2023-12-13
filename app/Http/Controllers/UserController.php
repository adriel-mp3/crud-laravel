<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
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
    public function store(UserRequest $request)
    {
        $user = $this->user;

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $image = $request->file('foto');
            $destinationPath = public_path('/img');
            $extension = '.' . $image->getClientOriginalExtension();
            $imageName = (string) Str::uuid() . $extension;
            $image->move($destinationPath, $imageName);
        }

        $created = $user->create([
            'nome' => $request->input('nome'),
            'cpf_cnpj' => $request->input('cpf_cnpj'),
            'nome_social' => $request->input('nome_social'),
            'data_nascimento' => $request->input('data_nascimento'),
            'foto' => isset($imageName) ? $imageName : null,
        ]);

        if ($created) {
            return redirect('users')->with('message', 'Usuário cadastrado com sucesso.');
        }

        return redirect('users')->with('error', 'Erro ao cadastrar o usuário, tente novamente.');
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
     * @return 
     */
    public function edit(User $user)
    {
        return view('user_edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(UserRequest $request, $id)
    {
        $user = $this->user;

        $existingImage = $user->where('id', $id)->first()->foto;

        if ($request->hasFile('foto')) {
            $requestImage = $request->file('foto');
            $destinationPath = public_path('/img');
            $extension = '.' . $requestImage->getClientOriginalExtension();
            $updatedImage = (string) Str::uuid() . $extension;

            $requestImage->move($destinationPath, $updatedImage);

            if (!empty($existingImage)) {
                $oldImagePath = public_path('/img/' . $existingImage);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }
        }

        $updated = $user->where('id', $id)->update([
            'nome' => $request->input('nome'),
            'cpf_cnpj' => $request->input('cpf_cnpj'),
            'nome_social' => $request->input('nome_social'),
            'data_nascimento' => $request->input('data_nascimento'),
            'foto' => $updatedImage ?? $existingImage,
        ]);

        if ($updated) {
            return redirect('users')->with('message', 'Cadastro atualizado com sucesso.');
        }

        return redirect('users')->with('message', 'Erro ao atualizar o cadastro, tente novamente.');
    }

    /**
     * Remove the specified resource from storage and redirect to users.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $user = $this->user->find($id);

        $imagePath = public_path('/img/' . $user->foto);
        
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $this->user->where('id', $id)->delete();

        return redirect('users');
    }
}
