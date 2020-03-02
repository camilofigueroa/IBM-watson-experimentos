<?php

    $url = 'https://gateway.watsonplatform.net/visual-recognition/api/v3/classify?version=2018-03-19';
    
    //Lorito 
    //$file = "https://upload.wikimedia.org/wikipedia/commons/thumb/3/30/Amazona_aestiva_-upper_body-8a_%281%29.jpg/800px-Amazona_aestiva_-upper_body-8a_%281%29.jpg";
    
    //Melones.
    $file = "https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcR9SSfyXCtWNlSM_7JTfPelfydSA6loQj0Pi0ChOEFlaF1XghIC";
    
    $image_url = "&url=".$file;
    
    $headers = array( 'Content-Type: application/json' );
    
    //cURL
    $ch = curl_init();
    
        curl_setopt($ch, CURLOPT_USERPWD, 'apikey:+++++++++++++'); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($ch, CURLOPT_URL, $url."&images_file=".$file ); //Endpoint URL                
        curl_setopt($ch, CURLOPT_HEADER, $headers ); //Este headers ofrece más información que el otro formato.
        curl_setopt($ch, CURLOPT_POST, false ); //POST        
        curl_setopt($ch, CURLOPT_POSTFIELDS, $image_url );        
    
    // Execute the cURL command
    $result = curl_exec($ch);
    
    // Erro
    if (curl_errno($ch))
    {
        echo 'Error: '.curl_error($ch);
    }
    
    echo $result;
    
    // Close the command
    curl_close ($ch);
    