<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Member;
use App\MemberType;

use Illuminate\Http\Request;
use Redirect;
use Input;
use Session;
use Mail;
use Str;
use App\SubAttendee;

use App\ProgramChild;
use App\HotelBooking;
use App\Program;
use App\ProgramParent;
use App\MemberProgram;

class RegisterController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		Session::flush();
		return view('registration.main')
		->with('pagin', 'registration');
	}

	public function intro()
	{
		return view('registration.intro')
		->with('pagin', 'registration')
		->with('control', 2)
		->with('static', 3);
	}

	public function newRegister()
	{
		$mt = MemberType::all();
		return view('registration.new.registrationtype')
		->with('pagin', 'registration')
		->with('step', 'regtype')
		->with('member_types', $mt);
	}

	public function atendeeInformation(Request $r)
	{
		$try = Member::where('email',$r->email)->first();

		if($try != null)
		{
			return Redirect::to('register/new')->with('error', array('msg'=>'this email has been registered', 'type'=>'danger'));
			// $try;
		}
		else
		{
			$cost = MemberType::where('id', $r->member_type)->pluck('cost');

			Session::put('member_type', $r->member_type);
			Session::put('email', $r->email);
			Session::put('cost', $cost);
			Session::put('regstep', 'personal_data');

			return view('registration.new.personaldata')
			->with('pagin', 'registration')
			->with('step', 'personal_data');
		}
	}

	public function storeRegistration(Request $r)
	{
		$m = new Member;
		$m->email = $r->email;
		$m->member_type = $r->member_type;
		$m->title = $r->title;
		$m->first_name = $r->first_name;
		$m->family_name = $r->last_name;
		$m->gender = $r->gender;
		$m->job_title = $r->job_title;
		$m->organisation = $r->organisation;
		$m->department = $r->department;
		$m->address_line_1 = $r->address_line_1;
		$m->address_line_2 = $r->address_line_2;
		$m->zip = $r->zip;
		$m->city = $r->city;
		$m->country = $r->country;
		$m->phone = $r->phone;
		$m->fax = $r->fax;
		$m->mobile = $r->mobile;
		$m->cc_email = $r->cc_email;
		$m->passport_number = $r->passport_number;
		$m->dietary_request = $r->dietary_request;
		$m->dietary_request_other = $r->dietary_request_other;
		$m->key = str_random(8);

		try
		{
			if($m->save())
			{
				Session::put('uid', $m->id);
				Session::put('name', $r->title." ".$r->first_name." ".$r->last_name);
			}
			return Redirect::to('register/new/program/'.$r->id)->with('name', $r->title." ".$r->first_name." ".$r->family_name);
		}
		catch (Exception $e)
		{
			return Redirect::to('register/new')->with('err_message', 'registeration failed! please check again your data');
		}
	}
	public function updateRegistration(Request $r)
	{
		$m = Member::find(Session::get('uid'));
		$m->email = $r->email;
		$m->member_type = $r->member_type;
		$m->title = $r->title;
		$m->first_name = $r->first_name;
		$m->family_name = $r->last_name;
		$m->gender = $r->gender;
		$m->job_title = $r->job_title;
		$m->organisation = $r->organisation;
		$m->department = $r->department;
		$m->address_line_1 = $r->address_line_1;
		$m->address_line_2 = $r->address_line_2;
		$m->zip = $r->zip;
		$m->city = $r->city;
		$m->country = $r->country;
		$m->phone = $r->phone;
		$m->fax = $r->fax;
		$m->mobile = $r->mobile;
		$m->cc_email = $r->cc_email;
		$m->passport_number = $r->passport_number;
		$m->dietary_request = $r->dietary_request;
		$m->dietary_request_other = $r->dietary_request_other;
		$m->key = str_random(8);

		try
		{
			if($m->save())
			{
				Session::put('name', $r->title." ".$r->first_name." ".$r->last_name);
			}
			return Redirect::to('register/new/program/'.$r->id)->with('name', $r->title." ".$r->first_name." ".$r->family_name);
		}
		catch (Exception $e)
		{
			return Redirect::to('register/new')->with('err_message', 'registeration failed! please check again your data');
		}
	}
	public function program()
	{
		$p = Program::all();
		$p = ProgramParent::all();

		Session::put('regstep', 'programs');
		return view('registration.new.programs')
		->with('pagin', 'registration')
		->with('step', 'programs')
		->with('programs', $p);
	}
	public function storeProgram(Request $r)
	{
		$programs = ProgramChild::all();

		$dataflow = array('uid'=>$r->uid,'cost'=>$r->cost);

		if($r->program_2 == 1)
		{
			$mp = new MemberProgram;
			$mp->member_id =$r->uid;
			$mp->program_id="2";
			$mp->save();
		}
		if($r->program_4 == 1)
		{
			$mp = new MemberProgram;
			$mp->member_id =$r->uid;
			$mp->program_id="4";
			$mp->save();
		}
		return Redirect::to('register/new/subatendee');
	}
	public function hotel()
	{
		Session::put('regstep', 'hotel');
		$member = Member::find(Session::get('uid'))	;
		$mtype = MemberType::find($member->member_type);

		$cost = $mtype->cost;
		$dataflow = array('uid'=>Session::get('uid'),'cost'=>$cost);

		return view('registration.new.hotel')
		->with('pagin', 'registration')
		->with('step', 'hotel');
	}
	public function storeHotelReservation(Request $r)
	{
		// return Input::all();
		if ($r->hotel == 'none') {
			return Redirect::to('/register/new/payment');

		}
		else
		{
			$member = Member::find(Session::get('uid'));

			$booking = new HotelBooking;
			$booking->id = Session::get('uid');
			$booking->hotel_id = $r->hotel;
			$booking->rooms = $r->rooms;
			$booking->preference = $r->preference;
			$booking->check_in = $r->checkin;
			$booking->check_out = $r->checkout;

			try
			{
				$booking->save();
				Session::put('cost',$r->cost);
				return Redirect::to('/register/new/payment');
			}
			catch (Exception $e)
			{
				return Redirect::to('/register/new/hotel/'.Session::get('uid'));
			}
		}
	}
	public function subAtendee()
	{
		return view('registration.new.subatendee')
		->with('pagin', 'registration')
		->with('step', 'subatendee');
	}

	public function storeSubatendee(Request $r)
	{
		Session::put('cost', $r->cost);
		try
		{
			// return Input::all();
			// for($i = 0; $i < $r->countdata; $i++)
			// {
			// 		$s = new SubAttendee;
			// 		$s->parent_id = Session::get('id');
			// 		$s->name = Input::get('name_'.$i);
			// 		$s->email = Input::get('email_'.$i);
			// 		$s->save();
			// }
			if ($r->name_1 != "")
			{
				$i = 1;
				$s = new SubAttendee;
				$s->parent_id = Session::get('uid');
				$s->name = Input::get('name_'.$i);
				$s->email = Input::get('email_'.$i);
				$s->save();
				echo "1 saved";
			}
			if ($r->name_2 != "")
			{
				$i = 2;
				$s = new SubAttendee;
				$s->parent_id = Session::get('uid');
				$s->name = Input::get('name_'.$i);
				$s->email = Input::get('email_'.$i);
				$s->save();
				echo "2 saved";
			}
			if ($r->name_3 != "")
			{
				$i = 3;
				$s = new SubAttendee;
				$s->parent_id = Session::get('uid');
				$s->name = Input::get('name_'.$i);
				$s->email = Input::get('email_'.$i);
				$s->save();
				echo "2 saved";
			}
			if ($r->name_4 != "")
			{
				$i = 4;
				$s = new SubAttendee;
				$s->parent_id = Session::get('uid');
				$s->name = Input::get('name_'.$i);
				$s->email = Input::get('email_'.$i);
				$s->save();
				echo "2 saved";
			}
			if ($r->name_5 != "")
			{
				$i = 5;
				$s = new SubAttendee;
				$s->parent_id = Session::get('uid');
				$s->name = Input::get('name_'.$i);
				$s->email = Input::get('email_'.$i);
				$s->save();
				echo "2 saved";
			}
			return redirect(url('/register/new/hotel'));
		}
		catch (Exception $e)
		{
			return redirect('register/welcome')->with('message', 'error, please contact us for more information');
		}

	}
	public function payment()
	{
		return view('registration.new.payment')
		->with('pagin', 'registration')
		->with('step', 'payment');
	}

	public function success()
	{
		$recipient = Member::find(Session::get('uid'));

		if ($recipient->cc_email == "")
		{
			Mail::send('mail.registration_success', array('title'=>$recipient->title,'first_name'=>$recipient->first_name,'family_name'=>$recipient->family_name,'key'=>$recipient->key), function($message)
			{
				$recipient = Member::find(Session::get('uid'));
	        	$message->to($recipient->email, $recipient->first_name.' '.$recipient->family_name)
				// ->bcc('secretariatfasi@gmail.com')
				->subject('Confirmation 110th FAI Conference, Bali – Indonesia');
	    	});
		}
		else
		{
			Mail::send('mail.registration_success', array('title'=>$recipient->title,'first_name'=>$recipient->first_name,'family_name'=>$recipient->family_name,'key'=>$recipient->key), function($message)
			{
				$recipient = Member::find(Session::get('uid'));
	        	$message->to($recipient->email, $recipient->first_name.' '.$recipient->family_name)
				// ->bcc('secretariatfasi@gmail.com')
				->cc($recipient->cc_email,'CC Email')
				->subject('Confirmation 110th FAI Conference, Bali – Indonesia');
	    	});
		}

		return view('registration.new.success')
		->with('rs', $recipient)
		->with('pagin', 'registration')
		->with('step', 'record');
	}
}
