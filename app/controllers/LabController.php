<?php

class LabController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public $restful = true;

	public function index()
	{
		$customers = LabCustomer::all();
		return View::make("user.lab", array('customers' => $customers ));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$new = new LabCustomer;
		$new-> name = Input::get("name");
		$new-> address = Input::get("address");
		$new-> telephone = Input::get("telephone");
		$new-> email = Input::get("email");
		$new-> discountStd = Input::get("discountStd");
		$new-> discountSpc = Input::get("discountSpc");
		$new-> updated_by = Auth::user()-> username;
		$new-> save();
		return $this-> index();
	}

	public function addOrderTo($id)
	{
		$newOrder = new LabOrder();
		$newOrder-> status =  'open';
		$newOrder-> created_by = Auth::user()-> username;
		$newOrder-> delivery_date = new DateTime('today');
		$newOrder-> tax = '16.0';
		$customer = LabCustomer::find($id)-> orders()-> save($newOrder);
		return $this-> show($id);
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
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
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
		$orders_peding = LabCustomer::find($id)-> orders()-> get();
		$customer = LabCustomer::find($id);
		return View::make("lab.customer", array( "orders"	=> $orders_peding,
												 "customer" => $customer) );
	}


}
