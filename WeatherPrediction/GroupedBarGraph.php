<!DOCTYPE html>
<meta charset="utf-8">
<head>
  <link rel="stylesheet" href="Webpage/assets/css/main.css" />
</head>
<body>
  <header class="major">
    <h2 style="margin-left:10px;">Yearly Precipitation Changes</h2>
  </header>
  <form method="get" action="">
  <div style="width:18%;float:left;margin-left:10px;margin-right:5px;">
    <select name="city" id="demo-category">
      <option value="" disabled selected>- SELECT REGION -</option>
      <option value="" disabled>** 서울특별시 **</option>
      <option value="서울">서울</option>
      <option value="" disabled>** 부산광역시 **</option>
      <option value="부산">부산</option>
      <option value="" disabled>** 대구광역시 **</option>
      <option value="대구">대구</option>
      <option value="대구(기)">대구(기)</option>
      <option value="" disabled>** 인천광역시 **</option>
      <option value="강화">강화</option>
      <option value="백령도">백령도</option>
      <option value="인천">인천</option>
      <option value="" disabled>** 광주광역시 **</option>
      <option value="광주">광주</option>
      <option value="" disabled>** 대전광역시 **</option>
      <option value="대전">대전</option>
      <option value="" disabled>** 울산광역시 **</option>
      <option value="울산">울산</option>
      <option value="" disabled>** 경기도 **</option>
      <option value="동두천">동두천</option>
      <option value="수원">수원</option>
      <option value="양평">양평</option>
      <option value="이천">이천</option>
      <option value="파주">파주</option>
      <option value="" disabled>** 강원도 **</option>
      <option value="강릉">강릉</option>
      <option value="대관령">대관령</option>
      <option value="동해">동해</option>
      <option value="북강릉">북강릉</option>
      <option value="북춘천">북춘천</option>
      <option value="삼척">삼척</option>
      <option value="속초">속초</option>
      <option value="영월">영월</option>
      <option value="원주">원주</option>
      <option value="인제">인제</option>
      <option value="정선군">정선군</option>
      <option value="철원">철원</option>
      <option value="춘천">춘천</option>
      <option value="태백">태백</option>
      <option value="홍천">홍천</option>
      <option value="" disabled>** 충청북도 **</option>
      <option value="보은">보은</option>
      <option value="제천">제천</option>
      <option value="청주">청주</option>
      <option value="추풍령">추풍령</option>
      <option value="충주">충주</option>
      <option value="" disabled>** 충청남도 **</option>
      <option value="금산">금산</option>
      <option value="보령">보령</option>
      <option value="부여">부여</option>
      <option value="서산">서산</option>
      <option value="천안">천안</option>
      <option value="홍성">홍성</option>
      <option value="" disabled>** 전라북도 **</option>
      <option value="고창">고창</option>
      <option value="고창군">고창군</option>
      <option value="군산">군산</option>
      <option value="남원">남원</option>
      <option value="부안">부안</option>
      <option value="순창군">순창군</option>
      <option value="임실">임실</option>
      <option value="장수">장수</option>
      <option value="전주">전주</option>
      <option value="정읍">정읍</option>
      <option value="" disabled>** 전라남도 **</option>
      <option value="강진군">강진군</option>
      <option value="고흥">고흥</option>
      <option value="광양시">광양시</option>
      <option value="목포">목포</option>
      <option value="보성군">보성군</option>
      <option value="순천">순천</option>
      <option value="여수">여수</option>
      <option value="영광군">영광군</option>
      <option value="완도">완도</option>
      <option value="장흥">장흥</option>
      <option value="주암">주암</option>
      <option value="진도(첨찰산)">진도(첨찰산)</option>
      <option value="진도군">진도군</option>
      <option value="해남">해남</option>
      <option value="흑산도">흑산도</option>
      <option value="" disabled>** 경상북도 **</option>
      <option value="경주시">경주시</option>
      <option value="구미">구미</option>
      <option value="문경">문경</option>
      <option value="봉화">봉화</option>
      <option value="상주">상주</option>
      <option value="안동">안동</option>
      <option value="영덕">영덕</option>
      <option value="영주">영주</option>
      <option value="영천">영천</option>
      <option value="울릉도">울릉도</option>
      <option value="울진">울진</option>
      <option value="의성">의성</option>
      <option value="청송군">청송군</option>
      <option value="포항">포항</option>
      <option value="" disabled>** 경상남도 **</option>
      <option value="거제">거제</option>
      <option value="거창">거창</option>
      <option value="김해시">김해시</option>
      <option value="남해">남해</option>
      <option value="밀양">밀양</option>
      <option value="북창원">북창원</option>
      <option value="산청">산청</option>
      <option value="양산시">양산시</option>
      <option value="의령군">의령군</option>
      <option value="진주">진주</option>
      <option value="창원">창원</option>
      <option value="통영">통영</option>
      <option value="함양군">함양군</option>
      <option value="합천">합천</option>
      <option value="" disabled>** 제주도 **</option>
      <option value="고산">고산</option>
      <option value="서귀포">서귀포</option>
      <option value="성산">성산</option>
      <option value="성산포">성산포</option>
      <option value="제주">제주</option>
    </select>
  </div>
  <div style="float:left;margin-right:5px;">
    <input type="submit" value="Draw Graph">
  </div>
