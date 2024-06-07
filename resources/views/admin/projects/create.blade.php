@extends('layouts.app')

@section('title', 'Create Project')

@section('content')
<section>
    <h2>Create a new project</h2>
    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                value="{{ old('title') }}" minlength="3" maxlength="200" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div id="titleHelp" class="form-text text-white">Inserire minimo 3 caratteri e massimo 200</div>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror"
            id="uploadImage" name="image" value="{{ old('image') }}" maxlength="255">
            <img id="uploadPreview" width="100" src="/img/placeholder.png">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" required>
                {{ old('content') }}
              </textarea>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
                <p>Select Type:</p>
                @foreach ($types as $type)
                    <div>
                        <input type="checkbox" name="types[]" value="{{ $type->id }}" class="form-check-input"
                            {{ in_array($type->id, old('types', [])) ? 'checked' : '' }}>
                        <label for="" class="form-check-label">{{ $type->name }}</label>
                    </div>
                @endforeach
                @error('types')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-danger">Create</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
    </form>
</section>
@include('partials.editor')
@endsection