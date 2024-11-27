//var site_url = 'http://localhost:8080/Movers/index.php/';
var site_url = 'https://server7.indevfinite-server.com:8090/preview/core2sub.moverstaxi.com/index.php';

toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }

  $('#loginbtn').click(function () {
      process_login();
  });

  $('#email, #password').click(function() {
    $(this).css('borderColor', '');
    $(this).css('backgroundColor', '');
});

  function process_login(){
    var email = $('#email').val();
    var password = $('#password').val();

    toastr.remove();
    var errormsg = [];

   
      if(email == ''){
        errormsg.push('Please put your email');
        document.getElementById('email').style.backgroundColor = '#ed7987';
      }else{
        document.getElementById('email').style.backgroundColor = '';
      }

      if(password == ''){
        errormsg.push('Please put your password');
        document.getElementById('password').style.backgroundColor = '#ed7987';
      }else{
        document.getElementById('password').style.backgroundColor = '';
      }
   

    if (errormsg.length) {
        var html = '<ul>';

        $.each(errormsg, function (i, j) {
             html += `<li>${j}</li>`;
        });
        html += '</ul>';
        toastr.error(html, 'Error');

        return false;
    }

    // alert(site_url+"loginController/process_login");

      $.ajax({
        url: site_url + "loginController/process_login",
        method: "POST",
        dataType: "JSON",
        data: {
            email,
            password
        },
        success: function (res) {
    
            if(res == "success"){
                window.location.href = site_url + "dashboardController/index";
            }else if (res == "invalid"){
              toastr.error('Invalid email or password', 'Error');
              $('#email, #password').css('borderColor', '#ed7987');
            }else if (res == "deactivated"){
              toastr.warning('Your account has been deactivated <br> Contact admins to reactivate your account', 'Warning');
              $('#email, #password').css('borderColor', '#ed7987');
            }else{
              toastr.error('Something went wrong', 'Error');
            }

        },
        error: function (xhr, status, error) {
            // Handle error
            alert('An error occurred: ' + xhr.responseText);
            console.error('Error details:', error);
        }
      });
  }

  