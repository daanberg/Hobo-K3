<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$voornaam = $achternaam = $email = "";
$voornaam_err = $achternaam_err = $email_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["KlantNr"]) && !empty($_POST["KlantNr"])){
    // Get hidden input value
    $id = $_POST["KlantNr"];
    
    // Validate name
    $input_voornaam = trim($_POST["voornaam"]);
    if(empty($input_voornaam)){
        $voornaam_err = "Please enter a name.";
    } elseif(!filter_var($input_voornaam, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $voornaam_err = "Please enter a valid name.";
    } else{
        $voornaam = $input_voornaam;
    }
    
    // Validate address address
    $input_achternaam = trim($_POST["achternaam"]);
    if(empty($input_achternaam)){
        $achternaam_err = "Please enter an address.";     
    } else{
        $achternaam = $input_achternaam;
    }
    
    // Validate salary
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter the salary amount.";     
    } elseif(!ctype_digit($input_email)){
        $email_err = "Please enter a positive integer value.";
    } else{
        $email = $input_email;
    }
    
    // Check input errors before inserting in database
    if(empty($voornaam_err) && empty($achternaam_err) && empty($email_err)){
        // Prepare an update statement
        $sql = "UPDATE klant SET voornaam=?, achternaam=?, email=? WHERE KlantNr=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_voornaam, $param_achternaam, $param_email, $param_KlantNr);
            
            // Set parameters
            $param_voornaam = $voornaam;
            $param_achternaam = $achternaam;
            $param_email = $email;
            $param_KlantNr = $KlantNr;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: ./index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}else{
    // Check existence of id parameter before processing further
    if(isset($_GET["KlantNr"]) && !empty(trim($_GET["KlantNr"]))){
        // Get URL parameter
        $id =  trim($_GET["KlantNr"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM klant WHERE KlantNr = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_KlantNr);
            
            // Set parameters
            $param_KlantNr = $KlantNr;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $voornaam = $row["voornaam"];
                    $achternaam = $row["achternaam"];
                    $email = $row["email"];
                } //else{
                    // URL doesn't contain valid id. Redirect to error page
                    //header("location: error.php");
                    //exit();
                //}
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }//else{
        // URL doesn't contain id parameter. Redirect to error page
        //header("location: error.php");
        //exit();
    //}
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Record klant</h2>
                    <p>Please edit the input values and submit to update the employee record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>voornaam</label>
                            <input type="text" name="voornaam" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $voornaam; ?>">
                            <span class="invalid-feedback"><?php echo $voornaam_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>achternaam</label>
                            <input type="text" name="achternaam" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>"><?php echo $achternaam; ?>
                            <span class="invalid-feedback"><?php echo $achternaam_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>email</label>
                            <input type="text" name="email" class="form-control <?php echo (!empty($salary_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err;?></span>
                        </div>
                        <input type="hidden" name="KlantNr" value="<?php echo $KlantNr; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>