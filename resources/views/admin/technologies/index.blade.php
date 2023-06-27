@extends('layouts.admin')

@section('content')
  <div class="container">

    <h2 class="fs-4 my-4">Technologies</h2>

    @if (session('message'))
      <div class="alert alert-success" role="alert">
        <span>{{session('message')}}</span>
      </div>
    @endif

    <div class="table-wrapper rounded-3 overflow-hidden bg-dark mb-4 w-50">

      <form action="{{ route('admin.technologies.store') }}" method="POST" class="px-3 pt-3">
        @csrf
        <span class="form-label text-white fw-semibold">Add new Technology :</span>
        <div class="input-group mb-3 w-50 mt-2">
          <input
            type="text"
            class="form-control @error('name') is-invalid @enderror"
            name="name"
            placeholder="New Technology"
            value="{{ old('name') }}">

          <button class="btn btn-success" type="submit" title="Add new Technology"><i class="fa-solid fa-plus"></i></button>
        </div>
        @error('name')
            <p class="text-danger mt-2">{{ $message }}</p>
        @enderror
      </form>

      <table class="table table-dark table-hover text-center m-0 table-index">
        <thead>
          <tr>
            <th scope="col" class="text-start ps-4 w-25">Name</th>
            <th scope="col">Logo</th>
            <th scope="col">Projects Number</th>
            <th scope="col" class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($technologies as $technology)
          <tr>
            <th scope="row">
              <form action="{{ route('admin.technologies.update', $technology) }}" method="POST" id="{{ 'edit-form-' . $technology->id }}">
                @csrf
                @method('PUT')
                <input type="text" class="form-control border-0 bg-dark text-white" name="name" value="{{ $technology->name }}">
              </form>
            </th>
            <td id="{{ 'logo-' . $technology->id }}">
              <img
                class="tech-logo"
                src="{{ '/img/tech_logos/' . $technology->slug . '.png' }}"
                alt="{{ $technology->name }}"
                {{-- onerror="document.getElementById('{{ 'logo-' . $technology->id }}').innerHTML = '<span>{{ $technology->name }}</span>'" --}}
                >
            </td>
            <td>{{ count($technology->projects) }}</td>
            <td class="text-center">
              <button onclick="submitEditForm({{ $technology->id }})" class="btn btn-success text-white" title="Edit"><i class="fa-solid fa-floppy-disk"></i></button>
              @include('admin.partials.delete_modal', [
                'id' => $technology->id,
                'name' => $technology->name,
                'route' => route('admin.technologies.destroy', $technology),
                'model' => 'technology'
              ])
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  </div>
 +
  <script>
    function submitEditForm(id){
      const form = document.getElementById('edit-form-' + id);
      form.submit();
    }
  </script>
@endsection
