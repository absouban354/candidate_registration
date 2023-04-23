@props(['status','rentals'])
<div class="modal fade" id="dealModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Update Deal Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action='' method="POST" id="deal-form" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="input-group input-group-sm mt-2">
                    <span class="input-group-text" id="basic-addon1">Status</span>
                    <select name='status' class="form-control deal-status">
                        @foreach ($status as $item)
                        <option value='{{$item->id}}'>{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group input-group-sm mt-2 sr-generated-date-time-container d-none">
                    <span class="input-group-text" id="basic-addon1">SR Generated</span>
                    <input type="datetime-local" name='sr_gen_datetime' placeholder='Mention the time at which you can contact the customer' class="form-control" />
                </div>
                @error('sr_gen_datetime')
                    <p class="text-sm text-red-500">{{$message}}</p>
                @enderror
                <div class="input-group input-group-sm mt-2 installation-date-time-container d-none">
                    <span class="input-group-text" id="basic-addon1">Installation Datetime</span>
                    <input type="datetime-local" name='installation_datetime' placeholder='Mention the time at which you can contact the customer' class="form-control" />
                </div>
                @error('installation_datetime')
                    <p class="text-sm text-red-500">{{$message}}</p>
                @enderror
                <div class="input-group input-group-sm mt-2">
                    <span class="input-group-text" id="basic-addon1">Summary</span>
                    <input type="text" name='call_notes' placeholder='Eg: Cm not responding' class="form-control" required/>
                </div>
                @error('call_notes')
                    <p class="text-sm text-red-500">{{$message}}</p>
                @enderror
                <div class="input-group input-group-sm mt-2">
                    <span class="input-group-text" id="basic-addon1">SR Number</span>
                    <input type="text" name='sr_number' placeholder='SR Number' class="form-control"/>
                </div>
                @error('sr_number')
                    <p class="text-sm text-red-500">{{$message}}</p>
                @enderror
                <div class="input-group input-group-sm mt-2">
                    <span class="input-group-text" id="basic-addon1">Request ID</span>
                    <input type="text" name='request_id' placeholder='Request ID' class="form-control"/>
                </div>
                @error('request_id')
                    <p class="text-sm text-red-500">{{$message}}</p>
                @enderror
                <div class="input-group input-group-sm mt-2">
                    <span class="input-group-text" id="basic-addon1">Account Number</span>
                    <input type="text" name='account_number' placeholder='Account Number' class="form-control"/>
                </div>
                @error('account_number')
                    <p class="text-sm text-red-500">{{$message}}</p>
                @enderror
                <x-deal-details-group :rentals="$rentals"/>
                <button type="submit" name="submit" value="submit" class="btn btn-primary me-0 mt-3">Update Details</button>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>
  