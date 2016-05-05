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

    /*.ajax({
     type: 'post',
     url: url,
     data: data,
     dataType: 'json',
     success: function (data) {
     // success logic
     $('form#add_indication #errorResponse').removeClass("alert alert-danger");
     $('form#add_indication #errorResponse').show().html("Indication Added successfully");
     $('form#add_indication #errorResponse').addClass("alert alert-success");
     /*window.setTimeout(function () {
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
     });$.ajax({
     type: 'post',
     url: url,
     data: data,
     dataType: 'json',
     success: function (data) {
     // success logic
     $('form#add_indication #errorResponse').removeClass("alert alert-danger");
     $('form#add_indication #errorResponse').show().html("Indication Added successfully");
     $('form#add_indication #errorResponse').addClass("alert alert-success");
     /*window.setTimeout(function () {
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
     }); */
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
//            window.setTimeout(function () {
//                location.reload()
//            }, 3000)
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

function load_level2_data(l1id, form_action, l2id = '') {
    console.log("level 1 : " + l1id);
    if (l1id != "") {
        if (form_action == 'edit')
            l2id = l2id;
        else
            l2id = null;
        var url = "load_level2/" + l1id + "/" + l2id;
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
            load_level2_data(details.level1id, 'edit', details.level2id);
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
            //alert(JSON.stringify(data));
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
    $('form#' + form_name + ' #bgid').val(bgid);
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
    var url = "edit_bg_entry/" + cid + "/" + bgid;
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

function load_indication_entry_list(bgid) {
    console.log("bgid : " + bgid);
    var url = "load_indication_entry_list/" + bgid;
    if (bgid != "") {
        $.ajax({
            type: 'post',
            url: url,
            //dataType: 'json',
            success: function (data) {
                var details = (data);
                console.log(details);
                $('div#list_indication_entry').html(data);
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
                    $('div#list_indication_entry #errorResponse').show().html(errorsHtml); //this is my div with messages
                    $('div#list_indication_entry #errorResponse').addClass("alert alert-danger");
                }
            }
        });
    }
}

function load_molecule_entry_list(bgid) {
    console.log("bgid : " + bgid);
    var url = "load_molecule_entry_list/" + bgid;
    if (bgid != "") {
        $.ajax({
            type: 'post',
            url: url,
            //dataType: 'json',
            success: function (data) {
                var details = (data);
                console.log(details);
                $('div#list_molecule_entry').html(data);
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
                    $('div#list_molecule_entry #errorResponse').show().html(errorsHtml); //this is my div with messages
                    $('div#list_molecule_entry #errorResponse').addClass("alert alert-danger");
                }
            }
        });
    }
}

function delete_therapeutic(tid) {
    var r = confirm("Are you sure to delete this record?")
    if (r == true) {
        console.log("you pressed ok");
        var url = "remove_therapeutic/" + tid;
        $.ajax({
            type: 'post',
            url: url,
            //dataType: 'json',
            success: function (data) {
                var details = (data);
                console.log(details);
                window.location.reload();
            },
            error: function (data) {
            }
        });
    } else {
        console.log("you pressed cancel");
    }
}

function delete_indication(tid, iid) {
    var r = confirm("Are you sure to delete this record?")
    if (r == true) {
        console.log("you pressed ok");
        var url = "remove_indication/" + tid + "/" + iid;
        $.ajax({
            type: 'post',
            url: url,
            //dataType: 'json',
            success: function (data) {
                var details = (data);
                console.log(details);
                window.location.reload();
            },
            error: function (data) {
            }
        });
    } else {
        console.log("you pressed cancel");
    }
}

function delete_molecule(mid) {
    var r = confirm("Are you sure to delete this record?")
    if (r == true) {
        console.log("you pressed ok");
        var url = "remove_molecule/" + mid;
        $.ajax({
            type: 'post',
            url: url,
            //dataType: 'json',
            success: function (data) {
                var details = (data);
                console.log(details);
                window.location.reload();
            },
            error: function (data) {
            }
        });
    } else {
        console.log("you pressed cancel");
    }
}

function delete_client(cid) {
    var r = confirm("Are you sure to delete this record?")
    if (r == true) {
        console.log("you pressed ok");
        var url = "remove_client/" + cid;
        $.ajax({
            type: 'post',
            url: url,
            //dataType: 'json',
            success: function (data) {
                var details = (data);
                console.log(details);
                window.location.reload();
            },
            error: function (data) {
            }
        });
    } else {
        console.log("you pressed cancel");
    }
}

