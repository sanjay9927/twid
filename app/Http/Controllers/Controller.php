<?php

namespace App\Http\Controllers;
use CustomFileReader;
use App\PinCode;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{   
    public function fetchPinCodes(){
    	ini_set('max_execution_time', 120);
        CustomFileReader::read('all_india_pin_code.csv', $chunksize = 10, function($data){

        	// below piece of code we can run on queue also by creating Job 

        	foreach ($data as $key => $value) {
        		$data = [
        			'office_name' 		=> $value[0],
        			'pincode' 			=> $value[1],
        			'office_type' 		=> $value[2],
        			'delivery_status' 	=> $value[3],
        			'district_name' 	=> $value[8],
        			'state_name' 		=> $value[9]
        		];

        		$insert_data[] = $data;

        		$insert_data = collect($insert_data); // here we make a collection to use the chunk method

        		// This will chunk the dataset in smaller collections containing 500(anysize) values each. 
				$chunks = $insert_data->chunk(500);
        	}

        	foreach ($chunks as $chunk)
			{
			   PinCode::insert($chunk->toArray());
			}
        });	
    }

    public function viewPincodes(){
    	$pincodes = PinCode::paginate(100);
    	return view('pincodes', ['pincodes' => $pincodes]);
    }
}
