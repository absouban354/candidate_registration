<x-layout>
    <div class="container-fluid">
        <x-alert-message/>
        <div class="row vh-100">
            <div class="col-12 col-md-4 profile-update-banner pt-3">
                <div class="card-container d-flex flex-column align-items-center">
                    <div class="profile-picture-thumbnail">
                        <img src="{{asset('storage/profile_pics/'.$user->id."/".$user->profile_picture_filename)}}" class="w-100"/>
                    </div>
                    <h2 class="card-title mt-3">{{$user->name}}</h2>
                    <h3 class="card-subtitle">{{$user->place}}</h3>
                    <p class="card-paragraph mt-4">{{$user->experience_details}}</p>
                    @if ($user->skills != "")
                        <h4 class="card-subheading mt-3">Skills</h4>
                        <div class="badge-container">
                        @foreach(explode(',', $user->skills) as $skill) 
                            <span class="green-badge">{{$skill}}</span>
                        @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-8 mt-3 d-flex flex-column">
                <div class="card-container p-4">
                    <h2 class="form-title h4 mt-2">Update your profile</h2>
                    <form action="{{route('update_profile')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-floating mt-2" id="floatingInputGrid">
                                    <input type="text" name='name' placeholder='Full Name' value="{{$user->name}}" class="form-control" value="test name" required/>         
                                    <label for="floatingInputGrid">Full Name<span class="text-danger">*</span></label>
                                </div>
                                @if($errors->has('name'))
                                    <div class="text-danger">{{$errors->first('name')}}</div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mt-2">
                                    <input type="date" name='date_of_birth' placeholder='Date of Birth' value="{{$user->date_of_birth}}" class="form-control" required/>
                                    <label>Date of Birth<span class="text-danger">*</span></label>
                                </div>
                                @if($errors->has('date_of_birth'))
                                    <div class="text-danger">{{$errors->first('date_of_birth')}}</div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mt-2">
                                    <input type="text" name='email' placeholder='Email Address' value="{{$user->email}}" class="form-control" required/>         
                                    <label>Email<span class="text-danger">*</span></label>
                                </div>
                                @if($errors->has('email'))
                                    <div class="text-danger">{{$errors->first('email')}}</div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mt-2">
                                    <input type="text" name='phone_number' placeholder='Phone Number' value="{{$user->phone_number}}" class="form-control" required/>         
                                    <label>Phone Number<span class="text-danger">*</span></label>
                                </div>
                                <small id="skillHelpText" class="form-text text-muted">
                                    Enter phone number with country code without spaces
                                </small>
                                @if($errors->has('phone_number'))
                                    <div class="text-danger">{{$errors->first('phone_number')}}</div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mt-2">
                                    <input type="text" name='place' placeholder='Place' value="{{$user->place}}" class="form-control"/>         
                                    <label>Place</label>
                                </div>
                                @if($errors->has('place'))
                                    <div class="text-danger">{{$errors->first('place')}}</div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mt-2">
                                    <input type="text" name='industry' placeholder='industry' value="{{$user->industry}}" class="form-control"/>         
                                    <label>Industry</label>
                                </div>
                                @if($errors->has('industry'))
                                    <div class="text-danger">{{$errors->first('industry')}}</div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mt-2">
                                    <input type="text" name='skills' placeholder='Enter your skills seperated by commas' value="{{$user->skills}}" class="form-control"/>         
                                    <label>Skills</label>
                                </div>
                                <small id="skillHelpText" class="form-text text-muted">
                                    Seperate your skills with a comma
                                </small>
                                @if($errors->has('skills'))
                                    <div class="text-danger">{{$errors->first('skills')}}</div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mt-2">
                                    <textarea name='experience_details' placeholder='Enter your experience in detail' class="form-control">{{$user->experience_details}}</textarea>
                                    <label>Experience Details</label>
                                </div>
                                @if($errors->has('experience_details'))
                                    <div class="text-danger">{{$errors->first('experience_details')}}</div>
                                @endif                            
                            </div>
                            <div class="col-md-6">
                                <button type="submit" name="submit" class="btn btn-success mt-3">Update Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-container p-4 mt-3">
                    <h2 class="form-title h4 mt-2">Change Password</h2>
                    <form action="{{route('change_password')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="form-floating mt-2">
                                    <input type="password" name='current_password' placeholder='Enter the current password' class="form-control" required/>         
                                    <label>Current Password<span class="text-danger">*</span></label>
                                </div>
                                @if($errors->has('current_password'))
                                    <div class="text-danger">{{$errors->first('password')}}</div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mt-2">
                                    <input type="password" name='new_password' placeholder='Enter A Password' class="form-control" required/>         
                                    <label>New Password<span class="text-danger">*</span></label>
                                </div>
                                @if($errors->has('new_password'))
                                    <div class="text-danger">{{$errors->first('password')}}</div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mt-2">
                                    <input type="password" name='new_password_confirmation' placeholder='Re Enter the password' class="form-control" required/>         
                                    <label>Confirm Password<span class="text-danger">*</span></label>
                                </div>
                                @if($errors->has('new_password_confirmation'))
                                    <div class="text-danger">{{$errors->first('password_confirmation')}}</div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <button type="submit" name="submit" class="btn btn-success mt-3">Change Password</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-container p-4 mt-3">
                    <h2 class="form-title h4 mt-2">Update Profile Picture</h2>
                    <form action="{{route('upload_profile_picture')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-floating mt-2">
                                    <input type="file" name='profile_picture' class="form-control" required/>
                                    <label>Profile Picture<span class="text-danger">*</span></label>
                                </div>
                                @if($errors->has('profile_picture'))
                                    <div class="text-danger">{{$errors->first('profile_picture')}}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" name="submit" class="btn btn-success mt-3">Upload Profile Picture</button>
                        </div>
                    </form>
                </div>
                <div class="card-container p-4 mt-3">
                    <h2 class="form-title h4 mt-2">Upload Resume</h2>
                    <form action="{{route('upload_resume')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-floating mt-2">
                                    <input type="file" name='resume' class="form-control" required/>
                                    <label>Resume<span class="text-danger">*</span></label>
                                </div>
                                @if($errors->has('resume'))
                                    <div class="text-danger">{{$errors->first('resume')}}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" name="submit" class="btn btn-success mt-3">Upload Resume</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>