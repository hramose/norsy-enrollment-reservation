<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Subject;
use App\Inquiry;
use App\StudentSubject;


use App\Http\Requests\student\addinquiry;
use App\Morley\Student\AddInquiryVerify;
class StudentController extends Controller
{
    
    public function student_main(){
    	$first = Subject::where('student_year',1)->where('status_id',1)->get();
        
        
       

    	return view('student.list.main', compact('first'));
    }

    public function student_main_second(){
    	$second = Subject::where('student_year',2)->where('status_id',1)->get();
    	return view('student.list.second', compact('second'));
    }

    public function student_main_third(){
    	$third = Subject::where('student_year',3)->where('status_id',1)->get();
    	return view('student.list.third', compact('third'));
    }

    public function student_main_fourth(){
    	 $fourth = Subject::where('student_year',4)->where('status_id',1)->get();
    	 return view('student.list.fourth', compact('fourth'));
    }

    public function student_logout(){
    	Auth::logout();
    	return redirect()->route('login');
    }

    public function student_activity(){

        $activity = StudentSubject::where('student_id', Auth::id())->get();
    	return view('student.activity.activity', compact('activity'));
    }

    public function student_inquiries(){
         $inquiry = Inquiry::where('student_id', Auth::id())->get();
    	return view('student.inquiry.inquiry', compact('inquiry'));
    }

    public function student_reservation($id){
    	$find = Subject::findOrFail($id);
    	return view('student.list.view_subject',compact('find'));
    }

    public function student_inquire_now(){
       
        return view('student.inquiry.create');
    }

    public function student_inquiry_check(addinquiry $check, AddInquiryVerify $verify){
        return $verify->inquiryCheck();
    }

    public function studnet_reserve_me_now($id){
        $check = StudentSubject::where('student_id', Auth::id())->where('subject_id', $id)->first();
        if($check){
            return redirect()->back()->with('check', 'You have already reserve this subject.');
        }

       $reserve = new StudentSubject;
       $reserve->student_id  = Auth::id();
       $reserve->subject_id = $id;
       $reserve->status_id = 1;
       $reserve->save();

       return redirect()->back()->with('ok', 'You have resever for this subject successfully!');
    }
}
