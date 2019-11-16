<?php

    /**
     * This function returns two dimensional array by taking csv as input
     * Parameters:
     * - CSV file
     * - Array of ordered column
     * Date: 16 November 2019
     */



    //Function Implementation

    function csv_to_array($csv_file, $column_array){

        //Output Array variable
        $output = array();


        //Check if file exist
        if(!$csv_file){

            die("CSV file is required as paramter");
        
        }


        //Check if column array exist
        if(!$column_array){

            die("Please provide column array as paramter");

        }


        //Open csv file
        $csv_file = fopen($csv_file, 'r');


        //Declare hashmap variable to store index of field in csv
        $column_array_hashmap = array();
        

        //Loop to declare hashmap variable as 0
        foreach($column_array as $field){

            $column_array_hashmap[$field] = 0;

        }


        //Count number of columns in column array
        $column_field_count = count($column_array);


        //Declare row index as 0
        $row_index = 0;


        //Loop in each row of CSV
        while(($row = fgetcsv($csv_file)) !== FALSE){
    

            //For first row
            if($row_index==0){

                $csv_field_count = count($row);


                //Check if number of column same in array and csv
                if($column_field_count !== $csv_field_count){

                    die("Number of fields in csv and paramter array not equal");

                }

                //Find index of each column 
                for($csv_field_index = 0; $csv_field_index < $csv_field_count; $csv_field_index++){

                    foreach($column_array as $field){

                        if($row[$csv_field_index]==$field){

                            $column_array_hashmap[$row[$csv_field_index]] = $csv_field_index;

                        }

                    }
                    
                }


            //For 2 to n rows
            }else{

                //Declare record variable
                $record = array();

                $record['number'] = $row[$column_array_hashmap['number']];

                $record['marks'] = $row[$column_array_hashmap['marks']];

                $record['name'] = $row[$column_array_hashmap['name']];

                $output[] = $record;

            }

            $row_index++;

        }

        fclose($csv_file);


        //Return output
        return $output;

    }

?>