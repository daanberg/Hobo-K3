<?php
require_once 'DbConfig.php';
    class User extends DbConfig{

        public function checkReCaptcha($captchaResponse) {
            $siteKey = '6LfBmkMfAAAAAIgZ_NfOh0H5wyhCQX8sHfVPFq_8';
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $siteKey . '&response=' . $captchaResponse);
            return json_decode($verifyResponse);
        }

        public function login($username, $password, $captchaResponse){
        try {
            $user = $this->getUser($username);
            $responseData = $this->checkReCaptcha($captchaResponse);

            if (!$user) {
                throw new Exception("<p class='errorMessage'>User does not exist. </p>");
            }
            if (!password_verify($password, $user->password)) {
                throw new Exception("<p class='errorMessage'>Passwords is not verified. </p>");
            }
            if (!isset($responseData->success) || !$responseData->success) {
                throw new Exception("<p class='errorMessage'>Failed to complete reCaptcha. </p>");
            }

            session_start();
            $_SESSION['loggedIn'] = true;
            header("Location: index.php");
        } catch (Exception $e) {
            return $e->getMessage();
        }
      }
    }

?>
