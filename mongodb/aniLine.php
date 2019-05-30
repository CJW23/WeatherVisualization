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
  var num = <?php echo $num ?>;
  var city = "<?php echo $city ?>";
  var city2 = "<?php echo $city2 ?>";
  var city3 = "<?php echo $city3 ?>";
  var city4 = "<?php echo $city4 ?>";
  function Print(num){
    console.log(num);
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

  var line = d3.svg.line()    /////////////////////////////////
  .interpolate("monotone")
  .x(function (d) { return x(d.Year); })
  .y(function (d) {return y(d.CityYearAvgTemp); });

  // Filter to one symbol; the S&P 500.
  var datas = <?php echo json_encode($data)?>;
  var datas2 = <?php echo json_encode($datas)?>;
  var datas3 = <?php echo json_encode($datas2)?>;
  var datas4 = <?php echo json_encode($datas3)?>;
  console.log(datas);
  var tmp = datas.map(function(d) { return d.Year; });
  console.log(tmp);
    x.domain(tmp);
    //x.domain(d3.extent(datas, function(d){return d["Year"];}));////////////////////////////
    //x.domain([datas[0].Year, datas[datas.length - 1].Year]);
    y.domain([9, 16]);    ////////////////////////////////

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
      .attr("transform", "translate(-52," + height + ")")
      .call(xAxis);

    // Add the y-axis.
    svg.append("g")
      .attr("class", "y axis")
      .attr("transform", "translate(" + width - 100 + ",0)")
      .call(yAxis);


    var colors = d3.scale.category10();
    if(num == 1){
      svg.append("circle").attr("cx",1530).attr("cy",30).attr("r", 6).style("fill", "#187AC1")
      svg.append("text").attr("x", 1550).attr("y", 30).text(city).style("font-size", "15px").attr("alignment-baseline","middle")
      svg.selectAll('.line')
      .data([datas])    /////////////////////////////////////
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
    else if(num == 2){
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
    else if(num == 3){
      svg.append("circle").attr("cx",1530).attr("cy",30).attr("r", 6).style("fill", "#187AC1")
      svg.append("text").attr("x", 1550).attr("y", 30).text(city).style("font-size", "15px").attr("alignment-baseline","middle")
      svg.append("circle").attr("cx",1530).attr("cy",70).attr("r", 6).style("fill", "#FF881E")
      svg.append("text").attr("x", 1550).attr("y", 70).text(city2).style("font-size", "15px").attr("alignment-baseline","middle")
      svg.append("circle").attr("cx",1530).attr("cy",110).attr("r", 6).style("fill", "#61B861")
      svg.append("text").attr("x", 1550).attr("y", 110).text(city3).style("font-size", "15px").attr("alignment-baseline","middle")
      svg.selectAll('.line')
      .data([datas, datas2, datas3])    /////////////////////////////////////
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
    else if(num == 4){
      svg.append("circle").attr("cx",1320).attr("cy", 10).attr("r", 6).style("fill", "#187AC1")
      svg.append("text").attr("x", 1330).attr("y", 10).text(city).style("font-size", "15px").attr("alignment-baseline","middle")
      svg.append("circle").attr("cx",1380).attr("cy",10).attr("r", 6).style("fill", "#FF881E")
      svg.append("text").attr("x", 1390).attr("y", 10).text(city2).style("font-size", "15px").attr("alignment-baseline","middle")
      svg.append("circle").attr("cx",1440).attr("cy",10).attr("r", 6).style("fill", "#61B861")
      svg.append("text").attr("x", 1450).attr("y", 10).text(city3).style("font-size", "15px").attr("alignment-baseline","middle")
      svg.append("circle").attr("cx",1500).attr("cy",10).attr("r", 6).style("fill", "#D62728")
      svg.append("text").attr("x", 1510).attr("y", 10).text(city4).style("font-size", "15px").attr("alignment-baseline","middle")
      svg.selectAll('.line')
      .data([datas, datas2, datas3, datas4])    /////////////////////////////////////
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
  <label class="guideline">
    Show Guideline & Curtain
    <input type="checkbox" id="show_guideline" />
  </label>
  <form method="get" action="">
    <select name="city" id="demo-category">
      <option value="" disabled selected>- SELECT REGION -</option>
      <option value="천안">천안</option>
      <option value="서울">서울</option>
      <option value="강릉">강릉</option>
    </select>
    <select name="city2" id="demo-category">
      <option value="" disabled selected>- SELECT REGION -</option>
      <option value="천안">천안</option>
      <option value="서울">서울</option>
      <option value="강릉">강릉</option>
    </select>
    <select name="city3" id="demo-category">
      <option value="" disabled selected>- SELECT REGION -</option>
      <option value="천안">천안</option>
      <option value="서울">서울</option>
      <option value="강릉">강릉</option>
    </select>
    <select name="city4" id="demo-category">
      <option value="" disabled selected>- SELECT REGION -</option>
      <option value="천안">천안</option>
      <option value="서울">서울</option>
      <option value="강릉">강릉</option>
      <option value="속초">속초</option>
    </select>
    <select name="num">
      <option value="" disabled selected>- SELECT NUM -</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
    </select>
    <input type="submit" onclick="Print(<?php echo $num?>);">
    <button type="button" onclick="Print(<?php echo $num?>);">Draw</button>
  </form>
  <svg></svg>
</body>
</html>
