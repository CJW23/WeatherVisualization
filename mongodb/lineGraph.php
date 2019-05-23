<!DOCTYPE html>
<meta charset="utf-8">
<html>

<head>
    <script src="https://d3js.org/d3.v4.js"></script>
 
    <style>
        body{
            height: 100vh;
        }
    </style>
</head>

<body>
    <?php
        include "getdata.php";
        
    ?>
    <script>
        var dataTemp = <?php echo json_encode($tempData)?>;
        var dataSize = <?php echo json_encode($tempSize)?>;
        var dataArray = [50, 100, 150, 200, 250, 300, 350, 230, 300, 322,330, 360,23,24,35,45,34];
        var dataMonth = [1, 2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17];
        var height = 400;
        var width = 1800;
        var parseMonth = d3.timeParse("%s");

        var svg = d3.select('body').append('svg').attr('height', '100%').attr('width', '100%');
        var y = d3.scaleLinear().domain([-20, 35]).range([height, 0]);
        var x = d3.scaleTime()
                .domain([d3.min(dataSize, function(d){return d;}),
                        d3.max(dataSize, function(d){return d;})])
                .range([0, width]);

        var xAxis = d3.axisBottom(x);
        var yAxis = d3.axisLeft(y);

        var area = d3.area()
            .x(function (d, i) { return x(dataSize[i]); })
            .y0(height)
            .y1(function (d) { return y(d); });

    
        var grp = svg.append('g').attr('transform', 'translate('+50+', 50)');
        
        grp.append('g').attr('class', 'axis y').call(yAxis);
        grp.append('g').attr('class', 'axis x').attr('transform', 'translate(0, '+height+')').call(xAxis);
        
        grp.append('path')
            .attr('fill', 'none')
            .attr('stroke', 'black')
            .attr('stroke-width', '1')
            .attr('d', area(dataTemp));

        grp.selectAll('circle')
            .data(dataTemp)
            .enter().append('circle')
                    .attr('cx', function(d, i){return x(dataSize[i]);})
                    .attr('cy', function(d){return y(d);})
                    .attr('r', '2');
    </script>
</body>

</html>