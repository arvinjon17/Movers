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

$('#drivername, #clientname, #tripfrom, #tripto, #service, #amount').click(function() {
    $(this).css('borderColor', '');
    $(this).css('backgroundColor', '');
});

$(document).off('click', '#clear').on('click', '#clear', function () {
    $(this).css('borderColor', '');
    $(this).css('backgroundColor', '');
    $('#drivername, #clientname, #tripfrom, #tripto, #amount, #totalamount').val('');
    $('#drivername, #clientname, #tripfrom, #tripto, #amount, #totalamount').val('').css('borderColor', '');
    $('#drivername, #clientname, #tripfrom, #tripto, #amount, #totalamount').val('').css('backgroundColor', '');
})

$(document).off('click', '#payment').on('click', '#payment', function () {

        var drivername = $('#drivername').val();
        var clientname  = $('#clientname').val();
        var tripfrom = $('#tripfrom').val();
        var tripto = $('#tripto').val();
        var service = $('#service').val();
        var amount = parseFloat($('#amount').val());


    toastr.remove();
    var errormsg = [];

    if(drivername == '') {
        errormsg.push('Driver name is empty');
        document.getElementById('drivername').style.backgroundColor = '#ed7987';
    } else {
        document.getElementById('drivername').style.backgroundColor = '';
    }

    if(clientname == '') {
        errormsg.push('Client name is empty');
        document.getElementById('clientname').style.backgroundColor = '#ed7987';
    } else {
        document.getElementById('clientname').style.backgroundColor = '';
    }

    if(tripfrom == '') {
        errormsg.push('Trip from is empty');
        document.getElementById('tripfrom').style.backgroundColor = '#ed7987';
    } else {
        document.getElementById('tripfrom').style.backgroundColor = '';
    }

    if(tripto == '') {
        errormsg.push('Trip to is empty');
        document.getElementById('tripto').style.backgroundColor = '#ed7987';
    } else {
        document.getElementById('tripto').style.backgroundColor = '';
    }

    if(service == null) {
        errormsg.push('Service is empty');
    } 

    if(isNaN(amount)) {
        errormsg.push('Amount is empty');
        document.getElementById('amount').style.backgroundColor = '#ed7987';
    } else {
        document.getElementById('amount').style.backgroundColor = '';
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

    $('#paymentmodal').modal('show');

});


$(document).off('click', '#bookingdraft').on('click', '#bookingdraft', function () {

    var drivername = $('#drivername').val();
    var clientname  = $('#clientname').val();
    var tripfrom = $('#tripfrom').val();
    var tripto = $('#tripto').val();
    var service = $('#service').val();
    var amount = parseFloat($('#amount').val());
    var tips = parseFloat($('#tips').val());
    var totalamount = parseFloat($('#totalamount').val());
    var paid = 0;
    var activeflag = 2;

    toastr.remove();
    var errormsg = [];

    if(drivername == '') {
        errormsg.push('Driver name is empty');
        document.getElementById('drivername').style.backgroundColor = '#ed7987';
    } else {
        document.getElementById('drivername').style.backgroundColor = '';
    }

    if(clientname == '') {
        errormsg.push('Client name is empty');
        document.getElementById('clientname').style.backgroundColor = '#ed7987';
    } else {
        document.getElementById('clientname').style.backgroundColor = '';
    }

    if(tripfrom == '') {
        errormsg.push('Trip from is empty');
        document.getElementById('tripfrom').style.backgroundColor = '#ed7987';
    } else {
        document.getElementById('tripfrom').style.backgroundColor = '';
    }

    if(tripto == '') {
        errormsg.push('Trip to is empty');
        document.getElementById('tripto').style.backgroundColor = '#ed7987';
    } else {
        document.getElementById('tripto').style.backgroundColor = '';
    }

    if(service == null) {
        errormsg.push('Service is empty');
    } 

    if(isNaN(amount)) {
        errormsg.push('Amount is empty');
        document.getElementById('amount').style.backgroundColor = '#ed7987';
    } else {
        document.getElementById('amount').style.backgroundColor = '';
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
        url: site_url + "bookingController/process_payment",
        method: "POST",
        dataType: 'JSON',
        data: {
            drivername,
            clientname,
            tripfrom,
            tripto,
            service,
            amount,
            tips,
            totalamount,
            paid,
            activeflag
        },
        success: function (res) {
    
            if(res == 'success'){
                toastr.info('Your trip has been drafted', 'Info');
                $('#drivername, #clientname, #tripfrom, #tripto, #amount, #totalamount').val('');
                $('#paymentmodal').modal('hide');
                $('#cashonhand').modal('hide');
                $('#gcashmodal').modal('hide');
            }else{
                toastr.error('Error occured!', 'Error');
            }

        },
        error: function (xhr, status, error) {
            // Handle error
            alert('An error occurred: ' + xhr.responseText);
            console.error('Error details:', error);
        }
    });



});

