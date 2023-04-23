<x-layout>
    <div class="container mt-3">
        <x-alert-message/>
        <div class="row row-cols-3">
            <div class="col-12 col-md-4">
                <div class="card-container d-flex flex-column align-items-center">
                    <div class="profile-picture-thumbnail d-flex justify-content-center">
                        @if (isset($user->profile_picture_filename))
                            <img src="{{asset('storage/profile_pics/'.$user->id."/".$user->profile_picture_filename)}}"/>
                        @endif
                    </div>
                    <h2 class="card-title mt-3 text-center">{{$user->name}}</h2>
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
            <div class="col-12 col-md-8">
                <div class="card-container d-flex flex-column align-items-center">
                    <div class="card-subheading mb-3">Basic Information</div>
                    <div class="row w-100">
                        <div class="col-6 col-lg-4">
                            <h6 class="card-info-heading">Date of Birth</h6>
                            <h5 class="card-info-content">{{$user->date_of_birth}}</h5>
                        </div>
                        <div class="col-6 col-lg-4">
                            <h6 class="card-info-heading">Phone Number</h6>
                            <h5 class="card-info-content">{{$user->phone_number}}</h5>
                        </div>
                        <div class="col-6 col-lg-4">
                            <h6 class="card-info-heading">Email Address</h6>
                            <h5 class="card-info-content">{{$user->email}}</h5>
                        </div>
                        <div class="col-6 col-lg-4">
                            <h6 class="card-info-heading">Industry</h6>
                            <h5 class="card-info-content">{{$user->industry}}</h5>
                        </div>
                    </div>
                    <div class="d-flex w-100 gap-2">
                        @if($user->resume_filename)
                        <a href="{{route('assets',[$user->id,$user->resume_filename])}}" class="btn btn-success">Download Resume</a>
                        @endif
                        <a href="{{route('edit_profile')}}" class="btn btn-info">Update Profile</a>
                    </div>
                </div>
                @if ($user->resume_filename)
                <div class="card-container d-flex flex-column align-items-center mt-4">
                    <div class="card-subheading mb-3">Uploaded Resume</div>
                    <embed src="{{route('assets',[$user->id,$user->resume_filename])}}" width="100%" height="400px" />
                </div>    
                @endif
                
            </div>
        </div>
    </div>
</x-layout>