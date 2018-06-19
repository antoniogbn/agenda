@extends("template.app")

@section("content")
    <style>
        .btn-action{
            padding: 5px;
        }
    </style>
    <div>&nbsp</div>
    <div>
        @foreach($pessoas as $pessoa)
        <div class="card bg-light mb-3" style="max-width: 18rem">
            <div class="card-header">
                {{$pessoa->nome}} 
                <a class="btn btn-primary" href="{{ url("/pessoas/$pessoa->id/editar") }}" role="button"><i class="fa fa-pencil"></i></a>
                <a class="btn btn-danger" href="{{ url("/pessoas/$pessoa->id/excluir") }}" role="button"><i class="fa fa-pencil"></i></a>
            </div>
            <div class="card-body">
                @foreach($pessoa-> telefone as $telefone) 
                <p class="card-text">{{$telefone->ddd}} {{$telefone->telefone}}</p>
                @endforeach    
            </div>
        </div>
        @endforeach
    </div>        
@endsection










    