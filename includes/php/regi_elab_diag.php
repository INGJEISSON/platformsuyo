 <?php
 session_start();
//Busco los ficheros en formato json.
$conexion=mysql_connect("localhost","kendraco_suyoapp","+B{xyonCDBv.");
$bd=mysql_select_db("kendraco_suyoapp");
      
      if(isset($_GET['id_fasfield'])){ // Buscamos las encuestas

      $sql="select  enc_procesadas.cod_enc_proc, enc_procesadas.asesor, enc_procesadas.cliente,  enc_procesadas.id_cliente, enc_procesadas.fecha_recepcion, enc_procesadas.fecha_revision, enc_procesadas.archivos, estado.descripcion as estado, enc_procesadas.id_fasfield, enc_procesadas.ciudad, enc_procesadas.arch_pdf, tipo_encuesta.nombre as tipo_encuesta from enc_procesadas, estado, tipo_encuesta where enc_procesadas.cod_estado=estado.cod_estado and enc_procesadas.tipo_encuesta=tipo_encuesta.tipo_encuesta  and enc_procesadas.id_fasfield='".$_GET['id_fasfield']."' ";
          $query=mysql_query($sql);
          $rows=mysql_num_rows($query);
          $datos=mysql_fetch_assoc($query);
        $archivo_pdf=$datos['arch_pdf'];    
            
                    // Buscamos dato de la elaboración del diagnóstico..


        $s="select * from elab_diag where id_fasfield='".$_GET['id_fasfield']."' ";
        $q=mysql_query($s);
        $r=mysql_num_rows($q);
                if($r)
                $d=mysql_fetch_assoc($q);
      

        }



?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.25/jquery.fancybox.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.25/jquery.fancybox.min.js"></script>


 <header class="page-header">
           <section class="tables">   
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Elaboración del Diagnóstico de:  <?php echo utf8_encode($datos['cliente']);  ?> - Ciudad: <?php echo utf8_encode($datos['ciudad']);  ?> </h3>
                    </div>
                    <div class="card-body">

                         <p>
                    </p>
                   <center><input name="grabar_proc" type="button" class="btn btn-primary" id="grabar_proc" value="Grabar"> 
                 <a data-fancybox data-type="iframe" class="btn btn-primary" href="includes/php/generar_diag.php?id_fasfield=<?php echo $_GET['id_fasfield'] ?>">Previsualizar Diagnóstico</a> 
                 <a  class="btn btn-primary" target="_blank" href="includes/php/pdfdiagnostico_elab_treal.php?id_fasfield=<?php echo $_GET['id_fasfield'] ?>">Previsualizar Diagnóstico (Tiempo real)</a> 
                 
                   </center> <BR>
                   
                   <?php if($_SESSION['id_grupo']==3 || $_SESSION['id_grupo']==1){ // Equipo de analítica ?>
                   
                       <div class="form-group row">
                         <label class="col-sm-9 form-control-label">Estado del equipo (Analítico):</label>
                              <div class="col-sm-9">
                                <select name="select" id="cod_estado_ana" class="form-control">
                         <option value="1">Elaborando</option>
                         <option value="2">Finalizado</option>
                       </select>
                              </div>
                      </div>
                     <?php } ?>
                
               <?php if($_SESSION['id_grupo']==5 || $_SESSION['id_grupo']==1){ // Equipo de técnico ?>
                   
                       <div class="form-group row">
                         <label class="col-sm-9 form-control-label">Estado del equipo (Técnico):</label>
                              <div class="col-sm-9">
                                <select name="select" id="cod_estado_tec" class="form-control">
                         <option value="1">Elaborando</option>
                         <option value="2">Finalizado</option>
                       </select>
                              </div>
                      </div>
                     <?php } ?>
                
                <?php if($_SESSION['id_grupo']==4 or $_SESSION['id_grupo']==1){ // Equipo Legal ?>
                   
                       <div class="form-group row">
                         <label class="col-sm-9 form-control-label">Estado del equipo (Legal):</label>
                              <div class="col-sm-9">
                                <select name="select" id="cod_estado_leg" class="form-control">
                         <option value="1">Elaborando</option>
                         <option value="2">Finalizado</option>
                       </select>
                              </div>
                      </div>
                     <?php } ?>
                                                   
                 
<form class="form-horizontal">

