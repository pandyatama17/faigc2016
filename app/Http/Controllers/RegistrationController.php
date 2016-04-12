<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Program;
use App\MemberType;
use App\SubAttendee;
use App\HotelBooking;
use App\MemberProgram;
use App\Member;

use Illuminate\Http\Request;
use Input;
use File;
use Image;
use Session;
use Mail;
use Str;
use Redirect;
use App\Hotel;

class RegistrationController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$mt = MemberType::all();
		$progams = Program::all();
		return view('registration.steps')
		->with('member_types', $mt)
		->with('programs', $progams)
		->with('pagin', 'registration');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $r)
	{
		$m = new Member;
		$m->email = $r->email;
		$m->member_type = $r->regist_type;
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
		$m->avatar = $r->file('file')->getClientOriginalName();
		$m->key = str_random(8);
		$m->cost = $r->kontol;

		try
		{
			$file = $r->file('file');
			$savepath = public_path('images/members/'.$file->getClientOriginalName());
			Image::make($file->getRealPath())->resize('200','200')->save($savepath);

			 	$m->save();

			if($r->program_2 == 1)
			{
				$mp = new MemberProgram;
				$mp->member_id =$m->id;
				$mp->program_id="2";
				$mp->save();
			}
			if($r->program_4 == 1)
			{
				$mp = new MemberProgram;
				$mp->member_id =$m->id;
				$mp->program_id="4";
				$mp->save();
			}
			if ($r->hotel != 'none')
			{
				$booking = new HotelBooking;
				$booking->id = $m->id;
				$booking->hotel_id = $r->hotel;
				$booking->rooms = $r->rooms;
				$booking->preference = $r->preference;
				$booking->check_in = $r->checkin;
				$booking->check_out = $r->checkout;

				$booking->save();
			}
			if ($r->name_1 != "")
			{
				$i = 1;
				$s = new SubAttendee;
				$s->parent_id = $m->id;
				$s->name = Input::get('name_'.$i);
				$s->email = Input::get('email_'.$i);
				$s->save();
			}
			if ($r->name_2 != "")
			{
				$i = 2;
				$s = new SubAttendee;
				$s->parent_id = $m->id;
				$s->name = Input::get('name_'.$i);
				$s->email = Input::get('email_'.$i);
				$s->save();
				echo "2 saved";
			}
			if ($r->name_3 != "")
			{
				$i = 3;
				$s = new SubAttendee;
				$s->parent_id = $m->id;
				$s->name = Input::get('name_'.$i);
				$s->email = Input::get('email_'.$i);
				$s->save();
			}
			if ($r->name_4 != "")
			{
				$i = 4;
				$s = new SubAttendee;
				$s->parent_id = $m->id;
				$s->name = Input::get('name_'.$i);
				$s->email = Input::get('email_'.$i);
				$s->save();
			}
			if ($r->name_5 != "")
			{
				$i = 5;
				$s = new SubAttendee;
				$s->parent_id = $m->id;
				$s->name = Input::get('name_'.$i);
				$s->email = Input::get('email_'.$i);
				$s->save();
			}
			// Session::put('cost', $r->cost);
			$arr = array('msg' => 'Registration success', 'items'=>Input::all(), 'err'=>false , 'id'=>$m->id);
			echo json_encode($arr);
		}
		catch (Exception $e)
		{
			$arr = array('msg' => 'Registration failed, please contact us to re-register if you can&#39;t ', 'items'=>Input::all(), 'err'=>true, 'id'=> null );
			echo json_encode($arr);
		}

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$recipient = Member::find($id);
		Session::put('uid', $id);
		if ($recipient->cc_email == "")
		{
			Mail::send('mail.registration_success', array('title'=>$recipient->title,'first_name'=>$recipient->first_name,'family_name'=>$recipient->family_name,'key'=>$recipient->key,'id'=>$id), function($message)
			{
				$recipient = Member::find(Session::get('uid'));
	        	$message->to($recipient->email, $recipient->first_name.' '.$recipient->family_name)
				// ->bcc('secretariatfasi@gmail.com')
				->subject('Confirmation 110th FAI Conference, Bali – Indonesia');
	    	});
		}
		else
		{
			Mail::send('mail.registration_success', array('title'=>$recipient->title,'first_name'=>$recipient->first_name,'family_name'=>$recipient->family_name,'key'=>$recipient->key,'id'=>$id), function($message)
			{
				$recipient = Member::find(Session::get('uid'));
	        	$message->to($recipient->email, $recipient->first_name.' '.$recipient->family_name)
				// ->bcc('secretariatfasi@gmail.com')
				->cc($recipient->cc_email,'CC Email')
				->subject('Confirmation 110th FAI Conference, Bali – Indonesia');
	    	});
		}

		return Redirect::to('registration/'.$id.'/success');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 public function later($id)
	 {
	 	# code...
	 }

	public function payment($id)
	{
		$m = Member::find($id);

		$cc_cost = ($m->cost+($m->cost*0.0363));
		Session::put('cc_cost', $cc_cost);

		if($m->member_type == 1)
		{
			$price_reg = 5181500;
			$basket = "FAIGC 2016 Delegate Registration,5181500.00,1,5181500.00;";
		}
		elseif($m->member_type == 9)
		{
			$price_reg = 3108900;
			$basket = "FAIGC 2016 Companion Registration,3108900.00,1,3108900.00;";
		}

		$subs = count(SubAttendee::where('parent_id','=',$id)->get());
		if($subs > 0)
		{
			$unformattedprice_subs = $subs*3108900;
			$price_subs = number_format($subs*3108900, 2, '.', '');
			$basket .="Additional Attendee,3108900.00,".$subs.",".$price_subs.";";
		}
		else
		{
			$unformattedprice_subs = 0;
			$price_subs = 0;
		}
		$hotel = HotelBooking::find($id);
		if ($hotel != null)
		{
			$hotel_days = date_diff(date_create($hotel->check_out), date_create($hotel->check_in))->format("%a");
			$hotel_rooms = $hotel->rooms;
			$getHotel = Hotel::find($hotel->hotel_id);
			$hotel_cost = /*$getHotel->cost+($getHotel->cost*0.363)*/ 3108900;

			$price_hotel = $hotel_cost*$hotel_days*$hotel_rooms;
			$basket .="Hotel Accommodation,".number_format($hotel_cost, 2, '.', '').",".$hotel_days*$hotel_rooms.",".number_format($price_hotel, 2, '.', '').";";
		}
		else
		{
			$price_hotel = 0;
		}

		$amount = $price_reg+$unformattedprice_subs+$price_hotel;
		$words = sha1($amount.'.00'.'d9R2g8E6B3r5'.$m->key);

		$nonhashedwords = $price_reg+$unformattedprice_subs.'.00'.' d9R2g8E6B3r5 '.$m->key;

		// return "night(s) stay: "$hotel_days." rooms: ".$hotel_rooms." price: ".$hotel_cost ;
		// return $price_hotel;
		// return $nonhashedwords."<br><br>".$basket;

		return view('registration.forms.payment')
		->with('m', $m)
		->with('words', $words)
		->with('basket', $basket)
		->with('amount', $amount)
	   ->with('pagin', 'registration');
	}
	public function success($id)
	{
		$m = Member::find($id);

		Session::put('uid', $id);

		return view('registration.forms.success')
		->with('rs', $m)
		->with('pagin', 'registration');
	}

	public function sendinfo($id)
	{
		# code...
	}
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
