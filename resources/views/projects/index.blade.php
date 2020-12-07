@extends('layout')

@section('title', 'Portfolio')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="display-4 mb-0">@lang('Projects')</h1>
            @auth
            <a class="btn btn-primary"
                href="{{route('projects.create')}}"
            >@lang('Crear proyecto')</a>
        @endauth
        </div>
        <p class="lead-text-secondary">
            @lang('Proyectos realizados Lorem ipsum dolor sit amet consectetur adipisicing elit.')
        </p>
        <ul class="list-group">
            @forelse($projects as $project)
                <li class="list-group-item border-0 mb-3 shadow-sm">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <a href="{{ route('projects.show', $project) }}" title="{{ $project->title }}">{{ $project->title }}</a>
                            <!--Al metodo route como parametro para identificar le podemos pasar el objeto $project
                                y automaticament saca el id $project->getRouteKey()
                            -->

                            <!--<small>{{ $loop->last ? 'Es el último' : ''}}{{ $loop->first ? 'Es el primero' : ''}}</small>-->

                            <br><small>{{ $project->description }}</small>
                        </div>
                        <small>{{ $project->created_at->format('d/m/Y') }} - {{ $project->created_at->diffForHumans() }}</small>
                        <!--Las fechas son objetos de carbon y se les puede aplicar las funciones de formato de carbon -->
                    </div>
                </li>
            @empty
                <li class="list-group-item border-0 mb-3 shadow-sm">@lang("There aren't projects to show")</li>
            @endforelse
            <!--Para añadir la paginación -->
            {{ $projects->links() }}

        </ul>
    </div>


@endsection
