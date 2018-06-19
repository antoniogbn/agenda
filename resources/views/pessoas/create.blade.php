@extends('template.app')

@section('content')
    <div class="col-md-12">
        <h3>Novo Contato</h3>
    </div>
   <div class="col-md-6 well">
        <form class="col-md-12" action="{{ url('/pessoas/store') }}" method="POST" >
          {{ csrf_field() }}
        <div class="form-group col-md-12 {{ $errors->has('nome') ? 'has->error' : ''}}">
            <label class="control-label">
               <input type="text" name="nome" value="{{ old('nome') }}" class="form-control" placeholder="Nome">
               @if($errors->has('nome'))
                <span class="help-block">
                 {{$errors->first('nome')}}
                </span>
               @endif
            </label>
        </div>
        <div class="form-group col-md-4 {{ $errors->has('ddd') ? 'has->error' : ''}}" >
            <label class="control-label">
               <input type="text" name="ddd"  value="{{ old('ddd') }}" class="form-control" placeholder="DDD">
               @if($errors->has('ddd'))
                <span class="help-block">
                 {{$errors->first('ddd')}}
                </span>
               @endif
            </label>
        </div>
        <div class="form-group col-md-8 {{ $errors->has('telefone') ? 'has->error' : ''}}">
            <label class="control-label">
               <input type="text" name="telefone" value="{{ old('telefone') }}" class="form-control" placeholder="Telefone">
               @if($errors->has('telefone'))
                <span class="help-block">
                 {{$errors->first('telefone')}}
                </span>
               @endif
            </label>
        </div>
        <button  class="btn btn-primary">Salvar</button>
        </form>
    </div>
 @endsection