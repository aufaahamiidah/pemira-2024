@extends('layouts.main2') @section('container_menu')
<!-- pilihan -->
<div class="container px-4 text-center mt-5">
    <div class="decision row gx-5">
        <div class="col">
            <div class="p-3">
                <a href="pemilihan/bem/1" style="text-decoration: none">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h3 class="card-title" style="font-weight: bold;">BEM</h3>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="p-3">
                <a href="pemilihan/bpm/1" style="text-decoration: none">
                  <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h3 class="card-title" style="font-weight: bold;">BPM</h3>
                        </div>
                  </div>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="p-3">
                <a href="pemilihan/hmj/2" style="text-decoration: none;">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h3 class="card-title" style="font-weight: bold;">HIMPUNAN</h3>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
