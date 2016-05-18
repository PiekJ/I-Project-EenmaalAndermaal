<?php
    if($_SERVER[REQUEST_METHOD] == 'POST'){
        sendMail($_POST[email]);
    }
    $char = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxz";
    $message = "Bedankt voor het bezoeken van de veilingwebsite EenmaalAndermaal!<br>
                Vul de volgende code <a href=#>hier</a> in: createCode()";
    function sendMail($email){
        mail($email, "EenmaalAndermaal registratiecode", )
    }
    function createCode(){
        return substr($char, 0, 6);
    }
?>