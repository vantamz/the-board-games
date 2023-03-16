/*
    var xValues = [30];
    var yValues = [100];
    var valuess=[2,6,9,8,45,63,21,56,84]
    generateData("Math.sin(x)*2", 0, 30, 10);

    new Chart("myChart", {
      type: "line",
      data: {
        labels: xValues,
        datasets: [{
          fill: false,

          pointRadius: 2,
          borderColor: "rgba(0,0,255,0.5)",
          data: yValues
        }]
      },
      options: {
        legend: {display: false},
        title: {
          display: true,
          text: "Monthly Earn",
          fontSize: 16
        }
      }
    });
    function generateData(value, i1, i2, step = 1) {
  for (let x = i1; x <= i2; x += step) {
    yValues.push(eval(value));
    xValues.push(x);
  }
} */
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June','July','August','September','September','October','November','December'],
        datasets: [{
            label: 'Monthly Earn',
            data: [0, 200, 400, 600, 800, 1000],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
        var xValues = ["Monopoly", "Scopode", "ETA", "Conan"];
        var yValues = [55, 49, 44, 70];
        var barColors = ["red", "green","blue","orange"];

        new Chart("TopProduct", {
          type: "bar",
          data: {
            labels: xValues,
            datasets: [{
              backgroundColor: barColors,
              data: yValues
            }]
          },
          options: {
            legend: {display: false},
            title: {
              display: true,
              text: "Best Sale In the Month"
            }
          }
        });
