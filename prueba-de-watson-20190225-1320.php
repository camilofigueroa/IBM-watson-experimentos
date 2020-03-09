<?php

// Set the endpoint URL
    //$url = 'https://gateway.watsonplatform.net/visual-recognition/api/v3/classify?api_key=jgA_KwDJMrOkJHWU--BKdbmkxTEBOcHtqF54BxaglWE5&version=2018-03-19';
    //$url = 'https://gateway.watsonplatform.net/visual-recognition/api/v3/classify?api_key=jgA_KwDJMrOkJHWU--BKdbmkxTEBOcHtqF54BxaglWE5';
    $url = 'https://gateway.watsonplatform.net/visual-recognition/api/v3/classify?version=2018-03-19';
    
    // Set the image uri
    //example : $file = file_get_contents('./my_profile.jpg');
    
    //Lorito 
    $file = "https://upload.wikimedia.org/wikipedia/commons/thumb/3/30/Amazona_aestiva_-upper_body-8a_%281%29.jpg/800px-Amazona_aestiva_-upper_body-8a_%281%29.jpg";
    
    //Melones.
    $file = "https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcR9SSfyXCtWNlSM_7JTfPelfydSA6loQj0Pi0ChOEFlaF1XghIC";
    
    
    //$file = file_get_contents('https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcR9SSfyXCtWNlSM_7JTfPelfydSA6loQj0Pi0ChOEFlaF1XghIC');
    
    $image_url = "&url=".$file;
    
    //$filename = file_get_contents( "imagen.jpg" );
    //echo $filename;
    
    //$cfile = curl_file_create( "imagen.jpg" );
    
    /*$post_args = array(
         'version' => '2018-03-19',
         'images_file' => $file
     );*/
    
    $headers = array( 'Content-Type: application/json' );
    
    //cURL
    $ch = curl_init();
    
        curl_setopt($ch, CURLOPT_USERPWD, 'apikey:jgA_KwDJMrOkJHWU--BKdbmkxTEBOcHtqF54BxaglWE5'); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($ch, CURLOPT_URL, $url."&images_file=".$file ); //Endpoint URL                
        curl_setopt($ch, CURLOPT_HEADER, $headers ); //Este headers ofrece más información que el otro formato.
        curl_setopt($ch, CURLOPT_POST, false ); //POST
        //curl_setopt($ch, CURLOPT_POSTFIELDS, $cfile ); //Esta línea así genera un error que bloquea el servidor. 20200302 12:18.
        //curl_setopt($ch, CURLOPT_POSTFIELDS, array("images_file" => $file )); //Parameters
        //curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_args));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $image_url );
        //curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
        
        
        
    
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
    