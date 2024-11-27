//var site_url = 'http://localhost:8080/Movers/index.php/';
var site_url = 'https://server7.indevfinite-server.com:8090/preview/Movers.com/';
var totalfare = 0;
var recordid = 0;

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
            url: site_url + "/bookingpaymentController/get_booking_list",
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
                    $('#additemmodal').modal('show');

                    $('#itemname, #qty, #type').css({
                        'borderColor': '',
                        'backgroundColor': ''
                    });

                    $('#modaltitle').text('Edit item');
                    $('#itemname, #qty, #type').click(function() {
                        $(this).css('borderColor', '');
                        $(this).css('backgroundColor', '');
                    });

                    $('#additem').css('display', 'none');
                    $('#edititem').css('display', 'block');

                    var itemid = $(this).data('itemid');
                    load_edit(itemid);
                    
                });

                $('.paybooking').click(function () {

                    recordid = 0;
                    totalfare = 0;

                    recordid = $(this).data('recordid');
                    paybooking(recordid);
                    
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

$(document).off('click', '#cashonhandpay').on('click', '#cashonhandpay', function () {
    $('#cashonhand').modal('show');
    $('#cash').css('backgroundColor', '');
    $('#cash').val('');

    getchange(0, totalfare);

});

$(document).off('click', '#gcashpay').on('click', '#gcashpay', function () {
    $('#gcashmodal').modal('show');
});

$('#cash').on('input', function() {
    var cash = $('#cash').val();
    getchange(cash, totalfare); 
});

function getchange(cash = 0, totalfare = 0){

    var cash = parseFloat($('#cash').val()) || 0;
    var totalamount = parseFloat(totalfare) || 0;

    console.log(cash);
    console.log(totalamount);

    if(cash != 0){
        var change = cash - totalamount;
    }else{
        var change = "0.00";
    }
    
    $('#change').val(change);
}

$('#cash').click(function() {
    $(this).css('borderColor', '');
    $(this).css('backgroundColor', '');
});


$(document).off('click', '.cash_paybtn').on('click', '.cash_paybtn', function () {

    var cash = $('#cash').val();

    if(cash < totalfare){
        toastr.error('Cash is less than fare amount <br> Please input a larger amount', 'Error');
        document.getElementById('cash').style.backgroundColor = '#ed7987';
        return false;
    } else {
        document.getElementById('cash').style.backgroundColor = '';
    }
    
    if (cash == null || cash == ''){
        toastr.error('Cash is empty <br> Please input a value', 'Error');
        document.getElementById('cash').style.backgroundColor = '#ed7987';
        return false;
    } else {
        document.getElementById('cash').style.backgroundColor = '';
    }


    updatestatus(recordid);

});


function paybooking(recordid = 0){

    $('#promptMessage').modal('show');
    $('#prompttitle').text('Payment');
    $('#prompheader').addClass('bg-success');


        $.ajax({
            url: site_url + "bookingpaymentController/getfareamount",
            method: "POST",
            dataType: 'JSON',
            data: {
                recordid
            },
            success: function (res) {
                $('#totalfare').val(res.total);
                totalfare = res.total;
            },
            error: function (xhr, status, error) {
                // Handle error
                alert('An error occurred: ' + xhr.responseText);
                console.error('Error details:', error);
            }
        });
    
}

function updatestatus(recordid = 0){


    $.ajax({
        url: site_url + "bookingpaymentController/updatestatus",
        method: "POST",
        dataType: 'JSON',
        data: {
            recordid
        },
        success: function (res) {
            $('#cashonhand').modal('hide');
            $('#gcashmodal').modal('hide');
            $('#promptMessage').modal('hide');
            toastr.success('Payment success!', 'Success');
            initial_load();
        },
        error: function (xhr, status, error) {
            // Handle error
            alert('An error occurred: ' + xhr.responseText);
            console.error('Error details:', error);
        }
    });

}


    
    





