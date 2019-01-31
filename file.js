jQuery(document).ready(function () {
  jQuery("#form").on("submit", function(e) {
    // e.preventDefault();
    var firstname = jQuery("#firstname").val();
    var lastname = jQuery("#lastname").val();
    var email = jQuery("#email").val();
    var message = jQuery("#message").val();
    var data = JSON.stringify({
        "firstname":firstname,
        "lastname":lastname,
        "email":email,
        "message":message
    });
    
    jQuery.ajax({
    method: 'POST',
    url: MyAjax.ajaxurl,
    contentType: "application/json; charset=utf-8",
    dataType: "json",
    data: data,
    success: function (res) {
        console.log("Correct", res);
    },
    error: function (err) {
        console.log(err)
    }
    })
    })

});
