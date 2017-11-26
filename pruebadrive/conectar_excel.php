<!DOCTYPE html>
<html>
<head>
    
    <title>Quick Start - Leaflet</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>



    
</head>

<body>
   
</body>

</html>
 
 <script>
 				$(document).ready(function () {
 					  //  alert("jei");
 					    
        
/*var url="https://script.googleusercontent.com/macros/echo?user_content_key=u1uCIRNYTp_H1vpxpHIPHW84dmD3HfNtr8dwzQJNCWID6dl3OY8wBxTqOxgi3JTlFZeTW_uiFzvaCd8NgIn5rDo0l54ZnH0gm5_BxDlH2jW0nuo2oDemN9CCS2h10ox_dLYMt4gBBc-7g_z0IJaH1kXsCA-3He-6X35TagmcSz0MAHZzHB8xVj-q5aQnlI0li-ZvAnRfSZAKsFxHGJ_iAo5mMyTeN1cbcyXpDZxZjtM&lib=M0M_ETTOFX_nT359h5mbst6wVLJsp4bmx";
//	$.getJSON
                                           $.ajax({
                                                
                                                type: "GET",
                                                dataType: "json",
 												url: url, 
 												success: function(valor){
 													 alert(valor.Nombres);
 													// alert(valor->Nombres);

 													$("#result").html(valor);
 												}
                                                
                                            });*/


                                           /*  $.ajax({
                                                
                                                type: "GET",
                                                dataType: "json",
 												url: "https://script.googleusercontent.com/macros/echo?user_content_key=u1uCIRNYTp_H1vpxpHIPHW84dmD3HfNtr8dwzQJNCWID6dl3OY8wBxTqOxgi3JTlFZeTW_uiFzvaCd8NgIn5rDo0l54ZnH0gm5_BxDlH2jW0nuo2oDemN9CCS2h10ox_dLYMt4gBBc-7g_z0IJaH1kXsCA-3He-6X35TagmcSz0MAHZzHB8xVj-q5aQnlI0li-ZvAnRfSZAKsFxHGJ_iAo5mMyTeN1cbcyXpDZxZjtM&lib=M0M_ETTOFX_nT359h5mbst6wVLJsp4bmx", 
 												success: function(valor){
 													 alert(valor);
 													 alert(valor['Nombres']);
 													// alert(valor->Nombres);

 													$("#result").html(valor);
 												}
                                                
                                            });*/

                                            // Cedula	Nombres	Apellidos

$.getJSON( "https://script.googleusercontent.com/macros/echo?user_content_key=u1uCIRNYTp_H1vpxpHIPHW84dmD3HfNtr8dwzQJNCWID6dl3OY8wBxTqOxgi3JTlFZeTW_uiFzvaCd8NgIn5rDo0l54ZnH0gm5_BxDlH2jW0nuo2oDemN9CCS2h10ox_dLYMt4gBBc-7g_z0IJaH1kXsCA-3He-6X35TagmcSz0MAHZzHB8xVj-q5aQnlI0li-ZvAnRfSZAKsFxHGJ_iAo5mMyTeN1cbcyXpDZxZjtM&lib=M0M_ETTOFX_nT359h5mbst6wVLJsp4bmx", function( data ) {
  var items = [];
  $.each( data, function( key, val ) {
     // alert(key);
    //items.push( "<li id='" + key + "'>" + val.Nombres + "</li>" );
    			$.each(val, function(dato, valor){
    				 items.push( "<li id='" + dato + "'>" +valor + "</li>" );

    			});
  });
 
  $( "<ul/>", {
    "class": "my-new-list",
    html: items.join( "" )
  }).appendTo( "body" );
});
 											
 					});
  </script>