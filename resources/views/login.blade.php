<x-guest-layout>
    <div class="container-fluid">
        <div class="row vh-100">
            <div class="col-12 col-md-6 banner login-banner d-flex align-items-center p-5">
                <div class="banner-overlay"></div>
                <div class="banner-content">
                    <h2 class="h2">Your Bridge to a Brighter Career. Connect with Our Job Consultancy</h2>
                    <p class="banner-caption">Looking for a bridge to a brighter career? Connect with our job consultancy! We bridge the gap between job seekers and job opportunities, providing personalized career support that helps you land the perfect job. With our guidance, you can confidently navigate the competitive job market and achieve your career aspirations.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 align-items-center d-flex justify-content-center">
                <div class="py-5 px-3 d-flex flex-column justify-content-center">
                    <h2 class="form-title text-center font-bold mb-3">Candidate Login</h2>
                    <x-alert-message/>
                    <form method="POST" action="/authenticate" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-floating mt-2">
                                    <input type="text" name='email' placeholder='Email Address' value="{{old('email')}}" class="form-control" required/>         
                                    <label>Email<span class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mt-2">
                                    <input type="password" name='password' placeholder='Enter A Password' class="form-control" required/>         
                                    <label>Password<span class="text-danger">*</span></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex mt-2">
                            <button type="submit" value="submit" class="btn btn-primary mt-2">Log in</button>
                        </div>
                    </form>
                    <div class="col-12 d-flex justify-content-center mt-5">
                        <p class="text-dark">Do not have an account? <a href="/register" class="link-dark">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>