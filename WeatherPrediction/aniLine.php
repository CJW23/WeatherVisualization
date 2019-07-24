<!DOCTYPE HTML>
<head>
  <link rel="stylesheet" href="Webpage/assets/css/main.css" />
  <script src="https://d3js.org/d3.v3.min.js"></script>
</head>
<body>
  <svg></svg>
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

  var margin = { top: 80, right: 80, bottom: 80, left: 80 },
  width = 1250 - margin.left - margin.right,
  height = 500 - margin.top - margin.bottom;

  var parseDate = d3.time.format("%Y").parse;

  // Scales and axes. Note the inverted domain for the y-scale: bigger is up!
  var x = d3.time.scale().range([0, width]),
  //x = d3.time.scale().range([0, width]),
  y = d3.scale.linear().range([height-10, 0]),
  xAxis = d3.svg.axis().scale(x).orient("bottom"),
  yAxis = d3.svg.axis().scale(y).ticks(6).orient("right");

  if(option == 1){
    var line = d3.svg.line()    /////////////////////////////////
    .interpolate("monotone")
    .x(function (d) { return x(d.Year); })
    .y(function (d) {return y(d.CityYearAvgWindy); });
    y.domain([0, 5]);
  }
  else if(option == 2){
    var line = d3.svg.line()    /////////////////////////////////
    .interpolate("monotone")
    .x(function (d) { return x(d.Year); })
    .y(function (d) {return y(d.CityYearAvgTemp); });
    y.domain([9, 18]);
  }

  // Filter to one symbol; the S&P 500.
  var datas = <?php echo json_encode($data)?>;
  var datas2 = <?php echo json_encode($datas)?>;
  var datas3 = <?php echo json_encode($datas2)?>;
  var datas4 = <?php echo json_encode($datas3)?>;

  datas.forEach(function(d) {
    d.Year = parseDate(String(d.Year));
  });
  datas2.forEach(function(d) {
    d.Year = parseDate(String(d.Year));
  });
  datas3.forEach(function(d) {
    d.Year = parseDate(String(d.Year));
  });
  datas4.forEach(function(d) {
    d.Year = parseDate(String(d.Year));
  });

  console.log(datas);
  x.domain([datas[0].Year, datas[datas.length - 1].Year]);

  // Add an SVG element with the desired dimensions and margin.
  var svg = d3.select("svg")
  .attr("width", width + margin.left + margin.right)
  .attr("height", height + margin.top + margin.bottom)
  .append("g")
  .attr("transform", "translate(" + margin.left + "," + margin.top + ")")

  // Add the clip path.
  svg.append("clipPath")
  .attr("id", "clip")
  .append("rect")
  .attr("width", width)
  .attr("height", height);

  // Add the x-axis.
  svg.append("g")
  .attr("class", "x axis")
  .attr("transform", "translate(0," + height + ")")
  .call(xAxis);

  // Add the y-axis.
  svg.append("g")
  .attr("class", "y axis")
  .attr("transform", "translate(" + width - 100 + ",0)")
  .call(yAxis);


  var colors = d3.scale.category10();
  if(num == 2){
    svg.append("circle").attr("cx",width+20).attr("cy",10).attr("r", 6).style("fill", "#187AC1")
    svg.append("text").attr("x", width+30).attr("y", 10).text(city).style("font-size", "15px").attr("alignment-baseline","middle")
    svg.append("circle").attr("cx",width+20).attr("cy",30).attr("r", 6).style("fill", "#FF881E")
    svg.append("text").attr("x", width+30).attr("y", 30).text(city2).style("font-size", "15px").attr("alignment-baseline","middle")
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
  .style('fill', '#ffffff')

  /* Optionally add a guideline */
  var guideline = svg.append('line')
  .attr('stroke', '#333')
  .attr('stroke-width', 0)
  .attr('class', 'guide')
  .attr('x1', 1)
  .attr('y1', 1)
  .attr('x2', 1)
  .attr('y2', height)

  /* Create a shared transition for anything we're animating */
  var t = svg.transition()
  .delay(750)
  .duration(2000)
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
  </script>
</body>
</html>
