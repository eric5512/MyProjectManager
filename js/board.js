$(function() { // TODO: dynamic loading from ajax response kills the listeners
    $( ".column" ).sortable({
      connectWith: ".column",
      handle: ".portlet-header",
      cancel: ".portlet-toggle",
      placeholder: "portlet-placeholder ui-corner-all",
      stop: function(event, ui) {
        var task = ui.item.find("button").val();
        var to = ui.item.closest('.column').attr("value");
        $.ajax({
          url: "controller/move_task.php",
          method: "POST",
          data: { 
            to:to, 
            board:$("#title").html(), 
            name:task
          },
          dataType: "html"
        }).fail(function( jqXHR, textStatus ) {
          alert( "Request failed: " + textStatus );
        });
      }
    });
 
    $( ".portlet" )
      .addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
      .find( ".portlet-header" )
      .addClass( "ui-widget-header ui-corner-all" )
       
 
    $( ".portlet-toggle" ).click(function() {
      var icon = $( this );
      icon.toggleClass( "ui-icon-minusthick ui-icon-plusthick" );
      icon.closest( ".portlet" ).find( ".portlet-content" ).toggle();
    });

    $("#create-new-task").click(function() {
      if ($("#has-date").prop("checked")) {
        var request = $.ajax({
          url: "controller/new_task.php",
          method: "POST",
          data: { 
            board:$("#title").html(), 
            name:$( "#new-name" ).val(), 
            description:$( "#new-description" ).val(),
            date:$("#due-date").val()
          },
          dataType: "html"
        });
      } else {
        var request = $.ajax({
          url: "controller/new_task.php",
          method: "POST",
          data: { 
            board:$("#title").html(), 
            name:$( "#new-name" ).val(), 
            description:$( "#new-description" ).val() 
          },
          dataType: "html"
        });
      }

      request.done(function( msg ) {
        $( "#task-table" ).html( msg );
        $("#new-name").val("");
        $("#new-description").val("");
      });
       
      request.fail(function( jqXHR, textStatus ) {
        alert( "Request failed: " + textStatus );
      });

      $( ".column" ).sortable( "refresh" );
    })


    $("#remove-task").click(function() {
      var request = $.ajax({
        url: "controller/remove_task.php",
        method: "POST",
        data: { 
          board:$("#title").html(), 
          name:$( "#task-name" ).html()
        },
        dataType: "html"
      });
       
      request.done(function( msg ) {
        $( "#task-table" ).html( msg );
      });
       
      request.fail(function( jqXHR, textStatus ) {
        alert( "Request failed: " + textStatus );
      });
    })

    $('#task-table').on('click', '.task-modal', function() {
      var value = $( this ).attr("value");
      $( "#task-name" ).html(value);
      $( "#task-desc" ).html('<div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div>');

      $.ajax({
        url: "controller/get_task_desc.php",
        method: "POST",
        data: { board:$("#title").html(), task:$(this).attr("value")},
        dataType: "html"
      }).done(function( msg ) {
        $( "#task-desc" ).html( msg );
      });

      $.ajax({
        url: "controller/get_task_date.php",
        method: "POST",
        data: { board:$("#title").html(), task:$(this).attr("value")},
        dataType: "html"
      }).done(function( msg ) {
        $( "#task-date" ).html( msg );
      });
    })

    $("#has-date").click(function() {
      $("#due-date").prop("disabled", !$(this).prop("checked"));
    })
  });
