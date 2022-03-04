@extends('admin.templates.default')
@section('style_datatable')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('assets/bower_components/select2/dist/css/select2.min.css')}}">

@endsection

@section('content')
    <div class="box box-primary">
        <form action="{{route('admin.gejala.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="box-body">

                <div class="form-group">
                    <label for="kode_rule">Kode</label>
                    <input type="text"
                           class="form-control @error('kode') is-invalid @enderror"
                           id="kode_rule"
                           placeholder="kode"
                           name="kode_rule"
                           value="{{old('kode_rule')}}">
                    @error('kode_rule')
                    <div class="has-error">
                        <span class="help-block">
                            {{ $message }}
                        </span>
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama_rule">Name Symptom / Nama Gejala</label>
                    <input type="text"
                           class="form-control @error('nama_rule') is-invalid @enderror"
                           id="nama_rule"
                           placeholder="name symptom / Nama gejala"
                           name="nama_rule"
                           value="{{old('nama_rule')}}">
                    @error('nama_rule')
                    <div class="has-error">
                        <span class="help-block">
                            {{ $message }}
                        </span>
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nilai_md">Value / Bobot</label>
                    <input type="text"
                           class="form-control @error('nilai_md') is-invalid @enderror"
                           id="nilai_md"
                           placeholder="Value / Bobot"
                           name="nilai_md"
                           value="{{old('nilai_md')}}">
                    @error('nilai_md')
                    <div class="has-error">
                        <span class="help-block">
                            {{ $message }}
                        </span>
                    </div>
                    @enderror
                </div>

            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save </button>
                <a href="{{route('admin.gejala.index')}}" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
@endsection

