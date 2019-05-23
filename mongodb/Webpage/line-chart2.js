//line-chart2.js
const width = 960;
const height = 500;
const margin = ({top: 20, right: 30, bottom: 30, left: 40});

data = Object.assign((await d3.csv("https://gist.githubusercontent.com/mbostock/14613fb82f32f40119009c94f5a46d72/raw/d0d70ffb7b749714e4ba1dece761f6502b2bdea2/aapl.csv", d3.autoType)).map(({date, close}) => ({date, value: close})), {y: "$ close"});

const x = d3.scaleTime()
  .domain(d3.extent(data, d => d.date))
  .range([margin.left, width - margin.right]);

const y = d3.scaleLinear()
  .domain([0, d3.max(data, d => d.value)]).nice()
  .range([height - margin.bottom, margin.top]);

const xAxis = g => g
  .attr("transform", `translate(0,${height - margin.bottom})`)
  .call(d3.axisBottom(x).ticks(width / 80).tickSizeOuter(0));

const yAxis = g => g
  .attr("transform", `translate(${margin.left},0)`)
  .call(d3.axisLeft(y))
  .call(g => g.select(".domain").remove())
  .call(g =>  g.select(".tick:last-of-type text").clone()
      .attr("x", 3)
      .attr("text-anchor", "start")
      .attr("font-weight", "bold")
      .attr("font-size", '20px')
      .text(data.y)
    );

const line = d3.line()
  .defined(d => !isNaN(d.value))
  .x(d => x(d.date))
  .y(d => y(d.value));

const svg = d3.select('body').append('svg').style('width', width).style('height', height);

svg.append("path")
  .datum(data)
  .attr("fill", "none")
  .attr("stroke", "steelblue")
  .attr("stroke-width", 1)
  .attr("stroke-linejoin", "round")
  .attr("stroke-linecap", "round")
  .attr("d", line);
svg.append("g").call(xAxis);
svg.append("g").call(yAxis);
svg.node();