<?php if($_SESSION['id_grupo']==3 || $_SESSION['id_grupo']==1){ // Equipo de analítica ?>
            <div class="form-group row">
                          <label class="col-sm-9 form-control-label">Fecha:</label>
                          <div class="col-sm-9">
                            <input name="fecha" type="text" class="form-control" id="fecha" value="<?php echo $d['fecha'] ?>">
                          </div>
            </div>
                       
                        <div class="form-group row">
                          <label class="col-sm-9 form-control-label">Usuario:</label>
                          <div class="col-sm-9">
                            <input name="cliente" type="text" class="form-control" id="cliente" value="<?php echo $datos['cliente'] ?>">
                          </div>
                        </div>
                        
                        <div class="line"></div>
                        <div class="form-group row">
                          <label class="col-sm-9 form-control-label">Dirección</label>
                          <div class="col-sm-9">
                            <input type="text" name="direccion" class="form-control" id="direccion" value="<?php echo $d['direccion'] ?>">
                          </div>
                        </div>

                         <div class="line"></div>
                      SERVICIOS RECOMENTADOS<br>
                         <div class="form-group row">
                           <label class="col-sm-9 form-control-label">Gráfica de todos los servicios.
:</label>
                          <div class="col-sm-9">
                        <iframe src="includes/php/subir_archivo_diag.php?id_fasfield=<?php echo $_GET['id_fasfield'] ?>&campo=2" scrolling="no" height="200" width="400" />
                          </div>
                        </div>                     
                        
                         <div class="line"></div>
                      COTIZACIÓN<br>
                         <div class="form-group row">
                           <div class="col-sm-9"></div>
                        </div>
                        
                         <div class="form-group row">
                       
                          <div class="col-sm-9">                  
                   <a data-fancybox data-type="iframe" class="btn btn-primary" href="includes/php/serv_cotizar.php?id_elab_diag=<?php echo $d['id_elab_diag']; ?>&id_fasfield=<?php echo $_GET['id_fasfield']; ?>&tipo=2">Ver/Cotizar servicio(s)</a> 
                
                          </div>
                        </div>            

                          <div class="line"></div>
                       ELEMENTOS PARA TENER EN CUENTA SI DECIDE ADQUIRIR LOS SERVICIOS<br>
                        
                         <div class="form-group row">
                         <label class="col-sm-9 form-control-label">"AQUÍ VIENEN LOS “ASTERISCOS, CONDICIONES Y RESTRICCIONES DE CADA SERVICIO”
":</label>
                          <div class="col-sm-9">
                            <textarea name="cond_serv" class="form-control" id="cond_serv"><?php echo $d['cond_serv'] ?></textarea>
                          </div>
                        </div>

                          <div class="form-group row">
                         <label class="col-sm-9 form-control-label">"Elaboró (Analítico)":</label>
                          <div class="col-sm-9">
                  <input name="elab_analitic" type="text" class="form-control" id="elab_analitic" value="<?php echo $d['elab_analitic'] ?>">
                          </div>
                        </div>

                              <div class="form-group row">
                         <label class="col-sm-9 form-control-label">"Aprobó (Analítico)":</label>
                          <div class="col-sm-9">
                  <input name="apr_analitic" type="text" class="form-control" id="apr_analitic" value="<?php echo $d['apr_analitic'] ?>">
                          </div>
                        </div>

<?php }if($_SESSION['id_grupo']==4 or $_SESSION['id_grupo']==1){ // Equipo Legal ?>

                        <div class="line"></div>
                        <div class="form-group row">
                          <label class="col-sm-9 form-control-label">Identificación</label>
                          <div class="col-sm-9">
                            <input name="id_usuario" type="text" class="form-control" id="id_usuario" value="<?php echo $datos['id_cliente'] ?>">
                          </div>
                        </div>
                     
                        <div class="form-group row">
                          <label class="col-sm-9 form-control-label">Dirección en formato IGAC</label>
                          <div class="col-sm-9">
                            <input type="text" name="dir_form_igac" class="form-control" id="dir_form_igac" value="<?php echo $d['dir_form_igac'] ?>">
                          </div>
                        </div>
                        
                        <div class="line"></div>
                        <div class="form-group row">
                          <label class="col-sm-9 form-control-label">Municipio:</label>
                          <div class="col-sm-9">
                            <input name="municipio" type="text" class="form-control" id="municipio" placeholder="placeholder" value="<?php echo $datos['ciudad'] ?>">
                          </div>
                        </div>
                        
                        <div class="form-group row">
                          <label class="col-sm-9 form-control-label">Barrio:</label>
                          <div class="col-sm-9">
                            <input name="barrio" type="text" class="form-control" id="barrio" value="<?php echo $d['barrio'] ?>" placeholder="Nombre del barrio para el cliente (Nombre del Barrio Legal)">
                          </div>
                        </div>
                       
                        <div class="line"></div>
                         NECESIDAD IDENTIFICADA<br>
                         <div class="form-group row">
                          <label class="col-sm-9 form-control-label">Frase de necesidad en formalización:</label>
                          <div class="col-sm-9">
                            <textarea name="f_nec_form" class="form-control" id="f_nec_form"  placeholder="Introduzca aquí la necesidad de formalización"><?php echo $d['f_nec_form'] ?></textarea>
                          </div>
                        </div>
                        
                       <div class="line"></div>
                        FORMA COMO FUE ADQUIRIDO EL PREDIO POR EL USUARIO:<br>
                        
                        <div class="form-group row">
                          <label class="col-sm-9 form-control-label">"Párrafo de cómo fue adquirido el predio por el cliente
"
:</label>
                          <div class="col-sm-9">
                            <textarea name="par_predio_client" class="form-control" id="par_predio_client" placeholder="Introduzca Párrafo de cómo fue adquirido el predio por el cliente"><?php echo $d['par_predio_client'] ?></textarea>
                          </div>
                        </div>

                      <div class="form-group row">
                          <label class="col-sm-9 form-control-label">"Análisis de la información aportada por la cliente. poner los documentos aportados. resultado del análisis
  AQUÍ SE PONEN TODAS LAS FUENTES Y DOCUMENTOS":</label>
                          <div class="col-sm-9">
                            <textarea name="analis_client" class="form-control" id="analis_client" placeholder="Introduzca todos los documentos soportados por el cliente"><?php echo $d['analis_client'] ?></textarea>
                          </div>
                        </div>
                        
                        <div class="form-group row">
                          <label class="col-sm-9 form-control-label">"SI SE TRATA DE UN “PARCIAL A LA ESPERA DE INFORMACIÓN” PONER LO QUE SE ESTÁ ESPERANDO":</label>
                          <div class="col-sm-9">
                            <textarea name="msg_info" class="form-control" id="msg_info" placeholder=""><?php echo $d['msg_info'] ?></textarea>
                          </div>
                        </div>

                       <div class="line"></div>
                      SERVICIOS RECOMENTADOS<br>
                        
                        
                         <div class="form-group row">
                                                  <div class="col-sm-9">
     <a data-fancybox data-type="iframe" class="btn btn-primary" href="includes/php/serv_cotizar.php?id_elab_diag=<?php echo $d['id_elab_diag']; ?>&id_fasfield=<?php echo $_GET['id_fasfield']; ?>&tipo=1">Ver/Agregar Servicio(s)</a>  
                          </div>
                        </div>
                        
                        
                        <div class="line"></div>
                       Otras situaciones relacionadas con el predio y la construcción<br>
                         <div class="form-group row">
                          <label class="col-sm-9 form-control-label">"Frases sobre otras situaciones especiales (Legal)
":</label>
                          <div class="col-sm-9">
                            <textarea name="f_esp_legal" class="form-control" id="f_esp_legal" placeholder="Introduzca Frases sobre otras situaciones especiales (Legal)"><?php echo $d['f_esp_legal'] ?></textarea>
                          </div>
                        </div>
<div class="line"></div>
                       ESTE DIAGNÓSTICO SE REALIZÓ CON BASE EN LA SIGUIENTE INFORMACIÓN:<br>
                        
                         <div class="form-group row">
                         <label class="col-sm-9 form-control-label">"Aportados por el cliente (Legal) (Separe por comas)":</label>
                          <div class="col-sm-9">
                            <textarea name="aport_client_legal" class="form-control" id="aport_client_legal"><?php echo $d['aport_client_legal'] ?></textarea>
                          </div>
                        </div>


   <div class="form-group row">
                         <label class="col-sm-9 form-control-label">"Aportados Suyo (Legal) (Separe por comas)":</label>
                          <div class="col-sm-9">
                  <input name="aport_legal" type="text" class="form-control" id="aport_legal" value="<?php echo $d['aport_legal'] ?>">
                          </div>
                        </div>
                           EN ESTE DIAGNÓSTICO PARTICIPARON :<br>
                        <div class="form-group row">
                         <label class="col-sm-9 form-control-label">"Elaboró (Legal)":</label>
                          <div class="col-sm-9">
                  <input name="elab_legal" type="text" class="form-control" id="elab_legal" value="<?php echo $d['elab_legal'] ?>">
                          </div>
                        </div>

                         <div class="form-group row">
                         <label class="col-sm-9 form-control-label">"Aprobó (Legal)":</label>
                          <div class="col-sm-9">
                  <input name="apr_legal" type="text" class="form-control" id="apr_legal" value="<?php echo $d['apr_legal'] ?>">
                          </div>
                        </div>
<?php }  if($_SESSION['id_grupo']==5 or $_SESSION['id_grupo']==1){ // Equipo Legal ?>

                         <div class="form-group row">
                          <label class="col-sm-9 form-control-label">Frase de necesidad en Legalización:</label>
                          <div class="col-sm-9">
                            <textarea name="f_nec_legal" class="form-control" id="f_nec_legal"  placeholder="Introduzca aquí la necesidad de Legalización"><?php echo $d['f_nec_legal'] ?> </textarea>
                          </div>
                        </div>
                        
                        <div class="line"></div>
                        SITUACIÓN ACTUAL<br>
                          <div class="form-group row">
                          <label class="col-sm-9 form-control-label">Frase que incluya la ubicación, coordenadas,  tipo de suelo
:</label>
                          <div class="col-sm-9">
                            <textarea name="f_ubic_coor" class="form-control" id="f_ubic_coor"  placeholder="Introduzca aquí la Frase que incluya la ubicación, coordenadas,  tipo de suelo
"><?php echo $d['f_ubic_coor'] ?></textarea>
                          </div>
                        </div>
                        
                         <div class="form-group row">
                          <label class="col-sm-9 form-control-label">Frase sobre los años de la construcción y se hizo o no con licencia
:</label>
                          <div class="col-sm-9">
                            <textarea name="f_cons_lic" class="form-control" id="f_cons_lic"  placeholder="Introduzca aquí la Frase sobre los años de la construcción y se hizo o no con licencia
"><?php echo $d['f_cons_lic'] ?></textarea>
                          </div>
                        </div>
                        
                          <div class="form-group row">
                          <label class="col-sm-9 form-control-label">Foto en donde el cliente y el asesor o cualquier persona esté en capacidad de saber la ubicación del predio. Para esto se debe tener en cuenta la escala, que vean los nombres de las calles y que se vea el nombre del cliente. (Tener en cuenta la impresión).
:</label>
                          <div class="col-sm-9">
                         <iframe src="includes/php/subir_archivo_diag.php?id_fasfield=<?php echo $_GET['id_fasfield'] ?>&campo=1" scrolling="no" height="200" width="400" />
                          </div>
                        </div>
                        
                        <div class="line"></div>
                        ANÁLISIS DEL CUMPLIMIENTO DEL PLAN DE ORDENAMIENTO TERRITORIAL CON RESPECTO A LAS CARACTERÍSTICAS AMBIENTALES <br>
                          <div class="form-group row">
                          <label class="col-sm-9 form-control-label">Frase sobre si tiene o no Riesgo de inundación

:</label>
                          <div class="col-sm-9">
                            <textarea name="f_riesg_inun" class="form-control" id="f_riesg_inun"  placeholder="Introduzca aquí la Frase sobre si tiene o no Riesgo de inundación"><?php echo $d['f_riesg_inun'] ?></textarea>
                          </div>
                        </div>
                        
                        <div class="form-group row">
                          <label class="col-sm-9 form-control-label">Frase sobre si tiene o no Riesgo de Remoción:</label>
                          <div class="col-sm-9">
                            <textarea name="f_riesg_remo" class="form-control" id="f_riesg_remo"  placeholder="Introduzca aquí la Frase sobre si tiene o no Riesgo de Remoción
"><?php echo $d['f_riesg_remo'] ?></textarea>
                          </div>
                        </div>
                        
                         <div class="form-group row">
                          <label class="col-sm-9 form-control-label">Frase sobre si tiene o no Suelo de protección
:</label>
                          <div class="col-sm-9">
                            <textarea name="f_riesg_proct" class="form-control" id="f_riesg_proct" placeholder="Introduzca aquí la Frase sobre si tiene o no Suelo de protección"><?php echo $d['f_riesg_proct'] ?></textarea>
                          </div>
                        </div>
                        
                         <div class="line"></div>
                        ANÁLISIS DEL CUMPLIMIENTO DEL PLAN DE ORDENAMIENTO TERRITORIAL CON RESPECTO A LAS CARACTERÍSTICAS FÍSICAS DE LA PROPIEDAD<br>
                          <div class="form-group row">
                          <label class="col-sm-9 form-control-label">TIPOLOGÍA: cantidad de viviendas por construcción ( Separe por comas: el concepto de (Predio del usuario, Exigencias del POT, Cumplimiento de las exigencias) )
:</label>
                          <div class="col-sm-9">
                            <textarea name="tipol_cant_constr" class="form-control" id="tipol_cant_constr" placeholder=" Separe por comas: el concepto de (Predio del usuario, Exigencias del POT, Cumplimiento de las exigencias)"><?php echo $d['tipol_cant_constr'] ?></textarea>
                          </div>
                        </div>
                        
                        <div class="form-group row">
                          <label class="col-sm-9 form-control-label">ALTURA: cantidad de pisos construidos ( Separe por comas: el concepto de (Predio del usuario, Exigencias del POT, Cumplimiento de las exigencias) )
:</label>
                          <div class="col-sm-9">
                            <textarea name="alt_cant_pisos" class="form-control" id="alt_cant_pisos" placeholder="Separe por comas: el concepto de (Predio del usuario, Exigencias del POT, Cumplimiento de las exigencias)
"><?php echo $d['alt_cant_pisos'] ?></textarea>
                          </div>
                        </div>
                        
                         <div class="form-group row">
                          <label class="col-sm-9 form-control-label">Area del lote ( Separe por comas: el concepto de (Predio del usuario, Exigencias del POT, Cumplimiento de las exigencias) ):</label>
                          <div class="col-sm-9">
                            <textarea name="area_lote" class="form-control" id="area_lote" placeholder="Separe por comas: el concepto de (Predio del usuario, Exigencias del POT, Cumplimiento de las exigencias)"><?php echo $d['area_lote'] ?></textarea>
                          </div>
                        </div>
                        
                         <div class="form-group row">
                          <label class="col-sm-9 form-control-label">Dimensión frente del lote  ( Separe por comas: el concepto de (Predio del usuario, Exigencias del POT, Cumplimiento de las exigencias) ):</label>
                          <div class="col-sm-9">
                            <textarea name="dim_frent_lote" class="form-control" id="dim_frent_lote" placeholder="Separe por comas: el concepto de (Predio del usuario, Exigencias del POT, Cumplimiento de las exigencias)"><?php echo $d['dim_frent_lote'] ?></textarea>
                          </div>
                        </div>
                        
                        <div class="form-group row">
                          <label class="col-sm-9 form-control-label">Dimensión frente de la construcción ( Separe por comas: el concepto de (Predio del usuario, Exigencias del POT, Cumplimiento de las exigencias) )
:</label>
                          <div class="col-sm-9">
                            <textarea name="dim_frent_const" class="form-control" id="dim_frent_const" placeholder="Separe por comas: el concepto de (Predio del usuario, Exigencias del POT, Cumplimiento de las exigencias)"><?php echo $d['dim_frent_const'] ?></textarea>
                          </div>
                        </div>
                        
                         <div class="form-group row">
                          <label class="col-sm-9 form-control-label">Distancia entre el lado posterior del lote y la construcción ( Separe por comas: el concepto de (Predio del usuario, Exigencias del POT, Cumplimiento de las exigencias) )
:</label>
                          <div class="col-sm-9">
                            <textarea name="dist_lad_lot" class="form-control" id="dist_lad_lot" placeholder="Separe por comas: el concepto de (Predio del usuario, Exigencias del POT, Cumplimiento de las exigencias)"><?php echo $d['dist_lad_lot'] ?></textarea>
                          </div>
                        </div>
                        
                         <div class="form-group row">
                          <label class="col-sm-9 form-control-label">Distancia entre el lado izquierdo del lote y la construcción ( Separe por comas: el concepto de (Predio del usuario, Exigencias del POT, Cumplimiento de las exigencias) ):</label>
                          <div class="col-sm-9">
                            <textarea name="dist_lot_izq" class="form-control" id="dist_lot_izq" placeholder="Separe por comas: el concepto de (Predio del usuario, Exigencias del POT, Cumplimiento de las exigencias)"><?php echo $d['dist_lot_izq'] ?></textarea>
                          </div>
                        </div>
                        
                         <div class="form-group row">
                          <label class="col-sm-9 form-control-label">Distancia entre el lado derecho del lote y la construcción ( Separe por comas: el concepto de (Predio del usuario, Exigencias del POT, Cumplimiento de las exigencias)):</label>
                          <div class="col-sm-9">
                            <textarea name="dist_lot_der" class="form-control" id="dist_lot_der" placeholder="Separe por comas: el concepto de (Predio del usuario, Exigencias del POT, Cumplimiento de las exigencias)"><?php echo $d['dist_lot_der'] ?></textarea>
                          </div>
                        </div>
                        
                        
                         <div class="form-group row">
                          <label class="col-sm-9 form-control-label">Se toma el área tipo de área (catastral, registral, etc):</label>
                          <div class="col-sm-9">
                            <textarea name="area_catastral" class="form-control" id="area_catastral" placeholder="Introduzca tipo de area (Catastral, registral, etc)"><?php echo $d['area_catastral'] ?></textarea>
                          </div>
                        </div>
                        
                         <div class="form-group row">
                          <label class="col-sm-9 form-control-label">Él area que aparece en xxxx otro documentoxxxxx:</label>
                          <div class="col-sm-9">
                  <input name="area_docu" type="text" class="form-control" id="area_docu" value="<?php echo $d['area_docu'] ?>" placeholder="Introduzca el area que aparece en otro documento">
                          </div>
                        </div>
                        
                        <div class="form-group row">
                          <label class="col-sm-9 form-control-label">Es de:</label>
                          <div class="col-sm-9">
                  <input name="ara_docu_es_de" type="text" class="form-control" id="ara_docu_es_de" value="<?php echo $d['ara_docu_es_de'] ?>" placeholder="Introduzca de quién es el otro documento">
                          </div>
                        </div>
                       
                         <div class="form-group row">
                          <label class="col-sm-9 form-control-label">Y en la encuesta de diagnóstico el área medida fue de: 
:</label>
                          <div class="col-sm-9">
                  <input name="area_med_de" type="text" class="form-control" id="area_med_de" value="<?php echo $d['area_med_de'] ?>" placeholder="Introduzca area de medida">
                          </div>
                        </div>
                      
                          <div class="form-group row">
                          <label class="col-sm-9 form-control-label">"PONER LO QUE CUMPLEXXXXXX y XXXXXXXXPONER LO QUE NO CUMPLE Y LAS RAZONES, CUANDO SEA EL CASO"
:</label>
                          <div class="col-sm-9">
                            <textarea name="raz_cumpl" class="form-control" id="raz_cumpl" placeholder="Introduzca Lo que cumploe xxxx y xxxxintroducir lo que no cumple y las razones, cuando sea el caso"><?php echo $d['raz_cumpl'] ?></textarea>
                          </div>
                        </div>
                        
                      
                        <div class="line"></div>
                       Otras situaciones relacionadas con el predio y la construcción<br>
                       
                        
                         <div class="form-group row">
                         <label class="col-sm-9 form-control-label">"Frases sobre otras situaciones especiales (Técnico)":</label>
                          <div class="col-sm-9">
                            <textarea name="f_esp_tecn" class="form-control" id="f_esp_tecn" placeholder="Introduzca Frases sobre otras situaciones especiales (Técnico)"><?php echo $d['f_esp_tecn'] ?></textarea>
                          </div>
                        </div>
                        
                        <div class="line"></div>
                       ESTE DIAGNÓSTICO SE REALIZÓ CON BASE EN LA SIGUIENTE INFORMACIÓN:<br>
                        
                  
                        
                         <div class="form-group row">
                         <label class="col-sm-9 form-control-label">"Aportados por el cliente (Técnico) (Separe por comas)":</label>
                          <div class="col-sm-9">
                            <textarea name="aport_client_tecni" class="form-control" id="aport_client_tecni"><?php echo $d['aport_client_tecni'] ?></textarea>
                          </div>
                        </div> 

                             <div class="form-group row">
                         <label class="col-sm-9 form-control-label">"Aportados Suyo (Técnico) (Separe por comas)":</label>
                          <div class="col-sm-9">
                            <textarea name="aport_tecni" class="form-control" id="aport_tecni"><?php echo $d['aport_tecni'] ?></textarea>
                          </div>
                        </div> 

                           <div class="line"></div>
                       EN ESTE DIAGNÓSTICO PARTICIPARON :<br>
                       
                         <div class="form-group row">
                         <label class="col-sm-9 form-control-label">"Elaboró (Técnico)":</label>
                          <div class="col-sm-9">
                  <input name="elab_tecnico" type="text" class="form-control" id="elab_tecnico" value="<?php echo $d['elab_tecnico'] ?>">
                          </div>
                        </div>                     
                       
                     
                        
                        <div class="form-group row">
                         <label class="col-sm-9 form-control-label">"Aprobó (Técnico)":</label>
                          <div class="col-sm-9">
                  <input name="apro_tecnico" type="text" class="form-control" id="apro_tecnico" value="<?php echo $d['apro_tecnico'] ?>">
                          </div>
                        </div>

                      
    <?php }if($_SESSION['id_grupo']==3 || $_SESSION['id_grupo']==1 || $_SESSION['id_grupo']==4){ // Equipo Legal y Analítico ?>                    
                    
                    <div class="line"></div>
                       OTRAS FUENTES CONSULTADAS:<br>
                        <div class="form-group row">
                         <label class="col-sm-9 form-control-label">"Llamada con el cliente":</label>
                          <div class="col-sm-9">
                  <input name="llamada_client" type="text" class="form-control" id="llamada_client" value="<?php echo $d['llamada_client'] ?>">
                          </div>
                        </div>
                        
                         <div class="form-group row">
                         <label class="col-sm-9 form-control-label">"Página web":</label>
                          <div class="col-sm-9">
                  <input name="pagina_web" type="text" class="form-control" id="pagina_web" value="<?php echo $d['pagina_web'] ?>">
                          </div>
                        </div>
                        
                         <div class="form-group row">
                         <label class="col-sm-9 form-control-label">"Consultas en entidades":</label>
                          <div class="col-sm-9">
                  <input name="consult_ent" type="text" class="form-control" id="consult_ent" value="<?php echo $d['consult_ent'] ?>">
                          </div>
                        </div>
                        
                         <div class="form-group row">
                         <label class="col-sm-9 form-control-label">"POT":</label>
                          <div class="col-sm-9">
                  <input name="pot" type="text" class="form-control" id="pot" value="<?php echo $d['pot'] ?>">
                          </div>
                        </div>
                        
                         <div class="form-group row">
                         <label class="col-sm-9 form-control-label">"Derechos de petición":</label>
                          <div class="col-sm-9">
                  <input name="der_peticion" type="text" class="form-control" id="der_peticion" value="<?php echo $d['der_peticion'] ?>">
                          </div>
                        </div>
                        
         <?php } // Equipo Legal y Analítico ?>             

                     
                        

                        
                  
                      
  <!-- Modal-->
                      <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Servicios</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body" id='m_body_serv'>
                              
                            </div>
                            <div class="modal-footer">
                              <button type="button" data-dismiss="modal" class="btn btn-secondary">Cerrar</button>
                            </div>
                          </div>
                        </div>
                      </div>         

         
                        
                        
                    </form>
                         <p>&nbsp;</p>
                         <p>&nbsp;</p>
                      <p>&nbsp;</p>
                      <p>
                      <div id='cargar2' align="center"> 
                            <img src="img/loading_azul.gif" id="cargar2">
                        <p>Por favor espere  mientras se crea el carpeta del cliente en el drive.</p>
                      </div>
                         </p>
                      <p>&nbsp;</p>
                  </div>
                  </div>
                </div>
               
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </section>
         
  <script type="text/javascript">

