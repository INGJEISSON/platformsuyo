<?php
include('conexion.php');
// Listamos los servicios
$sql="select * from elab_diag where id_fasfield='".$_GET['id_fasfield']."'";
$query=mysql_query($sql);
$datos=mysql_fetch_assoc($query);
?>


<page>
 
     <page_footer>
     <? // include('pie_membrete.php'); ?>
     <table>
            <tr>
                <td style="width: 100%; text-align: right">
                  <i>SUYO COLOMBIA S.A.S."</i>    <b>Página [[page_cu]]/[[page_nb]]</b>
                </td>
            </tr>
     </table>
    </page_footer> 
      <div style="text-align:right"><img style="text-align: right" src="https://lh3.googleusercontent.com/7wegHCkVVzQdFbM9Edqqyj3CmIefI8EIZCH9OkDscXP8DYfMhdgph5iuuuGR1SvgIuqP_TcxaGXWzcB3ERSQF_RI07QqFoCumZa2AatwVlob5Plw254Y-KtCKqPHf0H--qjkECW7" width="12%" height="79" alt="https://static.wixstatic.com/media/2d07ea_988eb38e78f140029a2451dfeaad7e30~mv2.png/v1/fill/w_224,h_80,al_c,usm_0.66_1.00_0.01/2d07ea_988eb38e78f140029a2451dfeaad7e30~mv2.png"/></div>
    
<br /><br />

     <table width="200" border="0" cellpadding="0" cellspacing="0">
       <tr>
         <td> <?php echo $datos['ciudad'] ?>, <?php echo $datos['fecha'] ?></td>
       </tr>
       <tr>
         <td>Sr.</td>
       </tr>
       <tr>
         <td><?php echo $datos['cliente'] ?></td>
       </tr>
       <tr>
         <td><?php echo $datos['direccion'] ?></td>
       </tr>
       <tr>
         <td></td>
       </tr>
     </table>
     <p style="text-align:justify; line-height: 24px; width:60%;" >Por medio de la presente nos permitimos en primera medida agradecer la confianza que ha depositado en Suyo y en todo el grupo de profesionales que hay detrás de esta empresa de impacto social, le aseguro que cada uno de ellos ha puesto todo su empeño y conocimiento para garantizar que le brindamos la mejor asesoría posible sobre los servicios que su propiedad requiere.</p>
<p style="text-align:justify; line-height: 24px; width:60%;">En sus manos tiene un documento de diagnóstico de propiedad en el cual resumimos el análisis legal y técnico que hemos realizado de su caso; sin embargo aclaramos que esta es una entrega parcial del servicio de diagnóstico que usted ha contratado con nosotros, pues aunque hemos identificado la situación general de su predio, aún estamos adelantando investigaciones para determinar el propietario real y con ello dar una respuesta definitiva ofreciéndole el servicio de titulación que debe adelantar.</p>
<p style="text-align:justify; line-height: 24px; width:60%;">En las siguientes páginas encontrará la explicación detallada de los servicios que le recomendamos tomar mientras que avanzamos con las investigaciones. En cuanto tengamos una conclusión definitiva, el asesor de ventas que le está acompañando, se comunicará nuevamente con usted para hacer la entrega del documento final.</p>
<p style="text-align:justify; line-height: 24px; width:60%;">Finalmente, quisiera reiterarle que sabemos que su hogar es su bien más preciado, por esto no defraudaremos su voto de confianza. Esperamos que pueda tomar los servicios recomendados con nosotros, Suyo y todo su equipo humano estará esperándole para asesorarlo y guiarlo de forma personalizada.</p>
<p style="text-align:center"><img src="https://lh6.googleusercontent.com/S8hQYTfhd_Qt3iTC2g38QpGS1gguU8HMtAW2QkzbM2i4FYz5HNOJwZHxqBnnxwgY9BPsLsEmM1ZITvBBpy-3tHKFg5EPcHausGam3-Pz_b6dhK_UozfoyQTOC5pvFSBjMRfkzvL3" width="404" height="225" alt="_PEQ2679.jpg" style="text-align:center"/></p>
<p>¡Gracias por confiar en nosotros!</p>
<p>Cordialmente,</p>
<table width="200" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><strong><img src="https://lh5.googleusercontent.com/llqj-FMdM8Qnt0gnioi6QwIvFuZXBpqvc2sLdKmJfvEaByQ9m1ofb2dwW16XZDeDIFHauaiHW_nmANvyviDh6yZWMDKs8GSwyBO-oOmW4KM1MIbGFboiA9r-AM_JE-j1QodccIaQ" alt="" width="181" height="110"/></strong></td>
  </tr>
  <tr>
    <td><strong>______________________________</strong></td>
  </tr>
</table><strong>MATTHEW ALEXANDER</strong><br />
  Gerente General<br />
  Suyo Colombia SAS
</page>  
<page> 
<page_footer>
     <? // include('pie_membrete.php'); ?>
     <table>
            <tr>
                <td style="width: 100%; text-align: right">
                  <i>SUYO COLOMBIA S.A.S."</i>    <b>Página [[page_cu]]/[[page_nb]]</b>
                </td>
            </tr>
     </table>
    </page_footer> 
      <div style="text-align:right"><img style="text-align: right" src="https://lh3.googleusercontent.com/7wegHCkVVzQdFbM9Edqqyj3CmIefI8EIZCH9OkDscXP8DYfMhdgph5iuuuGR1SvgIuqP_TcxaGXWzcB3ERSQF_RI07QqFoCumZa2AatwVlob5Plw254Y-KtCKqPHf0H--qjkECW7" width="12%" height="79" alt="https://static.wixstatic.com/media/2d07ea_988eb38e78f140029a2451dfeaad7e30~mv2.png/v1/fill/w_224,h_80,al_c,usm_0.66_1.00_0.01/2d07ea_988eb38e78f140029a2451dfeaad7e30~mv2.png"/></div>
<br /><br />
<p style="text-align:center" ><strong>INFORMACIÓN BÁSICA DEL USUARIO Y DEL PREDIO</strong></p>
<br />
<table width="1080" height="170" border="0">
  <tr>
    <td width="142">USUARIO</td>
    <td width="373"><?php echo $_GET['id_usuario'] ?></td>
    <td width="546" rowspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td>IDENTIFICACIÓN</td>
    <td><?php echo $datos['id_usuario'] ?></td>
    </tr>
  <tr>
    <td>DIRECCIÓN</td>
    <td><?php echo $datos['direccion'] ?></td>
    </tr>
  <tr>
    <td>BARRIO</td>
    <td><?php echo $datos['barrio'] ?></td>
    </tr>
  <tr>
    <td>MUNICIPIO</td>
    <td><?php echo $datos['municipio'] ?></td>
    </tr>
</table>
</page>  
