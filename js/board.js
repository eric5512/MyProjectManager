$(function() {
    $( ".column" ).sortable({
      connectWith: ".column",
      handle: ".portlet-header",
      cancel: ".portlet-toggle",
      placeholder: "portlet-placeholder ui-corner-all"
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

    $( ".task-modal" ).click(function() {
      var value = $( this ).attr("value");
      $( "#task-name" ).html(value);
      $( "#task-desc" ).html('<div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div>');

      var request = $.ajax({
        url: "get_task_desc.php",
        method: "POST",
        data: { board:$("#title").html(), col:$(this).parent().parent().parent().attr("value"), task:$(this).attr("value")},
        dataType: "html"
      });
       
      request.done(function( msg ) {
        $( "#task-desc" ).html( msg );
      });
       
      request.fail(function( jqXHR, textStatus ) {
        alert( "Request failed: " + textStatus );
      });
    })
});