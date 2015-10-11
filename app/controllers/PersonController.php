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
        $resource = Input::all();

        $newPatient = new Person();
        if(array_key_exists('generalInfo', $resource)) 
        {
            if(array_key_exists('lastName', $resource['generalInfo'])) {
                $newPatient -> last_name = ucwords(strtolower($resource['generalInfo']['lastName']));
            }
            if(array_key_exists('firstName', $resource['generalInfo'])) {
                $newPatient -> first_name = ucwords(strtolower($resource['generalInfo']["firstName"]));
            }
            if(array_key_exists('personalId', $resource['generalInfo'])) {
                $newPatient -> personal_id = $resource['generalInfo']["personalId"];
            }
            if(array_key_exists('dob', $resource['generalInfo'])) {
                $newPatient -> dob = date("Y-m-d", strtotime($resource['generalInfo']["dob"]));
            }
            $newPatient -> updated_by = Auth::user() -> username;
        }
        if (!empty($newPatient -> last_name) && ! empty($newPatient -> first_name)) 
        {
            $newPatient -> save();
            $serviceMsg = "Person Added";
            
            // Get Patient Phone
            $newPatientPhone = new Phone();
            $newPatientPhone -> person_id = $newPatient -> id;
            if(array_key_exists('contact', $resource)) 
            {
                if(array_key_exists('phone', $resource['contact'])) 
                {
                    if(array_key_exists('type', $resource['contact']['phone'])) {
                        $newPatientPhone -> ref_name = ucwords(strtolower($resource['contact']['phone']['type']));
                    }
                    if(array_key_exists('areaCode', $resource['contact']['phone'])) {
                        $newPatientPhone -> area_code = $resource['contact']['phone']['areaCode'];
                    }
                    if(array_key_exists('phoneNumber', $resource['contact']['phone'])) {
                        $newPatientPhone -> phone = $resource['contact']['phone']['phoneNumber'];
                    }
                    $newPatientPhone -> active = true;
                    $newPatientPhone -> primary = true;
                    $newPatientPhone -> updated_by = Auth::user() -> username;
                    
                    if (!empty($newPatientPhone -> phone)) 
                    {
                        $newPatientPhone -> save();
                    }
                }


                // Get Patient email
                $newPatientEmail = new Email();
                $newPatientEmail -> person_id = $newPatient -> id;
                if(array_key_exists('email', $resource['contact']))
                {
                    if(array_key_exists('type', $resource['contact']['email'])) {
                        $newPatientEmail -> ref_name = ucwords(strtolower($resource['contact']['email']['type']));
                    }
                    if(array_key_exists('emailAddress', $resource['contact']['email'])) {
                        $newPatientEmail -> email = $resource['contact']['email']['emailAddress'];
                    }
                    $newPatientEmail -> active = true;
                    $newPatientEmail -> updated_by = Auth::user() -> username;
                    
                    if (!empty($newPatientEmail -> email)) 
                    {
                        $newPatientEmail -> save();
                    }
                }
            }

            
            // Get Patient Address
            $newPatientAddress = new Address();
            $newPatientAddress -> person_id = $newPatient -> id;
            if(array_key_exists('address', $resource)) 
            {
                
                if(array_key_exists('type', $resource['address'])) {
                    $newPatientAddress -> ref_name = ucwords(strtolower($resource['address']['type']));
                }
                if(array_key_exists('state', $resource['address'])) {
                    $newPatientAddress -> state = ucwords(strtolower($resource['address']['state']));
                }
                if(array_key_exists('city', $resource['address'])) {
                    $newPatientAddress -> city = ucwords(strtolower($resource['address']['city']));
                }
                if(array_key_exists('streetAddress', $resource['address'])) {
                    $newPatientAddress -> street_l1 = ucwords(strtolower($resource['address']['streetAddress']));
                }
                if(array_key_exists('streetAddress2', $resource['address'])) {
                    $newPatientAddress -> street_l2 = ucwords(strtolower($resource['address']['streetAddress2']));
                }
                if(array_key_exists('streetAddress3', $resource['address'])) {
                    $newPatientAddress -> street_l3 = ucwords(strtolower($resource['address']['streetAddress3']));
                }
                $newPatientAddress -> active = true;
                $newPatientAddress -> primary = true;
                $newPatientAddress -> updated_by = Auth::user() -> username;
            
                // TODO: add country to if statement
                // $newPatientAddress -> country = ucwords(strtolower($resource['address']['country']));
                if (!empty($newPatientAddress -> street_l1) && 
                    !empty($newPatientAddress -> city) &&
                    !empty($newPatientAddress -> state)) 
                {
                    $newPatientAddress -> save();
                }
            }
            $success = true;
        }
        else
        {
            $serviceMsg = "Patient name must be defided";
            $success = false;
        }
    
        return array('success' => $success,
                     'serviceMsg' => $serviceMsg, 
                     'id' => $newPatient->id );
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
