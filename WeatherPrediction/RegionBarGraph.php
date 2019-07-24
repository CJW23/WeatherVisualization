<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head>
<script src="https://d3js.org/d3.v4.js"></script>
<link rel="stylesheet" href="Webpage/assets/css/main.css" />
</head>
<body>
    <?php
        include "getdata.php";
        //강수량 데이터

        $waterData = CityDayWaterData($collection, $code);

    ?>
    <div id="my_dataviz" style="text-align:center;">
        <script>
            //강수량 데이터
            var waterData = <?php echo json_encode($waterData) ?>;
            // set the dimensions and margins of the graph
            var margin = {top: 10, right: 30, bottom: 50, left: 40},
                width = 1150 - margin.left - margin.right,
                height = 450 - margin.top - margin.bottom;
            var color = d3.scaleOrdinal(d3.schemeCategory20);
            // append the svg object to the body of the page
            var svg = d3.select("#my_dataviz")
            .append("svg")
                .attr("width", width + margin.left + margin.right)
                .attr("height", height + margin.top + margin.bottom)
            .append("g")
                .attr("transform",
                    "translate(" + margin.left + "," + margin.top + ")");

            // Parse the Data

            // X axis
            var x = d3.scaleBand()
            .range([ 0, width ])
            .domain(waterData.map(function(d) { return d.Year; }))
            .padding(0.2);
            svg.append("g")
            .attr("transform", "translate(0," + height + ")")
            .call(d3.axisBottom(x))
            .selectAll("text")
                .attr("transform", "translate(-10,0)rotate(-45)")
                .style("text-anchor", "end");

            // Add Y axis
            var y = d3.scaleLinear()
            .domain([0, 20])
            .range([ height, 0]);
            svg.append("g")
            .call(d3.axisLeft(y));

            // Bars
            svg.selectAll("mybar")
            .data(waterData)
            .enter()
            .append("rect")
                .attr("x", function(d) { return x(d.Year); })
                .attr("width", x.bandwidth())
                .attr("fill",function(d,i){return color(i);})
                // no bar at the beginning thus:
                .attr("height", function(d) { return height - y(0); }) // always equal to 0
                .attr("y", function(d) { return y(0); })

            // Animation
            svg.selectAll("rect")
            .transition()
            .duration(800)
            .attr("y", function(d) { return y(d.CityAvgDayWater); })
            .attr("height", function(d) { return height - y(d.CityAvgDayWater); })
            .delay(function(d,i){console.log(i) ; return(i*100)})
        </script>
    </div>
</body>
</html>
