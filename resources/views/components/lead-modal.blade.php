@props(['status','shorthands','rentals'])
<div class="modal fade" id="leadModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Update Lead Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body d-flex flex-column">
            <div class="button-container d-flex flex-row-reverse">
                <button class="btn btn-success justify-content-end" id="create-deal-btn">Create A New Deal</button>
                <button class="btn btn-warning justify-content-end d-none" id="open-lead-group-btn">Update Leads</button>
            </div>
            <form action='' method="POST" id="lead-form" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="input-group input-group-sm mt-2">
                    <span class="input-group-text" id="basic-addon1">Status</span>
                    <select name='status' class="form-control status-input">
                        @foreach ($status as $item)
                        <option value='{{$item->id}}'>{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group input-group-sm mt-2 appointment-date-time-container d-none">
                    <span class="input-group-text" id="basic-addon1">Next Meeting</span>
                    <input type="datetime-local" name='next_meeting_datetime' placeholder='Mention the time at which you can contact the customer' class="form-control" />
                </div>
                @error('next_meeting_datetime')
                    <p class="text-sm text-red-500">{{$message}}</p>
                @enderror
                <div class="input-group input-group-sm mt-2">
                    <span class="input-group-text" id="basic-addon1">Shorthand</span>
                    <select name='shorthand_note' class="form-control">
                        @foreach ($shorthands as $item)
                            <option value='{{$item->id}}'>{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group input-group-sm mt-2">
                    <span class="input-group-text" id="basic-addon1">Summary</span>
                    <input type="text" name='call_notes' placeholder='Eg: Cm not responding' class="form-control" required/>
                </div>
                @error('call_notes')
                    <p class="text-sm text-red-500">{{$message}}</p>
                @enderror
                <button type="submit" name="submit" value="submit" class="btn btn-primary me-0 mt-3">Update Details</button>
            </form>
            <x-deal-creator-group :rentals="$rentals"/>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>
  