function delete_group(cid, bgid) {
    var r = confirm("Are you sure to delete this record?")
    if (r == true) {
        console.log("you pressed ok");
        var url = "remove_group/" + cid + "/" + bgid;
        $.ajax({
            type: 'post',
            url: url,
            //dataType: 'json',
            success: function (data) {
                var details = (data);
                console.log(details);
                window.location.reload();
            },
            error: function (data) {
            }
        });
    } else {
        console.log("you pressed cancel");
    }
}

function delete_indication_entry(bgid, iid) {
    var r = confirm("Are you sure to delete this record?")
    if (r == true) {
        console.log("you pressed ok");
        var url = "remove_indication_entry/" + bgid + "/" + iid;
        $.ajax({
            type: 'post',
            url: url,
            //dataType: 'json',
            success: function (data) {
                var details = (data);
                console.log(details);
                window.location.reload();
            },
            error: function (data) {
            }
        });
    } else {
        console.log("you pressed cancel");
    }
}

function delete_molecule_entry(bgid, mid) {
    var r = confirm("Are you sure to delete this record?")
    if (r == true) {
        console.log("you pressed ok");
        var url = "remove_molecule_entry/" + bgid + "/" + mid;
        $.ajax({
            type: 'post',
            url: url,
            //dataType: 'json',
            success: function (data) {
                var details = (data);
                console.log(details);
                window.location.reload();
            },
            error: function (data) {
            }
        });
    } else {
        console.log("you pressed cancel");
    }
}

function add_new_role() {
//    alert("DFDSFGS");
    console.log("submit role");
    var url = "add_role";
    var data = $('#add_role').serialize();
    $.ajax({
        type: 'post',
        url: url,
        data: data,
        dataType: 'json',
        success: function (data) {
            // success logic
            $('form#add_role #errorResponse').removeClass("alert alert-danger");
            $('form#add_role #errorResponse').show().html("Role Added successfully");
            $('form#add_role #errorResponse').addClass("alert alert-success");
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
                $('form#add_role #errorResponse').show().html(errorsHtml); //this is my div with messages
                $('form#add_role #errorResponse').addClass("alert alert-danger");
            }
        }
    });
}
function new_user() {
    console.log("submit user");
    var url = "add_user";
    var data = $('#add_user').serialize();
    $.ajax({
        type: 'post',
        url: url,
        data: data,
        dataType: 'json',
        success: function (data) {
            // success logic
            $('form#add_user #errorResponse').removeClass("alert alert-danger");
            $('form#add_user #errorResponse').show().html("Role Added successfully");
            $('form#add_user #errorResponse').addClass("alert alert-success");
            // window.setTimeout(function(){location.reload()},3000)
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
                $('form#add_user #errorResponse').show().html(errorsHtml); //this is my div with messages
                $('form#add_user #errorResponse').addClass("alert alert-danger");
            }
        }
    });
}
function edit_user_submit(uid) {
    console.log("submit edit_user");
    var url = "edit_user_submit/" + uid;
    var data = $('#edit_user').serialize();
    $.ajax({
        type: 'post',
        url: url,
        data: data,
        dataType: 'json',
        success: function (data) {
            // success logic
            $('form#edit_user #errorResponse').removeClass("alert alert-danger");
            $('form#edit_user #errorResponse').show().html("Role Added successfully");
            $('form#edit_user #errorResponse').addClass("alert alert-success");
            // window.setTimeout(function(){location.reload()},3000)
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
                $('form#edit_user #errorResponse').show().html(errorsHtml); //this is my div with messages
                $('form#edit_user #errorResponse').addClass("alert alert-danger");
            }
        }
    });
}

function edit_user_form(id) {
//    alert(id);
    console.log("id : " + id);
    var url = "edit_user_form/" + id;
    $.ajax({
        type: 'post',
        url: url,
        dataType: 'json',
        success: function (data) {
            var details = (data);
            console.log(details.User_Name);
            $('#modal_form_edit form#edit_user #Edit_User_Name').val(details.User_Name);
            $('#modal_form_edit form#edit_user #Edit_Email_Id').val(details.Email_Id);
            $('#modal_form_edit form#edit_user #Edit_Password').val(details.Password);
            $('#modal_form_edit form#edit_user #Edit_Role_Id').val(details.Role_Id);
//            $("#myModal form#edit_user #select2-therapyName-container").html(details.therapyName);            
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
                $('form#edit_user #errorResponse').show().html(errorsHtml); //this is my div with messages
                $('form#edit_user #errorResponse').addClass("alert alert-danger");
            }
        }
    });
}

