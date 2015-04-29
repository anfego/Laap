<?php

class PersonController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public $restful = true;

    public function index()
    {
        $people = Person::all();
        return View::make("user.consultorio", array('people' => $person ));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
     
        $new = new Person();
        
        $new-> last_name = Input::get("last_name");
        
        $new-> first_name = Input::get("first_name");
        
        $new-> personal_id = Input::get("personal_id");
    
        $new-> email = Input::get("email");
        
        $new-> dob = Input::get("dob");
        
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
        $form  = new Person();
        $person = Person::findOrFail($id);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $person = Person::find($id);
     
        $exams = Person::find($id)
                        ->exams()
                        ->get();
        
        return  array( "person" => $person, "exams" => $exams);
    }


}
