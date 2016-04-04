function add_indication_submit() {
    console.log("submit indication");
    var url = "add_indication";
    var data = $('#add_indication').serialize();
    $.ajax({
        type: 'post',
        url: url,
        data: data,
        dataType: 'json',
        success: function (data) {
            // success logic
            $('form#add_indication #errorResponse').removeClass("alert alert-danger");
            $('form#add_indication #errorResponse').show().html("Indication Added successfully");            
            $('form#add_indication #errorResponse').addClass("alert alert-success");
            window.setTimeout(function(){location.reload()},3000)
        },
        error: function (data) {
            if (typeof data.responseJSON != "undefined")
            {
                var errors = data.responseJSON.message;
                var errorsHtml = '';

                $.each(errors, function (key, value) {
                    errorsHtml += '<li>' + value + '</li>';
                });
                console.log(errorsHtml);
                $('form#add_indication #errorResponse').show().html(errorsHtml); //this is my div with messages
                $('form#add_indication #errorResponse').addClass("alert alert-danger");
            }
        }
    });
}

function load_indication_details(tid, iid) {
    console.log("id : " + tid + " - " + iid);
    var url = "load_indication/"+tid+"/"+iid;
    $.ajax({
        type: 'post',
        url: url,
        dataType: 'json',
        success: function (data) {
            var details = (data);
            console.log(details);
            $('#myModal form#edit_indication #indicationName').val(details.indicationName);
            $("#myModal form#edit_indication #therapyName option[value='"+details.therapyID+"']").prop('selected', true);
            $("#myModal form#edit_indication #select2-therapyName-container").html(details.therapyName);    
            $('#myModal form#edit_indication #indicationID').val(details.indicationID);
            $('#myModal form#edit_indication #therapyID').val(details.therapyID);
        },      
        error: function (data) {
            if (typeof data.responseJSON != "undefined")
            {
                var errors = data.responseJSON.message;
                var errorsHtml = '';

                $.each(errors, function (key, value) {
                    errorsHtml += '<li>' + value + '</li>';
                });
                console.log(errorsHtml);
                $('form#add_indication #errorResponse').show().html(errorsHtml); //this is my div with messages
                $('form#add_indication #errorResponse').addClass("alert alert-danger");
            }
        }
    });
}

function edit_indication_submit() {
    console.log("submit indication");
    var url = "edit_indication";
    var data = $('#edit_indication').serialize();
    $.ajax({
        type: 'post',
        url: url,
        data: data,
        crossDomain: true,
        dataType: 'json',
        success: function (data) {
            // success logic            
            $('form#edit_indication #errorResponse').removeClass("alert alert-danger");
            $('form#edit_indication #errorResponse').show().html("Indication Updated successfully");            
            $('form#edit_indication #errorResponse').addClass("alert alert-success");
            window.setTimeout(function(){location.reload()},3000)
        },
        error: function (data) {
            alert(JSON.stringify(data));
            if (typeof data.responseJSON != "undefined")
            {
                var errors = data.responseJSON.message;
                var errorsHtml = '';

                $.each(errors, function (key, value) {
                    errorsHtml += '<li>' + value + '</li>';
                });
                console.log(errorsHtml);
                $('form#edit_indication #errorResponse').show().html(errorsHtml); //this is my div with messages
                $('form#edit_indication #errorResponse').addClass("alert alert-danger");
            }
        }
    });
}

function load_level2_data(l1id) {
    console.log("level 1 : " + l1id);
    if(l1id != "") {
        var url = "load_level2/"+l1id;
        $.ajax({
            type: 'post',
            url: url,
            dataType: 'json',
            success: function (data) {            
                $('form#add_molecule #level2Name').html(data.message);
            },      
            error: function (data) {
                alert(data);
            }
        });
    }
    else {
        $('form#add_molecule #level2Name').html('');
    }
}

var item = $("#level2Name"); // JQuery for getting the element
item.bind("autocompletechange", function(event, ui) { alert("hi"); });

function setLevel2Value(val, name) {
    // $('form#add_molecule #level2Name').
    console.log(val + " - " + name);
    $("form#add_molecule #level2Name option[value='"+val+"']").prop('selected', true);
    $("form#add_molecule #select2-level2Name-container").html(name);   
}

