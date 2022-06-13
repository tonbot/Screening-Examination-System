// initialising jquery
$(function () { // / onclick of the button signup
    $("#login").click(function () {
        login_ajax();
    });
    
    /** login function */
    function login_ajax() { /** get user submit data */
        let s = validate($('#surname').val());
        let p = validate($('#phone').val());
        if (s === "empty" || p === "empty") {
            $('#message').show();
            $('#message').text("Please fill out all the fields.");
        } else {

            var formData = {
                "s": s,
                "p": p,
                "e": "lo"
            };

            $.ajax({
                url: "post/report_post.php",
                type: "POST",
                data: formData,
                encode: true,
                success: function (data) { /** on sucess function */
                    var res = JSON.parse(data)
                      console.log(data)
                    if ((res != 0) && (res == 1)) {
                        window.location.href = "report.php"
                    } else {
                        $('#message').show();
                        $('#message').text("Invalid Credentials");
                    }

                },
                error: function (error) { /**on error function */
                    console.log(error)
                }

            });

        }
    }
    /** hide error message */
    $("input").click(function (e) {
        $('#message').hide();
    });

    /** validate user data */
    function validate(data) {
        if (data == null || data == "") {
            return "empty";
        } else {
            let data1 = data;
            data1 = data1.trim();
            return data1;
        }
    }

}) // end of mother function
