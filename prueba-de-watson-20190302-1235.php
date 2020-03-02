<?php

    $url = 'https://gateway.watsonplatform.net/visual-recognition/api/v3/classify?version=2018-03-19';
    
    //Lorito 
    //$file = "https://upload.wikimedia.org/wikipedia/commons/thumb/3/30/Amazona_aestiva_-upper_body-8a_%281%29.jpg/800px-Amazona_aestiva_-upper_body-8a_%281%29.jpg";
    
    //Melones.
    $file = "https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcR9SSfyXCtWNlSM_7JTfPelfydSA6loQj0Pi0ChOEFlaF1XghIC";
    
    $image_url = "&url=".$file;
    
    //$headers = array( 'Content-Type: application/json' );
    
    //cURL
    $ch = curl_init();
    
        curl_setopt($ch, CURLOPT_USERPWD, 'apikey:jgA_KwDJMrOkJHWU--BKdbmkxTEBOcHtqF54BxaglWE5'); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($ch, CURLOPT_URL, $url."&images_file=".$file ); //Endpoint URL                
        //curl_setopt($ch, CURLOPT_HEADER, $headers ); //Este headers ofrece más información que el otro formato.
        curl_setopt($ch, CURLOPT_POST, false ); //POST        
        curl_setopt($ch, CURLOPT_POSTFIELDS, $image_url );        
    
    // Execute the cURL command
    $result = curl_exec($ch);
    
    // Erro
    if (curl_errno($ch))
    {
        echo 'Error: '.curl_error($ch);
    }
    
    //echo $result;    
    //echo "<br><br>";    
    var_dump( json_decode( $result )); //Aquí es solo para mostrar el tipo de variable y su contenido. 
    echo "<hr>";
    
    $objeto = json_decode( $result, true );    //Convierte Json a un arreglo.
    //print_r( $objeto[ "classifiers" ] ); //A partir de acá se convierte en un arreglo.
    
    //echo $objeto[ 'class' ];
    
    foreach ($objeto as $product)
    {
        echo '<pre>';
        print_r($product);
        echo '</pre>';
    }
    
    // Close the command
    curl_close ($ch);
    
    
    
    
    /*function imprimir_arreglo( $arreglo )
    {
        $salida = "";
        
        for( $i = 0; $i < count( $arreglo ); $i ++ )
        {
            echo "<br>";
            print_r( $arreglo[ $i ] );
            
            //$objeto = json_decode( $arreglo[ $i ] );    
            //print_r( $objeto->{ "images" } ); //A partir de acá se convierte en un arreglo.
            
            //imprimir_arreglo( $objeto->{ "images" } );
        }
        
        //return $salida;
    }*/
    
    
    
    