function add_molecule_submit() {
    console.log("submit molecule");
    var url = "add_molecule";
    var data = $('#add_molecule').serialize();
    $.ajax({
        type: 'post',
        url: url,
        data: data,
        dataType: 'json',
        success: function (data) {
            // success logic
            $('form#add_molecule #errorResponse').removeClass("alert alert-danger");
            $('form#add_molecule #errorResponse').show().html("Molecule Added successfully");            
            $('form#add_molecule #errorResponse').addClass("alert alert-success");
            window.setTimeout(function(){location.reload()},3000)
        },
        error: function (data) {
            if (typeof data.responseJSON != "undefined")
            {
                var errors = data.responseJSON.message;
                var errorsHtml = '';

                $.each(errors, function (key, value) {
                    errorsHtml += '<li>' + value + '</li>';
                });
                console.log(errorsHtml);
                $('form#add_molecule #errorResponse').show().html(errorsHtml); //this is my div with messages
                $('form#add_molecule #errorResponse').addClass("alert alert-danger");
            }
        }
    });
}

function load_molecule_details(tid, mid) {
    console.log("id : " + tid + " - " + mid);
    var url = "load_molecule/"+tid+"/"+mid;
    $.ajax({
        type: 'post',
        url: url,
        dataType: 'json',
        success: function (data) {
            var details = (data);
            console.log(details);
            $('#myModal form#edit_molecule #moleculeName').val(details.moleculeName);
            $("#myModal form#edit_molecule #therapyName option[value='"+details.therapyID+"']").prop('selected', true);
            $("#myModal form#edit_molecule #select2-therapyName-container").html(details.therapyName);    
            $('#myModal form#edit_molecule #moleculeID').val(details.moleculeID);
            $('#myModal form#edit_molecule #therapyID').val(details.therapyID);
        },      
        error: function (data) {
            if (typeof data.responseJSON != "undefined")
            {
                var errors = data.responseJSON.message;
                var errorsHtml = '';

                $.each(errors, function (key, value) {
                    errorsHtml += '<li>' + value + '</li>';
                });
                console.log(errorsHtml);
                $('form#edit_molecule #errorResponse').show().html(errorsHtml); //this is my div with messages
                $('form#edit_molecule #errorResponse').addClass("alert alert-danger");
            }
        }
    });
}

function edit_molecule_submit() {
    console.log("edit molecule");
    var url = "edit_molecule";
    var data = $('#edit_molecule').serialize();
    $.ajax({
        type: 'post',
        url: url,
        data: data,
        crossDomain: true,
        dataType: 'json',
        success: function (data) {
            // success logic            
            $('form#edit_molecule #errorResponse').removeClass("alert alert-danger");
            $('form#edit_molecule #errorResponse').show().html("Molecule Updated successfully");            
            $('form#edit_molecule #errorResponse').addClass("alert alert-success");
            window.setTimeout(function(){location.reload()},3000)
        },
        error: function (data) {
            alert(JSON.stringify(data));
            if (typeof data.responseJSON != "undefined")
            {
                var errors = data.responseJSON.message;
                var errorsHtml = '';

                $.each(errors, function (key, value) {
                    errorsHtml += '<li>' + value + '</li>';
                });
                console.log(errorsHtml);
                $('form#edit_molecule #errorResponse').show().html(errorsHtml); //this is my div with messages
                $('form#edit_molecule #errorResponse').addClass("alert alert-danger");
            }
        }
    });
}

function add_client_submit() {
    console.log("submit client");
    var url = "add_client";
    var data = $('#add_client').serialize();
    $.ajax({
        type: 'post',
        url: url,
        data: data,
        dataType: 'json',
        success: function (data) {
            // success logic
            $('form#add_client #errorResponse').removeClass("alert alert-danger");
            $('form#add_client #errorResponse').show().html("Client Added successfully");            
            $('form#add_client #errorResponse').addClass("alert alert-success");
            window.setTimeout(function(){location.reload()},3000)
        },
        error: function (data) {
            if (typeof data.responseJSON != "undefined")
            {
                var errors = data.responseJSON.message;
                var errorsHtml = '';

                $.each(errors, function (key, value) {
                    errorsHtml += '<li>' + value + '</li>';
                });
                console.log(errorsHtml);
                $('form#add_client #errorResponse').show().html(errorsHtml); //this is my div with messages
                $('form#add_client #errorResponse').addClass("alert alert-danger");
            }
        }
    });
}
