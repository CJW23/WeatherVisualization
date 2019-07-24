<!DOCTYPE html>
<html>

<head>
  <script data-require="d3@3.5.3" data-semver="3.5.3" src="//cdnjs.cloudflare.com/ajax/libs/d3/3.5.3/d3.js"></script>
  <style>
    body {
      font: 10px sans-serif;
    }

    .axis path,
    .axis line {
      fill: none;
      stroke: #000;
      shape-rendering: crispEdges;
    }

    .x.axis path {
      display: none;
    }

    .line {
      fill: none;
      stroke: steelblue;
      stroke-width: 1.5px;
    }
  </style>
</head>

<body>
  <script>
  // set the dimensions and margins of the graph
 var margin = {top: 20, right: 20, bottom: 30, left: 40},
     width = 960 - margin.left - margin.right,
     height = 500 - margin.top - margin.bottom;

 //then make a function to parse the time
 var parseDate = d3.timeParse("%Y-%m-%d");

 // set the ranges
 var x = d3.scaleBand().rangeRound([0, width]).padding(0.1);
 var y = d3.scaleLinear().range([height, 0],0.5);

 // append the svg object to the body of the page
 // append a 'group' element to 'svg'
 // moves the 'group' element to the top left margin
 var svg = d3.select("body").append("svg")
     .attr("width", width + margin.left + margin.right)
     .attr("height", height + margin.top + margin.bottom)
   .append("g")
     .attr("transform",
           "translate(" + margin.left + "," + margin.top + ")");


 //setup axis


 // get the data
 d3.json("https://raw.githubusercontent.com/FreeCodeCamp/ProjectReferenceData/master/GDP-data.json").get(function(error,dataset){
   var d =dataset.data;
   data.forEach(function(d) {
        d[0] = parseDate(d[0]);
    });
   //console.log(d[3][0]);

 });
  </script>
</body>

</html>
