

//SALES STACKING FUNCTION
$(function () {

    var d1 = [];
    for (var i = 0; i <= 10; i += 1) {
        d1.push([i, parseInt(Math.random() * 30)]);
    }

    var d2 = [];
    for (var i = 0; i <= 10; i += 1) {
        d2.push([i, parseInt(Math.random() * 30)]);
    }

    var d3 = [];
    for (var i = 0; i <= 10; i += 1) {
        d3.push([i, parseInt(Math.random() * 30)]);
    }

    var stack = 0,
        bars = true,
        lines = false,
        steps = false;

    function plotWithOptions() {
        $.plot("#placeholderStack", [d1, d2, d3], {
            series: {
                stack: stack,
                lines: {
                    show: lines,
                    fill: true,
                    steps: steps
                },
                bars: {
                    show: bars,
                    barWidth: 0.6
                }
            }
        });
    }

    plotWithOptions();

    $(".stackControls button").click(function (e) {
        e.preventDefault();
        stack = $(this).text() == "With stacking" ? true : null;
        plotWithOptions();
    });

    $(".graphControls button").click(function (e) {
        e.preventDefault();
        bars = $(this).text().indexOf("Bars") != -1;
        lines = $(this).text().indexOf("Lines") != -1;
        steps = $(this).text().indexOf("steps") != -1;
        plotWithOptions();
    });

    // Add the Flot version string to the footer

});
// END SALES STACKING FUNCTION


//TOOLTIP AND HOVERS



// tooltip demo
$('.tooltip-demo').tooltip({
    selector: "[data-toggle=tooltip]",
    container: "body"
})

// popover demo
$("[data-toggle=popover]")
    .popover()

//END TOOLTIP AND HOVERS