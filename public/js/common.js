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
            window.setTimeout(function () {
                location.reload()
            }, 3000)
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
    var url = "load_indication/" + tid + "/" + iid;
    $.ajax({
        type: 'post',
        url: url,
        dataType: 'json',
        success: function (data) {
            var details = (data);
            console.log(details);
            $('#myModal form#edit_indication #indicationName').val(details.indicationName);
            $("#myModal form#edit_indication #therapyName option[value='" + details.therapyID + "']").prop('selected', true);
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
            window.setTimeout(function () {
                location.reload()
            }, 3000)
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

function load_level2_data(l1id, form_action) {
    console.log("level 1 : " + l1id);
    if (l1id != "") {
        var url = "load_level2/" + l1id;
        $.ajax({
            type: 'post',
            url: url,
            dataType: 'json',
            success: function (data) {
                console.log("success");
                $('form#' + form_action + '_molecule #level2Name').html(data.message);
            },
            error: function (data) {
                console.log("error");
                alert(data);
            }
        });
    } else {
        $('#level2Name').html('');
    }
}

function setLevel2Value(val, name) {
    // $('form#add_molecule #level2Name').
    console.log(val + " - " + name);
    $("form#add_molecule #level2Name option[value='" + val + "']").prop('selected', true);
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
            window.setTimeout(function () {
                location.reload()
            }, 3000)
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

function load_molecule_details(mid, index) {
    console.log("id : " + " - " + mid + " - " + index);
    var url = "load_molecule/" + mid + "/" + index;
    $.ajax({
        type: 'post',
        url: url,
        dataType: 'json',
        success: function (data) {
            var details = (data);
            console.log(details);
            $('#myModal form#edit_molecule #moleculeName').val(details.moleculeName);
            $('#myModal form#edit_molecule #mid').val(details.moleculeID);
            $('#myModal form#edit_molecule #mIndex').val(details.mIndex);
            $("#myModal form#edit_molecule #level1Name option[value='" + details.level1id + "']").prop('selected', true);
            $("#myModal form#edit_molecule #select2-level1Name-container").html(details.level1name);
            load_level2_data(details.level1id, 'edit');
            $("#myModal form#edit_molecule #level2Name option[value='" + details.level2id + "']").prop('selected', true);
            $("#myModal form#edit_molecule #select2-level2Name-container").html(details.level2name);
            $('#myModal form#edit_molecule #moleculeID').val(details.moleculeID);

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
            window.setTimeout(function () {
                location.reload()
            }, 3000)
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

function add_therapeutic_submit() {
    console.log("submit client");
    var url = "add_therapeutic";
    var data = $('#add_therapeutic').serialize();
    $.ajax({
        type: 'post',
        url: url,
        data: data,
        dataType: 'json',
        success: function (data) {
            // success logic
            $('form#add_therapeutic #errorResponse').removeClass("alert alert-danger");
            $('form#add_therapeutic #errorResponse').show().html("Therapeutic Area Added successfully");
            $('form#add_therapeutic #errorResponse').addClass("alert alert-success");
            window.setTimeout(function () {
                location.reload()
            }, 3000)
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
                $('form#add_therapeutic #errorResponse').show().html(errorsHtml); //this is my div with messages
                $('form#add_therapeutic #errorResponse').addClass("alert alert-danger");
            }
        }
    });
}

function load_therapeutic_details(tid) {
    console.log("id : " + " - " + tid);
    var url = "load_therapeutic/" + tid;
    $.ajax({
        type: 'post',
        url: url,
        dataType: 'json',
        success: function (data) {
            var details = (data);
            console.log(details);
            $('form#edit_therapeutic #therapeuticName').val(details.therapeuticName);
            $('form#edit_therapeutic #tid').val(details.therapeuticID);
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
                $('form#edit_therapeutic #errorResponse').show().html(errorsHtml); //this is my div with messages
                $('form#edit_therapeutic #errorResponse').addClass("alert alert-danger");
            }
        }
    });
}

function edit_therapeutic_submit() {
    console.log("edit therapeutic");
    var url = "edit_therapeutic";
    var data = $('#edit_therapeutic').serialize();
    $.ajax({
        type: 'post',
        url: url,
        data: data,
        crossDomain: true,
        dataType: 'json',
        success: function (data) {
            // success logic            
            $('form#edit_therapeutic #errorResponse').removeClass("alert alert-danger");
            $('form#edit_therapeutic #errorResponse').show().html("Therapeutic Updated successfully");
            $('form#edit_therapeutic #errorResponse').addClass("alert alert-success");
            window.setTimeout(function () {
                location.reload()
            }, 3000)
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
                $('form#edit_therapeutic #errorResponse').show().html(errorsHtml); //this is my div with messages
                $('form#edit_therapeutic #errorResponse').addClass("alert alert-danger");
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
            window.setTimeout(function () {
                location.reload()
            }, 3000)
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

function add_group_submit() {
    console.log("submit business group");
    var url = "add_group";
    var data = $('#add_bg').serialize();
    $.ajax({
        type: 'post',
        url: url,
        data: data,
        dataType: 'json',
        success: function (data) {
            // success logic
            $('form#add_bg #errorResponse').removeClass("alert alert-danger");
            $('form#add_bg #errorResponse').show().html("Business Group Added successfully");
            $('form#add_bg #errorResponse').addClass("alert alert-success");
            window.setTimeout(function () {
                location.reload()
            }, 3000)
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
                $('form#add_bg #errorResponse').show().html(errorsHtml); //this is my div with messages
                $('form#add_bg #errorResponse').addClass("alert alert-danger");
            }
        }
    });
}

function load_indication_data(tid) {
    console.log("tid : " + tid);
    var url = "load_indications/" + tid;
    if (tid != "") {
        $.ajax({
            type: 'post',
            url: url,
            dataType: 'json',
            success: function (data) {
                var details = (data);
                console.log(details);
                $('form#add_indication_entry #indicationName').html(data.message);
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
                    $('form#add_indication_entry #errorResponse').show().html(errorsHtml); //this is my div with messages
                    $('form#add_indication_entry #errorResponse').addClass("alert alert-danger");
                }
            }
        });
    }
}

function setValues(bgid, form_name) {
    $('form#'+form_name+' #bgid').val(bgid);
}

function edit_bg_submit() {
    console.log("edit business group");
    var url = "edit_bg_submit";
    var data = $('#edit_bg').serialize();
    $.ajax({
        type: 'post',
        url: url,
        data: data,
        dataType: 'json',
        success: function (data) {
            // success logic
            $('form#edit_bg #errorResponse').removeClass("alert alert-danger");
            $('form#edit_bg #errorResponse').show().html("Business Group Added successfully");
            $('form#edit_bg #errorResponse').addClass("alert alert-success");
            window.setTimeout(function () {
                location.reload()
            }, 3000)
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
                $('form#edit_bg #errorResponse').show().html(errorsHtml); //this is my div with messages
                $('form#edit_bg #errorResponse').addClass("alert alert-danger");
            }
        }
    });
}

function edit_bg_entry(cid, bgid) {
    console.log("edit bg entry : " + cid + " - " + bgid);
    $('form#edit_bg #cid').val(cid);
    $('form#edit_bg #bgid').val(bgid);
    var url = "edit_bg_entry/"+cid+"/"+bgid;
    $.ajax({
            type: 'post',
            url: url,
            dataType: 'json',
            success: function (data) {
                var details = (data);
                console.log(details);
                $('form#edit_bg #clientName').val(data.clientName);
                $('form#edit_bg #groupName').val(data.groupName);
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
                    $('form#edit_bg #errorResponse').show().html(errorsHtml); //this is my div with messages
                    $('form#edit_bg #errorResponse').addClass("alert alert-danger");
                }
            }
        });
}

function add_indication_entry_submit() {
    console.log("submit indication entry");
    var url = "add_indication_entry";
    var data = $('#add_indication_entry').serialize();
    $.ajax({
        type: 'post',
        url: url,
        data: data,
        dataType: 'json',
        success: function (data) {
            // success logic
            $('form#add_indication_entry #errorResponse').removeClass("alert alert-danger");
            $('form#add_indication_entry #errorResponse').show().html("Indication Entry Added successfully");
            $('form#add_indication_entry #errorResponse').addClass("alert alert-success");
//            window.setTimeout(function () {
//                location.reload()
//            }, 3000)
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
                $('form#add_indication_entry #errorResponse').show().html(errorsHtml); //this is my div with messages
                $('form#add_indication_entry #errorResponse').addClass("alert alert-danger");
            }
        }
    });
}

function load_molecule_data(l2id) {
    var l1id = $('form#add_molecule #level1Name').val();
    console.log("id : " + l1id + " - " + l2id);
    var url = "load_molecules/" + l1id + "/" + l2id;
    if (l2id != "") {
        $.ajax({
            type: 'post',
            url: url,
            dataType: 'json',
            success: function (data) {
                var details = (data);
                console.log(details);
                $('form#add_molecule #moleculeName').html(data.message);
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
}

function add_molecule_entry_submit() {
    console.log("submit molecule entry");
    var url = "add_molecule_entry";
    var data = $('#add_molecule').serialize();
    $.ajax({
        type: 'post',
        url: url,
        data: data,
        dataType: 'json',
        success: function (data) {
            // success logic
            $('form#add_molecule #errorResponse').removeClass("alert alert-danger");
            $('form#add_molecule #errorResponse').show().html("Molecule Entry Added successfully");
            $('form#add_molecule #errorResponse').addClass("alert alert-success");
            window.setTimeout(function () {
                location.reload()
            }, 3000)
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