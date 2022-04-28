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


        public function create($data){
            try{
                if($data['password'] != $data['conf-password']){
                    throw new Exception("Wachtwoorden zijn niet gelijk");
                }
                $passwordEncr = password_hash($data['password'], PASSWORD_BCRYPT, ['cost' => 12]);
                $sql = "INSERT INTO klant (username, password) VALUE (:username, :password)";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindParam(":username", $data['username']);
                $stmt->bindParam(":password", $passwordEncr);

                if($stmt->execute()){
                    header("location: ./inlogpagina.php");
                }
            }
            catch(Exception $e){
                echo $e->getMessage();
            }
        }

        public function getUser($username){
            $sql = "SELECT username, password FROM klant WHERE username = :username";
            $stmt= $this->connect()->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        public function login($data){
            try{
                $user = $this->getUser($data['username']);
                if(!$user){
                    throw new Exception("gebruiker bestaat niet.");
                }
                if(!password_verify($data['password'], $user->password)){
                    throw new Exception("wachtwoord is incorrect.");
                }
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $user->username;
                    
                header("location: Home.php");

            }catch(Exception $e){
                echo $e->getMessage();
            }
        }

        public function getPic1(){
            $sql = "SELECT serieID FROM serie  WHERE serieID LIKE '21%' AND Actief = 1 LIMIT 5;";
            $stmt= $this->connect()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function getPic(){
            $sql = "SELECT serieID FROM serie WHERE Actief = 1 LIMIT 5;";
            $stmt= $this->connect()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
      }


    

?>
