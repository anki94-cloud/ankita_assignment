

<?php
if ($fh = fopen('mytext.txt', 'r')) {
	$array= array();
    while (!feof($fh)) {
        $line = fgets($fh);		
		$array[]= trim($line);	 
    } 
	$new_array = array_diff($array, array('---'));  
	$test = array_values(array_filter($new_array));
	$size_key = array();
	foreach($test as $data) {
		$key = explode(':',$data,2);  
		if(sizeof($key) > 1){  
			if (strpos($key[1], ',') !== false) {
				$new_data = explode(',', $key[1]);
			} else {
				$new_data = $key[1];
			}
			$size_key[$key[0]]=$new_data;
		}else{	 
			$size_key['short-content'][] = $data; ///as key not specified then I assign assuption key 
		}
	}
	$json_array = json_encode($size_key);
	echo "<pre>";print_r(stripcslashes($json_array));echo "</pre>";
	
    fclose($fh);
}



?>
