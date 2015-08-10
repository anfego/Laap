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
        return "Index";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $new = new Person();
        $new-> last_name = ucwords(strtolower(Input::get("last_name")));
        $new-> first_name = ucwords(strtolower(Input::get("first_name")));
        $new-> personal_id = Input::get("personal_id");
        $new-> email = Input::get("email");
        $new-> dob = date("Y-m-d", strtotime((Input::get("dob"))));
        $new-> updated_by = Auth::user()->username;

        try {
            $new-> save();
            $success = true;
        }
        catch (Exception $e) {
            $success = false;
        }
        return array('success' => $success, 
                     'id' => $new->id );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $person = Person::findOrFail($id);
        $person-> last_name = Input::get("last_name");
        $person-> first_name = Input::get("first_name");
        $person-> personal_id = Input::get("personal_id");
        $person-> email = Input::get("email");
        $person-> dob = date("Y-m-d", strtotime((Input::get("dob"))));
        $person-> updated_by = Auth::user()->username;
        try {
            $person-> save();
            $success = true;
        } 
        catch (Exception $e) {
            $success = false;
        }
        return array('success' => $success, 
                     'id' => $person->id );
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
