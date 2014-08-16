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
		$customers = DB::table("customer")->get();
		return View::make("user.lab", array('customers' => $customers ));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$new = new Customer;
		$new->name = Input::get("name");
		$new->address = Input::get("address");
		$new->telephone = Input::get("telephone");
		$new->email = Input::get("email");
		$new->discount = Input::get("discount");
		$new->save();
		return Redirect::route("user.apps");
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
		$orders_peding = DB::table("orders")->where('idCustomer','=', $id)->get();
		return View::make("lab.customer", $orders_peding );
	}


}
