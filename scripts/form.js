$(document).ready(function () {
    let checks = {"Name": true, "Surname": true, "Email": true, "Message": true};
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

    $("form").submit(function(event) {
        let ids = ["Name", "Surname", "Email", "Message"];
        ids.forEach((id) => validate(id));
        for (let k in checks){
            if(checks[k] === true) {
                event.preventDefault();
                return false;
            }
        }
        return true;

    });




});