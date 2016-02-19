function imageUpdatingProcess(id) {
    $(".imagepopupdiv").hide();
    $("#imageform_" + id).ajaxForm({
        target: '#preview',
        beforeSubmit: function() {
            $("#imageloadstatus_" + id).show();
            $("#imageloadbutton_" + id).hide();
        },
        success: function() {
            $("#imageloadstatus_" + id).hide();
            $("#imageloadbutton_" + id).hide();
            window.location = jssitebaseUrl + '/main.php';
        },
        error: function() {
            $("#imageloadstatus_" + id).hide();
            $("#imageloadbutton_" + id).show();
        }
    }).submit();
}
var onSampleResized = function(e) {
    var columns = $(e.currentTarget).find("td");
    var msg = '';
    columns.each(function() {
        msg += $(this).width() + "px; ";
    });
    var tdone = $(".sample2 tr td:first").width();
    var tdtwo = $(".sample2 tr td:nth-child(2)").width();
    var tdthree = $(".sample2 tr td:nth-child(3)").width();
    var tdfour = $(".sample2 tr td:nth-child(4)").width();
    var tdfive = $(".sample2 tr td:nth-child(5)").width();
    var colpagelist = $(e.currentTarget).find(".columnpagelistid").val();
    updatewidthvalue(tdone, tdtwo, tdthree, tdfour, tdfive, colpagelist);
};
var dropvalinput = $(".dropvalue").val("");

function colResize() {
        $(".sample2").colResizable({
            liveDrag: true,
            draggingClass: "dragging",
            onResize: onSampleResized
        });
    }
    //colResize();
var tdone = $(".sample2 tr td:first").width();
var tdtwo = $(".sample2 tr td:nth-child(2)").width();
var tdthree = $(".sample2 tr td:nth-child(3)").width();
var tdfour = $(".sample2 tr td:nth-child(4)").width();
var tdfive = $(".sample2 tr td:nth-child(5)").width();
var colpagelist = $(".sample2 tr td").find(".columnpagelistid").val();
//updatewidthvalue(tdone,tdtwo,tdthree,tdfour,tdfive,colpagelist);
$(document).ready(function() {
    //alert("vinoth");
    var uploadProgressbox = $('.uploadProgress');
    var progressbox = $('#progressbox');
    var progressbar = $('#progressbar');
    var statustxt = $('#statustxt');
    var submitbutton = $("#SubmitButton");
    var myform = $(".UploadForm");
    var output = $("#output");
    var completed = '0%';
    $(myform).ajaxForm({
        beforeSend: function() { //brfore sending form
            //alert("start");
            submitbutton.attr('disabled', ''); // disable upload button
            statustxt.empty();
            //progressbox.slideDown(); //show progressbar
            uploadProgressbox.slideDown(); // show uploadProgress background
            progressbar.width(completed); //initial value 0% of progressbar
            statustxt.html(completed); //set status text
            statustxt.css('color', '#000'); //initial color of status text
        },
        uploadProgress: function(event, position, total, percentComplete) { //on progress
            //alert("parcial");
            progressbar.width(percentComplete + '%') //update progressbar percent complete
            statustxt.html(percentComplete + '%'); //update status text
            if (percentComplete > 50) {
                statustxt.css('color', '#fff'); //change status text to white after 50%
            }
        },
        complete: function(response) { // on complete
            //alert("complete");
            output.html(response.responseText); //update element with received data
            myform.resetForm(); // reset form
            submitbutton.removeAttr('disabled'); //enable submit button
            //progressbox.slideUp(); // hide progressbar
            setTimeout(function() {
                uploadProgressbox.slideUp(); // hide uploadProgress background
            }, 3000);
            setTimeout(function() {
                location.reload();
            }, 3000);
            $(".uploadProgClose").click(function() {
                $(".uploadProgress").hide();
                $("#maska").hide();
            });
        }
    });
});

$(document).ready(function() {
    $('#popupbrowsebannerImg').on('change', function(evt) {
        var file = evt.target.files[0];
        if (file.type.match('image.*')) {
            var reader = new FileReader();
            reader.onload = (function(file) {
                return function(e) {
                    $('#changebannerimage').css({
                        'background-image': 'url(' + e.target.result + ')'
                    });
                }
            })(file);
        }
        reader.readAsDataURL(file);
        $("#editBannerImg").hide();
        $(".modal-backdrop").hide();
    })
    $('#backgroundimage').on('change', function(evt) {
        var file = evt.target.files[0];
        if (file.type.match('image.*')) {
            var reader = new FileReader();
            reader.onload = (function(file) {
                return function(e) {
                    $('body').css({
                        'background': 'url(' + e.target.result + ') repeat'
                    });
                }
            })(file);
        }
        reader.readAsDataURL(file);
    })
});