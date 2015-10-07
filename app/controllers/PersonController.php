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
        $new-> last_name = ucwords(strtolower(Input::get("lastName")));
        $new-> first_name = ucwords(strtolower(Input::get("firstName")));
        $new-> personal_id = Input::get("personalId");
        $new-> email = Input::get("email");
        $new-> dob = date("Y-m-d", strtotime((Input::get("dob"))));
        $new-> updated_by = Auth::user()->username;

        $new-> save();
        $success = true;
        $serviceMsg = "Person Added";
    
        return array('success' => $success,
                     'serviceMsg' => $serviceMsg, 
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
            $serviceMsg = "Person Changes Saved";
        } 
        catch (Exception $e) {
            $success = false;
            $serviceMsg = "An exception occured while editing person record";
        }
        return array('success' => $success,
                     'serviceMsg' => $serviceMsg, 
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

        $phones = Person::find($id)
                        ->phones()
                        ->get();
        
        $emails = Person::find($id)
                        ->emails()
                        ->get();
        
        $addresses = Person::find($id)
                           ->addresses()
                           ->get();
        
        return  array( "person" => $person,
                       "phones" => $phones,
                       "emails" => $emails,
                       "addresses" => $addresses,
                       "exams" => $exams);
    }

    /**
     * Search for a resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function search()
    {
        $toSearch = new Person();
        $results = [];
        $searchType = ucwords(strtolower(Input::get("searchType")));
        if (!is_null($searchType)) {
            // if parametric search is requested
            $toSearch-> last_name = ucwords(strtolower(Input::get("lastName")));
            $toSearch-> first_name = ucwords(strtolower(Input::get("firstName")));
            $toSearch-> personal_id = Input::get("personalId");
            if (! Input::get("dob") == null ) {
                $toSearch-> dob = date("Y-m-d", strtotime((Input::get("dob"))));
            }
            try {
                if ($toSearch->dob === null) {
                    $results = Person::where('last_name', 'LIKE', '%'.$toSearch->last_name.'%')
                                        ->where('first_name', 'LIKE', '%'.$toSearch->first_name.'%')
                                        ->where('personal_id', 'LIKE', '%'.$toSearch->personal_id.'%')
                                        ->get();
                } else {
                    $results = Person::where('last_name', 'LIKE', '%'.$toSearch->last_name.'%')
                                        ->where('first_name', 'LIKE', '%'.$toSearch->first_name.'%')
                                        ->where('personal_id', 'LIKE', '%'.$toSearch->personal_id.'%')
                                        ->where('dob', $toSearch->dob)
                                        ->get();
                }
                $serviceMsg = 'Search executed';
                $success = true;
            } catch (Exception $e) {
                $serviceMsg = 'Problems executing search';
                $success = false;
            }
        }
        else {
            // Get all records
            try {
                $results = Person::All();
                $serviceMsg = 'Search All executed';
                $success = true;
            } catch (Exception $e) {
                $serviceMsg = 'Problems executing search';
                $success = false;   
            }

        }

        return  array( "results" => $results, 
                       "serviceMsg" => $serviceMsg,
                       "success" => $success);
    }
}