function load_edit_role(id) {
//    alert(id);
    console.log("id : " + id);
    var url = "edit_role_form/" + id;
    $.ajax({
        type: 'post',
        url: url,
        dataType: 'json',
        success: function (data) {
            var details = (data);
            console.log(details.User_Name);
            $('#modal_form_edit form#edit_role #Edit_Role_Name').val(details.Role_Name);
            $('#modal_form_edit form#edit_role #Edit_Role_Id').val(details.Role_Id);
//            $("#myModal form#edit_user #select2-therapyName-container").html(details.therapyName);            
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
                $('form#edit_role #errorResponse').show().html(errorsHtml); //this is my div with messages
                $('form#edit_role #errorResponse').addClass("alert alert-danger");
            }
        }
    });
}

function edit_role_submit() {
    console.log("submit edit_role");
    var url = "edit_role_submit";
    var data = $('#edit_role').serialize();
    $.ajax({
        type: 'post',
        url: url,
        data: data,
        dataType: 'json',
        success: function (data) {
            // success logic
            $('form#edit_role #errorResponse').removeClass("alert alert-danger");
            $('form#edit_role #errorResponse').show().html("Role Updated successfully");
            $('form#edit_role #errorResponse').addClass("alert alert-success");
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
                $('form#edit_role #errorResponse').show().html(errorsHtml); //this is my div with messages
                $('form#edit_role #errorResponse').addClass("alert alert-danger");
            }
        }
    });
}

//Feed Management

function displayFeedSection(id, gid, call, id1,id2) {
    var bg = $('#bg_details').val();
    if((bg == "")||(bg==null))
        bg = gid;
    console.log("bg : " + bg);
    if (id == 'indication') {
        $('#indication').removeClass("hide");
        $('#molecule').addClass("hide");
        loadTherapeutic(bg);
    }
    if (id == 'molecule') {
        $('#molecule').removeClass("hide");
        $('#indication').addClass("hide");
        loadLevels(bg, id1);
    }
}

function displayEditFeedSection(id, bg, callMethod, l1id, l2id) {
    var bg = bg;
    var l1id = l1id;
    if (callMethod == 'click') {
        bg = $('form#edit_feed #bg_details_edit').val();
        l1id = $('form#edit_feed #level1_details_edit').val();
    }
    console.log("edit bg : " + bg);
    if (id == 'indication') {
        $('form#edit_feed #indication').removeClass("hide");
        $('form#edit_feed #molecule').addClass("hide");
        var tid = l1id;
        loadEditTherapeutic(bg, tid);
    }
    if (id == 'molecule') {
        $('form#edit_feed #molecule').removeClass("hide");
        $('form#edit_feed #indication').addClass("hide");
        loadEditLevels(bg, l1id);
    }
}

function loadTherapeutic(bg) {
    var url = "load_therapeutic_detail/" + bg + "/" + null;
    $.ajax({
        type: 'post',
        url: url,
        dataType: 'json',
        success: function (data) {
            $('form #thera_details').html(data.message);
        },
        error: function (data) {

        }
    });
}

function loadEditTherapeutic(bg, tid) {
    var url = "load_therapeutic_detail/" + bg + "/" + tid;
    $.ajax({
        type: 'post',
        url: url,
        dataType: 'json',
        success: function (data) {
            $('form#edit_feed #thera_details_edit').html(data.message);
        },
        error: function (data) {

        }
    });
}

function loadIndications(tid, iid) {
    var url = "load_indication_detail/" + tid + "/" + null;
    $.ajax({
        type: 'post',
        url: url,
        dataType: 'json',
        success: function (data) {
            $('form #indication_details').html(data.message);
        },
        error: function (data) {

        }
    });
}

function loadEditIndications(tid, iid) {
    if (tid != "") {
        if (iid == "")
            iid = null;
        var url = "load_indication_detail/" + tid + "/" + iid;
        $.ajax({
            type: 'post',
            url: url,
            dataType: 'json',
            success: function (data) {
                $('form#edit_feed #indication_details_edit').html(data.message);
            },
            error: function (data) {

            }
        });
    } else
    {
        $('form#edit_feed #indication_details_edit').html("");
        $('form#edit_feed #select2-indication_details_edit-container').html("");
    }
}

function loadLevels(bg, id1='') {
    if(id1 == '')
        id1 = null;
    console.log("id : " + bg + " - " + id1);
    var url = "load_level1_detail/" + bg + "/" + id1;
    $.ajax({
        type: 'post',
        url: url,
        dataType: 'json',
        success: function (data) {
            $('form #level1_details').html(data.message);
        },
        error: function (data) {

        }
    });
}

