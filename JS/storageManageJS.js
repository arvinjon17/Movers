var site_url = 'http://localhost:8080/Movers/index.php/';

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
            url: site_url + "/storageManageController/get_item_list",
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

                $('.disablebtn').click(function () {
                   
                    var itemid = $(this).data('itemid');
                    deactivate(itemid);
                    
                });

                $('.activatebtn').click(function () {
                   
                    var itemid = $(this).data('itemid');
                    activate(itemid);
                    
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

$('#itemname, #qty, #type').click(function() {
    $(this).css('borderColor', '');
    $(this).css('backgroundColor', '');
});

$('#additembtn').click(function () {
    $('#additemmodal').modal('show');

    $('#itemname, #qty, #type').css({
        'borderColor': '',
        'backgroundColor': ''
    });
    
    $('#modaltitle').text('Add Item');

    $('#itemname, #qty, #type').click(function() {
        $(this).css('borderColor', '');
        $(this).css('backgroundColor', '');
    });

    $('#additem').css('display', 'block');
    $('#edititem').css('display', 'none');

    $('#itemname').val('');
    $('#qty').val('');
    $('#type').val('');
});

$(document).off('click', '#additem').on('click', '#additem', function () {

    var itemname = $('#itemname').val();
    var qty = $('#qty').val();
    var type = $('#type').val();

    toastr.remove();
    var errormsg = [];

        if(itemname == '') {
            errormsg.push('Item name is empty');
            document.getElementById('itemname').style.backgroundColor = '#ed7987';
        } else {
            document.getElementById('itemname').style.backgroundColor = '';
        }

        if(qty == '') {
            errormsg.push('Quantity is empty');
            document.getElementById('qty').style.backgroundColor = '#ed7987';
        } else {
            document.getElementById('qty').style.backgroundColor = '';
        }

        if(type == '') {
            errormsg.push('Type is empty');
            document.getElementById('type').style.backgroundColor = '#ed7987';
        } else {
            document.getElementById('type').style.backgroundColor = '';
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
        url: site_url + "storageManageController/process_register",
        method: "POST",
        dataType: 'JSON',
        data: {
            itemname,
            qty,
            type
        },
        success: function (res) {
    
            if(res == 'update'){
                toastr.success('Successfully added an item!', 'Success');
                $('#itemname, #qty, #type').val('');
                $('#additemmodal').modal('hide');
                initial_load();
            }else if(res == 'duplicate_itemname') {
                toastr.error('Existing item found. <br> Please use a different item name.', 'Error');
                document.getElementById('itemname').style.borderColor = '#ed7987';
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

function load_edit(itemid = 0){

    $.ajax({
        url: site_url + "/storageManageController/get_item",
        method: 'POST',
        dataType: 'JSON',
        data: { itemid },
        beforeSend: function () {

        },
        success: function (response) {

            $('#itemname').val(response.item['itemname']);
            $('#qty').val(response.item['qty']);
            $('#type').val(response.item['type']);


            $(document).off('click', '#edititem').on('click', '#edititem', function () {

                var itemname = $('#itemname').val();
                var qty = $('#qty').val();
                var type = $('#type').val();

                toastr.remove();
                var errormsg = [];

                if(itemname == '') {
                    errormsg.push('Item name is empty');
                    document.getElementById('itemname').style.backgroundColor = '#ed7987';
                } else {
                    document.getElementById('itemname').style.backgroundColor = '';
                }
        
                if(qty == '') {
                    errormsg.push('Quantity is empty');
                    document.getElementById('qty').style.backgroundColor = '#ed7987';
                } else {
                    document.getElementById('qty').style.backgroundColor = '';
                }
        
                if(type == '') {
                    errormsg.push('Type is empty');
                    document.getElementById('type').style.backgroundColor = '#ed7987';
                } else {
                    document.getElementById('type').style.backgroundColor = '';
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
                    url: site_url + "storageManageController/process_edititem",
                    method: "POST",
                    dataType: 'JSON',
                    data: {
                        itemname,
                        qty,
                        type,
                        itemid
                    },
                    success: function (res) {
                
                        if(res == 'update'){
                            toastr.success('Successfully updated an item!', 'Success');
                            $('#itemname, #qty, #type').val('');
                            $('#additemmodal').modal('hide');
                            initial_load();
                        }else if(res == 'duplicate_itemname'){
                            toastr.error('Existing item found. <br> Please use a different item name.', 'Error');
                            document.getElementById('itemname').style.borderColor = '#ed7987';
                        }else if(res == 'no changes'){
                            $('#additemmodal').modal('hide');
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

function deactivate(itemid = 0){

    $('#promptMessage').modal('show');
    $('#prompttitle').text('Deactivation');
    $('#activateitem').css('display', 'none');
    $('#disableitem').css('display', 'block');
    $('#prompheader').addClass('bg-danger');
    $('#prompheader').removeClass('bg-success');



    $(document).off('click', '#disableitem').on('click', '#disableitem', function () {

        $.ajax({
            url: site_url + "storageManageController/deactivate",
            method: "POST",
            dataType: 'JSON',
            data: {
                itemid
            },
            success: function (res) {
                $('#promptMessage').modal('hide');
                initial_load();
                toastr.info('Successfully deactivated an item', 'Info');
            },
            error: function (xhr, status, error) {
                // Handle error
                alert('An error occurred: ' + xhr.responseText);
                console.error('Error details:', error);
            }
        });

    });
    
}

function activate(itemid = 0){

    $('#promptMessage').modal('show');
    $('#prompttitle').text('Reactivation');
    $('#disableitem').css('display', 'none');
    $('#activateitem').css('display', 'block');
    $('#prompheader').removeClass('bg-danger');
    $('#prompheader').addClass('bg-success');



    $(document).off('click', '#activateitem').on('click', '#activateitem', function () {

        $.ajax({
            url: site_url + "storageManageController/activate",
            method: "POST",
            dataType: 'JSON',
            data: {
                itemid
            },
            success: function (res) {
                $('#promptMessage').modal('hide');
                initial_load();
                toastr.info('Successfully activated an item', 'Info');
            },
            error: function (xhr, status, error) {
                // Handle error
                alert('An error occurred: ' + xhr.responseText);
                console.error('Error details:', error);
            }
        });

    });
    
}

    
    





