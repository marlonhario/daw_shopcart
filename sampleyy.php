<?php 
	if(file_exists('employee_data.json'))  
   {  
        $current_data = file_get_contents('employee_data.json');  
        $array_data = json_decode($current_data, true);  
        $extra = array(  
             'name'               =>   'adadwww'  ,  
             'gender'          =>    'adadwww' ,  
             'designation'     =>    'adadwww'   
        );  
        $array_data[] = $extra;  
        $final_data = json_encode($array_data);  
        if(file_put_contents('employee_data.json', $final_data))  
        {  
             $message = "<label class='text-success'>File Appended Success fully</p>";  
        }  
   }  
   else  
   {  
        $error = 'JSON File not exits';  
   } 

?>
