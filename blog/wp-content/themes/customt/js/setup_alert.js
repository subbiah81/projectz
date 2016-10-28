$(document).ready(function() {

    $("form[name='myform']").find("input,select").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            event.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var currencyFrom = $("#myform select[name=from]").val();
			var currencyTo = $("#myform select[name=to]").val();
			var currentValue = $("#myform input[name=rate]").val();
			var targetValue = $("#myform input[name=target]").val();
			var alertEmail = $("#myform input[name=email]").val();
			
            $.ajax({
                url: "././mail/setup_alert.php",
                type: "POST",
                data: {
                    currencyFrom: currencyFrom,
                    currencyTo: currencyTo,
					currentValue: currentValue,
                    targetValue: targetValue,
                    alertEmail: alertEmail
                },
                cache: false,
                success: function() {
                    // Success message
                    $('#alertsuccess').html("<div class='alert alert-success'>");
                    $('#alertsuccess > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#alertsuccess > .alert-success')
                        .append("<strong>It's been setup.</strong>");
                    $('#alertsuccess > .alert-success')
                        .append('</div>');

                    //clear all fields
                    $('#contactForm').trigger("reset");
                },
                error: function() {
                    // Fail message
                    $('#alertsuccess').html("<div class='alert alert-danger'>");
                    $('#alertsuccess > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#alertsuccess > .alert-danger').append("<strong>Ooooops !!!");
                    $('#alertsuccess > .alert-danger').append('</div>');
                    //clear all fields
                    $('#contactForm').trigger("reset");
                },
            })
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
});


/*When clicking on Full hide fail/success boxes */
$('#firstname').focus(function() {
    $('#alertsuccess').html('');
});
