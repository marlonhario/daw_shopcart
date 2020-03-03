$(document).ready(function(){

  $(document).ready(function(){ 
      var daw = $( "#shipp_embed option:selected").val();
      // $( "#ship_amount_disp" ).append(daw);
      var daw1 =  $( "#sum_prods" ).html();

         // console.log(parseInt(daw)+parseInt(daw1));
         $( "#sum_prods" ).html(parseInt(daw)+parseInt(daw1));
  });
	
  $( "#shipp_embed" ).on('change', function() {
    var daw = $( "#shipp_embed option:selected").val();
      // $( "#ship_amount_disp" ).append(daw);
      var daw1 =  $( "#hidden_val" ).val();

         // console.log(parseInt(daw)+parseInt(daw1));
         $( "#sum_prods" ).html(parseInt(daw)+parseInt(daw1));
  });


  // read data ==================================
       $.ajax({
           url: "Controller/shipping/read.php",
           type: "GET",
           async: false,
           dataType: "JSON",
           success: function (data) {
            if (data !== null) {

              for (var i = data.data.length - 1; i >= 0; i--) {
                var disp_shipp =  '<option value="'+data.data[i]['amount']+'">'+data.data[i]['shipping_name']+'-----------  &#8369 '+data.data[i]['amount']+'</option>';
                $( "#shipp_embed" ).append(disp_shipp);                
              }

            }
           
            // console.log(data.data.length);
           }
       });
});    