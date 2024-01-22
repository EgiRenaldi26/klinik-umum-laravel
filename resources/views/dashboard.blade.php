@extends('layout')
@section('content')
<div class="card mt-3">
  <div class="card-content">
    <div class="row row-group m-0">
      <div class="col-12 col-lg-12 col-xl-12 border-light">
      <div class="marquee-container">
        <br>
        <marquee behavior="scroll" direction="left">
            <h6>Selamat Datang  <strong>{{ Auth::user()->name }}</strong> , Anda login sebagai <strong>{{ Auth::user()->role }}</strong></h6>
        </marquee>
      </div>
      </div>
    </div>
    </div>
  </div>
</div>
    <!--Start Dashboard Content-->
    <div class="card mt-3">
      <div class=" d-flex m-4">
        <button type="submit" class="btn-sm btn-light ml-auto"><i class="fa fa-calender"></i> Today : {{ $todayDetails['dayName'] }}, {{ $todayDate }}</button>
      </div>
        <div class="card-content">
          <div class="row row-group m-0">
            <div class="col-12 col-lg-6 col-xl-3 border-light">
              <div class="card-body">
                <h5 class="text-white mb-0">
                 {{ $p }}
                  <span class="float-right"
                    ><i class="zmdi zmdi-account-circle"></i
                  ></span>
                </h5>
                <div class="progress my-3" style="height: 3px">
                  <div class="progress-bar" style="width: 55%"></div>
                </div>
                <p class="mb-0 text-white small-font">
                  Data Pasien
                  <span class="float-right"
                    ><i class="zmdi zmdi-long-arrow-up"></i
                  ></span>
                </p>
              </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
              <div class="card-body">
                <h5 class="text-white mb-0">
                  {{ $o }}
                  <span class="float-right"><i class="zmdi zmdi-local-pharmacy"></i></span>
                </h5>
                <div class="progress my-3" style="height: 3px">
                  <div class="progress-bar" style="width: 55%"></div>
                </div>
                <p class="mb-0 text-white small-font">
                 Data Obat
                  <span class="float-right"
                    ><i class="zmdi zmdi-long-arrow-up"></i
                  ></span>
                </p>
              </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
              <div class="card-body">
                <h5 class="text-white mb-0">
                 {{ $t }}
                  <span class="float-right"><i class="fa fa-usd"></i></span>
                </h5>
                <div class="progress my-3" style="height: 3px">
                  <div class="progress-bar" style="width: 55%"></div>
                </div>
                <p class="mb-0 text-white small-font">
                 Transaksi
                  <span class="float-right"
                    ><i class="zmdi zmdi-long-arrow-up"></i
                  ></span>
                </p>
              </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
              <div class="card-body">
                <h5 class="text-white mb-0">
                 {{ $r }}
                  <span class="float-right"
                    ><i class="fa fa-bed"></i
                  ></span>
                </h5>
                <div class="progress my-3" style="height: 3px">
                  <div class="progress-bar" style="width: 55%"></div>
                </div>
                <p class="mb-0 text-white small-font">
                 Rawat
                  <span class="float-right"
                    ><i class="zmdi zmdi-long-arrow-up"></i
                  ></span>
                </p>
              </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
              <div class="card-body">
                  <h5 class="text-white mb-0">
                     Rp {{ number_format($income, 2, ',', '.') }}
                      <span class="float-right"><i class="fa fa-usd"></i></span>
                  </h5>
                  <div class="progress my-3" style="height: 3px">
                      <div class="progress-bar" style="width: 55%"></div>
                  </div>
                  <p class="mb-0 text-white small-font">
                      Income
                      <span class="float-right"><i class="zmdi zmdi-long-arrow-up"></i></span>
                  </p>
              </div>
          </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    Income
                    
                </div>
                <div class="card-body">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <i class="fa fa-circle mr-2 text-white"></i>Pemasukan
                        </li>
                    </ul>
                    <div class="chart-container-1">
                        <canvas id="ch"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Add the necessary scripts for Chart.js and your custom chart initialization -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<script>
  // Assuming $incomeData is a collection containing date and income data
  var incomeData = @json($incomeData);

  // Group data by month and sum the income
  var monthlyData = incomeData.reduce(function (acc, curr) {
      var month = new Date(curr.tanggal_transaksi).toLocaleString('default', { month: 'long' });
      acc[month] = (acc[month] || 0) + curr.total_biaya;
      return acc;
  }, {});

  // Extracting month labels and income values
  var labels = Object.keys(monthlyData);
  var incomeValues = Object.values(monthlyData);

  // Chart initialization
  var ctx = document.getElementById('ch').getContext('2d');
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: labels,
          datasets: [{
              label: 'Pemasukan',
              data: incomeValues,
              backgroundColor: 'rgba(75, 192, 192, 0.2)',
              borderColor: 'rgba(75, 192, 192, 1)',
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          },
          layout: {
              padding: {
                  left: 10,
                  right: 10,
                  top: 10,
                  bottom: 10
              }
          },
          plugins: {
              legend: {
                  display: false
              }
          },
          responsive: true,
          maintainAspectRatio: false,
          elements: {
              bar: {
                  barThickness: 20 // Adjust the bar thickness as needed
              }
          }
      }
  });
</script>

@endsection