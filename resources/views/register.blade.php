<x-guest-layout>
    <div class="container-fluid">
        <div class="row vh-100">
            <div class="col-12 col-md-6 banner registration-banner d-flex align-items-center p-5">
                <div class="banner-overlay"></div>
                <div class="banner-content">
                    <h2 class="h2">Empowering You to Achieve Your Career Ambitions - Trust Our Job Consultancy</h2>
                    <p class="banner-caption">Trust us to empower you in achieving your career ambitions. Our job consultancy is committed to providing top-notch career services that equip you with the tools and resources you need to succeed. From career coaching and job matching to professional development and networking opportunities, we are your go-to partner in your quest for career excellence.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 mt-3 d-flex align-items-center">
                <div class="px-4 py-2">
                    <h2 class="form-title text-center h4 mt-2">Candidate Registration</h2>
                    <form action="{{route('store_user')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-floating mt-2" id="floatingInputGrid">
                                    <input type="text" name='name' placeholder='Full Name' value="{{old('name')}}" class="form-control" value="test name" required/>         
                                    <label for="floatingInputGrid">Full Name<span class="text-danger">*</span></label>
                                </div>
                                @if($errors->has('name'))
                                    <div class="text-danger">{{$errors->first('name')}}</div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mt-2">
                                    <input type="date" name='date_of_birth' placeholder='Date of Birth' value="{{old('date_of_birth')}}" class="form-control" required/>
                                    <label>Date of Birth<span class="text-danger">*</span></label>
                                </div>
                                <small id="skillHelpText" class="form-text text-muted">
                                    You must be above 18years old to register
                                </small>
                                @if($errors->has('date_of_birth'))
                                    <div class="text-danger">{{$errors->first('date_of_birth')}}</div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mt-2">
                                    <input type="text" name='email' placeholder='Email Address' value="{{old('email')}}" class="form-control" required/>         
                                    <label>Email<span class="text-danger">*</span></label>
                                </div>
                                @if($errors->has('email'))
                                    <div class="text-danger">{{$errors->first('email')}}</div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mt-2">
                                    <input type="number" name='phone_number' placeholder='Phone Number' value="{{old('phone_number')}}" class="form-control" required/>         
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
                                    <input type="text" name='place' placeholder='Place' value="{{old('place')}}" class="form-control"/>         
                                    <label>Place</label>
                                </div>
                                @if($errors->has('place'))
                                    <div class="text-danger">{{$errors->first('place')}}</div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mt-2">
                                    <input type="text" name='industry' placeholder='industry' value="{{old('industry')}}" class="form-control"/>         
                                    <label>Industry</label>
                                </div>
                                @if($errors->has('industry'))
                                    <div class="text-danger">{{$errors->first('industry')}}</div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mt-2">
                                    <input type="text" name='skills' placeholder='Enter your skills seperated by commas' value="{{old('skills')}}" class="form-control"/>         
                                    <label>Skills</label>
                                </div>
                                <small id="skillHelpText" class="form-text text-muted">
                                    Seperate each skills with a comma
                                </small>
                                @if($errors->has('skills'))
                                    <div class="text-danger">{{$errors->first('skills')}}</div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mt-2">
                                    <textarea name='experience_details' placeholder='Enter your experience in detail' class="form-control">{{old('experience_details')}}</textarea>
                                    <label>Experience Details</label>
                                </div>
                                @if($errors->has('experience_details'))
                                    <div class="text-danger">{{$errors->first('experience_details')}}</div>
                                @endif                            
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mt-2">
                                    <input type="password" name='password' placeholder='Enter A Password' class="form-control" required/>         
                                    <label>Password<span class="text-danger">*</span></label>
                                </div>
                                <small id="skillHelpText" class="form-text text-muted">
                                   Password should atleast be of 8 characters
                                </small>
                                @if($errors->has('password'))
                                    <div class="text-danger">{{$errors->first('password')}}</div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mt-2">
                                    <input type="password" name='password_confirmation' placeholder='Re Enter the password' class="form-control" required/>         
                                    <label>Confirm Password<span class="text-danger">*</span></label>
                                </div>
                                @if($errors->has('password_confirmation'))
                                    <div class="text-danger">{{$errors->first('password_confirmation')}}</div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mt-2">
                                    <input type="file" name='profile_picture' class="form-control"/>
                                    <label>Profile Picture</label>
                                </div>
                                <small id="skillHelpText" class="form-text text-muted">
                                    Only jpg and png are allowed
                                 </small>
                                @if($errors->has('profile_picture'))
                                    <div class="text-danger">{{$errors->first('profile_picture')}}</div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mt-2">
                                    <input type="file" name='resume' class="form-control"/>
                                    <label>Resume</label>
                                </div>
                                <small id="skillHelpText" class="form-text text-muted">
                                    Only pdf, doc, docx are allowed
                                 </small>
                                @if($errors->has('resume'))
                                    <div class="text-danger">{{$errors->first('resume')}}</div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <button type="submit" name="submit" class="btn btn-success mt-3">Create Account</button>
                            </div>
                        </div>
                    </form>
                    <div class="mt-4">
                        <p class="text-dark">Already have an account? <a href="/login" class="link-dark">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>