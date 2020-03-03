$(document).ready(function(){
	  var stoper = 0;

    // read data products==================================
       $.ajax({
         url: "Controller/products/read.php",
         type: "GET",
         async: false,
         dataType: "JSON",
         success: function (data) {

          if (data !== null) {
            var sum = 0;
          
            if(data.data[4]) {
              for (var i = 0; data.data[5].length > i; i++) {
                var trans_his = '<tr>'+
                                      '<td>'+data.data[5][i]['created_at']+'</td>'+
                                      '<td>'+data.data[5][i]['product_name']+'</td>'+
                                      '<td>'+data.data[5][i]['product_quantity']+'</td>'+
                                      '<td>'+data.data[5][i]['price']+'</td>'+
                                      '<td>'+data.data[5][i]['shipp_price']+' /'+data.data[5][i]['shipp_name']+'</td>'+
                                      '<td>'+((data.data[5][i]['price'] * data.data[5][i]['product_quantity']) + parseInt(data.data[5][i]['shipp_price']))+'</td>'+
                                    '</tr>';
                  $( "#transaction_history" ).append(trans_his);
              }
            }

            for (var i = 0; data.data.length > i; i++) {

              if (i === 4) {
                  break;  
              }

              var product_frame = '<div class="col-md-3" id="product_wrapper" id="'+data.data[i]['id']+'">'+
                    '<div class="card border-primary mb-3  mt-3">'+
                      '<div class="card-header">'+
                        '<h5 id="product_title">'+data.data[i]['product_name']+'</h5>'+
                        '<p> <span style="font-size: 14px;" class="badge badge-pill badge-warning">'+(data.data[i]['remaining']-data.data[4][i]['qty'])+'</span> left</p>'+
                    '</div>'+
                    '<div class="card-body">'+
                      '<img src="assets/images/'+data.data[i]['img']+'" class="img-thumbnail img-fluid rounded" alt="Cinque Terre" width="304" height="236">'+ 
                      '<p class="card-text">'+data.data[i]['product_description']+'</p>'+
                        '<a href="#" class="card-link">&#8369; '+data.data[i]['price']+'</a> '+
                        '<div style="display: flex; justify-content: space-between; align-items: flex-end;">'+
                          '<a class="daw_try" href="index.php?id='+data.data[i]['id']+'" data-role="update" data-id="'+data.data[i]['id']+'"><button id="add_cart_btn" type="button" class="btn btn-outline-success">Add to cart</button></a>'+
                          '<div class="mr-0 col-md-6 mt-2">'+
                            // '<input class="form-control" type="number" value="0" id="product_qty">'+
                          '</div>'+
                        '</div>'+
                      '<input type="hidden" name="product_id" id="product_id" value="'+data.data[i]['id']+'">'+
                    '</div>'+
                  '</div>'+
                  '</div>';
              $( ".product_list_container" ).append(product_frame);
            }

             
             for (var v = 0; v < data.data[4].length; v++) {

                if (parseInt(data.data[4][v]['qty']) > 0) {
                    if (parseInt(data.data[4][v]['qty']) > 4) {
                      console.log('sdawa')
                    } else {
                        var add_cart_list = '<tr class="table-dark">'+
                                      '<th scope="row"> <input style="font-size: 20px; text-align: center; border-radius: 3px;" type="text" class="qty_prod" id="'+data.data[4][v]['id']+'" value="'+data.data[4][v]['qty']+'" name="quantity" disabled></th>'+
                                      '<td>'+data.data[4][v]['product_name']+'</td>'+
                                      '<td>'+data.data[4][v]['price']+'</td>'+
                                      '<td>'+data.data[4][v]['total']+'</td>'+
                                      '<td><a id="del-prod" href="index.php?id_prod='+data.data[4][v]['id']+
                                      '"><button type="button" class="btn btn-danger">Delete</button></a></td>'+
                                    '</tr>';

                        $( "#tbody_cart" ).append(add_cart_list);
                        sum += data.data[4][v]['total'];
                        
                    }
                    
                } 
                if (parseInt(data.data[4][v]['qty']) === 0) {
                  stoper++;
                }
             }
             
             
             $( "#sum_price" ).append('<input type="hidden" name="hidden" id="hidden_val" value="'+sum+'" /><small>TOTAL</small>: &#8369; <span id="sum_prods">'+sum+'</span>');

             // console.log(data.data[4]);
          }
         // console.log(data);
         }
     });

     if (stoper === 4) {
        $( ".check_out_btn").css('display', 'none');
     }

    $(document).on("click",".reload_btn", function () {
                 window.location.replace("index.php");
    });
   
    $(document).ready(function(){
      
         
    // console.log(res);
      $(document).on("click",".check_out_btn", function () {
        var daw = $( "#shipp_embed option:selected").val();
        var daw1 =  $( "#hidden_val" ).val();
        var res = parseInt(daw)+parseInt(daw1);
         $.ajax({
             url: "Controller/products/checkout.php",
             type: "POST",
             async: false,
             data: {
                 total_sum: res,
                 shipping_fee: daw,
             },
             dataType: "JSON",
             success: function (datas) {
                 console.log(datas);
             }
         });

       });
    });

    

});

