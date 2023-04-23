<x-layout>
    <div class="container-fluid mt-2" id="lead-page">
        <div class="row justify-content-center">
            <x-alert-message />
            <div class="col-12 col-md-4 col-lg-4 mt-3  data-wrapper">
                <div class="card d-flex p-2">
                    <h2 class="text-center h4 mt-2">Change Password</h2>
                    <form action="/user/update_password" method="POST" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="deal_creator_group mt-3">
                            <div class="input-group input-group-sm mt-2">
                                <span class="input-group-text">Current Password</span>
                                <input type="password" name='password_current' placeholder='Enter Your Current Password' class="form-control"/>         
                            </div>
                            <div class="input-group input-group-sm mt-2">
                                <span class="input-group-text">Change Password</span>
                                <input type="password" name='password' placeholder='Enter A New Password' class="form-control"/>         
                            </div>
                            <small>Password length Should have minimum 8 characters with atleast one UPPERCASE, one lowercase, one symbol and letters</small>
                            <div class="input-group input-group-sm mt-2">
                                <span class="input-group-text">Confirm Password</span>
                                <input type="password" name='password_confirmation' placeholder='Re Enter the password' class="form-control"/>         
                            </div>
                            <button type="submit" name="submit" class="btn btn-success btn-sm mt-3">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>