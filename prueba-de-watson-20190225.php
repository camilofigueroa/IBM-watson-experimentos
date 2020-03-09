
<?php

    //phpinfo(); //Para averiguar si sirve la librería cURL.

    //*********************************************************************************************************
    //Este es le código de ejemplo del sitio de php para la cURL, no funcion pero no se revienta. 20181121.
    /*$ch = curl_init("http://www.greensock.com/");
    $fp = fopen("example_homepage.txt", "w");
    
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    
    curl_exec($ch);
    curl_close($ch);
    fclose($fp);*/
    //*********************************************************************************************************
    

    $data = "";
    $curl = curl_init();
    curl_setopt_array($curl, array(
        
        CURLOPT_POST => true,
        CURLOPT_URL => "https://gateway.watsonplatform.net/visual-recognition-beta/api/v2/classify?version=2015-12-02",
        CURLOPT_USERPWD => "figueroacamilo@gmail.com:Anatotitan2019a1",
        CURLOPT_POSTFIELDS => array("images_file" => "https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcR9SSfyXCtWNlSM_7JTfPelfydSA6loQj0Pi0ChOEFlaF1XghIC"),
        CURLOPT_RETURNTRANSFER => true
        
    ));
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    
    if ($err)
    {
        echo "cURL Error #:" . $err;
        
    }else{
            echo $response;
        }
    
    