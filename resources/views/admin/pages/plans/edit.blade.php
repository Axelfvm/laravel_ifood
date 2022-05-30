@extends('adminlte::page')

@section('title', "Editando Plano {$plan->name}")

@section('content_header')
    <h1>Editando Plano {{$plan->name}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.update', $plan->id)}}" class="form" method="POST">
                @csrf
                @method('PUT')

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        @foreach ($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    </div>

                @endif

                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" name="name" class="form-control" placeholder="Nome" value="{{$plan->name}}">
                </div>
                <div class="form-group">
                    <label>Preço:</label>
                    <input type="text" name="price" class="form-control" placeholder="Preço" value="{{$plan->price}}">
                </div>
                <div class="form-group">
                    <label>Descrição:</label>
                    <input type="text" name="description" class="form-control" placeholder="Descrição" value="{{$plan->description}}">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-pen"></i> Editar</button>

                </div>
            </form>

        </div>
    </div>
@stop