function loadEditLevels(bg, l1id) {
    if (l1id == "")
        l1id = $('form#edit_feed #level1_details_edit').val();
    if (l1id != "") {
        var url = "load_level1_detail/" + bg + "/" + l1id;
        $.ajax({
            type: 'post',
            url: url,
            dataType: 'json',
            success: function (data) {
                $('form#edit_feed #level1_details_edit').html(data.message);
                $('form#edit_feed #level2_details_edit').html("");
            },
            error: function (data) {

            }
        });
    } else
    {
        $('form#edit_feed #select2-level1_details_edit-container').html("");
    }
}

function loadFeedLevel2(l1id, l2id='') {
    if(l2id == '')
        l2id = null;
    var url = "load_level2_detail/" + l1id + "/" + l2id;
    $.ajax({
        type: 'post',
        url: url,
        dataType: 'json',
        success: function (data) {
            $('form #level2_details').html(data.message);
        },
        error: function (data) {

        }
    });
}

function loadEditFeedLevel2(l1id, l2id) {
    console.log(l1id + " - " + l2id);
    if (l1id == "")
        l1id = $('form#edit_feed #level1_details_edit').val();
    var url = "load_level2_detail/" + l1id + "/" + l2id;
    if (l1id != "") {
        $.ajax({
            type: 'post',
            url: url,
            dataType: 'json',
            success: function (data) {
                $('form#edit_feed #level2_details_edit').html(data.message);
                $('form#edit_feed #molecule_details_edit').html("");
            },
            error: function (data) {

            }
        });
    } else
    {
        $('form#edit_feed #select2-level2_details_edit-container').html("");
    }

}

function loadFeedMolecule(l1id='', l2id='', mid = '') {
    if(l1id == '')
        var l1id = $('form #level1_details').val();
    if(l2id == '')
        var l2id = $('form #level2_details').val();
    if(mid == '')
        var mid = null;
    var url = "load_molecule_detail/" + l1id + "/" + l2id + "/" + mid;
    $.ajax({
        type: 'post',
        url: url,
        dataType: 'json',
        success: function (data) {
            $('form #molecule_details').html(data.message);
        },
        error: function (data) {

        }
    });
}

function loadEditFeedMolecule(l1id, l2id, mid) {
    // var l1id = $('form#edit_feed #level1_details_edit').val();
    // var l2id = $('form#edit_feed #level2_details_edit').val();
    if (l1id == "")
        l1id = $('form#edit_feed #level1_details_edit').val();
    if (l2id == "")
        l2id = $('form#edit_feed #level2_details_edit').val();
    //if (mid == "") 
    //  mid = $('form#edit_feed #molecule_details_edit').val();
    if ((l1id != "") && (l2id != ""))
    {
        if (mid == "")
            mid = null;
        var url = "load_molecule_detail/" + l1id + "/" + l2id + "/" + mid;
        $.ajax({
            type: 'post',
            url: url,
            dataType: 'json',
            success: function (data) {
                $('form#edit_feed #molecule_details_edit').html(data.message);
            },
            error: function (data) {

            }
        });
    } else
    {
        $('form#edit_feed #select2-molecule_details_edit-container').html("");
    }
}

function loadBG(cid, bgid='') {
    console.log("cid : " + cid);
    if(bgid =='')
        bgid = null;
    var url = "load_bg/" + cid + "/" + bgid;
    $.ajax({
        type: 'post',
        url: url,
        dataType: 'json',
        success: function (data) {
            $("form #bg_details").html(data.message);
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
                $('form#edit_role #errorResponse').show().html(errorsHtml); //this is my div with messages
                $('form#edit_role #errorResponse').addClass("alert alert-danger");
            }
        }
    });
}

function loadEditBG(cid, bgid) {
    console.log("cid : " + cid);
    var url = "load_bg/" + cid + "/" + bgid;
    $.ajax({
        type: 'post',
        url: url,
        dataType: 'json',
        success: function (data) {
            $("form #bg_details_edit").html(data.message);
            if (($("form#edit_feed #bg_details_edit").val()) == "")
                $("form#edit_feed #select2-bg_details_edit-container").html("");
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
                $('form#edit_role #errorResponse').show().html(errorsHtml); //this is my div with messages
                $('form#edit_role #errorResponse').addClass("alert alert-danger");
            }
        }
    });
}

