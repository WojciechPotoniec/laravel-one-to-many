@extends('layouts.app')
@section('name', $type->name)

@section('content')
<section>
    <div class="d-flex justify-content-between align-items-center py-4">
        <h1>{{$type->name}}</h1>
        <div>
            <a href="{{route('admin.types.edit', $type->slug)}}" class="btn btn-secondary">Edit</a>
            <form action="{{route('admin.types.destroy', $type->slug)}}" method="POST" class="d-inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-button btn btn-danger" data-item-name="{{ $type->name }}">
                    Delete Post</i>
                </button>
            </form>
        </div>
    </div>
</section>
@include('partials.modal-delete')
@endsection