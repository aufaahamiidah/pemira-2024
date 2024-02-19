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
    type: 'doughnut',
    data: {
        labels: ['Sudah Memilih', 'Belum Memilih'],
        datasets: [{
        label: 'Jumlah Mahasiswa',
        data: [{{ $sudah_memilih->count() }}, {{ $belum_memilih->count() }}],
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
    type: 'doughnut',
    data: {
        labels: ['Suara Sah', 'Suara Tidak Sah'],
        datasets: [{
        label: 'Jumlah Mahasiswa',
        data: [{{ $suara_sah->count() }}, {{ $suara_tidak_sah->count() }}],
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