function load_edit_feed(id) {
//   alert(id);
    console.log("id : " + id);
    var url = "load_feed/" + id;
    $.ajax({
        type: 'post',
        url: url,
        dataType: 'json',
        success: function (data) {
            var details = (data);
            console.log(details);
            

            $('form#edit_feed #fid').val(id);
            $("form#edit_feed #client_details_edit option[value='" + details.clientID + "']").prop('selected', true);
            $("form#edit_feed #select2-client_details_edit-container").html(details.clientName);
            loadEditBG(details.clientID, details.groupID);
            //$("form#edit_feed #bg_details_edit option[value='"+details.groupID+"']").attr("selected","selected");
            // $("form#edit_feed #bg_details_edit ").val(details.groupID).attr("selected");
            // $("form#edit_feed #bg_details_edit option[value=" + details.groupID + "]").attr('selected', 'selected');
            $("form#edit_feed #select2-bg_details_edit-container").html(details.groupName);
            $("form#edit_feed #type_edit").attr('checked', details.type);
            if (details.type == "molecule") {
                displayEditFeedSection(details.type, details.groupID, 'pgm', details.level1ID, details.level2ID);
                // $("form#edit_feed #level1_details_edit option[value='" + details.level1ID + "']").prop('selected', true);
                $("form#edit_feed #select2-level1_details_edit-container").html(details.level1Name);
                loadEditFeedLevel2(details.level1ID, details.level2ID);
                // $("form#edit_feed #level2_details_edit option[value='" + details.level2ID + "']").prop('selected', true);
                $("form#edit_feed #select2-level2_details_edit-container").html(details.level2Name);
                loadEditFeedMolecule(details.level1ID, details.level2ID, details.moleculeID);
                $("form#edit_feed #select2-molecule_details_edit-container").html(details.moleculeName);
            }
            if (details.type == "indication") {
                displayEditFeedSection(details.type, details.groupID, 'pgm', details.therapeuticID, details.indicationID);
                $("form#edit_feed #select2-thera_details_edit-container").html(details.therapeuticName);
                loadEditIndications(details.therapeuticID, details.indicationID);
                $("form#edit_feed #select2-indication_details_edit-container").html(details.indicationName);
            }
            $("form#edit_feed #link_type").val(details.linkType);
            var dataTypes = details.data_types.split(",");
            console.log(dataTypes);

            for (var i = 0; i < dataTypes.length; i++) {
                console.log("hello : " + (dataTypes[i]));
                var dtypes = details[dataTypes[i]];
                var dtype = dtypes.split(",");
                for(var j=0;j<dtype.length;j++) {
                    load_add_more(dataTypes[i], dtype[j]);
                }
            }
            $("form#edit_feed #rss_feed_edit").val(details.feedLink);
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
                $('form#edit_role #errorResponse').show().html(errorsHtml); //this is my div with messages
                $('form#edit_role #errorResponse').addClass("alert alert-danger");
            }
        }
    });
}

function add_new_feed() {
    console.log("submit feed");
    var url = "add_feed";
    var data = $('#add_feed').serialize();
    $.ajax({
        type: 'post',
        url: url,
        data: data,
        dataType: 'json',
        beforeSend: function () {
            $('#add_feed_details').attr("disabled", true);
        },
        success: function (data) {
            // success logic
            $.modal.close();
//            $('#modal_form_add').hide();
            $(".navbar-top").load("roles.html");
            $('form#add_user #errorResponse').removeClass("alert alert-danger");
            $('form#add_user #errorResponse').show().html("RSS Feed Added successfully");
            $('form#add_user #errorResponse').addClass("alert alert-success");
            window.setTimeout(function () {
                location.reload()
            }, 1000)
        }, complete: function () {
            $('#add_feed_details').attr("disabled", false);
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
                $('form#add_feed #errorResponse').show().html(errorsHtml); //this is my div with messages
                $('form#add_feed #errorResponse').addClass("alert alert-danger");
            }
        }
    });
}

function update_feed() {
    console.log("submit feed");
    var url = "edit_feed";
    var data = $('#edit_feed').serialize();
    $.ajax({
        type: 'post',
        url: url,
        data: data,
        dataType: 'json',
        beforeSend: function () {
            // $('#add_feed_details').attr("disabled", true);
        },
        success: function (data) {
            // success logic
            $.modal.close();
//            $('#modal_form_add').hide();
            $(".navbar-top").load("roles.html");
            $('form#add_user #errorResponse').removeClass("alert alert-danger");
            $('form#add_user #errorResponse').show().html("RSS Feed Added successfully");
            $('form#add_user #errorResponse').addClass("alert alert-success");
            // window.setTimeout(function(){location.reload()},3000)
        }, complete: function () {
            $('#add_feed_details').attr("disabled", false);
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
                $('form#add_feed #errorResponse').show().html(errorsHtml); //this is my div with messages
                $('form#add_feed #errorResponse').addClass("alert alert-danger");
            }
        }
    });
}

