<?php
    $char = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxz";
    $message = "Bedankt voor het bezoeken van de veilingwebsite EenmaalAndermaal!<br>
                Vul de volgende code <a href=#>hier</a> in: createCode()";

    if($_SERVER[REQUEST_METHOD] == 'POST'){
        sendMail($_POST[email]);
    }
    function sendMail($email){
        mail($email, "EenmaalAndermaal registratiecode", $message)
    }
    function createCode(){
        return substr(str_shuffle($char), 0, 6);
    }
?>