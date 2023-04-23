@props(['name'])
<div class="modal" id="modal-export"  tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Export {{$name}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>The selected <span class="leads_ids"></span> {{$name}} will be exported.</span></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <form action="{{$name}}/listview/export" method="POST" id="form-export-leads">
          @csrf
          @method('POST')
          <input type="hidden" name="selected_leads" required/>
          <button type="submit" class="btn btn-info">Export {{$name}}</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  