<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $customers = $this->readFile('mock.txt');
        $no_males = array_filter($customers, function($customer) {
            if($customer['gender'] == 'Male')
             return $customer;
        });
        $no_females = array_filter($customers, function($customer) {
            if($customer['gender'] == 'Female')
             return $customer;
        });
        $res_data = ['customers' => $customers,'no_males' => count($no_males),'no_females' => count($no_females)];

        return $res_data;
    }


    public function filter(Request $request)
    {
        $customers = $this->readFile('mock.txt');
        if($request->has('gender'))
        {
            if($request->gender == 'Male')
            {
                $customers = array_filter($customers, function($customer) {
                    if($customer['gender'] == 'Male')
                     return $customer;
                });
            }
            else
            {
                $customers = array_filter($customers, function($customer) {
                    if($customer['gender'] == 'Female')
                     return $customer;
                });
            }
        }

        if($request->has('name'))
        {
            $customers = array_filter($customers, function($customer)use ($request) {
                if(strcasecmp(substr($customer['first_name'], 0, 1),$request->name) == 0 || strcasecmp(substr($customer['last_name'], 0, 1),$request->name) == 0)
                {
                    return $customer;
                }
            });
        }
        if($request->has('location'))
        {
            $customers = array_filter($customers, function($customer)use ($request) {
                $locations = explode(",",$request->location);
                $distance = $this->distance($locations[0],$locations[1],$customer['lat'],$customer['lon']);
                if($distance <= 2000)
                {
                    return $customer;
                }

            });
        }
        return $customers;
    }

    public function readFile($file)
    {
        $myfile = fopen($file, "r") or die("Unable to open file!");
        $customers = array();
        while(!feof($myfile)){
            $line = fgets($myfile);
            $line_array = explode(',', $line);
            if(count($line_array) > 1)
            {
                $data['id'] = $line_array[0];
                $data['first_name'] = $line_array[1];
                $data['last_name'] = $line_array[2];
                $data['gender'] = $line_array[3];
                $data['lat'] =  (float)$line_array[4];
                $data['lon'] = (float)str_replace("\n","",$line_array[5]);

                array_push($customers,$data);
            }

        }
        unset($customers[0]);

        return $customers;
    }

    public function distance($lat1, $lon1, $lat2, $lon2) {
        $rad = M_PI / 180;
        return acos(sin($lat2*$rad) * sin($lat1*$rad) + cos($lat2*$rad) * cos($lat1*$rad) * cos($lon2*$rad - $lon1*$rad)) * 6371;// Kilometers
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
