@props(['rentals'])
<form action="{{route('deal_create')}}" method="POST" class="deal_creator_group mt-3 d-none" autocomplete="off">
    @csrf
    <h6 class="text-center">Enter Deal Details</h6>
    <input type="hidden" name='lead_id' value="0"/>         
    <div class="input-group input-group-sm mt-2">
        <span class="input-group-text" id="basic-addon1">Rentals</span>
        <select name='rental' class="form-control" required>
            @foreach ($rentals as $item)
                <option value='{{$item->id}}'>{{$item->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="input-group input-group-sm mt-2">
        <span class="input-group-text mt-0">Applicant Name</span>
        <input type="text" name='deal_name' placeholder='Deal Name' class="form-control" required/>         
    </div>
    <div class="input-group input-group-sm mt-2">
        <span class="input-group-text" for="registered_no">Registered Phone No</span>
        <input type="text" name='registered_no' placeholder='Registered Phone Number' class="form-control" required/>         
    </div>
    <div class="input-group input-group-sm mt-2">
    <span class="input-group-text">Address</span>
    <input type="text" name='address' placeholder='Address' class="form-control" required/>         
    </div>
    <div class="input-group input-group-sm mt-2">
        <span class="input-group-text">Area Name</span>
        <input type="text" name='area_name' placeholder='Area Name' class="form-control" required/>         
    </div>
    <div class="input-group input-group-sm mt-2">
        <span class="input-group-text">EID Number</span>
        <input type="text" name='eid_no' placeholder='EID Number' class="form-control" required/>         
    </div>
    <div class="input-group input-group-sm mt-2">
        <span class="input-group-text">Google Map Link</span>
        <input type="text" name='gm_link' placeholder='Google Map Link' class="form-control"/>         
    </div>
    <div class="input-group input-group-sm mt-2">
        <span class="input-group-text">Appointment Start</span>
        <input type="datetime-local" name='pa_from_datetime' placeholder='Appointment Start Date' class="form-control" required/>         
    </div>
    <div class="input-group input-group-sm mt-2">
        <span class="input-group-text">Appointment End</span>
        <input type="datetime-local" name='pa_to_datetime' placeholder='Appointment End Date' class="form-control" required/>         
    </div>
    <div class="input-group input-group-sm mt-2">
        <span class="input-group-text">Name Change</span>
        <select name="name_change" class="form-control" required>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
            <option value="New">New</option>
        </select>
    </div>
    <div class="input-group input-group-sm mt-2">
        <span class="input-group-text">Call Notes</span>
        <input type="text" name='call_notes' placeholder='Write Summary' class="form-control"/>         
    </div>
    <button type="submit" name="submit" value="submit" class="btn btn-primary me-0 mt-3">Create A New Deal</button>
</form>