</form><br><br><br>
<?php
    include "getdata.php";
    $data = CityYearAvgWaterData($collection, $city, $code);

 ?>
<script src="https://d3js.org/d3.v3.min.js"></script>
<script src="http://labratrevenge.com/d3-tip/javascripts/d3.tip.v0.6.3.js"></script>
<script>
    var data = <?php echo json_encode($data) ?>;
    console.log(data);
    var margin = {top: 20, right: 20, bottom: 30, left: 40},
        width = 1200 - margin.left - margin.right,
        height = 500 - margin.top - margin.bottom;

    var x0 = d3.scale.ordinal()
        .rangeRoundBands([0, width], .1);

    var x1 = d3.scale.ordinal();

    var y = d3.scale.linear()
        .range([height, 0]);

    var xAxis = d3.svg.axis()
        .scale(x0)
        .tickSize(0)
        .orient("bottom");

    var yAxis = d3.svg.axis()
        .scale(y)
        .orient("left");

    var tip = d3.tip()
      .attr('class', 'd3-tip')
      .offset([-10, 0])
      .html(function(d) {
        return "<strong style='color:white'>Value:</strong> <span style='color:red'>" + d.value + "</span>";
      })

    var color = d3.scale.ordinal()
        .range(["#d5d5d5","#92c5de","#ca0020","#f4a582","#0571b0"]);

    var svg = d3.select('body')
        .append("div")
        .attr("style", "text-align:center")
        .append("svg")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)
        .append("g")
        .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

    svg.call(tip);

    var year = data.map(function(d) { return d.Year; });
    var rateNames = data[0].Values.map(function(d) { return d.City; });
    console.log(year);
    x0.domain(year);
    x1.domain(rateNames).rangeRoundBands([0, x0.rangeBand()]);
    y.domain([0, 17]);

    svg.append("g")
        .attr("class", "x axis")
        .attr("transform", "translate(0," + height + ")")
        .call(xAxis);

    svg.append("g")
        .attr("class", "y axis")
        .style('opacity','0')
        .call(yAxis)
        .append("text")
        .attr("transform", "rotate(-90)")
        .attr("y", 6)
        .attr("dy", ".71em")
        .style("text-anchor", "end")
        .style('font-weight','bold')
        .text("Value");

    svg.select('.y').transition().duration(500).delay(1300).style('opacity','1');

    var slice = svg.selectAll(".slice")
        .data(data)
        .enter().append("g")
        .attr("class", "g")
        .attr("transform",function(d) { return "translate(" + x0(d.Year) + ",0)"; });

    slice.selectAll("rect")
        .data(function(d) { return d.Values; })
        .enter().append("rect")
        .attr("width", x1.rangeBand())
        .attr("x", function(d) { return x1(d.City); })
        .style("fill", function(d) { return color(d.City) })
        .attr("y", function(d) { return y(0); })
        .attr("height", function(d) { return height - y(0); })
        .on("mouseover", tip.show)
        .on("mouseout", tip.hide);

    slice.selectAll("rect")
        .transition()
        .delay(function (d) {return Math.random()*1000;})
        .duration(1000)
        .attr("y", function(d) { return y(d.value); })
        .attr("height", function(d) { return height - y(d.value); });

    //Legend
    var legend = svg.selectAll(".legend")
        .data(data[0].Values.map(function(d) { return d.City; }).reverse())
        .enter().append("g")
        .attr("class", "legend")
        .attr("transform", function(d,i) { return "translate(0," + i * 20 + ")"; })
        .style("opacity","0");

    legend.append("rect")
        .attr("x", width - 18)
        .attr("width", 18)
        .attr("height", 18)
        .style("fill", function(d) { return color(d); });

    legend.append("text")
        .attr("x", width - 24)
        .attr("y", 9)
        .attr("dy", ".35em")
        .style("text-anchor", "end")
        .text(function(d) {return d; });

    legend.transition().duration(500).delay(function(d,i){ return 1300 + 100 * i; }).style("opacity","1");
</script>

</body>
</html>
