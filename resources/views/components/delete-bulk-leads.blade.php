<div class="modal" id="delete-bulk-leads-modal"  tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Delete Leads</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>The selected leads <span class="leads_ids"></span> will be deleted permanently. We cannot reverse the operation.</span></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <form action="leads/delete_bulk_leads" method="POST" id="delete-bulk-leads-form">
          @csrf
          @method('DELETE')
          <input type="hidden" name="selected_leads" required/>
          <button type="submit" class="btn btn-danger">Delete Leads</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  