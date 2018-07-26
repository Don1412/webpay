$(document).ready(function () {
   $('[name="task_1"]').on('click', function (event) {
       event.preventDefault();
       var subTask = $(this).data('task');
       $.ajax({
           type: "POST",
           url: "core.php",
           data: {
               task: subTask
           },
           success: function(result) {
               var elem = $('[data-subtask="'+subTask+'"]');
               elem.show();
               $("<pre>"+result+"</pre>").insertAfter(elem);
           }
       });
   });
});