function delete_feed_details(fid) {
    confirm('Do you want to Delete RSS feed details?');
//    alert(id);
    console.log("id : " + fid);
    var url = "delete_feed_details/" + fid;
    $.ajax({
        type: 'post',
        url: url,
        success: function (data) {
            // success logic

            $(".navbar-top").load("feeds.html");
            $('#message_section').show();
            $('html,body').animate({scrollTop: $('.content').offset().top}, "slow");
            $('#message_section').html('<div style="border: 1px solid rgba(0,166,90,0.7); padding: 15px;background: #f9f9f9"><i class="ifc-thumb_up"></i> RSS Feed deleted successfully</div>');
            $('#message_section').fadeOut(5000);

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
                $('#message_section').show();
                $('html,body').animate({scrollTop: $('.content').offset().top}, "slow");
                $('#message_section').html('<div style="border: 1px solid red; padding: 15px;background: #f9f9f9"><i class="ifc-thumb_up"></i>Opps!! Try after sometime</div>');
                $('#message_section').fadeOut(5000);

            }
        }
    });
}

function add_new_data_type_submit() {
    console.log("submit role");
    var url = "add_datatype";
    var data = $('#add_data_type').serialize();
    $.ajax({
        type: 'post',
        url: url,
        data: data,
        dataType: 'json',
        success: function (data) {
            // success logic
            $('form#add_data_type #errorResponse').removeClass("alert alert-danger");
            $('form#add_data_type #errorResponse').show().html("Data Type Added successfully");
            $('form#add_data_type #errorResponse').addClass("alert alert-success");
            window.location.reload();
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
                $('form#add_data_type #errorResponse').show().html(errorsHtml); //this is my div with messages
                $('form#add_data_type #errorResponse').addClass("alert alert-danger");
            }
        }
    });
}

function load_edit_datatype(id) {
//    alert(id);
    console.log("id : " + id);
    var url = "load_data_type/" + id;
    $.ajax({
        type: 'post',
        url: url,
        success: function (data) {
            var details = (data);
            $('form#edit_data_type #editDataTypeName').val(details);
            $('form#edit_data_type #dataTypeID').val(id);
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
                $('form#edit_data_type #errorResponse').show().html(errorsHtml); //this is my div with messages
                $('form#edit_data_type #errorResponse').addClass("alert alert-danger");
            }
        }
    });
}

function edit_data_type_submit() {
    console.log("submit edit_data_type");
    var url = "edit_datatype_submit";
    var data = $('#edit_data_type').serialize();
    $.ajax({
        type: 'post',
        url: url,
        data: data,
        dataType: 'json',
        success: function (data) {
            // success logic
            $('form#edit_data_type #errorResponse').removeClass("alert alert-danger");
            $('form#edit_data_type #errorResponse').show().html("Data Type Updated successfully");
            $('form#edit_data_type #errorResponse').addClass("alert alert-success");
            window.location.reload();
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
                $('form#edit_data_type #errorResponse').show().html(errorsHtml); //this is my div with messages
                $('form#edit_data_type #errorResponse').addClass("alert alert-danger");
            }
        }
    });
}

function delete_datatype(id) {
    var r = confirm("Are you sure to delete this record?")
    if (r == true) {
        console.log("you pressed ok");
        var url = "delete_datatype/" + id;
        $.ajax({
            type: 'post',
            url: url,
            //dataType: 'json',
            success: function (data) {
                var details = (data);
                console.log(details);
                window.location.reload();
            },
            error: function (data) {
            }
        });
    } else {
        console.log("you pressed cancel");
    }
}

function load_add_more(parent_div, value) {
    console.log("div : " + parent_div);
    var count = $('#counter').val();
    var id = parent_div + count
    var child_div = id;
    console.log("child div : " + child_div);
    $('#edit_' + parent_div).append("<span id='" + child_div + "'><br><input type='text' value="+value+" name='" + parent_div + "[]' id='" + id + "'>&nbsp;&nbsp;<a href='javascript:void(0);' onclick=remove_field('edit_" + parent_div + "','" + id + "');>Remove</a><br></span>");
    count++;
    $('#counter').val(count);
}

