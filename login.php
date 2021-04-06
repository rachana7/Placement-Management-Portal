<?php
// Include config file
require_once 'config.php';
 
// Define variables and initialize with empty values
$emailid = $password = "";
$emailid_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if emailid is empty
    if(empty(trim($_POST["emailid"]))){
        $emailid_err = 'Please enter emailid.';
    } else{
        $emailid = trim($_POST["emailid"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
	echo $password;
    }
    
    // Validate credentials
    if(empty($emailid_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT emailid, password FROM placementcoordinator WHERE emailid = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_emailid);
            
            // Set parameters
            $param_emailid = $emailid;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if emailid exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $emailid, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            /* Password is correct, so start a new session and
                            save the emailid to the session */
                            session_start();
                            $_SESSION['emailid'] = $emailid;      
                            header("location: home.html");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = 'The password you entered was not valid.';
                        }
                    }
                } else{
                    // Display an error message if emailid doesn't exist
                    $emailid_err = 'No account found with that emailid.';
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 

