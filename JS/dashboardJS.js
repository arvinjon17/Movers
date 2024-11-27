//var site_url = 'http://localhost:8080/Movers/index.php/';
var site_url = 'https://server7.indevfinite-server.com:8090/preview/Movers.com/index.php';

$('#logoutbtn').click(function () {
    logout(1);
});

function logout(initiate = 0){

    if(initiate == 1){
        $.ajax({
            url: site_url + "dashboardController/logout",
            method: "POST",
            dataType: "JSON",
            data: {
                initiate
            },
            success: function (res) {
        
                if(res == "1"){
                    window.location.href = site_url + "loginController/index";
                }else{
                    alert('error');
                }
    
            },
            error: function (xhr, status, error) {
                // Handle error
                alert('An error occurred: ' + xhr.responseText);
                console.error('Error details:', error);
            }
          });
    }
    
}

