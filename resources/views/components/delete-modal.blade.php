<div class="modal" id="delete-modal"  tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Do you want to delete this item</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>The item will be deleted permanently and cannot be reversed. Do you still want to delete the item?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <form action="" method="POST" id="delete-form">
            @csrf
            @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete Item</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  