<?php
  
namespace App\Support;
  
use Illuminate\Support\Facades\Facade;
  
class CustomFileReader extends Facade{

    protected static function getFacadeAccessor() { 

        return 'mylibrary'; 
    }
}
