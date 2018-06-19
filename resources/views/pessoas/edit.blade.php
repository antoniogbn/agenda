@extends('template.app')

@section('content')
    <div class="col-md-12">
        <h3>Editar Contato</h3>
    </div>
   <div class="col-md-6 well">
        <form class="col-md-12" action="{{ url('/pessoas/update') }}" method="POST" >
          {{ csrf_field() }}
          <input type="hidden" name="id" value="{{ $pessoa->id }}">
        <div class="form-group col-md-12 {{ $errors->has('nome') ? 'has->error' : ''}}"">
            <label for="nome" class="control-label">
               <input type="text" name="nome" value="{{ $pessoa->nome }}" class="form-control" placeholder="Nome">
               @if($errors->has('nome'))
                <span class="help-block">
                 {{$errors->first('nome')}}
                </span>
               @endif
            </label>
        </div>
        <button  class="btn btn-primary">Salvar</button>
        </form>
    </div>
    <div class="card bg-light mb-3" style="max-width: 18rem;">
         <div class="card-header">{{$pessoa->nome}} </div>
         <div class="card-body">
              @foreach($pessoa-> telefone as $telefone) 
               <p class="card-text">{{$telefone->ddd}} {{$telefone->telefone}}</p>
              @endforeach    
          </div>
    </div>
    
 @endsection