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



$('#logoutbtn').click(function () {
    window.location.href = site_url + "dashboardController/logout";
});


function initial_load(pagenum = 1, status = []) {

    var searchkey = $('#search').val();
    var limit = $('#limit').val();
    var status = $('#status').val();
    var sortBy = $('#sortBy').val();
    var sortOrder = $('#sortOrder').val();
    search = $.trim(searchkey);

    $.ajax({
            url: site_url + "/usermaintenanceController/get_user_list",
            method: 'POST',
            dataType: 'JSON',
            data: { search, limit, pagenum, status, sortOrder, sortBy },
            beforeSend: function () {
                $("#load").text("Loading Item Data...");
            },
            success: function (response) {

                currentPageNum = pagenum;
    
                $("#tblitembody").html(response.table);
                $("#pagination_controls").html(response.pagination);
                $("#recordcount").text(response.recordcount);

                $('.pagebutton').click(function () {
                    initial_load($(this).val());
                });

                $('.editbtn').click(function () {
                    $('#addusermodal').modal('show');

                    $('#email, #fullName, #username, #birthday, #password, #confirmPassword').css({
                        'borderColor': '',
                        'backgroundColor': ''
                    });

                    $('#modaltitle').text('Edit User');
                    $('#email, #fullName, #username, #birthday, #email, #password, #confirmPassword').click(function() {
                        $(this).css('borderColor', '');
                        $(this).css('backgroundColor', '');
                    });

                    $('#adduser').css('display', 'none');
                    $('#edituser').css('display', 'block');

                    var userId = $(this).data('userid');
                    load_edit(userId);
                    
                });

                $('.disablebtn').click(function () {
                   
                    var userId = $(this).data('userid');
                    deactivate(userId);
                    
                });

                $('.activatebtn').click(function () {
                   
                    var userId = $(this).data('userid');
                    activate(userId);
                    
                });
    
            }
    
        })
}

initial_load();

$('#searchbtn').click(function () {
    initial_load();
});

$('#search').keypress(function (event) {
    if (event.which === 13) { 
        event.preventDefault(); 
        initial_load();
    }
});

$('#email, #fullName, #username, #birthday, #email, #password, #confirmPassword').click(function() {
    $(this).css('borderColor', '');
    $(this).css('backgroundColor', '');
});

$('#adduserbtn').click(function () {
    $('#addusermodal').modal('show');

    $('#email, #fullName, #username, #birthday, #password, #confirmPassword').css({
        'borderColor': '',
        'backgroundColor': ''
    });
    
    $('#modaltitle').text('Add User');

    $('#email, #fullName, #username, #birthday, #email, #password, #confirmPassword').click(function() {
        $(this).css('borderColor', '');
        $(this).css('backgroundColor', '');
    });

    $('#adduser').css('display', 'block');
    $('#edituser').css('display', 'none');

    $('#fullName').val('');
    $('#birthday').val('');
    $('#username').val('');
    $('#email').val('');
});

$(document).off('click', '#adduser').on('click', '#adduser', function () {

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
                toastr.success('Successfully added a user!', 'Success');
                $('#fullName, #username, #birthday, #email, #password, #confirmPassword').val('');
                $('#addusermodal').modal('hide');
                initial_load();
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

function load_edit(userid = 0){

    $.ajax({
        url: site_url + "/usermaintenanceController/get_user",
        method: 'POST',
        dataType: 'JSON',
        data: { userid },
        beforeSend: function () {

        },
        success: function (response) {

            $('#fullName').val(response.user['name']);
            $('#birthday').val(response.user['birthday']);
            $('#username').val(response.user['username']);
            $('#email').val(response.user['email']);
            $('#password').val('');
            $('#confirmPassword').val('');

            $(document).off('click', '#edituser').on('click', '#edituser', function () {

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

                if(password != ''){
                    if (password.length < 8) {
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
                    url: site_url + "registerController/process_edituser",
                    method: "POST",
                    dataType: 'JSON',
                    data: {
                        name,
                        username,
                        bday,
                        email,
                        password,
                        userid
                    },
                    success: function (res) {
                
                        if(res == 'update'){
                            toastr.success('Successfully updated a user!', 'Success');
                            $('#fullName, #username, #birthday, #email, #password, #confirmPassword').val('');
                            $('#addusermodal').modal('hide');
                            initial_load();
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
                        }else if(res == 'no changes'){
                            $('#addusermodal').modal('hide');
                            toastr.warning('There were no changes', 'Warning');
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
            })
        }

    });

}

function deactivate(userid = 0){

    $('#promptMessage').modal('show');
    $('#prompttitle').text('Deactivation');
    $('#activateuser').css('display', 'none');
    $('#disableuser').css('display', 'block');
    $('#prompheader').addClass('bg-danger');
    $('#prompheader').removeClass('bg-success');



    $(document).off('click', '#disableuser').on('click', '#disableuser', function () {

        $.ajax({
            url: site_url + "registerController/deactivate",
            method: "POST",
            dataType: 'JSON',
            data: {
                userid
            },
            success: function (res) {
                $('#promptMessage').modal('hide');
                initial_load();
                toastr.info('Successfully deactivated a user', 'Info');
            },
            error: function (xhr, status, error) {
                // Handle error
                alert('An error occurred: ' + xhr.responseText);
                console.error('Error details:', error);
            }
        });

    });
    
}

function activate(userid = 0){

    $('#promptMessage').modal('show');
    $('#prompttitle').text('Reactivation');
    $('#disableuser').css('display', 'none');
    $('#activateuser').css('display', 'block');
    $('#prompheader').removeClass('bg-danger');
    $('#prompheader').addClass('bg-success');



    $(document).off('click', '#activateuser').on('click', '#activateuser', function () {

        $.ajax({
            url: site_url + "registerController/activate",
            method: "POST",
            dataType: 'JSON',
            data: {
                userid
            },
            success: function (res) {
                $('#promptMessage').modal('hide');
                initial_load();
                toastr.info('Successfully activated a user', 'Info');
            },
            error: function (xhr, status, error) {
                // Handle error
                alert('An error occurred: ' + xhr.responseText);
                console.error('Error details:', error);
            }
        });

    });
    
}

    
    





