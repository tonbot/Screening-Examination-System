// initialising jquery
$(function () { 
    // variabale declaration
    var option;
    var question_list;
    var current_question = 0;
    var sectionA_Question;
    var current_section;
    var sectionB_Question;
    var sectionC_Question;
    var sectionD_Question;
    var user_picked_optA = [ "0", "0", "0", "0", "0", "0", "0", "0", "0", "0" ]
    var user_picked_optB = [ "0", "0", "0", "0", "0", "0", "0", "0", "0", "0" ]
    var user_picked_optC = [ "0", "0", "0", "0", "0", "0", "0", "0", "0", "0" ]
    var user_picked_optD = [ "0", "0", "0", "0", "0", "0", "0", "0", "0", "0" ]
     
    //get exam questions
    get_question();


    $("#previous").hide()
    $("#current_question").text(current_question + 1)

    // section button clicked
    $("#section1").click(function () { // set current section
        //hide previous button
        $("#previous").hide()
        //show next button
        $("#next").show()
        //set current question to zero
        current_question = 0;
        // display current question
        $("#current_question").text(current_question + 1)
        // set section
        current_section = 'A'
        // set question to display
        question_list = sectionA_Question;
        // set total question
        $("#total_question").text(question_list.length)
        // display question and option
        display_question()
        // display option picked before
        option = user_picked_optA[current_question]
        setoption(option)
        // set active state of the section button
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
        } else {
            $(this).addClass('active');
            $("#section2").removeClass('active');
            $("#section3").removeClass('active');
            $("#section4").removeClass('active');
        }
    });

    $("#section2").click(function () { // set current section
         //hide previous button
         $("#previous").hide()
         //show next button
         $("#next").show()
         //set current question to zero
        current_question = 0;
        // display current question
        $("#current_question").text(current_question + 1)
        // set section
        current_section = 'B'
        // set question to display
        question_list = sectionB_Question;
        // display total question
        $("#total_question").text(question_list.length)
        // display option picked before
        display_question()
        // display option picked before
        option = user_picked_optB[current_question]
        setoption(option)
        // set active state of the section button
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
        } else {
            $(this).addClass('active');
            $("#section1").removeClass('active');
            $("#section3").removeClass('active');
            $("#section4").removeClass('active');

        }
    });

    $("#section3").click(function () {
         //hide previous button
         $("#previous").hide()
         //show next button
         $("#next").show()
         //set current question to zero
        current_question = 0;
        // display current question
        $("#current_question").text(current_question + 1)
          // set section
        current_section = 'C'
        // set question to display
        question_list = sectionC_Question;
        // display total question
        $("#total_question").text(question_list.length)
        // display total question
        display_question()
        // display option picked before
        option = user_picked_optC[current_question]
        setoption(option)
        // set active state of the section button
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
        } else {
            $(this).addClass('active');
            $("#section1").removeClass('active');
            $("#section2").removeClass('active');
            $("#section4").removeClass('active');
        }
    });

    $("#section4").click(function () {
         //hide previous button
         $("#previous").hide()
         //show next button
         $("#next").show()
         //set current question to zero
        current_question = 0;
        // display current question
        $("#current_question").text(current_question + 1)
         // set section
        current_section = 'D'
        // set question to display
        question_list = sectionD_Question;
        // display total question
        $("#total_question").text(question_list.length)
        // display total question
        display_question()
        // display option picked before
        option = user_picked_optD[current_question]
        setoption(option)
        // set active state of the section button
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
        } else {
            $(this).addClass('active');
            $("#section1").removeClass('active');
            $("#section3").removeClass('active');
            $("#section2").removeClass('active');
        }
    });


    // next button
    $("#next").click(function () { // store user picked answer

        current_question = current_question + 1;
        // hide next button if current question number is greater than the total question
        if (current_question == question_list.length) {
            $("#next").hide()
            current_question = current_question - 1;
        } else { /**
                  * display question and option
                  */
            display_question()
            // /show previous button
            $("#previous").show()
            // /display current question number
            $("#current_question").text(current_question + 1)
        }
        switch (current_section) {
            case "A": option = user_picked_optA[current_question]
                break;
            case "B": option = user_picked_optB[current_question]
                break;
            case "C": option = user_picked_optC[current_question]
                break;
            case "D": option = user_picked_optD[current_question]
                break;

            default:
                break;
        }
        setoption(option)

    });
    // function hide


    // previous button
    $("#previous").click(function () { 
        current_question = current_question - 1;
        if (current_question < 0) {
            //hide previous button
            $("#previous").hide()
            $("#current_question").text(current_question + 2)
            //set current question
            current_question = current_question + 1

        } else {
            $("#current_question").text(current_question + 1)
            $("#previous").show()
            display_question()
            switch (current_section) {
                case "A": option = user_picked_optA[current_question]
                    break;
                case "B": option = user_picked_optB[current_question]
                    break;
                case "C": option = user_picked_optC[current_question]
                    break;
                case "D": option = user_picked_optD[current_question]
                    break;

                default:
                    break;
            }
            setoption(option)

        }
        $("#next").show()


    });

     //function display question
    function display_question() {
        $("#question").text(question_list[current_question].question)
        $("#optionA").text(question_list[current_question].opt1)
        $("#optionB").text(question_list[current_question].opt2)
        $("#optionC").text(question_list[current_question].opt3)
        $("#optionD").text(question_list[current_question].opt4)
    }
    //get exam question
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
                //set current section
                current_section = "A";
                //parsing response text
                res = JSON.parse(data)
                //set question for each section list
                sectionA_Question = res.a;
                sectionB_Question = res.b;
                sectionC_Question = res.c;
                sectionD_Question = res.d;
                // set question_list
                question_list = sectionA_Question;
                //display total question number
                $("#total_question").text(question_list.length)
                //display quetion and option
                display_question()
            },
            error: function (error) { /**on error function */
                console.log(error)
            }
        })
    }

    // // Funcion switch section
    // function switch_section() {
    //     console.log(current_section)
    //     current_question = 0;
    //     switch (current_section) {
    //         case "A": current_section = 'B'
    //             question_list = sectionB_Question;
    //             break;
    //         case "B": current_section = 'C'
    //             question_list = sectionC_Question;
    //             break;
    //         case "C": current_section = 'D'
    //             question_list = sectionD_Question;
    //             break;
    //         case "D": current_section = 'A'
    //             question_list = sectionA_Question;
    //             break;

    //         default:
    //             break;
    //     }
    // }

    // Funcion save option selected into an array
    function save_option_selected() {
        switch (current_section) {
            case "A":
                user_picked_optA[current_question] = $("input[name='option']:checked").val()
                console.log(user_picked_optA)
                break;
            case "B":
                user_picked_optB[current_question] = $("input[name='option']:checked").val()
                console.log(user_picked_optB)
                break;
            case "C":
                user_picked_optC[current_question] = $("input[name='option']:checked").val()
                console.log(user_picked_optC)
                break;
            case "D":
                user_picked_optD[current_question] = $("input[name='option']:checked").val()
                console.log(user_picked_optC)
                break;

            default:
                break;
        }
    }

    //function set option selected
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

    /** option button clicked */
    $("#optionA").click(function () {
        $("input[id=radA]").prop("checked", true);
        save_option_selected()
    });
    $("#optionB").click(function () {
        $('input[id=radB]').prop('checked', true);
        save_option_selected()
    })
    $("#optionC").click(function () {
        $('input[id=radC]').prop('checked', true);
        save_option_selected()
    });
    $("#optionD").click(function () {
        $('input[id=radD]').prop('checked', true);
        save_option_selected()
    });

    $("#radA").click(function () {
        $('input[id=radA]').prop('checked', true);
        save_option_selected()
    });
    $("#radB").click(function () {
        $('input[id=radB]').prop('checked', true);
        save_option_selected()
    });
    $("#radC").click(function () {
        $('input[id=radC]').prop('checked', true);
        save_option_selected()
    });
    $("#radD").click(function () {
        $('input[id=radD]').prop('checked', true);
        save_option_selected()
    });

    //start timer
    let stop1 = setInterval(minutes, 60000);
    var stop2 = setInterval(seconds, 1000)
    //display minutes timer
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
    //display seconds  timer
    function seconds() {
        let s = $("#second").text();
        s = s - 1;
        $("#second").text(s);
        if (s == 0) {
            $("#second").text(60);
        }
    }


    // submit button clicked
    $("#submit").click(function () {
        if ($("#submit").text() == "OK") {
            location.href = "logout.php";
        };

        compute()
        return;
    });

    //calculate score and display score
    function compute() { // hide all
        hide();
        formData = {
            e: "cp",
            ansA: JSON.stringify(user_picked_optA),
            ansB: JSON.stringify(user_picked_optB),
            ansC: JSON.stringify(user_picked_optC),
            ansD: JSON.stringify(user_picked_optD),
            qA: sectionA_Question,
            qB: sectionB_Question,
            qC: sectionC_Question,
            qD: sectionD_Question
        };
        // console.log(question_list)
        $.ajax({
            url: 'post/exam_post.php',
            type: "POST",
            data: formData,
            encode: true,
            success: function (data) {

                $("#score").text(data);
                $("#submit").text("OK");

            },
            error: function (error) { /**on error function */
                console.log(error)
            }
        })
    }
    //function hide elements
    function hide() {
        clearInterval(stop1);
        clearInterval(stop2);
        $("#second").text("00")
        $("#minute").text("00")
        $("#current_question").text("")
        $(".container1").hide()
        $(".card_section").hide()
    }
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
});// end of mother function
