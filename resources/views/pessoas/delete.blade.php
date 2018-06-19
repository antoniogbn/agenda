@extends("template.app")

@section('content')
    <div class="col-md-6 well">
        <div class="col-md-12">
            <h3>Deseja excluir este contato ?</h3>
            <div style="float: right">
                <a class="btn btn-primary" role="button" href="{{ url("pessoas") }}">
                    <i class="glyphicon glyphicon-chevron-left"></i> &nbspCancelar
                </a>
            </div>
                &nbsp
            <div style="float: right">
                <a class="btn btn-danger" role="button" href="{{ url("pessoas/$pessoa->id/destroy") }}">
                    <i class="glyphicon glyphicon-remove"></i> &nbspExluir
                </a>
            </div>    
                
        </div>
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