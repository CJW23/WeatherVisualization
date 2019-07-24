<!DOCTYPE html>
<meta charset="utf-8">
<head>
  <style>
  body {
    font: 10px sans-serif;
    margin: 0;
  }

  path.line {
    fill: none;
    stroke: #666;
    stroke-width: 1.5px;
  }

  path.area {
    fill: #e7e7e7;
  }

  .axis {
    shape-rendering: crispEdges;
  }

  .x.axis line {
    stroke: #fff;
  }

  .x.axis .minor {
    stroke-opacity: .5;
  }

  .x.axis path {
    display: none;
  }

  .y.axis line,
  .y.axis path {
    fill: none;
    stroke: #000;
  }

  .guideline {
    margin-right: 100px;
    float: right;
  }
</style>
<script src="http://d3js.org/d3.v3.min.js"></script>
<?php
include "getdata.php";  //데이터 불러오는 함수 php
$data = CityYearAvg($collection, $code);
$datas = CityYearAvg($collection, $code2);
$datas2 = CityYearAvg($collection, $code3);
$datas3 = CityYearAvg($collection, $code4);
?>
<script>
var num = 2;
var option = "<?php echo $option ?>";
var city = "<?php echo $city ?>";
var city2 = "<?php echo $city2 ?>";

function Print(num){
  console.log(option);
  var margin = { top: 80, right: 80, bottom: 80, left: 80 },
  width = 1800 - margin.left - margin.right,
  height = 700 - margin.top - margin.bottom;

  var parse = d3.time.format("%Y").parse;

  // Scales and axes. Note the inverted domain for the y-scale: bigger is up!
  var x = d3.scale.ordinal().rangeRoundBands([0, width]),
  //x = d3.time.scale().range([0, width]),
  y = d3.scale.linear().range([height, 0]),
  xAxis = d3.svg.axis().scale(x).orient("bottom"),
  yAxis = d3.svg.axis().scale(y).ticks(5).orient("right");

  if(option == 1){
    var line = d3.svg.line()    /////////////////////////////////
    .interpolate("monotone")
    .x(function (d) { return x(d.Year); })
    .y(function (d) {return y(d.CityYearAvgWindy); });
    y.domain([0, 10]);
  }
  else if(option == 2){
    var line = d3.svg.line()    /////////////////////////////////
    .interpolate("monotone")
    .x(function (d) { return x(d.Year); })
    .y(function (d) {return y(d.CityYearAvgTemp); });
    y.domain([9, 16]);
  }
  // Filter to one symbol; the S&P 500.
  var datas = <?php echo json_encode($data)?>;
  var datas2 = <?php echo json_encode($datas)?>;

  console.log(datas);
  var tmp = datas.map(function(d) { return d.Year; });
  console.log(tmp);
  x.domain(tmp);
  //x.domain(d3.extent(datas, function(d){return d["Year"];}));////////////////////////////
  //x.domain([datas[0].Year, datas[datas.length - 1].Year]);
  ////////////////////////////////

  // Add an SVG element with the desired dimensions and margin.
  var svg = d3.select("svg")
  .attr("width", width + margin.left + margin.right)
  .attr("height", height + margin.top + margin.bottom)
  .append("g")
  .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

  // Add the clip path.
  svg.append("clipPath")
  .attr("id", "clip")
  .append("rect")
  .attr("width", width)
  .attr("height", height);

  // Add the x-axis.
  svg.append("g")
  .attr("class", "x axis")
  .attr("transform", "translate(-52," + height + ")")
  .call(xAxis);

  // Add the y-axis.
  svg.append("g")
  .attr("class", "y axis")
  .attr("transform", "translate(" + width - 100 + ",0)")
  .call(yAxis);


  var colors = d3.scale.category10
  if(num == 2){
    svg.append("circle").attr("cx",1530).attr("cy",30).attr("r", 6).style("fill", "#187AC1")
    svg.append("text").attr("x", 1550).attr("y", 30).text(city).style("font-size", "15px").attr("alignment-baseline","middle")
    svg.append("circle").attr("cx",1530).attr("cy",70).attr("r", 6).style("fill", "#FF881E")
    svg.append("text").attr("x", 1550).attr("y", 70).text(city2).style("font-size", "15px").attr("alignment-baseline","middle")
    svg.selectAll('.line')
    .data([datas, datas2])    /////////////////////////////////////
    .enter()
    .append('path')
    .attr('class', 'line')
    .style('stroke', function (d) {
      return colors(Math.random() * 50);
    })
    .attr('clip-path', 'url(#clip)')
    .attr('d', function (d) {
      return line(d);
    });
  }




  /* Add 'curtain' rectangle to hide entire graph */
  var curtain = svg.append('rect')
  .attr('x', -1 * width)
  .attr('y', -1 * height)
  .attr('height', height)
  .attr('width', width)
  .attr('class', 'curtain')
  .attr('transform', 'rotate(180)')
  .style('fill', '#ffffff');

  /* Optionally add a guideline */
  var guideline = svg.append('line')
  .attr('stroke', '#333')
  .attr('stroke-width', 0)
  .attr('class', 'guide')
  .attr('x1', 1)
  .attr('y1', 1)
  .attr('x2', 1)
  .attr('y2', height);

  /* Create a shared transition for anything we're animating */
  var t = svg.transition()
  .delay(750)
  .duration(6000)
  .ease('linear')
  .each('end', function () {
    d3.select('line.guide')
    .transition()
    .style('opacity', 0)
    .remove()
  });


  t.select('rect.curtain')
  .attr('width', 0);
  t.select('line.guide')
  .attr('transform', 'translate(' + width + ', 0)')

  d3.select("#show_guideline").on("change", function (e) {
    guideline.attr('stroke-width', this.checked ? 1 : 0);
    curtain.attr("opacity", this.checked ? 0.75 : 1);
  });

}
</script>
</head>
<body>

  <svg></svg>
  <script>
  console.log(num);
  Print(num);
  </script>
</body>
</html>
