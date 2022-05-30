@extends('adminlte::page')

@section('title', "Detalhes do Plano {$plan->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->id) }}">{{ $plan->name }}</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('details.plan.index', $plan->id) }}">Detalhes</a></li>
    </ol>
    <h1>Detalhes do Plano {{ $plan->name }} <a href="{{ route('plans.create') }}" class="btn btn-primary"><i
                class="fa fa-plus"></i></a></h1>


@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width='115px'>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                        <tr>

                            <td>{{ $detail->name }}</td>

                            <td>
                                <a href="{{ route('plans.edit', $plan->id) }}" class="btn btn-info"><i
                                        class="fa fa-pen"></i></a>
                                <a href="{{ route('plans.show', $plan->id) }}" class="btn btn-warning"><i
                                        class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $details->appends($filters)->links() !!}
            @else
                {!! $details->links() !!}
            @endif

        </div>
    </div>

@stop
