$(function() {
    $("#create-board").click(function() {
        $.ajax({
            url: "controller/new_board.php",
            method: "POST",
            data: { board:$("#new-board-name").val(), desc:$("#new-board-description").val() },
            dataType: "html"
        }).done(function( msg ) {
            $( "#board-cards" ).html( msg );
        });

        $("#new-board-name").val("");
        $("#new-board-description").val("");
    })

    $("#board-cards").on("click", ".remove-board", function() {
        $.ajax({
            url: "controller/remove_board.php",
            method: "POST",
            data: { board:$(this).attr("value") },
            dataType: "html"
        }).done(function( msg ) {
            $( "#board-cards" ).html( msg );
        });
    })
});