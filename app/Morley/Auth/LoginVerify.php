<?php 

namespace App\Morley\Auth;
use Illuminate\Http\Request;
use Auth;
use App\User;

class LoginVerify{
	private $request;

	public function __construct(Request $request){
		$this->request = $request;
	}

	public function log_me(){
		

		if(Auth::attempt(['id'=> $this->request['student_id'], 'password'=> $this->request['password']])){
			if(Auth::user()->status_id != 1){
				return 'Account is Disabled';
			}

			if(Auth::user()->role_id == 1){
				return redirect()->route('admin_main');
			}else if(Auth::user()->role_id == 2){
				return redirect()->route('student_main');
			}
		}else{
			return redirect()->back()->with('err', 'Invalid Student I.D and Password');
		}
	}
}