@extends('layouts.main2')
<main>
    @section('container_menu')
    <div class="title my-5">
        <h5 style="font-weight: bold; text-align: center;">CALON PRESIDEN DAN WAKIL PRESIDEN MAHASISWA</h5>
    </div>
    <form action="{{route('submitBEM')}}" method="post">
        @csrf
        <div class="decision row gx-5">
            @foreach($bem as $x)
            <div class="col">
                <div class="p-3">
                    <div class="form-check card calon-kahim">
                        <h5 class="card-header text-center font-weight-bold">{{$x->no_urut}}</h5>
                        <div class="row">
                            <div class="col">
                                <img src="{{$x->foto_ketua}}" alt="foto_ketua">
                                <h5 class="card-title">{{$x->nama_ketua}}</h5>
                            </div>
                            <div class="col">
                                <img src="{{$x->foto_wakil}}" alt="foto_wakil">
                                <h5 class="card-title">{{$x->nama_wakil}}</h5>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <label for="bem{{$x->id}}">
                                <hr>
                                <h6 class="card-text">Visi</h6>
                                <p class="card-text">{{$x->visi}}</p>
                                <h6 class="card-text">Misi</h6>
                                <p class="card-text">{{$x->misi}}</p>
                            </label><input class="form-check-input" type="radio" name="bem" id="bem{{$x->id}}"
                                value="{{$x->id}}">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    @endsection

</main>