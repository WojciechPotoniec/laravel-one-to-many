@extends('layouts.app')

@section('content')
<section>
  @if(session()->has('message'))
    <div class="alert alert-success">{{session()->get('message')}}</div>
  @endif
  <div class="d-flex justify-content-between align-items-center py-4">
    <h1>Projects</h1>
    <a href="{{route('admin.projects.create')}}" class="btn btn-danger">Create new post</a>
  </div>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Title</th>
        <th scope="col">Slug</th>
        <th scope="col">Created At</th>
        <th scope="col">Update At</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($projects as $project)
      <tr>
      <td>{{$project->id}}</td>
      <td>{{$project->title}}</td>
      <td>{{$project->slug}}</td>
      <td>{{$project->created_at}}</td>
      <td>{{$project->updated_at}}</td>
      <td>
        <a href="{{route('admin.projects.show', $project->slug)}}" title="Show" class="text-black px-2"><i
          class="bi bi-eye"></i></i></a>
        <a href="{{route('admin.projects.edit', $project->slug)}}" title="Edit" class="text-black px-2"><i
          class="bi bi-pencil-fill"></i></a>
        <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST" class="d-inline-block">
        @csrf
        @method('DELETE')
        <button type="submit" class="delete-button border-0 bg-transparent" data-item-title="{{ $project->title }}">
          <i class="bi bi-trash3-fill"></i>
        </button>
        </form>
      </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</section>
{{ $projects->links('vendor.pagination.bootstrap-5') }}
@include('partials.modal-delete')
@endsection