function add_more(parent_div, val='') {
    console.log("div : " + parent_div);
    var count = $('#counter').val();
    var id = parent_div + count
    var child_div = id;
    console.log("child div : " + child_div);
    $('#' + parent_div).append("<span id='" + child_div + "'><br><input type='text' value='"+val+"' name='" + parent_div + "[]' id='" + id + "'>&nbsp;&nbsp;<a href='javascript:void(0);' onclick=remove_field('" + parent_div + "','" + id + "');>Remove</a><br></span>");
    count++;
    $('#counter').val(count);
}

function edit_add_more(parent_div) {
    console.log("div : " + parent_div);
    var count = $('#counter').val();
    var id = parent_div + count
    var child_div = id;
    console.log("child div : " + child_div);
    $('#edit_' + parent_div).append("<span id='" + child_div + "'><br><input type='text' name='" + parent_div + "[]' id='" + id + "'>&nbsp;&nbsp;<a href='javascript:void(0);' onclick=remove_field('edit_" + parent_div + "','" + id + "');>Remove</a><br></span>");
    count++;
    $('#counter').val(count);
}

function remove_field(parent_div, child_div) {
    console.log("div : " + parent_div + " - " + child_div);
    $("#" + parent_div).find("#" + child_div).remove();
}

function load_previous_feed(fid) {
    console.log("fid : " + fid);    
    load_last_feed(fid);
}

function load_last_feed(id) {
//   alert(id);
    console.log("id : " + id);
    var url = "load_feed/" + id;
    $.ajax({
        type: 'post',
        url: url,
        dataType: 'json',
        success: function (data) {
            var details = (data);
            console.log(details);
                        
            $("form#add_feed #client_details option[value='" + details.clientID + "']").prop('selected', true);
            $("form#add_feed #select2-client_details-container").html(details.clientName);
            loadBG(details.clientID, details.groupID);
            //$("form#edit_feed #bg_details_edit option[value='"+details.groupID+"']").attr("selected","selected");
            // $("form#edit_feed #bg_details_edit ").val(details.groupID).attr("selected");
            // $("form#edit_feed #bg_details_edit option[value=" + details.groupID + "]").attr('selected', 'selected');
            $("form#add_feed #bg_details option[value='" + details.groupID + "']").prop('selected', true);
            $("form#add_feed #select2-bg_details-container").html(details.groupName);
            $("form#add_feed #type").attr('checked', details.type);
            if (details.type == "molecule") {
                displayFeedSection(details.type, details.groupID, 'pgm', details.level1ID, details.level2ID);
                // $("form#edit_feed #level1_details_edit option[value='" + details.level1ID + "']").prop('selected', true);
                $("form#add_feed #select2-level1_details-container").html(details.level1Name);
                loadFeedLevel2(details.level1ID, details.level2ID);
                // $("form#edit_feed #level2_details_edit option[value='" + details.level2ID + "']").prop('selected', true);
                $("form#add_feed #select2-level2_details-container").html(details.level2Name);
                loadFeedMolecule(details.level1ID, details.level2ID, details.moleculeID);
                $("form#add_feed #select2-molecule_details-container").html(details.moleculeName);
            }
            if (details.type == "indication") {
                displayFeedSection(details.type, details.groupID, 'pgm', details.therapeuticID, details.indicationID);
                $("form#add_feed #select2-thera_details-container").html(details.therapeuticName);
                loadIndications(details.therapeuticID, details.indicationID);
                $("form#add_feed #select2-indication_details-container").html(details.indicationName);
            }
            var dataTypes = details.data_types.split(",");
            console.log(dataTypes);

            for (var i = 0; i < dataTypes.length; i++) {
                console.log("hello : " + (dataTypes[i]));
                var dtypes = details[dataTypes[i]];
                var dtype = dtypes.split(",");
                for(var j=0;j<dtype.length;j++) {
                    add_more(dataTypes[i], dtype[j]);
                }
            }
            $("form#add_feed #rss_feed").val(details.feedLink);
        },
        error: function (data) {
            
        }
    });
}

function load_edit_sponsor(id) {
    var url = "load_sponsor/" + id;
    $.ajax({
        type: 'post',
        url: url,
        success: function (data) {
            var details = (data);
            $('form#edit_sponsor #editSponsorName').val(details);
            $('form#edit_sponsor #sponsorID').val(id);
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
                $('form#edit_sponsor #errorResponse').show().html(errorsHtml); //this is my div with messages
                $('form#edit_sponsor #errorResponse').addClass("alert alert-danger");
            }
        }
    });
}

