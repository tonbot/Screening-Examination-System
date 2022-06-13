$(document).ready(function(){
    /** validate user data */
    $("#message").hide();
    //collect all the data
   $("#saves").click(function(){
   
      var  a = validate($("#question").val())
       var b = validate($("#option1").val())
      var  c = validate($("#option2").val())
       var d = validate($("#option3").val())
       var e = validate($("#option4").val())
       var f = validate($("#correct_opt").val())
       var g = validate($("#question_id").val())
       
    if(a != "empty" && b != "empty" && c != "empty" && d != "empty" && e != "empty" && f != "empty" && g != "empty"){
         if (f.length > 1 || f > 4){
            $("#message").show();
            $("#message").css("background-color","red");
            $("#message").text("Correct option shoud not be more than one charater and not greater than 4");
            return
         }
             var  FormD= {
                    "a" : a,
                    "b" : b,
                    "c" : c,
                    "d" : d,
                    "e" : "ad",
                    "f" : e,
                    "g" : f,
                    "h" : g,
                }
         
                add(FormD)
                
            }
        else{
                $("#message").show();
                $("#message").css("background-color","red");
                $("#message").text("Please fill all the fields")
                // console.log(FormD)
            }
            // console.log(FormD)
   }) ;
    
    function add(FormD)
        {
            $.ajax({
                url: "post/report_post.php",
                type : 'POST',
                data: FormD,
                encode: true,
                success: function (data) 
                    { 
                        res = JSON.parse(data)
                        if(res === "true"){
                            $("#message").show();
                            $("#message").css("background-color", "green");
                            $("#message").text("Question added successfully")
                            $("input[type = text]").val("");
                            $("input[type = number]").val("");
                        }else{
                            $("#message").show();
                            $("#message").css("background-color","red");
                            $("#message").text("Question already added");
                        }
                    },
                error: function (error) 
                    { /**on error function */
                        console.log(error)
                    }

            });
        }
      
    $("#saves").focusout(function(){
        $("#message").hide();
    })
    function validate(data) 
        {
            if (data == null || data == "") 
                {
                    return "empty";
                } 
            else 
                {
                    let data1 = data;
                    data1 = data1.trim();
                    return data1;
                }
        }

});