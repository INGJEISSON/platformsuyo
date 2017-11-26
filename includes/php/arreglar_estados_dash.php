<?php
$conexion=mysql_connect("localhost","kendraco_suyoapp","+B{xyonCDBv.");
$bd=mysql_select_db("kendraco_suyoapp");

$sql="select id_fasfield from enc_procesadas where tipo_encuesta=2 ";
$query=mysql_query($sql);
    
    while($datos=mysql_fetch_assoc($query)){

      echo   $sql2="select  cod_estado from seguimientos where id_fasfield='".$datos['id_fasfield']."' and tipo_seguimiento=2 order by id_segui_llam desc limit 0,1 ";
        $query2=mysql_query($sql2);
        $datos2=mysql_fetch_assoc($query2);     
        $rows=mysql_num_rows($query2);
                    
                    
                    if($rows){

          echo $update1="update  enc_procesadas set cod_estado='".$datos2['cod_estado']."'  where id_fasfield='".$datos['id_fasfield']."' ";
             $query1=mysql_query($update1);
             
                        if($query1)
                        echo "SI";
                    }
   }