

$(document).ready(function() {
    
    $('button.editButton').click(function() {
      var taskID = $(this).val(); 
      console.log('edit task clicked', taskID)
      var selectedTaskInput = "#editForm"+taskID; 
      var name = "#taskName"+taskID;
      $(name).hide(); 
      $(selectedTaskInput).show(); 
      
      
      $('button.saveButton').click(function() {
        console.log('save clicked'); 
        $(name).show(); 
        $(selectedTaskInput).hide(); 
      }); 
      
      
    }); 


  $('button.editButton').click(function() {
    var taskID = $(this).val(); 
    var selectedTaskInput = "#editForm"+taskID; 
    $(selectedTaskInput).show(); 
  });


    
    
}); 


