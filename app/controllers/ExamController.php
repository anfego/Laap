<?php

class ExamController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($personId)
	{
		$patient = Person::find($personId);
		if ($patient != null) {
			$exam = new Exam();
			$exam->person_id = $personId;
			$exam->ocupation = Input::get("ocupation");
			$exam->motivation = Input::get("motivation");
			$exam->history = Input::get("history");
			$exam->av_right = Input::get("av_right");
			$exam->av_left = Input::get("av_left");
			$exam->cl_Type = Input::get("cl_Type");
			$exam->cl_right = Input::get("cl_right");
			$exam->cl_left = Input::get("cl_left");
			$exam->kt_right = Input::get("kt_right");
			$exam->kt_left = Input::get("kt_left");
			$exam->lx_right = Input::get("lx_right");
			$exam->lx_left = Input::get("lx_left");
			$exam->lx_add = Input::get("lx_add");
			$exam->lx_lenses = Input::get("lx_lenses");
			$exam->cyclop = Input::get("cyclop");
			$exam->rx_right = Input::get("rx_right");
			$exam->rx_left = Input::get("rx_left");
			$exam->rx_add = Input::get("rx_add");
			$exam->oc_motility = Input::get("oc_motility");
			$exam->dx_Opthal = Input::get("dx_Opthal");
			$exam->diagnostic = Input::get("diagnostic");
			$exam->observations = Input::get("observations");
			
			$exam->created_by = Auth::user()->username;
			try {
				$exam->save();
				$success = true;
				$msg = 'Created';
			}
			catch (Exception $e) {
				$success = false;
				$msg = $e->getMessage();
			}
			return array('success' => $success,
						 'id'=> $exam->id,
						 'msg'=> $msg);	
		}
		return App::abort(404);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
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
