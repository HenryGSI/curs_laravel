@extends('layout')

@section('title', 'Contact')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">
            @include('partials.validation-errors')
            <form class="bg-white shadow rounded py-3 px-4" method="POST" action="{{route('messages.store')}}">
                <h1 class="display-4">{{ __('Contact') }}</h1>
                <hr>
                @csrf
                <div class="form-group">
                    <label for="name">@lang('Name')</label>
                    <input class="form-control bg-light shadow-sm @error('name') is-invalid @else border-0 @enderror"
                        type="text" id="name" name="name" placeholder="Nombre..." value="{{ old('name') }}"
                    >
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">@lang('Email')</label>
                    <input class="form-control bg-light shadow-sm @error('name') is-invalid @else border-0 @enderror"
                        type="email" id="email" name="email" placeholder="Email..." value="{{ old('email') }}"
                    >
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="subject">@lang('Asunto')</label>
                    <input class="form-control bg-light shadow-sm @error('name') is-invalid @else border-0 @enderror"
                        type="text" id="subject" name="subject" placeholder="Asunto..." value="{{ old('subject') }}"
                    >
                    @error('subject')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subject">@lang('Mensaje')</label>
                    <textarea class="form-control bg-light shadow-sm @error('name') is-invalid @else border-0 @enderror"
                        id="content" name="content"  placeholder="Mensaje...">{{ old('content') }}</textarea>
                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button class="btn btn-primary btn-lg btn-block">@lang('Send')</button>
            </form>
        </div>
    </div>
</div>
@endsection
