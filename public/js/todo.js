

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

  //view the edit task name form

  $('button.editButton').click(function() {
    var taskID = $(this).val();
    var selectedTaskInput = "#editForm"+taskID;
    $(selectedTaskInput).show();
  });

  //submit forms automatically with each check of the checkbox for a task

  $('span.checkbox').click(function() {
    var taskID = $(this).val();
    console.log(taskID);
    document.getElementById('completeForm'+taskID).submit();
  });


});
