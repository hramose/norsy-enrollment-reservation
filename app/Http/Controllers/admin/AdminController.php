<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Requiresite;
use App\Subject;
use App\Inquiry;
use App\StudentSubject;
use App\User;

use App\Http\Requests\admin\addsubject;

use App\Morley\Admin\AddSubjectVerify;

class AdminController extends Controller
{
	public function __construct(){
		$this->middleware('admincheck');
	}
    
    public function admin_main(){
        $subject = Subject::where('status_id',1)->count();
        $student = User::where('status_id',1)->where('role_id',2)->count();
        $inquiry = Inquiry::count();
        $reserve = StudentSubject::where('status_id',1)->count();
    	return view('admin.list.main', compact('subject','student','inquiry','reserve'));
    }

    public function admin_logout(){
    	Auth::logout();
    	return redirect()->route('login');
    }

    public function admin_subject(){
        $subjects = Subject::where('status_id',1)->get();
        return view('admin.subject.subject', compact('subjects'));
    }

    public function admin_subject_create(){
        return view('admin.subject.create');
    }

    public function admin_create_check(addsubject $check, AddSubjectVerify $verify){
        return $verify->subjectverify();
    }

    public function admin_inquiry(){
        $inquiry = Inquiry::paginate(10);
        return view('admin.inquiry.inquiry', compact('inquiry'));
    }

    public function admin_inquiry_view($id){
        $find = Inquiry::findOrFail($id);
        $update = Inquiry::where('id', $id)->update(['status_id'=> 1]);
        if($update){
            return view('admin.inquiry.view', compact('find'));
        }

        
    }

    public function admin_reserve(){
        $first = Subject::where('status_id',1)->where('student_year',1)->paginate(12);
        return view('admin.reserve.reserve', compact('first'));
    }

    public function admin_reserve_second(){
        $second = Subject::where('status_id',1)->where('student_year',2)->paginate(12);
        return view('admin.reserve.second', compact('second'));

    }

    public function admin_reserve_third(){
        $third = Subject::where('status_id',1)->where('student_year',3)->paginate(12);
        return view('admin.reserve.third', compact('third'));
    }

    public function admin_reserve_fourth(){
        $fourth = Subject::where('status_id',1)->where('student_year',4)->paginate(12);
        return view('admin.reserve.fourth', compact('fourth'));
    }

    public function admin_view_list($id){
        $find = Subject::findOrFail($id);
        $students = StudentSubject::where('subject_id', $id)->where('status_id',1)->get();
        return view('admin.reserve.view', compact('find', 'students'));
    }

    public function admin_students(){
        return view('admin.student.list');
    }

    public function admin_students_create(){

    }

    public function admin_students_upload(){
        
    }


}
