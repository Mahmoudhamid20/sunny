$(document).ready(function () {
    let checks = {"Name": false, "Surname": false, "Email": false, "Message": false,};
     $("#Name").change(function () {
        validate("Name");
     });
    $("#Surname").change(function () {
        validate("Surname");
    });
    $("#Email").change(function () {
        validate("Email");
    });
    $("#Message").change(function () {
        validate("Message");
    });
    function validate(id) {
        let input = $("#"+id);
        if ((input.val().replace(/\s/g, '').length === 0) || (id === "Email" && !input.val().includes("@"))) {
            input.removeClass("field");
            input.addClass("warning-field");
            $("#warning-"+id).show(200);
            checks[id] = true;
        } else if(checks[id] === true){
            checks[id] = false;
            input.removeClass("warning-field");
            input.addClass("field");
            $("#warning-"+id).hide(200);
        }
    }
})