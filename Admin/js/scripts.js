
//sidebar not for now
let sidebarOpen = false;
const sidebar = document.getElementById('sidebar');

function openSidebar() {
  if (!sidebarOpen) {
    sidebar.classList.add('sidebar-responsive');
    sidebarOpen = true;
  }
}

function closeSidebar() {
  if (sidebarOpen) {
    sidebar.classList.remove('sidebar-responsive');
    sidebarOpen = false;
  }
}

//

async function getPropertyDataFromServer() {
  try {
    const response = await $.ajax({
      url: '../Controller/transactionController.php',
      method: 'GET',
      dataType: 'json',
    });
    console.log(response);

    if (response && response.length > 0) {
      return response;
    } else {
      console.error('No data received from the server.');
      return [];
    }
  } catch (error) {
    console.error('Error fetching data:', error);
    return [];
  }
}

function calculateTotalRevenueForMonth(month, propertyData) {
  const transactionsForMonth = propertyData.filter(transaction => {
    const transactionMonth = new Date(transaction.sell_date).getMonth() + 1;
    return transactionMonth === month;
  });

  return transactionsForMonth.reduce((totalRevenue, transaction) => {
    const expenses = transaction.expenses || {};
    
    // default 
    const agentFee = expenses.agent_fee || 0;
    const legalFees = expenses.legal_fees || 0;
    const propertyInspection = expenses.property_inspection || 0;

    const totalExpenses = agentFee + legalFees + propertyInspection;
    totalRevenue = ((transaction.purchase_price - transaction.selling_price)-totalExpenses);

    return totalRevenue;
  }, 0);
}

$(document).ready(async () => {
  const propertyData = await getPropertyDataFromServer();
  console.log(propertyData);

  const chartData = {
    labels: ['January', 'February', 'March', 'April', 'May'],
    series: [],
  };

  chartData.labels.forEach((month, index) => {
    const totalRevenueForMonth = calculateTotalRevenueForMonth(index + 1, propertyData);
    chartData.series.push(totalRevenueForMonth);
  });

  const barChartOptions = {
    series: [{ data: chartData.series }],
    chart: {
      type: 'bar',
      height: 350,
    },
    plotOptions: {
      bar: {
        columnWidth: '50%',
      },
    },
    xaxis: {
      categories: chartData.labels,
      labels: {
        rotate: -45, 
      },
    },
    yaxis: {
      title: {
        text: 'Income in Taka',
        style: {
          color: '#f5f7ff',
        },
      },
      labels: {
        style: {
          colors: '#f5f7ff',
        },
      },
    },
  };

  // Render the bar chart
  const barChart = new ApexCharts(document.querySelector('#bar-chart'), barChartOptions);
  barChart.render();
});



/*AREA CHART
const areaChartOptions = {
  series: [
    {
      name: 'Purchase',
      data: [31, 40, 28, 51, 42, 109, 100],
    },
    {
      name: 'Sales Orders',
      data: [11, 32, 45, 32, 34, 52, 41],
    },
  ],
  chart: {
    type: 'area',
    background: 'transparent',
    height: 350,
    stacked: false,
    toolbar: {
      show: false,
    },
  },
  colors: ['#00ab57', '#d50000'],
  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
  dataLabels: {
    enabled: false,
  },
  fill: {
    gradient: {
      opacityFrom: 0.4,
      opacityTo: 0.1,
      shadeIntensity: 1,
      stops: [0, 100],
      type: 'vertical',
    },
    type: 'gradient',
  },
  grid: {
    borderColor: '#55596e',
    yaxis: {
      lines: {
        show: true,
      },
    },
    xaxis: {
      lines: {
        show: true,
      },
    },
  },
  legend: {
    labels: {
      colors: '#f5f7ff',
    },
    show: true,
    position: 'top',
  },
  markers: {
    size: 6,
    strokeColors: '#1b2635',
    strokeWidth: 3,
  },
  stroke: {
    curve: 'smooth',
  },
  xaxis: {
    axisBorder: {
      color: '#55596e',
      show: true,
    },
    axisTicks: {
      color: '#55596e',
      show: true,
    },
    labels: {
      offsetY: 5,
      style: {
        colors: '#f5f7ff',
      },
    },
  },
  yaxis: [
    {
      title: {
        text: 'Property',
        style: {
          color: '#f5f7ff',
        },
      },
      labels: {
        style: {
          colors: ['#f5f7ff'],
        },
      },
    },
    {
      opposite: true,
      title: {
        text: 'Property Sell',
        style: {
          color: '#f5f7ff',
        },
      },
      labels: {
        style: {
          colors: ['#f5f7ff'],
        },
      },
    },
  ],
  tooltip: {
    shared: true,
    intersect: false,
    theme: 'dark',
  },
};

const areaChart = new ApexCharts(document.querySelector('#area-chart'), areaChartOptions);
areaChart.render();
*/
