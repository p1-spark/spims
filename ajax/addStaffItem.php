<?php
/*
* @author Uchendu Precious
* email: uchendubozz@gmail.com
* You can contact me for more clearification: cheers :);
*/
?>
<?php
    if(isset($_POST['firstname']) && isset($_POST['lastname'])&& isset($_POST['department']) && isset($_POST['purpose'])&& 
    isset($_POST['items']))
	{
		// include Database connection file 
		include("dbConnect.php");

        // get values 
       
        $t = date('Y-m-d H:i:s');
        $staff_firstname = $_POST['firstname'];
		$staff_lastname = $_POST['lastname'];
		$staff_department = $_POST['department'];
		$staff_purpose = $_POST['purpose'];
		$staff_items = $_POST['items'];
		$clock_in = "YES";
		$clock_out = "NO";
		$emp_id =  strtolower($staff_lastname).'_emp_'.strtolower($staff_department);
		$query = "INSERT INTO staff(emp_id, staff_firstname, staff_lastname, staff_department, staff_items, staff_purpose,date_stamp_in,clock_in, clock_out) 
		
		VALUES('$emp_id','$staff_firstname', '$staff_lastname', '$staff_department', '$staff_items', '$staff_purpose', '$t', '$clock_in','$clock_out')";
		
		if (!$result = mysqli_query($con,$query)) {
	        exit(mysqli_error($con));
	    }
	    echo "1 Record Added!";
	}
?>