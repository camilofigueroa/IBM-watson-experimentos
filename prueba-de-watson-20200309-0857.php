<?php

    $url = 'https://gateway.watsonplatform.net/visual-recognition/api/v3/classify?version=2018-03-19';
    
    //Lorito 
    $file = "https://upload.wikimedia.org/wikipedia/commons/thumb/3/30/Amazona_aestiva_-upper_body-8a_%281%29.jpg/800px-Amazona_aestiva_-upper_body-8a_%281%29.jpg";
    
    //Melones.
    //$file = "https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcR9SSfyXCtWNlSM_7JTfPelfydSA6loQj0Pi0ChOEFlaF1XghIC";
    
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
    //print_r( $objeto ); //A partir de acá se convierte en un arreglo.
    
    //echo $objeto[ 'class' ];
        
    /*foreach ($objeto as $product)
    {
        echo '<pre>';
        print_r( $product ); //Internamente esto sigue siendo un vector, así que hay que fragmentar todo aun más.                
        echo '</pre>';
    }*/
    
    //-------------------------------------------------------------------------------------
    
    //Imprimiendo uno de los elementos, solamente.
    //echo $objeto[ "images" ][ 0 ][ "classifiers" ][ 0 ][ "classes" ][ 0 ][ "class" ];
    //echo $objeto[ "images" ][ 0 ][ "classifiers" ][ 0 ][ "classes" ][ 0 ][ "score" ];
    
    foreach( $objeto[ "images" ][ 0 ][ "classifiers" ][ 0 ][ "classes" ] as $p )
    {
        echo $p[ "class" ]."<br>";
        echo $p[ "score" ]."<br>";
    }
    
    //20200309
    /*foreach( $objeto as $x => $x_value )
    {
        echo "Key=" . $x . ", Value=" . $x_value;
        echo "<br>";
    }*/
    
    /*foreach( $objeto as $obj )
    {
        print_r( $obj->class  );
        $nombre_fruta = $obj->nombre_fruta;
        $cantidad = $obj->cantidad;
        echo $id_fruta." ".$nombre_fruta." ".$cantidad;
        echo " ";
    }*/
    
    
    /*$arreglo = array_values( $objeto ); //Esta función puede ser una buena opción para encontrar las claves y etiquetas viables.
    
    for( $i = 0; $i < count( $arreglo ); $i ++ )
    {
        if( is_array( $arreglo[ $i ] ) )
        {
            $arreglo2 = array_values( $arreglo[ $i ] );
            
            print_r( $arreglo2[ 0 ] );
        }        
    }*/
    
    /*foreach ( $objeto as $key => $value )
    {
        //echo end( $value );
        echo "<br>".$key."<br>";
        print_r( $value );
    }*/
    
    //print_r( end( $objeto[ 'custom_classes  ' ] ) );
    
    echo "<hr>";
    
    print_r( array_keys( $objeto ));
    //print_r( array_keys( $objeto, "class" ));
    
    //$objeto = $objeto[ 'classes' ];
    //print_r( $objeto );
    
    
    // Close the command
    curl_close ($ch);
    
    
    
    
    function imprimir_arreglo( $arreglo )
    {
        $salida = "";
        
        for( $i = 0; $i < count( $arreglo ); $i ++ )
        {
            //echo "<br>";
            $arreglo[ $i ];  
        }
        
        return $salida;
    }
    
    
    
    