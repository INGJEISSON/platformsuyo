<?php
session_start();
$conexion=mysql_connect("localhost","kendraco_suyoapp","+B{xyonCDBv.");
$bd=mysql_select_db("kendraco_suyoapp");


			// Agregamos archivo....

//comprobamos que sea una petición ajax
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
{
    
    //Consultamos el nom_llaamda 
    
    $sql="select * from call_center_grab where id='".$_GET['id']."'";
    $query=mysql_query($sql);
    $datos=mysql_fetch_assoc($query);
            
            $nom_archivo=$datos['user_call']."_".$_GET['id'].".mp3";

    //obtenemos el archivo a subir
    $file = $_FILES['archivo']['name'];
$dir_proceso='../files/llamadas_call';
    //comprobamos si existe un directorio para subir el archivo
    //si no es así, lo creamos
    if(!is_dir("files/")) 
        mkdir("files/", 0777);
     
    //comprobamos si el archivo ha subido
    if ($file && move_uploaded_file($_FILES['archivo']['tmp_name'],"../files/llamadas_call/".$file))
    {
       //sleep(3);//retrasamos la petición 3 segundos
       rename ("../files/llamadas_call/".$file, "../files/llamadas_call/".$nom_archivo);
     //   rename($dir_proceso."/".$file, $dir_proceso."/".$nom_archivo);
       // rename ($file, $dir_proceso."/".$nom_archivo); //  renobrado
        
       			// insertamos archivos...
       			$insert="update call_center_grab set ruta='".$nom_archivo."' where id='".$_GET['id']."' ";
       				$query=mysql_query($insert);

       					//	if($query)
       						//	$_SESSION['nom_archivo']=$file;



       echo $file;//devolvemos el nombre del archivo para pintar la imagen
    }
}else{
    throw new Exception("Error Processing Request", 1);   
}


?>