$(document).ready(function(){
    $("#grabar_proc").click(function(){
        
        var grupo_usuario=<?php echo $_SESSION['id_grupo'] ?>;
        var ciudad= $('#ciudad').val();
        var fecha= $('#fecha').val();
        var direccion= $('#direccion').val();
        var id_usuario= $('#id_usuario').val();
        var dir_form_igac= $('#dir_form_igac').val();
        var barrio= $('#barrio').val();
        var municipio= $('#municipio').val();
        var f_nec_form= $('#f_nec_form').val();
        var f_nec_legal= $('#f_nec_legal').val();
        var f_ubic_coor= $('#f_ubic_coor').val();
        var f_cons_lic= $('#f_cons_lic').val();       
        var f_riesg_inun= $('#f_riesg_inun').val();
        var f_riesg_remo= $('#f_riesg_remo').val();
        var f_riesg_proct= $('#f_riesg_proct').val();
        var tipol_cant_constr= $('#tipol_cant_constr').val();
        var alt_cant_pisos= $('#alt_cant_pisos').val();
        var area_lote= $('#area_lote').val();
        var dim_frent_lote= $('#dim_frent_lote').val();
        var dim_frent_const= $('#dim_frent_const').val();
        var dist_lad_lot= $('#dist_lad_lot').val();
        var dist_lot_izq= $('#dist_lot_izq').val();
        var dist_lot_der= $('#dist_lot_der').val();
        var area_catastral= $('#area_catastral').val();
        var area_docu= $('#area_docu').val();
        var ara_docu_es_de= $('#ara_docu_es_de').val();
        var area_med_de= $('#area_med_de').val();
        var raz_cumpl= $('#raz_cumpl').val();
        var par_predio_client= $('#par_predio_client').val();
        var analis_client= $('#analis_client').val();
        var msg_info= $('#msg_info').val();
        var f_esp_legal= $('#f_esp_legal').val();
        var f_esp_tecn= $('#f_esp_tecn').val();
        var foto_graf_all_serv= $('#foto_graf_all_serv').val();
        var foto_graf_serv= $('#foto_graf_serv').val();
        var cond_serv= $('#cond_serv').val();
        var aport_client_legal= $('#aport_client_legal').val();
        var aport_client_tecni= $('#aport_client_tecni').val();
        var aport_legal= $('#aport_legal').val();
        var aport_tecni= $('#aport_tecni').val();
        var llamada_client= $('#llamada_client').val();
        var pagina_web= $('#pagina_web').val();
        var consult_ent= $('#consult_ent').val();
        var pot= $('#pot').val();
        var der_peticion= $('#der_peticion').val();
        var elab_legal= $('#elab_legal').val();
        var elab_tecnico= $('#elab_tecnico').val();
        var elab_analitic= $('#elab_analitic').val();
        var apr_legal= $('#apr_legal').val();
        var apro_tecnico= $('#apro_tecnico').val();
        var apr_analitic= $('#apr_analitic').val();
        var id_fasfield="<?php echo "$_GET[id_fasfield]" ?>";
		var cod_estado_tec= $('#cod_estado_tec').val();
		var cod_estado_ana= $('#cod_estado_ana').val();
		var cod_estado_leg= $('#cod_estado_leg').val();

        
                
                // Equipo analítico
                    if(grupo_usuario==3)
                        var datos='g_elab_diag='+1+'&fecha='+fecha+'&direccion='+direccion+'&cond_serv='+cond_serv+'&elab_analitic='+elab_analitic+'&apr_analitic='+apr_analitic+'&llamada_client='+llamada_client+'&pagina_web='+pagina_web+'&consult_ent='+consult_ent+'&pot='+pot+'&der_peticion='+der_peticion+'&id_fasfield='+id_fasfield+'&cod_estado_ana='+cod_estado_ana;

                // Equipo Legal
                 else  if(grupo_usuario==4)
                        var datos='g_elab_diag='+1+'&dir_form_igac='+dir_form_igac+'&barrio='+barrio+'&municipio='+municipio+'&f_nec_form='+f_nec_form+'&par_predio_client='+par_predio_client+'&analis_client='+analis_client+'&msg_info='+msg_info+'&f_esp_legal='+f_esp_legal+'&aport_client_legal='+aport_client_legal+'&elab_legal='+elab_legal+'&apr_legal='+apr_legal+'&llamada_client='+llamada_client+'&pagina_web='+pagina_web+'&consult_ent='+consult_ent+'&pot='+pot+'&der_peticion='+der_peticion+'&aport_legal='+aport_legal+'&id_fasfield='+id_fasfield+'&cod_estado_leg='+cod_estado_leg;

                 // Equipo técnico
                 else  if(grupo_usuario==5)
                        var datos='g_elab_diag='+1+'&f_nec_legal='+f_nec_legal+'&f_ubic_coor='+f_ubic_coor+'&f_cons_lic='+f_cons_lic+'&f_riesg_inun='+f_riesg_inun+'&f_riesg_remo='+f_riesg_remo+'&f_riesg_proct='+f_riesg_proct+'&tipol_cant_constr='+tipol_cant_constr+'&alt_cant_pisos='+alt_cant_pisos+'&dim_frent_lote='+dim_frent_lote+'&dim_frent_const='+dim_frent_const+'&dist_lad_lot='+dist_lad_lot+'&dist_lot_izq='+dist_lot_izq+'&dist_lot_der='+dist_lot_der+'&area_catastral='+area_catastral+'&area_docu='+area_docu+'&ara_docu_es_de='+ara_docu_es_de+'&area_med_de='+area_med_de+'&raz_cumpl='+raz_cumpl+'&f_esp_tecn='+f_esp_tecn+'&aport_client_tecni='+aport_client_tecni+'&aport_tecni='+aport_tecni+'&apro_tecnico='+apro_tecnico+'&area_lote='+area_lote+'&elab_tecnico='+elab_tecnico+'&id_fasfield='+id_fasfield+'&cod_estado_tec='+cod_estado_tec;
                    
                    // Usuario super administrador..
                  else  if(grupo_usuario==1)
                     var datos='g_elab_diag='+1+'&fecha='+fecha+'&direccion='+direccion+'&cond_serv='+cond_serv+'&elab_analitic='+elab_analitic+'&apr_analitic='+apr_analitic+'&llamada_client='+llamada_client+'&pagina_web='+pagina_web+'&consult_ent='+consult_ent+'&pot='+pot+'&der_peticion='+der_peticion+'&direccion='+direccion+'&dir_form_igac='+dir_form_igac+'&barrio='+barrio+'&municipio='+municipio+'&f_nec_form='+f_nec_form+'&par_predio_client='+par_predio_client+'&analis_client='+analis_client+'&msg_info='+msg_info+'&f_esp_legal='+f_esp_legal+'&aport_client_legal='+aport_client_legal+'&elab_legal='+elab_legal+'&apr_legal='+apr_legal+'&f_nec_legal='+f_nec_legal+'&f_ubic_coor='+f_ubic_coor+'&f_cons_lic='+f_cons_lic+'&f_riesg_inun='+f_riesg_inun+'&f_riesg_remo='+f_riesg_remo+'&f_riesg_proct='+f_riesg_proct+'&tipol_cant_constr='+tipol_cant_constr+'&alt_cant_pisos='+alt_cant_pisos+'&dim_frent_lote='+dim_frent_lote+'&dim_frent_const='+dim_frent_const+'&dist_lad_lot='+dist_lad_lot+'&dist_lot_izq='+dist_lot_izq+'&dist_lot_der='+dist_lot_der+'&area_catastral='+area_catastral+'&area_docu='+area_docu+'&ara_docu_es_de='+ara_docu_es_de+'&area_med_de='+area_med_de+'&raz_cumpl='+raz_cumpl+'&f_esp_tecn='+f_esp_tecn+'&aport_client_tecni='+aport_client_tecni+'&aport_tecni='+aport_tecni+'&apro_tecnico='+apro_tecnico+'&area_lote='+area_lote+'&elab_tecnico='+elab_tecnico+'&aport_legal='+aport_legal+'&id_fasfield='+id_fasfield+'&cod_estado_tec='+cod_estado_tec+'&cod_estado_ana='+cod_estado_ana+'&cod_estado_leg='+cod_estado_leg;

                  
                            $.ajax({

                                 type: "POST",
                                 data: datos,
                                 url: 'includes/php/g_procesos.php?'+datos,
                                 success: function(valor){
                                            if(valor==1)
                                                alert("Datos guardados correctamente");
                                            else
                                                alert("Ocurrió un error, por favor contacte con el administrador");

                                 }

                            });




    
        
    });
    
 
$("#cargar2").hide();
$("#archrev").hide();
$("#archrev2").hide();
$("#pan_add_revision").hide();

$("#add_revision").click(function(){
$("#pan_add_revision").show();

});

$("#cod_estado").change(function(){
        var cod_estado=$("#cod_estado").val();

           if(cod_estado==8 || cod_estado==9 || cod_estado==5){
            $("#archrev").show();
$("#archrev2").show();
           }
            else{
             $("#archrev").hide();
$("#archrev2").hide();
            }


  });


});

    </script>