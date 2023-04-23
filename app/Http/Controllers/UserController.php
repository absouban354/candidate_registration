<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    //Show Register Page
    public function index(){
        return view('index',['user'=>auth()->user()]);
    }
    public function edit(){
        return view('edit',['user'=>auth()->user()]);
    }
    public function register(){
        return view('register');
    }
    public function update_profile(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $formFields = $request->validate([
            'name'=>'required|regex:/^[\pL\s\-]+$/u',
            'email'=>'required|email|unique:users,email,'.$user->id,
            'date_of_birth'=>'required|date|before:'.now()->subYears(18)->toDateString(),
            'skills'=>'nullable|max:512',
            'experience_details'=>'nullable|max:1000',
            'place'=>'nullable|max:40',
            'industry'=>'nullable|max:40',
            'phone_number'=>'required|numeric|digits_between:7,15',
        ]);
       
        $user->update($formFields);
        return redirect('/')->with('message','Profile Updated Successfully');
    }
    public function change_password(Request $request)
    {
        
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);
        $validator = Validator::make([], []);
        if(!Hash::check($request->current_password, auth()->user()->password)){
            $validator->errors()->add('current_password', 'Incorrect Password.');
            return back()->withErrors($validator);
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect('/')->with("message", "Password changed successfully!");
    }
    public function upload_profile_picture(Request $request)
    {
        $validator = Validator::make([], []);
        if($request->hasFile('profile_picture')){
            $allowedFileExt = ['jpg','jpeg','png'];
            $file = $request->file('profile_picture');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $profile_picture_check = in_array($extension,$allowedFileExt, TRUE);
            if(!$profile_picture_check)
            {
                $validator->errors()->add('profile_picture', 'Please select either jpg or png while uploading');
                return back()->withErrors($validator);
            }
        }else{
            $validator->errors()->add('profile_picture', 'Please select a file before submitting');
            return back()->withErrors($validator);
        }
        $user=User::find(auth()->user()->id);
        $profile_picture_file = $request->file('profile_picture');
        $profile_picture_filename = $profile_picture_file->store('public/profile_pics/'.$user->id);
        $user->profile_picture_filename=pathinfo($profile_picture_filename,PATHINFO_BASENAME);
        $user->save();
        return redirect('/')->with('message','Successfully uploaded the new profile picture');
    }
    public function upload_resume(Request $request)
    {
        $validator = Validator::make([], []);
        if($request->hasFile('resume')){
            $allowedFileExt = ['pdf','doc','docx'];
            $file = $request->file('resume');
            
            $extension = $file->getClientOriginalExtension();
            $resume_check = in_array($extension,$allowedFileExt, TRUE);
            if(!$resume_check)
            {
                $validator->errors()->add('resume', 'Only pdf, doc, docx are supported for the resume.');
            }
        }else{
            $validator->errors()->add('resume', 'Please select a file before submitting');
            return back()->withErrors($validator);
        }
        $user=User::find(auth()->user()->id);
        $resume_file = $request->file('resume');
        $resume_filename = sanitize_filename(pathinfo($resume_file->getClientOriginalName(),PATHINFO_FILENAME)).".".$resume_file->getClientOriginalExtension();
        //$profile_picture_filename = sanitize_filename(pathinfo($profile_picture_file->getClientOriginalName(),PATHINFO_FILENAME)).".".$profile_picture_file->getClientOriginalExtension();
        $resume_filename = $resume_file->storeAs('resumes/'.$user->id,$resume_filename);
        //Storage::disk('local')->put('resumes/' . $user->id."/".$resume_filename, $request->file('resume'));
        //Storage::disk('local')->put('public/profile_pics/' . $user->id."/".$profile_picture_filename, $request->file('profile_picture'));
        $user->resume_filename=pathinfo($resume_filename,PATHINFO_BASENAME);
        $user->save();
        return redirect('/')->with('message','Successfully uploaded the latest resume');
    }
    //authenticate if the user for login
    public function authenticate(Request $request){
        $formFields=$request->validate([
            'email'=>['required','email'],
            'password'=>'required'
        ]);
        if(auth()->attempt($formFields))
        {
            $request->session()->regenerate();
            return redirect('/')->with('message','Welcome to your account');
        }
        return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required|regex:/^[\pL\s\-]+$/u',
            'email'=>'required|email|unique:users',
            'date_of_birth'=>'required|date|before:'.now()->subYears(18)->toDateString(),
            'skills'=>'nullable|max:512',
            'experience_details'=>'nullable|max:1000',
            'place'=>'nullable|max:40',
            'industry'=>'nullable|max:40',
            'phone_number'=>'required|numeric|digits_between:7,15',
            'password'=>'required|min:8',
            'password_confirmation'=>'required|same:password',
        ]);
        $profile_picture_check=true;
        $resume_check=true;
        $validator = Validator::make([], []);
        if($request->hasFile('profile_picture')){
            $allowedFileExt = ['jpg','jpeg','png'];
            $file = $request->file('profile_picture');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $profile_picture_check = in_array($extension,$allowedFileExt, TRUE);
            if(!$profile_picture_check)
            {
                $validator->errors()->add('profile_picture', 'Please select either jpg or png while uploading');
            }
        }
        if($request->hasFile('resume')){
            $allowedFileExt = ['pdf','doc','docx'];
            $file = $request->file('resume');
            
            $extension = $file->getClientOriginalExtension();
            $resume_check = in_array($extension,$allowedFileExt, TRUE);
            if(!$resume_check)
            {
                $validator->errors()->add('resume', 'Only pdf, doc, docx are supported for the resume.');
            }
        }
        if($resume_check === TRUE && $profile_picture_check === TRUE)
        {
            $user=User::create([
                'name'=>$request->name,
                'date_of_birth'=>$request->date_of_birth,
                'email'=>$request->email,
                'place'=>$request->place,
                'phone_number'=>$request->phone_number,
                'industry'=>$request->industry,
                'skills'=>$request->skills,
                'experience_details'=>$request->experience_details,
                'password'=>Hash::make($request->password)
            ]);
            if($request->hasFile('resume')){
                $resume_file = $request->file('resume');
                $resume_filename = sanitize_filename(pathinfo($resume_file->getClientOriginalName(),PATHINFO_FILENAME)).".".$resume_file->getClientOriginalExtension();
                //$profile_picture_filename = sanitize_filename(pathinfo($profile_picture_file->getClientOriginalName(),PATHINFO_FILENAME)).".".$profile_picture_file->getClientOriginalExtension();
                $resume_filename = $resume_file->storeAs('resumes/'.$user->id,$resume_filename);
                $user->resume_filename=pathinfo($resume_filename,PATHINFO_BASENAME);
                $user->save();
            }
            if($request->hasFile('profile_picture'))
            {
                $profile_picture_file = $request->file('profile_picture');
           
                //Storage::disk('local')->put('resumes/' . $user->id."/".$resume_filename, $request->file('resume'));
                //Storage::disk('local')->put('public/profile_pics/' . $user->id."/".$profile_picture_filename, $request->file('profile_picture'));
               
                $profile_picture_filename = $profile_picture_file->store('public/profile_pics/'.$user->id);
                $user->profile_picture_filename=pathinfo($profile_picture_filename,PATHINFO_BASENAME);
                $user->save();
            }
            return redirect('/login')->with('message','Successfully registered your account. Login Now');
        }
        return back()->withErrors($validator);
    }
    //Logout User
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message',"You have logged out");
    }
}
