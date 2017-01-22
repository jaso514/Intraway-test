<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    public function index($min=null, $max=null)
    {
        $response = [];
        $code = 200;
        if (empty($min) || empty($max)){
            $code = 401;
            $response['error'] = 'Incorrect parameters, need the min and max values in the url';
        }else{
            if(!is_numeric($min) || !is_numeric($max)){
                $code = 402;
                $response['error'] = 'The min and max valus must be numbers';
            }else if($min>$max){
                $code = 403;
                $response['error'] = 'The min value must be less than max value';
            }else{
                $response = $this->makeFizzBuzz($min, $max);
            }
        }
        
        return response()->json(json_encode($response), $code);
    }
    
    public function makeFizzBuzz($min, $max)
    {
        $result = [];
        for ($i = $min; $i<=$max; $i++) {
            echo $i;
            if ($i%3===0 && $i%5===0) {
                $result[] = "FizzBuzz";
            } else if ($i%3===0) {
                $result[] = "Fizz";
            } else if ($i%5===0) {
                $result[] = "Buzz";
            }else{
                $result[] = $i;
            }
            
        }
        
        return $result;
    }
}
