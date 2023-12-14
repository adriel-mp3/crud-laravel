<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\File;
use App\Traits\UserImageTrait;
use App\Models\User;

class UserController extends Controller
{
    use UserImageTrait;

    public $user;
    
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View 
     */
    public function index()
    {
        $users = $this->user->all();
        return view('user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Contracts\View\View 
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a new user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        $user = $this->user;

        $imageName = $this->uploadImage($request, 'foto', public_path('/img'));

        $created = $user->create([
            'nome' => $request->input('nome'),
            'cpf_cnpj' => $request->input('cpf_cnpj'),
            'nome_social' => $request->input('nome_social'),
            'data_nascimento' => $request->input('data_nascimento'),
            'foto' => $imageName,
        ]);

        if ($created) {
            return redirect()->route('users.index')->with('message', 'Usuário cadastrado com sucesso.');
        }

        return redirect()->route('users.index')->with('error', 'Erro ao cadastrar o usuário, tente novamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the user.
     *
     * @param  int  $id
     * @return 
     */
    public function edit(User $user)
    {
        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(UserRequest $request, $id)
    {
        $user = $this->user;

        $existingImage = $user->where('id', $id)->first()->foto;

        $updatedImage = $this->updateImage($request, 'foto', public_path('/img/' . $existingImage));
        
        if ($request->hasFile('foto')) {
            $this->deleteImage(public_path('/img/' . $existingImage));
        }
        
        $updated = $user->where('id', $id)->update([
            'nome' => $request->input('nome'),
            'cpf_cnpj' => $request->input('cpf_cnpj'),
            'nome_social' => $request->input('nome_social'),
            'data_nascimento' => $request->input('data_nascimento'),
            'foto' => $request->hasFile('foto') ? $updatedImage : $existingImage,
        ]);

        if ($updated) {
            return redirect()->route('users.index')->with('message', 'Cadastro atualizado com sucesso.');
        }

        return redirect()->route('users.index')->with('message', 'Erro ao atualizar o cadastro, tente novamente.');
    }

    /**
     * Remove the specified user from storage and redirect to users list.
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

        return redirect()->route('users.index');
    }
}
