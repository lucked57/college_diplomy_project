<?php


require_once 'include/database_connect.php';
require_once 'include/classes.php';

if(isset($_POST['login']) && isset($_POST['pass'])){
        $data = array(
            'secret' => "6LfvFHoUAAAAABiuKd7gPsITOyw70WBU8meAtWlc",
            'response' => $_POST["captcha"]
        );

        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($verify);
        //var_dump($response);
      /* if ($response ['success'] != true) {
                echo 'no';
                } else {
                echo 'yes';
                }*/
    
    $response = json_decode($response);
    
        
   if ($response->score < 0.5 ) {
                     echo "Вы робот ".$response->score;
                   // var_dump($response);
                }
    
    
            else 
                {
                    echo "No";
                    //var_dump($response);
                }
}

?>


