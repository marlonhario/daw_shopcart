<html>
    <head>
       <title>jQuery Test</title>
       <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
       <script type="text/javascript">
      //      $(document).ready(function() {
      //          $("#submit").click(function(){
      //              $.ajax({
      //                  url: "text.php",
      //                  type: "POST",
      //                  async: false,
      //                  data: {
      //                      amount: $("#amount").val(),
      //                      firstName: $("#firstName").val(),
      //                      lastName: $("#lastName").val(),
      //                      email: $("#email").val()
      //                  },
      //                  dataType: "JSON",
      //                  success: function (jsonStr) {
      //                      $("#result").text(JSON.stringify(jsonStr));
      //                  }
      //              });
      //          });

      //          $.ajax({
    		//         url: 'Controller/products/read.php',
    		//         type: 'post',
    		//         dataType: 'JSON',
    		//         success: function(response){
    		//         	var daw = response;
    		//             // var len = response.length;
    		//             // for(var i=0; i<len; i++){
    		//             //     var id = response[i].id;
    		//             //     var username = response[i].username;
    		//             //     var name = response[i].name;
    		//             //     var email = response[i].email;

    		//             //     var tr_str = "<tr>" +
    		//             //         "<td align='center'>" + (i+1) + "</td>" +
    		//             //         "<td align='center'>" + username + "</td>" +
    		//             //         "<td align='center'>" + name + "</td>" +
    		//             //         "<td align='center'>" + email + "</td>" +
    		//             //         "</tr>";

    		//             //     $("#userTable tbody").append(tr_str);
    		//             // }


    		//             console.log(daw);

    		//         }


		    // });
      //           $.get('Controller/products/read.php')
      //           .done((data) => console.log(data[1]))
      //           .fail((error) => console.error(error))
      //           .always(() => console.log('Done'));

      //      });
      $(document).ready(function(){
    $.ajax({
        url: 'employee_data.json',
        type: 'get',
        dataType: 'JSON',
        success: function(response){
            // var len = response.length;
            // for(var i=0; i<len; i++){
            //     var id = response[i].id;
            //     var username = response[i].username;
            //     var name = response[i].name;
            //     var email = response[i].email;

            //     var tr_str = "<tr>" +
            //         "<td align='center'>" + (i+1) + "</td>" +
            //         "<td align='center'>" + username + "</td>" +
            //         "<td align='center'>" + name + "</td>" +
            //         "<td align='center'>" + email + "</td>" +
            //         "</tr>";

            //     $("#userTable tbody").append(tr_str);
            // }


            console.log(response);

        }
    });

    console.log('ads');
});
       </script>
    </head>

    <body>
        <div id="result"></div>
        <form name="contact" id="contact" method="post">
            Amount: <input type="text" name="amount" id="amount"/><br/>
            firstName: <input type="text" name="firstName" id="firstName"/><br/>
            lastName: <input type="text" name="lastName" id="lastName"/><br/>
            email: <input type="text" name="email" id="email"/><br/>
            <input type="button" value="Get It!" name="submit" id="submit"/>
        </form>
    </body>
</html>