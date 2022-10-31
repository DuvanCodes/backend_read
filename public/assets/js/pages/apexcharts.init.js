/*
Template Name: Xeria - Responsive Bootstrap 4 Admin Dashboard
Author: CoderThemes
Version: 1.0.0
Website: https://coderthemes.com/
Contact: support@coderthemes.com
File: Apex Charts
*/
 
Apex.grid = {
    padding: {
        right: 0,
        left: 0
    }
}

Apex.dataLabels = {
    enabled: false
}

var randomizeArray = function (arg) {
    var array = arg.slice();
    var currentIndex = array.length, temporaryValue, randomIndex;

    while (0 !== currentIndex) {

        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex -= 1;

        temporaryValue = array[currentIndex];
        array[currentIndex] = array[randomIndex];
        array[randomIndex] = temporaryValue;
    }

    return array;
}

// data for the sparklines that appear below header area
var sparklineData = [47, 45, 54, 38, 56, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46];

// the default colorPalette for this dashboard
//var colorPalette = ['#01BFD6', '#5564BE', '#F7A600', '#EDCD24', '#F74F58'];
var colorPalette = ['#00D8B6', '#008FFB', '#FEB019', '#FF4560', '#775DD0']


//
// Column Chart - 1
//

var options = {
    chart: {
        height: 380,
        type: 'bar',
        stacked: true,
        toolbar: {
            show: true
        }
    },
    plotOptions: {
        bar: {
            horizontal: false,
            endingShape: 'rounded',
            columnWidth: '55%',
        },
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    colors: ['#f0643b','#56c2d6', "#f8cc6b"],
    series: [{
        name: 'RUAT',
        data: [2, 1, 1, 7, 5, 13, 11, 8, 3, 10, 18, 23, 15, 21, 19, 7]
    }, {
        name: 'Reg.Beneficiacios',
        data: [1, 4, 6, 12, 4, 7, 0, 6, 2, 8, 3, 6, 15, 14, 12, 2, 10]
    }, {
        name: 'AT Verificación',
        data: [1, 0, 0, 2, 0, 0, 0, 12, 3, 5, 2, 9, 14, 9, 13, 8, 3]
    }],
    xaxis: {

        type: 'datetime',

        labels: {
          datetimeFormatter: {
            year: 'yyyy',
            month: 'MMM \'yy',
            day: 'dd MM',
            hour: 'HH:mm'
          }
        },

        categories: ['06 23', '07 2', '07 5', '07 11', '07 12', '07 13', '07 19', '07 21','07 22', '07 23','07 29', '07 30', '07 31', '08 02', '08 03', '08-04'],
    },

    legend: {
        position: 'bottom',
        offsetY: 5,
        fontSize: '12px',
        fontWeight: 100,
    },
    yaxis: {
        title: {
            text: 'Nº Registros'
        }
    },
    fill: {
        opacity: 1

    },
    // legend: {
    //     floating: true
    // },
    grid: {
        row: {
            colors: ['transparent', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.2
        },
        borderColor: '#f1f3fa'
    },
    tooltip: {
        y: {
            formatter: function (val) {
                return  val + " registros"
            }
        }
    }
}

var chart = new ApexCharts(
    document.querySelector("#apex-column-1"),
    options
);

chart.render();


//
// Markers Avance
//

 
var options = {
  series: [
  {
    name: 'Avance Registros',
    data: [
      
      {
        x: 'AT. SOST',
        y: 0,
        goals: [
          {
            name: 'Meta',
            value: 200,
            strokeWidth: 1,
            strokeColor: '#e55090'
          }
        ]
      },
      {
        x: 'AT. NS',
        y: 0,
        goals: [
          {
            name: 'Meta',
            value: 786,
            strokeWidth: 1,
            strokeColor: '#e55090'
          }
        ]
      },
      {
        x: 'Reg.B.',
        y: 102,
        goals: [
          {
            name: 'Meta',
            value: 940,
            strokeWidth: 1,
            strokeColor: '#e55090'
          }
        ]
      },
      {
        x: 'AT. V.',
        y: 78,
        goals: [
          {
            name: 'Meta',
            value: 316,
            strokeWidth: 1,
            strokeColor: '#e55090'
          }
        ]
      },
      {
        x: 'RUAT',
        y: 166,
        goals: [
          {
            name: 'Meta',
            value: 765,
            strokeWidth: 1,
            strokeColor: '#e55090'
          }
        ]
      }
    ]
  }
],
  chart: {
  height: 380,
  type: 'bar'
},
plotOptions: {
  bar: {
    horizontal: true,
     barHeight: '30%',
  }
},
colors: ['#00E396'],
dataLabels: {
  formatter: function(val, opt) {
    const goals =
      opt.w.config.series[opt.seriesIndex].data[opt.dataPointIndex]
        .goals

    if (goals && goals.length) {
      return `${val} / ${goals[0].value}`
    }
    return val
  }
},
legend: {
  show: true,
  showForSingleSeries: true,
  customLegendItems: ['Avance', 'Meta'],
  markers: {
    fillColors: ['#00E396', '#e55090']
  }
}
};

var chart = new ApexCharts(
    document.querySelector("#markers-avance"),
    options
);

chart.render();





//
// Rendimiento
//
var colors =['#01BFD6', '#5564BE', '#F7A600', '#EDCD24', '#F74F58'];
var options = {
      series: [{
      data: [21, 22, 10]
    }],
      chart: {
      height: 320,
      type: 'bar',
      events: {
        click: function(chart, w, e) {
          // console.log(chart, w, e)
        }
      }
    },

    annotations: {
          yaxis: [{
            y: 17.6,
            borderColor: '#e55090',
           
          }]
    },
    colors: colors,
    plotOptions: {
      bar: {
        columnWidth: '25%',
        distributed: true,
      }
    },
    dataLabels: {
      enabled: false
    },
    legend: {
      show: false
    },
    xaxis: {
      categories: [
        ['Zona Sur'],
        ['Zona Centro'],
        ['Zona Norte'],
      ],
      labels: {
        style: {
          colors: colors,
          fontSize: '12px'
        }
      }
    }
};

var chart = new ApexCharts(
    document.querySelector("#rendimiento"),
    options
);

chart.render();
