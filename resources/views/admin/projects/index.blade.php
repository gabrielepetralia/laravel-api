@extends('layouts.admin')

@section('title')
  | Projects
@endsection

@section('content')
<div class="container">
  <div class="d-flex justify-content-between my-4">
    <h2 class="fs-4 mb-0">Projects</h2>
    <div>
      <a href="{{ route('admin.projects.create') }}" title="Add new Project" class="btn btn-success"><i class="fa-solid fa-plus"></i></a>
    </div>
  </div>

  @if (session('deleted'))
    <div class="alert alert-success" role="alert">
        {{ session('deleted') }}
    </div>
  @endif

  <div class="table-wrapper rounded-3 overflow-hidden mb-4">

    <table class="table table-dark table-hover text-center m-0 table-index">
      <thead>
        <tr class="">
          <th scope="col">
            <a class="text-white" href="{{ route('admin.orderby', ['direction' => $direction ]) }}">ID
              @if($direction === 'asc')
                <i class="fa-solid fa-arrow-down"></i>
              @else
                <i class="fa-solid fa-arrow-up"></i>
              @endif
            </a>
          </th>
          <th scope="col" class="text-start">Name</th>
          <th scope="col">Type</th>
          <th scope="col" class="text-start">Technologies</th>
          <th scope="col">Is Finished</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($projects as $project)
        <tr>
          <th scope="row">{{ $project->id }}</th>
          <td class="text-start">{{ $project->name }}</td>

          <td class="text-danger">
            @if(!empty($project->type->name))
              <span class="badge bg-danger">{{ $project->type->name }}</span>
            @else
              Type not available
            @endif
          </td>

          <td class="text-danger text-start">
            @forelse ($project->technologies as $technology)
              <img class="tech-logo" src="{{ '/img/tech_logos/' . $technology->slug . '.png' }}" alt="{{ $technology->name }}">
            @empty
              Technologies not available
            @endforelse
          </td>

          <td class="fs-5 {{ $project->is_finished ? 'text-success' : 'text-danger' }}">
            {!! $project->is_finished ? '<i class="fa-solid fa-check"></i>' : '<i class="fa-solid fa-xmark"></i>' !!}
          </td>

          <td>
            <a href="{{ route('admin.projects.show', $project) }}" title="Show" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
            <a href="{{ route('admin.projects.edit', $project) }}" title="Edit" class="btn btn-warning text-white"><i class="fa-solid fa-pencil"></i></a>
            @include('admin.partials.delete_modal', [
              'id' => $project->id,
              'name' => $project->name,
              'route' => route('admin.projects.destroy', $project),
              'model' => 'project'
            ])
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>

  </div>


  <div>
    {{ $projects->links() }}
  </div>

</div>
@endsection
