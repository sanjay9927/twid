<?php 

namespace App\Support;
 
class CsvReader
{
    protected $file;
 
    public function read($filePath, $chunkSize, callable $callBackToStoreChunkInDB)
    {  
        // Read a CSV file
        $this->file = fopen($filePath, "r");
        // Iterate over every line of the file
         $counter = 1;
         $chunk = [];
        while (($raw_string = fgets($this->file)) !== false) {
            // Parse the raw csv string
            
            $chunk[] = str_getcsv($raw_string);

            if($counter == $chunkSize){
                // store chunk in database
                call_user_func($callBackToStoreChunkInDB, $chunk);
                //reset counter 
                $counter = 1; 
                $chunk = [];
            }else{
                $counter++; 
            }
        }

        fclose($this->file);
    }
}