

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