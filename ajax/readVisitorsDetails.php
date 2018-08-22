<?php
/*
* @author Uchendu Precious
* email: uchendubozz@gmail.com
* You can contact me for more clearification: cheers :);
*/
?>
<?php
// include Database connection file
include("dbConnect.php");

// check request
if(isset($_POST['visitor_id']) && isset($_POST['visitor_id']) != "")
{
    // get User ID
    $visitor_id = $_POST['visitor_id'];

    // Get Staff Details
    $query = "SELECT * FROM visitors WHERE visitor_id = '$visitor_id'";
    if (!$result = mysqli_query($con,$query)) {
        exit(mysqli_error($con));
    }
    $response = array();
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response = $row;
        }
    }
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
    // display JSON data
    echo json_encode($response);
}
else
{
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}
?>