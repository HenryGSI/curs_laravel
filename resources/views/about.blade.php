@extends('layout')

@section('title',  __('About'))

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <img class="img-fluid" src="/img/about.svg" alt="{{ __('About') }}">
            </div>
            <div class="col-12 col-lg-6 mb-4">
                <h1 class="display-4 text-primary">@lang('About')</h1>
                <p class="lead text-secondary">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sequi deserunt numquam doloremque nostrum, dolor eius inventore. Optio voluptatum est animi, nostrum numquam odit fuga ipsam molestias nemo, mollitia repudiandae dolorum.</p>
                <a class="btn btn-lg btn-block btn-primary" href="{{ route('contact')}}">@lang('Contacto')</a>
                <a class="btn btn-lg btn-block btn-outline-primary" href="{{ route('projects.index')}}">@lang('Proyectos')</a>
            </div>

        </div>
    </div>
@endsection
