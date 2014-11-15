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
		$newOrder-> total = 0.0;
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
		$form  = new BomForm();
        $order = LabOrder::findOrFail($id);
        $products = LabProducts::all();
        $url = URL::full();
        $bom = LabOrder::find($id)-> products()-> get();
        $customer = LabCustomer::find($order-> customer_id)-> first();
        $subTotal = 0.0;
        
        if ($form-> isPosted()) {
            foreach ($products as $product)
            {
                if (Input::get($product-> id) != '0' )
                {
                    $newBomProduct = LabBOMItem::whereOrderId($id)->whereProductId($product-> id)->first();
                    if (count($newBomProduct))
                    {
                        $quantity = $newBomProduct-> quantity + Input::get($product-> id);sa
                        if ($quantity <= '0') {
                            LabBOMItem::whereOrderId($id)
                                        -> whereProductId($product-> id)
                                        -> delete();
                        }else{
                            LabBOMItem::whereOrderId($id)
                                        -> whereProductId($product-> id)
                                        -> update(array('quantity' => $quantity));
                        }
                    }else if(Input::get($product-> id) > 0){
                        $newBomProduct = new LabBOMItem;
                        $newBomProduct-> product_id = $product-> id;
                        $newBomProduct-> quantity = Input::get($product-> id);
                        $newBomProduct-> price = $product-> price;
                        if($product-> level == 'standard'){
                            $newBomProduct-> discount = $customer-> discountStd;
                        }elseif ($product-> level == 'special') {
                            $newBomProduct-> discount = $customer-> discountSpc;
                        }
                        LabOrder::find($id)-> products()-> save($newBomProduct);
                    }
                }
            }
            // update order total
            $subTotal = LabOrder::find($id)->getSubtotal();
            return Redirect::to($url)-> withInput([ "subTotal" => $subTotal]);
        }
        $subTotal = LabOrder::find($id)-> getSubtotal();
        $transactions = LabOrder::find($id)-> transactions()-> get();
        return View::make("lab/formOrder", [
            "form"      => $order,
            "order"     => $order,
            "products"  => $products,
            "customer"  => $customer,
            "subTotal"  => $subTotal,
            "bom"       => $bom,
            "transactions" => $transactions
        ]);
	}

    /**
     * Chage order status to closed
     *
     * @param  int  $id
     * @return Response
     */
    public function closeOrder($id)
    {
        $order = LabOrder::findOrFail($id);
        if ($order-> isOpen()) {
            $order-> close();
        }
        return Redirect::to(URL::action('LabController@edit', array('id' => $order-> id)));
    }

    /**
     * Chage order status to unpaid
     *
     * @param  int  $id
     * @return Response
     */
    public function deliverOrder($id)
    {
        $order = LabOrder::findOrFail($id);
        if ($order-> isClose()) {
            $order-> delivered();
        }
        return Redirect::to(URL::action('LabController@edit', array('id' => $order-> id)));
    }

    /**
     * Shows the order printing format
     *
     * @param  int  $id
     * @return Response
     */
    public function previewOrder($id)
    {
        $order = LabOrder::findOrFail($id);
        return Redirect::to(URL::action('LabController@edit', array('id' => $order-> id)));
    }

    /**
     * Remove the specified order
     *
     * @param  int  $id
     * @return Response
     */
    public function deleteOrder($id)
    {
        $order = LabOrder::findOrFail($id);
        if ($order-> isOpen()) {
            $order-> delete();
        }
        return Redirect::to(URL::action('LabController@show', array('id' => $order-> customer_id)));
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
