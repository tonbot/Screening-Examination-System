
$(document).ready(function() { 
    $("#row").hide(); 
    var table;
    var table2;

    $("#logout").click(function(){
        location.href = "logout.php";
    });
   
    
    //hide row 
  
    //datable
    table2 = $('#question_table').DataTable();
    table = $("#dataresult").DataTable();
    get_all_question();

    //on change my-select
    $("#my-select").change(function(){
        //get value of the select box
        let value = $("#my-select").val();
        switch (value) {
            case "--SELECT OPTION--":
                 $("#row").hide();
                break;
            case "Percentage" : 
              
                 $("#row").show();
                 $(".sex").hide()
                 $(".to").show()
                 $(".from").show()
                 $(".remark").hide()
                 break;
            case "Sex" :
                 $("#row").show();
                 $(".sex").show()
                 $(".to").hide()
                 $(".from").hide()
                 $(".remark").hide()
                 break;
            case "Phone-Number" :
                 $("#row").show();
                 $(".from").show()
                 $(".sex").hide()
                 $(".to").hide()
                 $(".remark").hide()
                 break;
            case "Remark": 
                 $("#row").show();
                 $(".remark").show()
                 $(".sex").hide()
                 $(".to").hide()
                 $(".from").hide()
                 break;
            default:
                // $("#row").hide();
                break;
               
        }
    });


    $(".get").click(function(){
        let value = $("#my-select").val();
        switch (value) {
            case "Percentage" : 
            console.log($("#from").val() )
            console.log($("#to").val())
                if(parseInt($("#from").val())  <= parseInt($("#to").val())){

                    formData ={
                        e :  value,
                        f :  parseInt($("#from").val()), 
                        g :  parseInt($("#to").val()),
                    } 
                    table.destroy();
                    show_dataTable(formData);
                    return;
                }
                alert ("Incorrect Entries"); 
              
            break;
            case "Sex" :
                formData ={
                    e :  value,
                    f :  $("#gender_value").val(),
                }  
                    table.destroy();
                    show_dataTable(formData);
                 break;
            case "Phone-Number" :
                formData ={
                    e :  value,
                    f :  $("#from").val(),
                }  
                table.destroy();
                show_dataTable(formData);
                 break;
            case "Remark": 
                formData ={
                    e :  value,
                    f :  $("#remark_value").val(),
                }  
                    table.destroy();
                    show_dataTable(formData);
                //  getScore(formData);
                 break;
            default:
                 $("#row").hide();
                break;
               
        }
    });
    function show_dataTable(formData){
     
        return table = $('#dataresult').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "ajax": {
                url: "post/report_post.php",
                type: "POST",
                dataSrc: "",
                data: formData
            },
          columns: [
            { "data":  null },
            { "data": "lastName" },
            { "data": "phone" },
            { "data": "gender" },
            { "data": "sectionA_score" },
            { "data": "sectionB_score" },
            { "data": "sectionC_score" },
            { "data": "sectionD_score" },
            { "data": "total_score" },
            { "data": "totalScore_pcent" },
            { "data": "remark" },
           ] , 
            //serial number
            "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                
              $("td:first", nRow).html("<b>" + (iDisplayIndex + 1) + "</b>");
             
             return nRow;
          },
        
         
        });

  
      }


      function get_all_question(){
        table2.destroy();
        formData ={
            e :  "get_all",
        }
        return table2 = $('#question_table').DataTable({
            "ajax": {
                url: "post/report_post.php",
                type: "POST",
                dataSrc: "",
                data: formData
            },
          columns: [
            { "data":  null },
            { "data": "question_id" },
            { "data": "question" },
            { "data" : null},
           ] , 

           columnDefs: [ {
            "targets": -1,
            "defaultContent": "<button class='btn btn-secondary action mr-2' type='button'>Edit</button><button class='btn btn-danger action' type='button'>Delete</button>"
          }],

            //serial number
            "fnRowCallback" : function(nRow, aData, iDisplayIndex){
              $("td:first", nRow).html("<b>" + (iDisplayIndex + 1) + "</b>");
             return nRow;
          },
        });
      }



/** This will delete question from  */
$('#question_table tbody').on( 'click', '.btn.btn-danger.action', function () {
    var data = table2.row( $(this).parents('tr') ).data();
    var a = prompt("Do you really want to delete this question? Enter 'YES' to confirm");
    if (a !="" && a === "YES") {
      formData = { e : "de" , question_id : data["question_id"] }  
      delete_question(formData) 
      return
    }else{
      alert(" not deleted ")
      return
    }
  });
  
 /**This will open Edit modal for question details */
$('#question_table tbody').on( 'click', '.btn.btn-secondary.action', function () {
    var data = table2.row( $(this).parents('tr') ).data();
       let question_id = data['question_id'];
       $("#section").val(data['section'])
       $("#question").val(data['question'])
       $("#option1").val(data['opt1'])
       $("#option2").val(data['opt2'])
       $("#option3").val(data['opt3'])
       $("#option4").val(data['opt4'])
       $("#correct_opt").val(data['correct_opt'])
     
       $("#editQuestion").modal('show');
  });
   







  function delete_question(formData){
                
    $.ajax({
        url: "post/report_post.php",
        type: "POST",
        data: formData,   
        encode:true,
        success: function(data){
         table.destroy();
         console.log(data)
          const res = JSON.parse(data);
          if(res.data !='false'){
            table2 = get_all_question()
             return
          }
          
        },
        error: function(error){
          console.log(error)
        },
  
    });
 
 }












    function getScore(formData){
        $.ajax({
            url: "post/report_post.php",
            data: formData,
            encode: true,
            success: function (data) { /** on sucess function */
                // var res = JSON.parse(data)
                console.log(data)
            },
            error: function (error) { /**on error function */
                console.log(error)
            }

        });
    }

});