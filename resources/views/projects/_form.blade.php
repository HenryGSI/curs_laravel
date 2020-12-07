@csrf
<div class="form-group">
    <label for="title">@lang('Título del proyecto')</label>
    <br><input type="text" class="form-control border-0 bg-light shadow-sm" name="title" id="title" value="{{ old('title', $project->title) }}">
</div>
<div class="form-group">
    <label for="url">@lang('Url del proyecto')</label>
    <br><input type="text" class="form-control border-0 bg-light shadow-sm" name="url" id="url" value="{{  old('url', $project->url) }}">
</div>
<div class="form-group">
    <label for="description">@lang('Descripción del proyecto')</label>
    <br><textarea class="form-control border-0 bg-light shadow-sm" name="description" id="description">{{ old('description', $project->description) }}</textarea>
</div>
<button class="btn btn-primary btn-lg btn-block">{{ $btnText }}</button>
<a class="btn btn-link btn-block" href="{{ route('projects.index') }}">@lang('Cancelar')</a>
