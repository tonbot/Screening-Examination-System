$(function(){
/*****************************************declaration block**************************** */
   let userId = validate($('#e').html());
   let table;
   let income_id;
   table = show_dataTable();
   $('#feedback').hide()
   $('.btnEdit').hide();
/*****************************************declaration block ends here**************************** */
   






/******************************************************Click Event Block*********************************************** */
/** this will open add income modal */
$(".addnew").click(function(){
  $('.modal-title').html("Add Income")
  $('.btnAdd').show();
  $('.btnEdit').hide();
  $('#category').empty();
  get_category()
  $('#description').val("");
  $('#amount').val(""); 
  $('#transaction_date').val("");
})

/**This this will open Edit modal for income details */
$('#table_id tbody').on( 'click', '.btn.btn-secondary.action', function () {
  var data = table.row( $(this).parents('tr') ).data();
  income_id = data["id"];
   $('#description').val(data["income_description"]);
   $('#amount').val(data["income_amount"]); 
   $('#transaction_date').val(data["income_date"]);
   $('.btnAdd').hide();
   $('.modal-title').html("Edit Income")
   $('.btnEdit').show();
   get_category()
   $("#newIcome").modal('show');

});

/** This will delete income from income details */
$('#table_id tbody').on( 'click', '.btn.btn-danger.action', function () {
  var data = table.row( $(this).parents('tr') ).data();
  var a = prompt("Do you really want to delete this income? Enter 'YES' to confirm");
  if (a !="" && a === "YES") {
    let userId = validate($('#e').html());
    formData = { "userId" : userId,  "e"  : "de", "income_id" : data["id"], }  
    delete_income(formData) 
    return
  }else{
    alert(" not deleted ")
    return
  }
});

/*add class to nav bar */
$('.link_addIncome').addClass("active");

/** this will save income details */
$('.btnAdd').click(function (){
  /*getting the form data*/
let userId = validate($('#e').html());
let category = validate($('#category').val());
let description = $('#description').val();
let amount = validate($('#amount').val()); 
let transaction_date = validate($('#transaction_date').val());
/**validatiog the form data */
if ( userId == "empty" || category == "empty" || amount == "empty" || transaction_date == "empty"){
      //send response 
      $('#feedback').html("Please fill the important field")
      $('#feedback').show()
    }
else{
      //validate amount

      if(isNaN(amount) && isNaN(userId) ){
        $('#feedback').html("Please enter a valid number")
        $('#feedback').show()
        return;
      }
      /**disable a add button */
      $('.btnAdd').prop("disabled", true)
       formData = {
                    "userId" : userId,
                    "category" : category,
                    "description" : description,
                    "amount" : amount,
                    "transaction_date" : transaction_date,
                    "e"  : "si"
                  }

      save_income(formData);
      
    }

})

/** this will edit income details */
$('.btnEdit').click(function (){
  /*getting the form data*/
let userId = validate($('#e').html());
let category = validate($('#category').val());
let description = $('#description').val();
let amount = validate($('#amount').val()); 
let transaction_date = validate($('#transaction_date').val());
/**validatiog the form data */
if ( userId == "empty" || category == "empty" || amount == "empty" || transaction_date == "empty"){
      //send response 
      $('#feedback').html("Please fill the important field")
      $('#feedback').show()
    }
else{
      //validate amount

      if(isNaN(amount) && isNaN(userId) ){
        $('#feedback').html("Please enter a valid number")
        $('#feedback').show()
        return;
      }
       formData = {
                    "userId" : userId,
                    "category" : category,
                    "description" : description,
                    "amount" : amount,
                    "transaction_date" : transaction_date,
                    "income_id" : income_id,
                    "e"  : "up"
                  }

      update_income(formData);
      
    }

})

/** This save new category for income */
$('.save').click(function (){
  /*getting the form data*/
let userId = validate($('#e').html());
let category = validate($('.newCategory').val());

/**validatiog the form data */
if ( userId == "empty" || category == "empty" ){
      //send response 
      swal({
        title: "Warning",
        text: "Filled Can not be empty",
        icon: "error",
      });
    }
else{
      //validate amount
      if(isNaN(category) == "false"){
        swal({
          title: "Error",
          text: "Please enter valid word",
          icon: "error",
        });
        return;
      }
      /**disable a add button */
      $('.save').prop("disabled", true)
       formData = {
                    "userId" : userId,
                    "category" : category,
                    "e"  : "sc"
                  }
      save_category(formData);
   
    }

})

/******************************************************Click Event Block ends here*************************************************************** */





/*****************************************************function block*******************************************/
/*  this is a date picker */
$(function(){
  $('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    todayHighlight: true,
    autoclose: true,
  });
});
/** show table function */
function show_dataTable(){
  return table = $('#table_id').DataTable({
    ajax : "post/income_post.php?userId="+userId, 
  //main data
    columns: [
      { "data": null },
      { "data": "income_type" },
      { "data": "income_amount" },
      { "data": "income_date" },
      {
        "render": function(data, type, full, meta) {
          return  (full["income_description"].substring(0, 30) ) 
        }
      },
      { "data":  null }
     ] , 
      //default button
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
/** add income function */
function save_income(formData){
  $.ajax({
    url: "post/income_post.php",
    type: "POST",
    data: formData,   //sending formdata to save income
    encode:true,
    success: function(data)
        {
          let data1 = JSON.parse(data);
          switch(data1){
             case "true": 
              swal({
                title: "Success",
                icon: "success",
              });
                  $('.btnAdd').prop("disabled", false)
                  table.destroy()
                  table = show_dataTable()
             break;
             case "false":
              swal({
                title: "Error",
                text: "Oops an Error Occured",
                icon: "error",
              });
                  $('.btnAdd').prop("disabled", false)
             break;
             case "exist": 
              swal({
                title: "Info",
                text: "Sorry! This income has been added already",
                icon: "info",
                });
                $('.btnAdd').prop("disabled", false)
             break
          }
          // console.log(data)
        },
    error: function(error)
        {
            console.log(error)  
        }   

  });
}
/** update income function */
function update_income(formData){
  $.ajax({
    url: "post/income_post.php",
    type: "POST",
    data: formData,   //sending formdata to save income
    encode:true,
    success: function(data)
        {
          let data1 = JSON.parse(data);
          switch(data1){
             case "true": 
              swal({
                title: "Success",
                icon: "success",
              });
                  table.destroy()
                  table = show_dataTable()
             break;
             case "false":
              swal({
                title: "Please make changes to before update can be done",
                icon: "error",
              });
             break;
          }
          // console.log(data)
        },
    error: function(error)
        {
            console.log(error)  
        }   

  });
}
/** save category function */
 function save_category(formData){
  $.ajax({
    url: "post/income_post.php",
    type: "POST",
    data: formData,   //sending formdata to save income
    encode:true,
    success: function(data)
        {
          console.log(data)
          let data1 = JSON.parse(data);
          switch(data1){
             case "true": 
              swal({
                title: "Success",
                text: "Income Added Successfully",
                icon: "success",
              });
              $('.save').prop("disabled", false)
             break;
             case "false":
              swal({
                title: "Error",
                text: "Oops an Error Occured",
                icon: "error",
              });
              $('.save').prop("disabled", false)
             break;
             case "exist": 
              swal({
                title: "Info",
                text: "Sorry! This income has been added already",
                icon: "info",
                });
                $('.save').prop("disabled", false)
             break
          }
        
        },
    error: function(error)
        {
            console.log(error)  
        }   

  });
}
/** this function will get income_category */
function get_category(){
 let userId = validate($('#e').html());
 formData = { "userId" : userId,  "e"  : "sec"  }                 
  $.ajax({
      url: "post/income_post.php",
      type: "POST",
      data: formData,   
      encode:true,

      success: function(data){
        const res = JSON.parse(data);
        console.log(res.data)
          if(res.data != 0){
             const dataArray = res.data
             $('#category').append('<option> </option>');
             $.each(dataArray, function(key, value) {
              $('#category').append('<option>' + value["category"] + '</option>');
          });
            
          }
      },

      error: function(error){
        console.log(error)
      },

  });

}
function delete_income(formData){
                
   $.ajax({
       url: "post/income_post.php",
       type: "POST",
       data: formData,   
       encode:true,
 
       success: function(data){
        table.destroy();
         const res = JSON.parse(data);
         if(res.data !='false'){
           table = show_dataTable()
            // location.reload
            return
         }
         
       },
       error: function(error){
         console.log(error)
       },
 
   });

}
/**validate user input function */
function validate(data){
  if (data==null || data==""){
      return "empty"; 
  }
  else {
      let data1 = data;
          data1 = data1.trim();
          return data1;
  }
}
/****************************************************function block ends here******************************************/







})//end of main document
