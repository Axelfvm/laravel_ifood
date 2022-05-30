@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('admin.index') }}">Planos</a></li>
    </ol>
    <h1>Planos <a href="{{ route('plans.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i></a></h1>


@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('plans.search') }}" method="POST" class="form form-inline">
                @csrf
                <div class="form-group">
                    <input type="text" name="filter" placeholder="Nome" class="form-control"
                        value="{{ $filters['filter'] ?? '' }}">
                </div>
                <button type="submit" class="btn btn-primary">Pesquisar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th width="50px">#</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th width='175px'>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td>{{$plan->id}}</td>
                            <td>
                                {{ $plan->name }}
                            </td>
                            <td>
                                R$ {{ number_format($plan->price, 2, ',', '.') }}
                            </td>
                            <td>
                                <a href="{{ route('details.plan.index', $plan->id)}}" class="btn btn-secondary"><i class="fa fa-info-circle"></i></a>
                                <a href="{{ route('plans.edit', $plan->id)}}" class="btn btn-info"><i class="fa fa-pen"></i></a>
                                <a href="{{ route('plans.show', $plan->id) }}" class="btn btn-warning"><i class="fa fa-eye"></i></a>


                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $plans->appends($filters)->links() !!}
            @else
                {!! $plans->links() !!}
            @endif

        </div>
    </div>

@stop



