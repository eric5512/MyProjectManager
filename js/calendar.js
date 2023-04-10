$(function() {
    function month_name(month) {
        return new Date(2000, month-1).toLocaleString('en-GB', { month: 'long' });
    }

    $("#prev-month").click(function() {
        var month = parseInt($("#month-h2").attr("value")) - 1;
        if (month < 1) {
            var year = parseInt($("#year-val").attr("value")) - 1;
            month = 12;
        } else {
            var year = parseInt($("#year-val").attr("value"));
        }
        
        $.ajax({
            url: "controller/calendar_ym.php",
            method: "POST",
            data: { 
                month: month, 
                year:  year
            },
            dataType: "html"
        }).done(function( msg ) {
            $("#calendar").html( msg );
        });


        $("#month-h2").html(month_name(month));
        $("#month-h2").attr("value", month);

        $("#year-val").attr("value", year);
    })

    $("#next-month").click(function() {
        var month = parseInt($("#month-h2").attr("value")) + 1;
        
        if (month > 12) {
            var year = parseInt($("#year-val").attr("value")) + 1;
            month = 1;
        } else {
            var year = parseInt($("#year-val").attr("value"));
        }

        $.ajax({
            url: "controller/calendar_ym.php",
            method: "POST",
            data: { 
                month: month, 
                year:  year
            },
            dataType: "html"
        }).done(function( msg ) {
            $("#calendar").html( msg );
        });

        $("#month-h2").html(month_name(month));
        $("#month-h2").attr("value", month);

        $("#year-val").attr("value", year);
    })

    $("#calendar").on("click", ".day-btn", function() {
        var month = parseInt($("#month-h2").attr("value"));
        var year = parseInt($("#year-val").attr("value"))
        var num = $(this).attr("value");
        console.log(num);
        $("#day-modal").html("Day " + num)
        $.ajax({
            url: "controller/get_day_tasks.php",
            method: "POST",
            data: { 
                month: month, 
                year:  year,
                day:   num,
            },
            dataType: "html"
        }).done(function(msg) {
            $("#day-data").html(msg);
        });
    })
});