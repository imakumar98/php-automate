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

        $output = array();

        if(!$csv_file){

            die("CSV file is required as paramter");
        
        }

        if(!$column_array){

            die("Please provide column array as paramter");

        }

        $csv_file = fopen($csv_file, 'r');

        $column_array_hashmap = array();
        
        foreach($column_array as $field){

            $column_array_hashmap[$field] = 0;

        }

        $column_field_count = count($column_array);

        $row_index = 0;

        

        while(($row = fgetcsv($csv_file)) !== FALSE){
    
            if($row_index==0){

                print_r($row);
                
                $csv_field_count = count($row);

                if($column_field_count !== $csv_field_count){

                    die("Number of fields in csv and paramter array not equal");

                }

                for($csv_field_index = 0; $csv_field_index < $csv_field_count; $csv_field_index++){

                    foreach($column_array as $field){

                        if($row[$csv_field_index]==$field){

                            $column_array_hashmap[$row[$csv_field_index]] = $csv_field_index;

                        }

                    }
                    
                }

            }else{

                $record = array();

                $record['number'] = $row[$column_array_hashmap['number']];

                $record['marks'] = $row[$column_array_hashmap['marks']];

                $record['name'] = $row[$column_array_hashmap['name']];

                $output[] = $record;

            }

            $row_index++;

        }

        fclose($csv_file);

        return $output;

    }


    


?>