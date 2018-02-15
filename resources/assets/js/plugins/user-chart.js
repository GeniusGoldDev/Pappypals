var randomScalingFactor = function() {
  return Math.round(Math.random() * 100);
};
var randomColorFactor = function() {
  return Math.round(Math.random() * 255);
};
var randomColor = function(opacity) {
  return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',' + (opacity || '.3') + ')';
};
window.onload = function() {
  var ctx = document.getElementById("chart-area");
  window.myPolarArea = Chart.PolarArea(ctx, config);
};
var config = {
  data: {
    options: {
    responsive: true,
    legend: {
      position: 'top',
    },
    title: {
      display: true,
      text: 'Time speed on each areas'
    },
    scale: {
      ticks: {
        beginAtZero: true
      },
      reverse: false
    },
    animation: {
      animateRotate: false
    }
  },
    
    datasets: [{
      data: [
        8,
        9,
        5,
        3,
        7,
      ],
      backgroundColor: [
        "#F7464A",
        "#46BFBD",
        "#FDB45C",
        "#949FB1",
        "#4D5360",
      ],
      label: 'My dataset' // for legend
    }],
    labels: [
      "Self awareness",
      "Self managment \r\n",
      "Social awareness",
      "Relationship skills \r\n",
      "Responsible desicion making"
    ]
  }
};



$('#randomizeData').click(function() {
  $.each(config.data.datasets, function(i, piece) {
    $.each(piece.data, function(j, value) {
      config.data.datasets[i].data[j] = randomScalingFactor();
      config.data.datasets[i].backgroundColor[j] = randomColor();
    });
  });
  window.myPolarArea.update();
});

//$('#addData').click(function() {
//  if (config.data.datasets.length > 0) {
//    config.data.labels.push('dataset #' + config.data.labels.length);
//
//    $.each(config.data.datasets, function(i, dataset) {
//      dataset.backgroundColor.push(randomColor());
//      dataset.data.push(randomScalingFactor());
//    });
//
//    window.myPolarArea.update();
//  }
//});

//$('#removeData').click(function() {
//  config.data.labels.pop(); // remove the label first
//
//  $.each(config.data.datasets, function(i, dataset) {
//    dataset.backgroundColor.pop();
//    dataset.data.pop();
//  });
//
//  window.myPolarArea.update();
//});