// require('./bootstrap');

$(document).ready(function(){
  console.log("hey");
  fetchRecords();
});

    function fetchRecords(){
       $.ajax({
         url: 'getUsers',
         type: 'get',
         dataType: 'json',
         success: function(response){
         	console.log(response)

           var len = 0;
           $('#userTable tbody').empty(); // Empty <tbody>
           if(response['data'] != null){
             len = response['data'].length;
           }

           if(len > 0){
             for(var i=0; i<len; i++){
               var id = response['data'][i].plate_number;
               var username = response['data'][i].target_color;
               var name = response['data'][i].current_color;

               var tr_str = "<tr>" +
                   "<td align='center'>" + id + "</td>" +
                   "<td align='center'>" + username + "</td>" +
                   "<td align='center'>" + name + "</td>" +
                   "<td align='center'>" + Mark as Completed + "</td>" +
               "</tr>";

               $("#userTable tbody").append(tr_str);
             }
           }else if(response['data'] != null){
              var tr_str = "<tr>" +
                  "<td align='center'>1</td>" +
                  "<td align='center'>" + response['data'].plate_number + "</td>" + 
                  "<td align='center'>" + response['data'].plate_number + "</td>" +
                  "<td align='center'>" + response['data'].plate_number + "</td>" +
              "</tr>";

              $("#userTable tbody").append(tr_str);
           }else{
              var tr_str = "<tr>" +
                  "<td align='center' colspan='4'>No record found.</td>" +
              "</tr>";

              $("#userTable tbody").append(tr_str);
           }

         }
       });
    }