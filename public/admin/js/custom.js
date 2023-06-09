$(document).ready(function(){
  // datables 
  $("#sections").DataTable();
  $(".nav-item").removeClass("active");
  $(".nav-link").removeClass("active");
// check admin current passowrd is correct or not
$("#current_password").keyup(function(){
    var current_password =$("#current_password").val();
    // alert(current_password);
    $.ajax({
        headers: {
            "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content')
        },
type: 'POST',
  url : '/admin/check-admin-password',
  data :{current_password:current_password},
  success:function(resp)
  {
    
    if(resp=="false")
    {
        $("#check_password").html("<font color='red'>Current password is incorrect! </font>");
    }
    else if(resp =="true")
    {
        $("#check_password").html("<font color='green'>Current password is correct! </font>");

    }
  },error:function(){
    alert('Error');
  }
    });
})
// update admin status  
$(document).on("click", ".updateAdminStatus", function(){
  var status =$(this).children("i").attr("status");
  var admin_id =$(this).attr("admin_id");

 $.ajax({
  headers: {
    "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content')
},
  type: 'POST',
  url: '/admin/apdate-admin-status',
  data: {status:status,admin_id:admin_id},
  success: function(response){
    if(response['status']==0){
      $("#admin-"+admin_id).html("<i style ='font-size:32px;' class='mdi mdi-bookmark-outline' status ='active'></i>");
    }
    else
    {
      $("#admin-"+admin_id).html("<i style ='font-size:32px;' class='mdi mdi-bookmark-check' status ='inactive'></i>");
    }
  },Error: function(){
    alert("eroro");
  }
 });

});



// // section start here
// // update Sections status 
$(document).on("click", ".updateSectionStatus", function(){
  var status =$(this).children("i").attr("status");
  var section_id =$(this).attr("section_id");

 
 $.ajax({
  headers: {
    "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content')
},
  type: 'POST',
  url: '/admin/update-section-status',
  data: {status:status,section_id:section_id},
  success: function(response){
    if(response['status']==0){
      $("#section-"+section_id).html("<i style ='font-size:32px;' class='mdi mdi-bookmark-outline' status ='active'></i>");
    }
    else
    {
      $("#section-"+section_id).html("<i style ='font-size:32px;' class='mdi mdi-bookmark-check' status ='inactive'></i>");
    }
  },Error: function(){
    alert("eroro");
  }
 })

});

// confirm delete-simple sections
$(".confirm-delete").click(function(){
var module = $(this).attr('module');
var moduleId = $(this).attr('moduleId');
Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
    window.location = "/admin/delete-"+module+"/"+moduleId;
  }
})
})

// // category start here
// // update Categories status 
$(document).on("click", ".updateCategoryStatus", function(){
  var status =$(this).children("i").attr("status");
  var category_id =$(this).attr("category_id");

 
 $.ajax({
  headers: {
    "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content')
},
  type: 'POST',
  url: '/admin/update-category-status',
  data: {status:status,category_id:category_id},
  success: function(response){
    if(response['status']==0){
      $("#category-"+category_id).html("<i style ='font-size:32px;' class='mdi mdi-bookmark-outline' status ='active'></i>");
    }
    else
    {
      $("#category-"+category_id).html("<i style ='font-size:32px;' class='mdi mdi-bookmark-check' status ='inactive'></i>");
    }
  },Error: function(){
    alert("eroro");
  }
 })

});
$("#section_id").change(function() {
  var section_id = $(this).val();
  $.ajax({
    headers: {
      "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content')
    },
    type: 'GET',
    url: '/admin/append-categories-level',
    data: { section_id: section_id },
    success: function(resp) {
    
      $("#appendCategoryLevel").html(resp);
     
    },
    error: function() {
      alert("An error occurred.");
    }
  })
})
 
});



