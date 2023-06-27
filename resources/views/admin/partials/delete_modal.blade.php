<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#{{ 'modal-' . $id }}" title="Delete">
  <i class="fa-solid fa-trash"></i>
</button>

<div class="modal" tabindex="-1" id="{{ 'modal-' . $id }}">
  <div class="modal-dialog">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h5 class="modal-title text-danger">Attention !</h5>
        <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></i></button>
      </div>
      <div class="modal-body text-start">
        <p class="text-white">Are you sure to delete the {{ $model }} : "<span class="text-danger">{{ $name }}</span>" ?</p>
      </div>
      <div class="modal-footer">
        <form
          action="{{ $route }}"
          method="POST"
          class="d-inline">
          @csrf

          @method('DELETE')

          <button type="submit" class="btn btn-danger" title="Delete"><i class="fa-solid fa-trash"></i></button>
        </form>
      </div>
    </div>
  </div>
</div>
