<link rel="stylesheet" href="js/colorbox-master/example1/colorbox.css" />
<script src="js/colorbox-master/jquery.colorbox-min.js"></script>
 <div class="card-header d-flex align-items-center">
   <p>
     <center>
       <strong>       INFORMACIÓN DETALLADA</strong>
     </center>
   </p>
   <table width="358" border="0" align="center" class="table responsive">
     <tr>
       <td width="187"><strong>Fecha inicial:</strong></td>
       <td width="161"><strong>Fecha final:</strong></td>
     </tr>
     <tr>
       <td><input type="text" name="textfield" readonly='readonly' class='form-control' value="<?php echo $_GET['fecha_1']; ?>" id="fecha_1"></td>
       <td><input type="text" name="textfield2" readonly='readonly' class='form-control' value="<?php echo $_GET['fecha_2']; ?>" id="fecha_2"></td>
     </tr>
     <tr>
       <td colspan="2" align="center"><input type="button" name="buscar"  value="Buscar "class='btn btn-primary' id="buscar"></td>
     </tr>
   </table>
 </div>
 <script type="text/javascript">
      /*global $, document*/
$(document).ready(function () {

});


  
</script>
 <div class="card-header d-flex align-items-center">
   <table width="844" border="0" align="center">
     <tr>
       <td width="38"><strong>#</strong></td>
       <td width="281"><strong>Asesor</strong></td>
       <td width="216"><strong>Cliente</strong></td>
       <td width="160"><strong>Visita</strong></td>
       <td width="87"><strong>Ver encuesta</strong></td>
     </tr>
     <tr>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
     </tr>
   </table>
 </div>         
 