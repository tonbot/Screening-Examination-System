// initialising jquery
$(function () { 
    // variabale declaration
    var option;
    var question_list;
    var current_question = 0;
    var user_picked_opt = [ "0", "0","0","0", "0", "0", "0", "0", "0", "0" ]
    
    
   
    $("#previous").hide()
    $("#current_question").text(current_question + 1)
    $(".card").hide();
    $(".card-header").hide();


    // next button
    $("#next").click(function () { // store user picked answer

        current_question = current_question + 1;
         
        // hide next button if current question number is greater than the total question
        if (current_question == question_list.length) {
            $("#next").hide()
            $(".card").show();
            current_question = current_question - 1;
        } else { /**
                  * display question and option
                  */   
            $("#question").text(question_list[current_question].question)
            $("#optionA").text(question_list[current_question].opt1)
            $("#optionB").text(question_list[current_question].opt2)
            $("#optionC").text(question_list[current_question].opt3)
            $("#optionD").text(question_list[current_question].opt4)
            // /show previous button
            $("#previous").show()
            // /display current question number
            $("#current_question").text(current_question + 1)
        } 
        option = user_picked_opt[current_question]
        setoption(option)

    });
//function hide


    // previous button
    $("#previous").click(function () {
        $(".card").hide();
        current_question = current_question - 1;
        if (current_question < 0) {
            $("#previous").hide()
            $("#current_question").text(current_question + 2)
            current_question = current_question + 1
        } else {
            $("#current_question").text(current_question + 1)
            $("#previous").show()
            $("#question").text(question_list[current_question].question)
            $("#optionA").text(question_list[current_question].opt1)
            $("#optionB").text(question_list[current_question].opt2)
            $("#optionC").text(question_list[current_question].opt3)
            $("#optionD").text(question_list[current_question].opt4)
            option = user_picked_opt[current_question]
            setoption(option)

        }
        $("#next").show()


    });

    get_question();

    function get_question() {
        formData = {
            "e": "gq"
        }
        $.ajax({
            url: "post/exam_post.php",
            type: "POST",
            data: formData,
            encode: true,
            success: function (data) {
                question_list = JSON.parse(data);
                $("#total_question").text(question_list.length)
                $("#question").text(question_list[current_question].question)
                $("#optionA").text(question_list[current_question].opt1)
                $("#optionB").text(question_list[current_question].opt2)
                $("#optionC").text(question_list[current_question].opt3)
                $("#optionD").text(question_list[current_question].opt4)
            },
            error: function (error) { /**on error function */
                console.log(error)
            }
        })
    }


    function setoption(option) {
        switch (option) {
            case "1":
                $('input[id=radA]').prop('checked', true);

                break;
            case "2":
                $('input[id=radB]').prop('checked', true);

                break;
            case "3":
                $('input[id=radC]').prop('checked', true);
                break;
            case "4":
                $('input[id=radD]').prop('checked', true);
                break;
            default:
                $('input[id=radA]').prop('checked', false);
                $('input[id=radB]').prop('checked', false);
                $('input[id=radC]').prop('checked', false);
                $('input[id=radD]').prop('checked', false);
        }
    }

    /**  */
    $("#optionA").click(function () {
        $("input[id=radA]").prop("checked", true);
        user_picked_opt[current_question] = $("input[name='option']:checked").val()
    });
    $("#optionB").click(function () {
        $('input[id=radB]').prop('checked', true);
        user_picked_opt[current_question] = $("input[name='option']:checked").val()
    })
    $("#optionC").click(function () {
        $('input[id=radC]').prop('checked', true);
        user_picked_opt[current_question] = $("input[name='option']:checked").val()
    });
    $("#optionD").click(function () {
        $('input[id=radD]').prop('checked', true);
        user_picked_opt[current_question] = $("input[name='option']:checked").val()
    });

    $("#radA").click(function () {
        $('input[id=radA]').prop('checked', true);
        user_picked_opt[current_question] = $("input[name='option']:checked").val()
    });
    $("#radB").click(function () {
        $('input[id=radB]').prop('checked', true);
        user_picked_opt[current_question] = $("input[name='option']:checked").val()
    });
    $("#radC").click(function () {
        $('input[id=radC]').prop('checked', true);
        user_picked_opt[current_question] = $("input[name='option']:checked").val()
    });
    $("#radD").click(function () {
        $('input[id=radD]').prop('checked', true);
        user_picked_opt[current_question] = $("input[name='option']:checked").val()
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
    
    let stop1 = setInterval(minutes, 60000);
    var stop2 = setInterval(seconds, 1000)
    function minutes() {
        let m = $("#minute").text();
        m = m - 1;
        $("#minute").text(m);
        if (m == 0) {
            compute();
            clearInterval(stop1);
            clearInterval(stop2);
            return;
        }
    }
    
    function seconds() {
        let s = $("#second").text();
        s = s - 1;
        $("#second").text(s);
        if (s == 0) {
            $("#second").text(60);
        }
    }
    

    //submit button clicked
    $("#submit").click(function () {
        if($("#submit").text() == "OK"){
            location.href= "logout.php";
        };
        
        compute()
        return;
    });


    function compute() {
        //hide all
        // console.log(JSON.stringify(user_picked_opt))
         hide();
        formData = {
            e: "cp",
            f1: JSON.stringify(user_picked_opt),
            f2: question_list,
        };
            //  console.log(question_list)
        $.ajax({
            url: 'post/exam_post.php',
            type: "POST",
            data: formData,
            encode: true,
            success: function (data) {
                console.log(data);
                    $(".card").show();
                    $(".card-header").show();
                    $("#score").text(data);
                    $("#submit").text("OK");
                  
            },
            error: function (error) { /**on error function */
                console.log(error)
            }
        })
    }

    function hide(){
        clearInterval(stop1);
        clearInterval(stop2);
        $("#current_question").text("")
        $("#question").text("")
        $("#optionA").text("")
        $("#optionB").text("")
        $("#optionC").text("")
        $("#optionD").text("")
        $('input[id=radA]').hide();
        $('input[id=radB]').hide();
        $('input[id=radC]').hide();
        $('input[id=radD]').hide();   
        $("#next").hide()
        $("#previous").hide()
        $("#second").text("00")
        $("#minute").text("00")
        $("#track").hide()
}

}) // end of mother function
