<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$voornaam = $achternaam = $email = "";
$voornaam_err = $achternaam_err = $email_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_voornaam = trim($_POST["voornaam"]);
    if(empty($input_voornaam)){
        $voornaam_err = "Vul de naam in.";
    } elseif(!filter_var($input_voornaam, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $voornaam_err = "Please enter a valid name.";
    } else{
        $voornaam = $input_voornaam;
    }
    
    
    // Validate salary
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter an email.";     
    } else{
        $email = $input_email;
    }
    
    // Check input errors before inserting in database
    if(empty($voornaam_err) && empty($achternaam_err) && empty($email_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO klant (voornaam, achternaam, email) VALUES (:voornaam, :achternaam, :email)";
 
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":voornaam", $param_voornaam);
            $stmt->bindParam(":achternaam", $param_achternaam);
            $stmt->bindParam(":email", $param_email);
            
            // Set parameters
            $param_voornaam = $voornaam;
            $param_achternaam = $achternaam;
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        unset($stmt);
    }
    
    // Close connection
    unset($pdo);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
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
                    <h2 class="mt-5">Voeg klant toe</h2>
                    <p>Vul hier de gegevens van de klant in</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Voornaam</label>
                            <input type="text" name="voornaam" class="form-control <?php echo (!empty($voornaam_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $voornaam; ?>">
                            <span class="invalid-feedback"><?php echo $voornaam_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>achternaam</label>
                            <input type="text" class="form-control <?php echo (!empty($achternaam_err)) ? 'is-invalid' : ''; ?>"><?php echo $achternaam; ?>
                            <span class="invalid-feedback"><?php echo $achternaam_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>email</label>
                            <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>