function edit_sponsor_submit() {
    console.log("submit edit_data_type");
    var url = "edit_sponsor";
    var data = $('#edit_sponsor').serialize();
    $.ajax({
        type: 'post',
        url: url,
        data: data,
        dataType: 'json',
        success: function (data) {
            // success logic
            $('form#edit_sponsor #errorResponse').removeClass("alert alert-danger");
            $('form#edit_sponsor #errorResponse').show().html("Sponsor Updated successfully");
            $('form#edit_sponsor #errorResponse').addClass("alert alert-success");
            window.location.reload();
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
                $('form#edit_sponsor #errorResponse').show().html(errorsHtml); //this is my div with messages
                $('form#edit_sponsor #errorResponse').addClass("alert alert-danger");
            }
        }
    });
}

function delete_sponsor(id) {
    var r = confirm("Are you sure to delete this record?")
    if (r == true) {
        var url = "delete_sponsor/" + id;
        $.ajax({
            type: 'post',
            url: url,
            success: function (data) {
                window.location.reload();
            },
            error: function (data) {
            }
        });
    } else {
        console.log("you pressed cancel");
    }
}

function load_edit_drug(id) {
    var url = "load_drug/" + id;
    $.ajax({
        type: 'post',
        url: url,
        success: function (data) {
            var details = (data);
            $('form#edit_drug #editDrugName').val(details);
            $('form#edit_drug #drugID').val(id);
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
                $('form#edit_drug #errorResponse').show().html(errorsHtml); //this is my div with messages
                $('form#edit_drug #errorResponse').addClass("alert alert-danger");
            }
        }
    });
}

function edit_drug_submit() {
    console.log("submit edit_data_type");
    var url = "edit_drug";
    var data = $('#edit_drug').serialize();
    $.ajax({
        type: 'post',
        url: url,
        data: data,
        dataType: 'json',
        success: function (data) {
            // success logic
            $('form#edit_drug #errorResponse').removeClass("alert alert-danger");
            $('form#edit_drug #errorResponse').show().html("drug Updated successfully");
            $('form#edit_drug #errorResponse').addClass("alert alert-success");
            window.location.reload();
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
                $('form#edit_drug #errorResponse').show().html(errorsHtml); //this is my div with messages
                $('form#edit_drug #errorResponse').addClass("alert alert-danger");
            }
        }
    });
}

function delete_drug(id) {
    var r = confirm("Are you sure to delete this record?")
    if (r == true) {
        var url = "delete_drug/" + id;
        $.ajax({
            type: 'post',
            url: url,
            success: function (data) {
                window.location.reload();
            },
            error: function (data) {
            }
        });
    } else {
        console.log("you pressed cancel");
    }
}

function load_edit_condition(id) {
    var url = "load_condition/" + id;
    $.ajax({
        type: 'post',
        url: url,
        success: function (data) {
            var details = (data);
            $('form#edit_condition #editConditionName').val(details);
            $('form#edit_condition #conditionID').val(id);
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
                $('form#edit_condition #errorResponse').show().html(errorsHtml); //this is my div with messages
                $('form#edit_condition #errorResponse').addClass("alert alert-danger");
            }
        }
    });
}

function edit_condition_submit() {
    console.log("submit edit_data_type");
    var url = "edit_condition";
    var data = $('#edit_condition').serialize();
    $.ajax({
        type: 'post',
        url: url,
        data: data,
        dataType: 'json',
        success: function (data) {
            // success logic
            $('form#edit_condition #errorResponse').removeClass("alert alert-danger");
            $('form#edit_condition #errorResponse').show().html("condition Updated successfully");
            $('form#edit_condition #errorResponse').addClass("alert alert-success");
            window.location.reload();
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
                $('form#edit_condition #errorResponse').show().html(errorsHtml); //this is my div with messages
                $('form#edit_condition #errorResponse').addClass("alert alert-danger");
            }
        }
    });
}

function delete_condition(id) {
    var r = confirm("Are you sure to delete this record?")
    if (r == true) {
        var url = "delete_condition/" + id;
        $.ajax({
            type: 'post',
            url: url,
            success: function (data) {
                window.location.reload();
            },
            error: function (data) {
            }
        });
    } else {
        console.log("you pressed cancel");
    }
}

function add_client_setup() {
    console.log("setting up client");
    var url = "clinical_trial/"+"adalimumab";
    $.ajax({
            type: 'get',
            url: url,
            success: function (data) {
                window.location.reload();
            },
            error: function (data) {
            }
        });
}