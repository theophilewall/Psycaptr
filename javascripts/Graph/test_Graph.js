function graph(Data){
  var ctx = document.getElementById('line-chart').getContext("2d");

  var gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
  gradientStroke.addColorStop(0, '#fe6cbd');
  gradientStroke.addColorStop(1, '#ffd2be');

  var gradientStroke2 = ctx.createLinearGradient(500, 0, 100, 0);
  gradientStroke2.addColorStop(0, '#ffdef0');
  gradientStroke2.addColorStop(1, '#fff5f0');

  var Data_Abscisse = [];

  for(let i=0; i <Data.length; i++){
    Data_Abscisse[i] = i+1;
  }

  new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: Data_Abscisse,
    datasets: [{
        data: Data,
        borderColor: gradientStroke,
        fill: true,
        backgroundColor	:gradientStroke2,
        pointBackgroundColor: gradientStroke
      }
    ]
  },


  options: {
    responsive: true,
    maintainAspectRatio: false,
    legend: {
    display: false,
    },
    scales: {
        xAxes: [{
            gridLines: {
                display:false,
                drawBorder: false,
            },
            ticks: {
              display:false
            }

        }],
        yAxes: [{
            gridLines: {
                display:false,
            },
            ticks: {
              beginAtZero: true,
              autoSkip: true,
              maxTicksLimit: 2
            }
        }]
    }

  }
  });
}
