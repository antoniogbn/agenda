<?php
namespace App\Http\Controllers;

use App\Pessoa;
use App\Telefone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PessoasController extends Controller
{
    //
    private $telefones_controller;
    private $pessoas;
    
    public function __construct(TelefonesController $telefones_controller)
    {
        $this->telefones_controller = $telefones_controller;
        $this->pessoa = new Pessoa();
    }
    
    public function index()
    {
        $list_pessoas = Pessoa::all();
        return view('pessoas.index',[
            'pessoas' => $list_pessoas
        ]);
    }
    
    public function novoView()
    {
        return view('pessoas.create');
    }
    
    public function store(Request $request)
    {
        $validacao = $this->validacao($request->all());
        if ($validacao->fails()){   
            return redirect()->back()->withErrors($validacao->errors())->withInput($request->all());
        }
        $pessoa = Pessoa::create($request->all());
        if ($request->ddd && $request->telefone)
        {
            $telefone = new Telefone();
            $telefone->ddd = $request->ddd;
            $telefone->telefone = $request->telefone;
            $telefone->pessoa_id = $pessoa->id;
            $this->telefones_controller->store($telefone);
        }
        return redirect("/pessoas")->with("message","Pessoa criada com sucesso !");
    }
    
    public function editarView($id)
    {
         return view('pessoas.edit', ['pessoa'=>$this->getPessoa($id)]);
    }
    
    public function excluirView($id)
    {
         return view('pessoas.delete', ['pessoa'=>$this->getPessoa($id)]);
    }
        
    protected function getPessoa($id)
    {
        return $this->pessoa->find($id);
    }
    
    
    public  function update(Request $request)
    {
        $pessoa = $this->getPessoa($request->id);
        $pessoa->update($request->all());
        return redirect("/pessoas")->with("success","Excluído !");
    }

    public  function destroy($id)
    {
        $this->getPessoa($id)->delete();
        return redirect("/pessoas");
    }
    
    private function validacao($data)
    {
        if (array_key_exists('ddd', $data) && array_key_exists('telefone', $data)){
            if ($data['ddd'] || $data['telefone']) {
                $regras['ddd'] = 'required|size:2';
                $regras['telefone'] = 'required';
        }}
        
        $regras['nome'] = 'required|min:3';

        $mensagens = ['nome.required' => 'Campo Nome é obrigatório',
                      'nome.min' => 'Campo Nome precisa ter no minimo 3 caracteres !',
                      'ddd.required' => 'Campo DDD é obrigatorio',
                      'ddd.size' => 'Campo DDD deve ter 2 digitos',
                      'telefone.required' => 'Campo Telefone é obrigatorio'
                      ];
        return Validator::make($data, $regras, $mensagens);
    }

    
}
