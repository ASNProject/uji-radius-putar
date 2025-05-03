@extends('layouts.app', ['title' => 'Home'])

@section('content')
<main>
  <div class="container mt-4">
    <h1 class="display-5 fw-bold">Hi, {{ auth()->user()->name }}</h1>
    <p class="lead">Berikut adalah data radius terbaru:</p>

    {{-- CARD UNTUK DATA RADIUS TERAKHIR --}}
    <div class="card shadow-sm border-primary mb-4">
      <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Data Radius Terbaru</h5>
      </div>
      <div class="card-body">
        <ul class="list-group list-group-flush" id="latest-radius">
          <li class="list-group-item d-flex justify-content-between">
            <strong>Mode:</strong> <span id="mode" class="fw-bold"></span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <strong>Mode Perhitungan:</strong> <span id="calcMode" class="fw-bold"></span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <strong>Radius:</strong> <span id="radius" class="fw-bold"></span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <strong>Hasil:</strong> <span id="result" class="fw-bold"></span>
          </li>
        </ul>
      </div>      
    </div>

    {{-- CHART --}}
    <div class="card shadow-sm" style="margin-bottom: 20px">
      <div class="card-header bg-success text-white">
        <h5 class="mb-0">Grafik Radius (Waktu)</h5>
      </div>
      <div class="card-body">
        <canvas id="myChart"></canvas>
      </div>
    </div>
  </div>


  {{-- CSS --}}
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <!-- Tambahkan Raphael.js terlebih dahulu -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.3.0/raphael.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    function fetchRadius() {
        $.ajax({
            url: "{{ url('api/radius/latest') }}",
            method: 'GET',
            success: function(data) {
                var mode = data.data.mode;
                var calcMode = data.data.calcMode;
                var radius = data.data.radius;
                var result = data.data.result;

                $('#mode').text(mode);
                $('#calcMode').text(calcMode);
                $('#radius').text(radius);
                $('#result').text(result);

            }, 
            error: function(err) {
                console.error('Error fetching data', err);
            }
        });
    }

    setInterval(fetchRadius, 1000);
    fetchRadius();
  </script>

  {{-- Script Chart --}}
  <script>
    // Fetch data dari API
    fetch('/api/radius/chart')
    .then(response => response.json())
    .then(response => {
        const data = response.data; // ✅ Akses array-nya

        const labels = data.map(item => item.timestamp);
        const radiusData = data.map(item => item.radius);

        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Radius',
                        data: radiusData,
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 2,
                        fill: false
                    },
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    })
    .catch(error => console.error('Error:', error));


</script>
</main>
@endsection
