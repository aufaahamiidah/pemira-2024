@extends('layouts.main')

@section('container')
<h2 class="text-center mt-5 title" style="border-bottom-color: blue;">Dashboard Panitia</h2>
<div class="row mt-4 baris-chart">
    <div class="col-6" style="width: 400px;">
        <canvas id="jmlPemilih"></canvas>
    </div>
    <div class="col-6" style="width: 400px;">
        <canvas id="jmlSuaraSah"></canvas>
    </div>
</div>
    
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="path/to/chartjs/dist/chart.umd.js"></script>
<script>
    const jmlP = document.getElementById('jmlPemilih');
    const jmlSuaraSah = document.getElementById('jmlSuaraSah');

    new Chart(jmlP, {
    type: 'pie',
    data: {
        labels: ['Sudah Memilih', 'Belum Memilih'],
        datasets: [{
        label: 'Jumlah Mahasiswa',
        data: [6000, 243],
        borderWidth: 1,
        backgroundColor:['#36a2eb', '#ff6384']
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
    new Chart(jmlSuaraSah, {
    type: 'pie',
    data: {
        labels: ['Suara Sah', 'Suara Tidak Sah'],
        datasets: [{
        label: 'Jumlah Mahasiswa',
        data: [6000, 243],
        backgroundColor: ['#ffce56', '#cc65fe']
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
</script>
@endsection