$(document).off('click', '#cashonhandpay').on('click', '#cashonhandpay', function () {
    $('#cashonhand').modal('show');

    var totalamount = $('#totalamount').val();
    getchange(0, totalamount);

});

$(document).off('click', '#gcashpay').on('click', '#gcashpay', function () {
    $('#gcashmodal').modal('show');
});

$('#cash').on('input', function() {
    var cash = $('#cash').val();
    var totalamount = $('#totalamount').val(); 
    getchange(cash, totalamount); 
});

function getchange(cash = 0, totalamount = 0){

    $('#totalfare').val(totalamount);
    $('#cash').val(cash);

    if(cash != 0){
        var result = cash - totalamount;
    }else{
        var result = 0;
    }
    
    $('#change').val(result);
}

$('#cash').on('focus', function() {
    $(this).css('background-color', '');
});


$(document).off('click', '.paybtn').on('click', '.paybtn', function () {

        var drivername = $('#drivername').val();
        var clientname  = $('#clientname').val();
        var tripfrom = $('#tripfrom').val();
        var tripto = $('#tripto').val();
        var service = $('#service').val();
        var amount = parseFloat($('#amount').val());
        var tips = parseFloat($('#tips').val());
        var totalamount = parseFloat($('#totalamount').val());
        var paid = 1;
        var activeflag = 1;
        var cash = $('#cash').val();
        console.log(cash);

        if(cash <= 0 || cash == '' || cash == null || cash < totalamount){
            toastr.error('Cash is less than fare amount <br> Please input an acceptable amount', 'Error');
            document.getElementById('cash').style.backgroundColor = '#ed7987';
            return false;
        } else {
            document.getElementById('cash').style.backgroundColor = '';
        }


        $.ajax({
            url: site_url + "bookingController/process_payment",
            method: "POST",
            dataType: 'JSON',
            data: {
                drivername,
                clientname,
                tripfrom,
                tripto,
                service,
                amount,
                tips,
                totalamount,
                paid,
                activeflag
            },
            success: function (res) {
        
                if(res == 'success'){
                    toastr.success('Successfully paid!', 'Success');
                    $('#drivername, #clientname, #tripfrom, #tripto, #amount, #totalamount').val('');
                    $('#paymentmodal').modal('hide');
                    $('#cashonhand').modal('hide');
                    $('#gcashmodal').modal('hide');
                }else{
                    toastr.error('Error occured!', 'Error');
                }
    
            },
            error: function (xhr, status, error) {
                // Handle error
                alert('An error occurred: ' + xhr.responseText);
                console.error('Error details:', error);
            }
        });
});

$(document).off('click', '.gcash_paybtn').on('click', '.gcash_paybtn', function () {
    var drivername = $('#drivername').val();
    var clientname  = $('#clientname').val();
    var tripfrom = $('#tripfrom').val();
    var tripto = $('#tripto').val();
    var service = $('#service').val();
    var amount = parseFloat($('#amount').val());
    var tips = parseFloat($('#tips').val());
    var totalamount = parseFloat($('#totalamount').val());
    var paid = 1;
    var activeflag = 1;


    $.ajax({
        url: site_url + "bookingController/process_payment",
        method: "POST",
        dataType: 'JSON',
        data: {
            drivername,
            clientname,
            tripfrom,
            tripto,
            service,
            amount,
            tips,
            totalamount,
            paid,
            activeflag
        },
        success: function (res) {
    
            if(res == 'success'){
                toastr.success('Successfully paid!', 'Success');
                $('#drivername, #clientname, #tripfrom, #tripto, #amount, #totalamount').val('');
                $('#paymentmodal').modal('hide');
                $('#cashonhand').modal('hide');
                $('#gcashmodal').modal('hide');
            }else{
                toastr.error('Error occured!', 'Error');
            }

        },
        error: function (xhr, status, error) {
            // Handle error
            alert('An error occurred: ' + xhr.responseText);
            console.error('Error details:', error);
        }
    });

});

$('#amount, #tips').on('change', function() {

    var amount = parseFloat($('#amount').val());
    var tip = parseFloat($('#tips').val());

    if (!isNaN(tip)) {
        var total = (amount * (tip / 100)) + amount;
        $('#totalamount').val(total.toFixed(2));
    } else {
        $('#totalamount').val(amount.toFixed(2));
    }
});













