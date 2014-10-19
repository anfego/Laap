<?php

class PacientController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public $restful = true;

	public function index()
	{
		$pacients = Pacient::all();
    return View::make("user.consultorio", array('pacients' => $pacients ));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$new = new Pacient();
    
    $new-> last_name 
            = Input::get("last_name");
    
    $new-> first_name 
            = Input::get("first_name");
		
    $new-> personal_id 
            = Input::get("personal_id");
    
    $new-> address_home 
            = Input::get("address_home");
		
    $new-> address_work 
            = Input::get("address_work");
		
    $new-> telephone
            = Input::get("telephone");
		
    $new-> email
            = Input::get("email");
		
    $new-> dob
            = Input::get("dob");
		
    $new-> save();
		
    return $this-> index();
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$form  = new Pacient();
    $pacient = Pacient::findOrFail($id);
  }
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    $pacient = Pacient::find($id);
   
    $examinations = Pacient::find($id)
                            ->examinations()
                            ->get();
    
    return View::make( "optometrist.pacient", 
                       array( "pacient" => $pacient,
                              "examinations" => $examinations));
  }


}
