//var site_url = 'http://localhost:8080/Movers/index.php/';
var site_url = 'https://server7.indevfinite-server.com:8090/preview/Movers.com/';

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

  
$('#email, #fullName, #username, #birthday, #email, #password, #confirmPassword').click(function() {
    $(this).css('borderColor', '');
    $(this).css('backgroundColor', '');
});


$('#registerbtn').click(function () {

    var name = $('#fullName').val();
    var username = $('#username').val();
    var bday = $('#birthday').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var cpassword = $('#confirmPassword').val();

    toastr.remove();
    var errormsg = [];

        if(name == '') {
            errormsg.push('Full name is empty');
            document.getElementById('fullName').style.backgroundColor = '#ed7987';
        } else {
            document.getElementById('fullName').style.backgroundColor = '';
        }

        if(username == '') {
            errormsg.push('Username is empty');
            document.getElementById('username').style.backgroundColor = '#ed7987';
        } else {
            document.getElementById('username').style.backgroundColor = '';
        }

        if(bday == '') {
            errormsg.push('Birthday is empty');
            document.getElementById('birthday').style.backgroundColor = '#ed7987';
        } else {
            document.getElementById('birthday').style.backgroundColor = '';
        }
        if(email == '') {
            errormsg.push('Email is empty');
            document.getElementById('email').style.backgroundColor = '#ed7987';
        } else {
            document.getElementById('email').style.backgroundColor = '';
        }

        if (password == '') {
            errormsg.push('Password is empty');
            document.getElementById('password').style.backgroundColor = '#ed7987';
            document.getElementById('confirmPassword').style.backgroundColor = '#ed7987';
        } else if (password.length < 8) {
            errormsg.push('Password must be more than 8 characters');
            document.getElementById('password').style.backgroundColor = '#ed7987';
            document.getElementById('confirmPassword').style.backgroundColor = '#ed7987';
        } 
        
        if (cpassword == '') {
            errormsg.push('You have not confirmed your password');
            document.getElementById('password').style.backgroundColor = '#ed7987';
            document.getElementById('confirmPassword').style.backgroundColor = '#ed7987';
        }

        if(((password.length != cpassword.length) || (password != cpassword)) && (password != '' && cpassword != '')){
            errormsg.push('Confirm password does not match');
            document.getElementById('password').style.backgroundColor = '#ed7987';
            document.getElementById('confirmPassword').style.backgroundColor = '#ed7987';
        }
        
        if (errormsg.length) {
        var html = '<ul>';

        $.each(errormsg, function (i, j) {
            html += `<li>${j}</li>`;
        });

        html += '</ul>';
        toastr.error(html, 'Error');

        return false
        }


    $.ajax({
        url: site_url + "registerController/process_register",
        method: "POST",
        dataType: 'JSON',
        data: {
            name,
            username,
            bday,
            email,
            password
        },
        success: function (res) {
    
            if(res == 'update'){
                window.location.href = site_url + "loginController/index?registration=success";
            }else if(res == 'duplicateemail') {
                toastr.error('Registered email found. <br> Please use a different email.', 'Error');
                document.getElementById('email').style.borderColor = '#ed7987';
            }else if (res == 'duplicateusername'){
                toastr.error('Registered username found. <br> Please use a different username.', 'Error');
                document.getElementById('username').style.borderColor = '#ed7987';
            }else if(res == 'duplicate_emailusername'){
                toastr.error('Registered username and email found. <br> Please use a different email & username.', 'Error');
                document.getElementById('email').style.borderColor = '#ed7987';
                document.getElementById('username').style.borderColor = '#ed7987';
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

});