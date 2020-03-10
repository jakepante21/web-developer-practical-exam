$(document).ready(function(){
    fetchPaintJobs();
    fetchPaintQueue();
    fetchShopPerformance();
    setInterval(function(){
        fetchPaintJobs();
        fetchPaintQueue();
        fetchShopPerformance();
    }, 5000);

});

function fetchPaintJobs(){
    $.ajax({
        url: 'getPaintJobs',
        type: 'get',
        dataType: 'json',
        success: function(response){
            

            var len = 0;
            $('#paintJobTable tbody').empty(); // Empty <tbody>
            if(response['data'] != null){
                len = response['data'].length;
            }

            if(len > 0){
                for(var i=0; i<len; i++){
                    var plateNumber = response['data'][i].plate_number;
                    var currentColor = response['data'][i].current_color;
                    var targetColor = response['data'][i].target_color;
                    var status = response['data'][i].status_id;
                    if(status === 1){
                        var tr_str = "<tr class='all-row'>" +
                        "<td>" + plateNumber + "</td>" +
                        "<td>" + currentColor + "</td>" +
                        "<td>" + targetColor + "</td>" +
                        "<td class='action' id='update'><button type='button' onclick='update(" + response['data'][i].id + ")'>Mark as completed</button></td>" +
                        "</tr>";

                        $("#paintJobTable tbody").append(tr_str);
                    }else{

                    }
                
                }
            }else{
                var tr_str = "<tr>" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";

                $("#paintJobTable tbody").append(tr_str);
            }

        }
    });
}

function fetchPaintQueue(){
    $.ajax({
        url: 'getPaintQueues',
        type: 'get',
        dataType: 'json',
        success: function(response){
            

            var len = 0;
            $('#paintQueueTable tbody').empty(); // Empty <tbody>
            if(response['data'] != null){
                console.log(response)
                len = response['data'].length;
            }

            if(len > 0){
            for(var i=0; i<len; i++){
                var plateNumber = response['data'][i].plate_number;
                var currentColor = response['data'][i].current_color;
                var targetColor = response['data'][i].target_color;

                var tr_str = "<tr class='all-row'>" +
                "<td>" + plateNumber + "</td>" +
                "<td>" + currentColor + "</td>" +
                "<td>" + targetColor + "</td>" +
                "</tr>";

                $("#paintQueueTable tbody").append(tr_str);
                }
            }else{
                var tr_str = "<tr>" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";

                $("#paintQueueTable tbody").append(tr_str);
            }

        }
    });
}

function fetchShopPerformance(){
    $.ajax({
        url: 'getShopPerformance',
        type: 'get',
        dataType: 'json',
        success: function(response){
            var len = 0;
            if(response != null){
                len = Object.keys(response).length;
            }

            if(len > 0){
                jQuery.each(response,function(keys,values){
                    jQuery.each(values,function(name,count){
                        var prop = name;
                        var prop_count = count;
                        var newProp = document.getElementById(prop);
                        newProp.innerHTML = prop_count;
                    })
                })
            }else{
                var tr_str = "<tr>" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";
                console.log("heya")
            }
        }
    });
}

function update(id){
    console.log(id)
    $.ajax({
        url: "updatejobs/" + id,
        method: "get",
        data: $(id).serialize(),
        success: function(data){
            
        }
    });
}


// NAVBAR ACTIVE

var linkContainer = document.getElementById("cont");
var links= linkContainer.getElementsByClassName("link");

for (var i = 0; i < links.length; i++) {
  links[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}

// SELECT COLOR
var currentCar = document.getElementById("current-car");
var targetCar = document.getElementById("target-car");
var currentColor = document.getElementById("current-color");
var targetColor = document.getElementById("target-color");
console.log(currentColor.value)
currentColor.addEventListener("change",function(){
    if(currentColor.value == "Blue"){
        currentCar.setAttribute("src","./../images/Blue Car.png")
    }else if(currentColor.value == "Red"){
        currentCar.setAttribute("src","./../images/Red Car.png")
    }else{
        currentCar.setAttribute("src","./../images/Green Car.png")
    }
})
targetColor.addEventListener("change",function(){
    if(targetColor.value == "Blue"){
        targetCar.setAttribute("src","./../images/Blue Car.png")
    }else if(targetColor.value == "Red"){
        targetCar.setAttribute("src","./../images/Red Car.png")
    }else{
        targetCar.setAttribute("src","./../images/Green Car.png")
    }
})