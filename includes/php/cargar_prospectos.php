<!-- http://ProgramarEnPHP.wordpress.com -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>:: Importar de Excel a la Base de Datos ::</title>
</head>

<body>
    <!-- FORMULARIO PARA SOICITAR LA CARGA DEL EXCEL -->
    Selecciona el archivo a importar:
    <form name="importa" method="post" action="<?php echo $PHP_SELF; ?>" enctype="multipart/form-data" >
      
        <p>
          <input type="file" name="excel" />          
          <input type='submit' name='enviar'  value="Importar"  />
          <input type="hidden" value="upload" name="action" />
        </p>
    </form>
    <!-- CARGA LA MISMA PAGINA MANDANDO LA VARIABLE upload -->
    <?php
    extract($_POST);
    if ($action == "upload") {
        //cargamos el archivo al servidor con el mismo nombre
        //solo le agregue el sufijo bak_ 
        $archivo = $_FILES['excel']['name'];
        $tipo = $_FILES['excel']['type'];
        $destino = "bak_" . $archivo;
        if (copy($_FILES['excel']['tmp_name'], $destino)){
            echo "Archivo Cargado Con Éxito";
        }
        else{
            echo "Error Al Cargar el Archivo";
        }
        if (file_exists("bak_" . $archivo)) {
            /** Clases necesarias */
            require_once('Classes/PHPExcel.php');
            require_once('Classes/PHPExcel/Reader/Excel2007.php');
            // Cargando la hoja de cálculo
            $objReader = new PHPExcel_Reader_Excel2007();
            $objPHPExcel = $objReader->load("bak_" . $archivo);
            $objFecha = new PHPExcel_Shared_Date();
            // Asignar hoja de excel activa
            $objPHPExcel->setActiveSheetIndex(0);
            //conectamos con la base de datos 
           $cn = mysql_connect("localhost","kendraco_suyoapp","+B{xyonCDBv.") or die("ERROR EN LA CONEXION");
            $db = mysql_select_db("kendraco_suyoapp", $cn) or die("ERROR AL CONECTAR A LA BD");
          
			
			//Obtengo el número de filas del ese
			$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
			/*$totalregistros = $objPHPExcel->getActiveSheet[0]['numRows']; 
			echo "Total: ".$totalregistros;  */
            // Llenamos el arreglo con los datos  del archivo xlsx           
		    
		   
		  
			 for ($j = 2; $j <=$numRows; $j++) {
							
				$_DATOS_USU[$j]['id_fasfield']= $objPHPExcel->getActiveSheet()->getCell('A' . $j)->getCalculatedValue();
				$_DATOS_USU[$j]['fecha1']= $objPHPExcel->getActiveSheet()->getCell('B' . $j)->getCalculatedValue();
				$_DATOS_USU[$j]['responsable1']= $objPHPExcel->getActiveSheet()->getCell('C' . $j)->getCalculatedValue();
				$_DATOS_USU[$j]['estado1']= $objPHPExcel->getActiveSheet()->getCell('D' . $j)->getCalculatedValue();	
				$_DATOS_USU[$j]['n_intento1']= $objPHPExcel->getActiveSheet()->getCell('E' . $j)->getCalculatedValue();
				$_DATOS_USU[$j]['observacion1']= $objPHPExcel->getActiveSheet()->getCell('F' . $j)->getCalculatedValue();
			
				
			}
			
			 for ($k = 2; $k <=$numRows; $k++) {
			     
			    $_DATOS_USU2[$k]['id_fasfield']= $objPHPExcel->getActiveSheet()->getCell('A' . $k)->getCalculatedValue();
				$_DATOS_USU2[$k]['fecha1']= $objPHPExcel->getActiveSheet()->getCell('G' . $k)->getCalculatedValue();
				$_DATOS_USU2[$k]['responsable1']= $objPHPExcel->getActiveSheet()->getCell('H' . $k)->getCalculatedValue();
				$_DATOS_USU2[$k]['estado1']= $objPHPExcel->getActiveSheet()->getCell('I' . $k)->getCalculatedValue();	
				$_DATOS_USU2[$k]['n_intento1']= $objPHPExcel->getActiveSheet()->getCell('J' . $k)->getCalculatedValue();
				$_DATOS_USU2[$k]['observacion1']= $objPHPExcel->getActiveSheet()->getCell('K' . $k)->getCalculatedValue();
			
							
			
				
			}
			
			 for ($l = 2; $l <=$numRows; $l++) {
			     
			    $_DATOS_USU3[$l]['id_fasfield']= $objPHPExcel->getActiveSheet()->getCell('A' . $l)->getCalculatedValue();
				$_DATOS_USU3[$l]['fecha1']= $objPHPExcel->getActiveSheet()->getCell('L' . $l)->getCalculatedValue();
				$_DATOS_USU3[$l]['responsable1']= $objPHPExcel->getActiveSheet()->getCell('M' . $l)->getCalculatedValue();
				$_DATOS_USU3[$l]['estado1']= $objPHPExcel->getActiveSheet()->getCell('N' . $l)->getCalculatedValue();	
				$_DATOS_USU3[$l]['n_intento1']= $objPHPExcel->getActiveSheet()->getCell('O' . $l)->getCalculatedValue();
				$_DATOS_USU3[$l]['observacion1']= $objPHPExcel->getActiveSheet()->getCell('P' . $l)->getCalculatedValue();
			
			}
			
			 for ($o = 2; $o <=$numRows; $o++) {
			     
			   
			    $_DATOS_USU4[$o]['id_fasfield']= $objPHPExcel->getActiveSheet()->getCell('A' . $o)->getCalculatedValue();
				$_DATOS_USU4[$o]['fecha1']= $objPHPExcel->getActiveSheet()->getCell('Q' . $o)->getCalculatedValue();
				$_DATOS_USU4[$o]['responsable1']= $objPHPExcel->getActiveSheet()->getCell('R' . $o)->getCalculatedValue();
				$_DATOS_USU4[$o]['estado1']= $objPHPExcel->getActiveSheet()->getCell('S' . $o)->getCalculatedValue();	
				$_DATOS_USU4[$o]['n_intento1']= $objPHPExcel->getActiveSheet()->getCell('T' . $o)->getCalculatedValue();
				$_DATOS_USU4[$o]['observacion1']= $objPHPExcel->getActiveSheet()->getCell('U' . $o)->getCalculatedValue();
							
				
			}
			 for ($p = 2; $p <=$numRows; $p++) {
			     
			    $_DATOS_USU5[$p]['id_fasfield']= $objPHPExcel->getActiveSheet()->getCell('A' . $p)->getCalculatedValue();
				$_DATOS_USU5[$p]['fecha1']= $objPHPExcel->getActiveSheet()->getCell('V' . $p)->getCalculatedValue();
				$_DATOS_USU5[$p]['responsable1']= $objPHPExcel->getActiveSheet()->getCell('W' . $p)->getCalculatedValue();
				$_DATOS_USU5[$p]['estado1']= $objPHPExcel->getActiveSheet()->getCell('X' . $p)->getCalculatedValue();	
				$_DATOS_USU5[$p]['n_intento1']= $objPHPExcel->getActiveSheet()->getCell('Y' . $p)->getCalculatedValue();
				$_DATOS_USU5[$p]['observacion1']= $objPHPExcel->getActiveSheet()->getCell('Z' . $p)->getCalculatedValue();
							
			
				
			}
			 for ($q = 2; $q <=$numRows; $q++) {
			     
			    $_DATOS_USU6[$q]['id_fasfield']= $objPHPExcel->getActiveSheet()->getCell('A' . $q)->getCalculatedValue();
				$_DATOS_USU6[$q]['fecha1']= $objPHPExcel->getActiveSheet()->getCell('AA' . $q)->getCalculatedValue();
				$_DATOS_USU6[$q]['responsable1']= $objPHPExcel->getActiveSheet()->getCell('AB' . $q)->getCalculatedValue();
				$_DATOS_USU6[$q]['estado1']= $objPHPExcel->getActiveSheet()->getCell('AC' . $q)->getCalculatedValue();	
				$_DATOS_USU6[$q]['n_intento1']= $objPHPExcel->getActiveSheet()->getCell('AD' . $q)->getCalculatedValue();
				$_DATOS_USU6[$q]['observacion1']= $objPHPExcel->getActiveSheet()->getCell('AE' . $q)->getCalculatedValue();
							
			
				
			}
			 for ($r = 2; $r <=$numRows; $r++) {
			     
			    $_DATOS_USU7[$r]['id_fasfield']= $objPHPExcel->getActiveSheet()->getCell('A' . $r)->getCalculatedValue();
				$_DATOS_USU7[$r]['fecha1']= $objPHPExcel->getActiveSheet()->getCell('AF' . $r)->getCalculatedValue();
				$_DATOS_USU7[$r]['responsable1']= $objPHPExcel->getActiveSheet()->getCell('AG' . $r)->getCalculatedValue();
				$_DATOS_USU7[$r]['estado1']= $objPHPExcel->getActiveSheet()->getCell('AH' . $r)->getCalculatedValue();	
				$_DATOS_USU7[$r]['n_intento1']= $objPHPExcel->getActiveSheet()->getCell('AI' . $r)->getCalculatedValue();
				$_DATOS_USU7[$r]['observacion1']= $objPHPExcel->getActiveSheet()->getCell('AJ' . $r)->getCalculatedValue();
							
			
				
			}
			 for ($s = 2; $s <=$numRows; $s++) {
			     
			    $_DATOS_USU8[$s]['id_fasfield']= $objPHPExcel->getActiveSheet()->getCell('A' . $s)->getCalculatedValue();
				$_DATOS_USU8[$s]['fecha1']= $objPHPExcel->getActiveSheet()->getCell('AK' . $s)->getCalculatedValue();
				$_DATOS_USU8[$s]['responsable1']= $objPHPExcel->getActiveSheet()->getCell('AL' . $s)->getCalculatedValue();
				$_DATOS_USU8[$s]['observacion1']= $objPHPExcel->getActiveSheet()->getCell('AM' . $s)->getCalculatedValue();
							
			
				
			}
        }
        //si por algo no cargo el archivo bak_ 
        else {
            echo "Necesitas primero importar el archivo";
        }
        $errores = 0;
        //recorremos el arreglo multidimensional 
        //para ir recuperando los datos obtenidos
        //del excel e ir insertandolos en la BD
		
		 foreach ($_DATOS_USU as $campo => $valor) {
           
		  // echo "<br>".$valor;
		   
 $sql = " insert into seguimientos (tipo_seguimiento, id_fasfield, fecha_registro, cod_usuario, cod_estado, n_intento, observacion) values (3, '";
		  // $sql = "INSERT INTO prueba VALUES (NULL,'";
            foreach ($valor as $campo2 => $valor2) {
		
//$campo2 == $sql.= $valor2 . "','";
$campo2 == "observacion1" ? $sql.= $valor2 . "');" : $sql.= ($valor2) . "','";
            }
           //echo "<br><br>".$sql;
            $result = mysql_query($sql);
            if (!$result) {
                echo "Error al insertar registro " . $campo;
                $errores+=1;
            }
        }
        
         foreach ($_DATOS_USU2 as $campo => $valor) {
           
		  // echo "<br>".$valor;
		   
 $sql = " insert into seguimientos (tipo_seguimiento, id_fasfield, fecha_registro, cod_usuario, cod_estado, n_intento, observacion) values (3, '";
		  // $sql = "INSERT INTO prueba VALUES (NULL,'";
            foreach ($valor as $campo2 => $valor2) {
		
//$campo2 == $sql.= $valor2 . "','";
$campo2 == "observacion1" ? $sql.= $valor2 . "');" : $sql.= ($valor2) . "','";
            }
           //echo "<br><br>".$sql;
            $result = mysql_query($sql);
            if (!$result) {
                echo "Error al insertar registro " . $campo;
                $errores+=1;
            }
        }
        
         foreach ($_DATOS_USU3 as $campo => $valor) {
           
		  // echo "<br>".$valor;
		   
 $sql = " insert into seguimientos (tipo_seguimiento, id_fasfield, fecha_registro, cod_usuario, cod_estado, n_intento, observacion) values (3, '";
		  // $sql = "INSERT INTO prueba VALUES (NULL,'";
            foreach ($valor as $campo2 => $valor2) {
		
//$campo2 == $sql.= $valor2 . "','";
$campo2 == "observacion1" ? $sql.= $valor2 . "');" : $sql.= ($valor2) . "','";
            }
           //echo "<br><br>".$sql;
            $result = mysql_query($sql);
            if (!$result) {
                echo "Error al insertar registro " . $campo;
                $errores+=1;
            }
        }
        
         foreach ($_DATOS_USU4 as $campo => $valor) {
           
		  // echo "<br>".$valor;
		   
 $sql = " insert into seguimientos (tipo_seguimiento, id_fasfield, fecha_registro, cod_usuario, cod_estado, n_intento, observacion) values (3, '";
		  // $sql = "INSERT INTO prueba VALUES (NULL,'";
            foreach ($valor as $campo2 => $valor2) {
		
//$campo2 == $sql.= $valor2 . "','";
$campo2 == "observacion1" ? $sql.= $valor2 . "');" : $sql.= ($valor2) . "','";
            }
            //echo "<br><br>".$sql;
            $result = mysql_query($sql);
            if (!$result) {
                echo "Error al insertar registro " . $campo;
                $errores+=1;
            }
        }
        
         foreach ($_DATOS_USU5 as $campo => $valor) {
           
		  // echo "<br>".$valor;
		   
 $sql = " insert into seguimientos (tipo_seguimiento, id_fasfield, fecha_registro, cod_usuario, cod_estado, n_intento, observacion) values (3, '";
		  // $sql = "INSERT INTO prueba VALUES (NULL,'";
            foreach ($valor as $campo2 => $valor2) {
		
//$campo2 == $sql.= $valor2 . "','";
$campo2 == "observacion1" ? $sql.= $valor2 . "');" : $sql.= ($valor2) . "','";
            }
           // echo "<br><br>".$sql;
            $result = mysql_query($sql);
            if (!$result) {
                echo "Error al insertar registro " . $campo;
                $errores+=1;
            }
        }
        
         foreach ($_DATOS_USU6 as $campo => $valor) {
           
		  // echo "<br>".$valor;
		   
 $sql = " insert into seguimientos (tipo_seguimiento, id_fasfield, fecha_registro, cod_usuario, cod_estado, n_intento, observacion) values (3, '";
		  // $sql = "INSERT INTO prueba VALUES (NULL,'";
            foreach ($valor as $campo2 => $valor2) {
		
//$campo2 == $sql.= $valor2 . "','";
$campo2 == "observacion1" ? $sql.= $valor2 . "');" : $sql.= ($valor2) . "','";
            }
           // echo "<br><br>".$sql;
            $result = mysql_query($sql);
            if (!$result) {
                echo "Error al insertar registro " . $campo;
                $errores+=1;
            }
        }
        
         foreach ($_DATOS_USU7 as $campo => $valor) {
           
		  // echo "<br>".$valor;
		   
 $sql = " insert into seguimientos (tipo_seguimiento, id_fasfield, fecha_registro, cod_usuario, cod_estado, n_intento, observacion) values (3, '";
		  // $sql = "INSERT INTO prueba VALUES (NULL,'";
            foreach ($valor as $campo2 => $valor2) {
		
//$campo2 == $sql.= $valor2 . "','";
$campo2 == "observacion1" ? $sql.= $valor2 . "');" : $sql.= ($valor2) . "','";
            }
          //  echo "<br><br>".$sql;
           $result = mysql_query($sql);
            if (!$result) {
                echo "Error al insertar registro " . $campo;
                $errores+=1;
            }
        }
        
         foreach ($_DATOS_USU8 as $campo => $valor) {
           
		  // echo "<br>".$valor;
		   
 $sql = " insert into seguimientos (tipo_seguimiento, id_fasfield, fecha_registro, cod_usuario, observacion) values (3, '";
		  // $sql = "INSERT INTO prueba VALUES (NULL,'";
            foreach ($valor as $campo2 => $valor2) {
		
//$campo2 == $sql.= $valor2 . "','";
$campo2 == "observacion1" ? $sql.= $valor2 . "');" : $sql.= ($valor2) . "','";
            }
           // echo "<br><br>".$sql;
            $result = mysql_query($sql);
            if (!$result) {
                echo "Error al insertar registro " . $campo;
                $errores+=1;
            }
        }
        
		
        echo "<strong><center>ARCHIVO IMPORTADO CON EXITO, EN TOTAL $campo REGISTROS Y $errores ERRORES</center></strong>";
        //una vez terminado el proceso borramos el archivo que esta en el servidor el bak_
        unlink($destino);
    }
    ?>
</body>
</html>