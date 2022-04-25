<?php
require_once 'DbConfig.php';
    class User extends DbConfig{

        public function checkReCaptcha($captchaResponse) {
            $siteKey = '6LfBmkMfAAAAAIgZ_NfOh0H5wyhCQX8sHfVPFq_8';
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $siteKey . '&response=' . $captchaResponse);
            return json_decode($verifyResponse);
        }

    public function getProfile(){
        $sql = "SELECT * FROM profiel INNER JOIN klant ON klant.KlantNr ='". $_SESSION['KlantNr'] . "' WHERE klant.KlantNr = profiel.KlantNummer;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ); 
    }



}
?>
