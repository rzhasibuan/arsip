@extends('admin.templates.default')

@section('content')
    <div class="box box-success no-padding">
        @if (session('hasil'))
            <div class="box-body">
               Hasil diagnosa anda {{session('hasil')}}
                <br>
                <button class="btn btn-primary">Simpan</button>
            </div>
        @else
        <div class="box-body">
            <h3 style="text-align: center">Jawablah Pertanyaan-pertanyaan yang di ajukan oleh pakar dibawah ini</h3>
            <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                @php
                $i = 1;
                @endphp
                <form action="{{route('diagnosa.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                @foreach($gejala as $g)
                <div class="item">
                    <img src="https://ui-avatars.com/api/?name=pakar&color=7F9CF5&background=EBF4FF" alt="user image" class="online">

                    <p class="message">
                        <a href="#" class="name">
{{--                            <small class="text-muted pull-right">{{date('d, M y')}}</small>--}}
                            Pakar
                        </a>
                        Apakah anda {{$g->nama_rule}} ?
                    </p>

                        <div class="pull-right">
                            <label for="jawaban">Pilih Jawaban anda</label>
                            <input type="hidden" name="kode_rule[]" value="{{$g->kode_rule}}">
                            <select name="persentase_user[]" id="persentase_user[]" class="form-control">
                                <option value=0>tidak</option>
                                <option value=0.2>tidak tahu</option>
                                <option value=0.4>mungkin</option>
                                <option value=0.6>kemungkinan besar</option>
                                <option value=0.8>hampir pasti</option>
                                <option value=1>pasti</option>
                            </select>
                        </div>
                </div>
                @endforeach
                    <div class="pull-left">
                        <button class="btn btn-primary">Diagnosa</button>
                    </div>
                </form>

            </div>
        </div>
        @endif

    </div>
@endsection
