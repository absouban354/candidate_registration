<div class="modal" id="update-responsible-modal"  tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Do you want to assign leads to <span class="span-responsible-person"></span></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>The selected leads <span class="leads_ids"></span> be assigned to <span class="span-responsible-person"></span></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <form action="leads/update_responsible" method="POST" id="update-responsible-form">
          @csrf
          @method('PUT')
          <input type="hidden" name="selected_leads" required/>
          <input type="hidden" name="update_responsible_person" required/>
          <button type="submit" class="btn btn-warning">Re assign To <span class="span-responsible-person"></span></button>
          </form>
        </div>
      </div>
    </div>
  </div>
  