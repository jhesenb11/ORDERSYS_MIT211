<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JRK ONLINE SHOPPING SYSTEM</title>
	
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">    
<style>
        body {
           ;
            background-repeat: no-repeat;
            background-size: 650px 650px;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
		
		.error-message {
            position: fixed;
			top: 10%;
			left: 50%;
			transform: translateX(-50%);
			background-color: #f8d7da;
			padding: 20px;
			border-radius: 5px;
			z-index: 9999;
        }
		
    </style>
</head>

<?php
include('db_connect.php');

if ($result = $mysqli->query("SELECT * from fileupload")) {

    /* determine number of fields in result set */
    $field_cnt = $result->field_count;
    $fieldnames = mysqli_fetch_fields($result);
    
    // echo 'Fields: ' . $field_cnt . '<br />';
    
    echo '<table border="1">';
    
    $i=0;
    
     foreach ($fieldnames as $val) {
           // printf("Name:     %s\n", $val->name);
	   $fnames[$i]=$val->name;
	    echo '<th>' . $fnames[$i] . '</th>';
	    $i++;	    
    }
    
     /* fetch object array */

        while ($row = $result->fetch_row()) {
	  echo '<tr onmouseover="hilite(this)" onmouseout="lowlite(this)">';
	  for($i=0; $i<$field_cnt; $i++)
	  {
	  	if ($fnames[$i] == 'PATH')
		{  
  	  	echo '<td bgcolor="navyblue"><a href="' . $row[$i] . '">' . $row[$i] . '</td>';
		}
		else
		{
		  echo '<td>' . $row[$i] . '</td>';
		}	    
	 }
	  echo '</tr>';
        }
     echo '</table>';
  
    /* close result set */
    $result->close();
}

/* close connection */
$mysqli->close();

?> 

