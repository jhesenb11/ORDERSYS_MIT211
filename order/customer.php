<link href="css/web20.css" rel="stylesheet" type="text/css" />
<style>

a {
  text-decoration: none; /* Remove underline */
  color: inherit; /* Inherit text color from parent */
}

/* Style for the button link */
.button-link {
  display: inline-block; /* Make it a block-level element */
  padding: 10px 20px; /* Adjust padding as needed */
  background-color: #3498db; /* Set background color */
  color: #fff; /* Set text color */
  border: 1px solid #2980b9; /* Add a border */
  border-radius: 5px; /* Add border-radius for rounded corners */
  transition: background-color 0.3s ease; /* Add a smooth transition for background color */
}

/* Hover effect */
.button-link:hover {
  background-color: #2980b9; /* Change background color on hover */
}

.styled-heading {
  background-color: #3498db; /* Set the background color */
  color: #fff; /* Set the text color */
  padding: 10px; /* Add padding for spacing */
  border-radius: 5px; /* Add border-radius for rounded corners */
}
</style>

<h2 class="styled-heading">CUSTOMER</h2>
<?php
$mysqli = new mysqli("localhost", "root", "", "order");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

if ($result = $mysqli->query("SELECT * FROM customer ORDER BY CUST_CODE ASC")) {

    /* determine number of fields in result set */
    $field_cnt = $result->field_count;
    $fieldnames = mysqli_fetch_fields($result);
    
    echo '<table border="1" width="100%">';
    
    $i=0;
    
     foreach ($fieldnames as $val) {
           // printf("Name:     %s\n", $val->name);
	   $fnames[$i]=$val->name;
	    echo '<th>' . $fnames[$i] . '</th>';
	    $i++;	    
    }
    echo '<th colspan="2" align="center"><a href="addcust1.php" class="button-link">ADD RECORD</a></th>';
    
     /* fetch object array */

        while ($row = $result->fetch_row()) {
	  echo '<tr>';
	  for($i=0; $i<$field_cnt; $i++)
	  {
		  echo '<td>' . $row[$i] . '</td>';
	 }
	 echo '<td><a href="view_customer.php?CUST_CODE=' . $row[0] . '" class="button-link">VIEW</a></td><td><a href="update_customer.php?CUST_CODE=' . $row[0] . '" class="button-link">EDIT</a></td>';
	  echo '</tr>';
        }
     echo '</table>';
  
    /* close result set */
    $result->close();
}

/* close connection */
$mysqli->close();

?> 