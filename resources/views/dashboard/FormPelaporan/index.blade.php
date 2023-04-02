@extends('dashboard.layout.main')
@Section('tittle')
<title> Sisda | Item </title>
@Section('container')

<div class="row justify-conten-center">
    <div class="col-md-12">
        <div class="card mt-2">
            <h5> Laporan</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row justify-content-end gx-2">
                            <div class="col-mt-3 col-sm-12">
                                {{-- {!! form::text('q',['class'=>'form-control','placeholder' =>'pencarian data siswa']) !!} --}}
                                <input type="datetime" name="" id="">
                            </div>
                        </div>
                        <div class="col-md-1 col-sm-12">
                            <button class="btn btn-primary" type="sumbit">Sumbit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection