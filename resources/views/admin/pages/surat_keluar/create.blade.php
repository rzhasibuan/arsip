@extends('admin.templates.default')
@section('style_datatable')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('assets/bower_components/select2/dist/css/select2.min.css')}}">

@endsection

@section('content')
    <div class="box box-primary">
        <form action="{{route('admin.surat_keluar.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="box-body">

                <div class="form-group">
                    <label for="nomer_surat">Nomer surat</label>
                    <input type="text"
                           class="form-control @error('nomer_surat') is-invalid @enderror"
                           id="nomer_surat"
                           placeholder="Nomer surat"
                           name="nomer_surat"
                           value="{{old('nomer_surat')}}">
                    @error('nomer_surat')
                    <div class="has-error">
                        <span class="help-block">
                            {{ $message }}
                        </span>
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="file">File surat</label>
                    <input type="file" class="form-control @error('file') is-invalid @enderror" id="file" name="file">
                    @error('file')
                    <div class="has-error">
                        <span class="help-block">
                            {{ $message }}
                        </span>
                    </div>
                    @enderror

                    <div class="info mt-2">
                        <small class="text-bold">&nbsp;nb: untuk file surat tidak boleh lebih dari 1MB</small>
                    </div>
                </div>


                <div class="form-group">
                    <label for="pernerima_surat">Penerima</label>
                    <input type="text"
                           class="form-control @error('penerima_surat') is-invalid @enderror"
                           id="penerima_surat"
                           placeholder="Penerima surat"
                           name="penerima_surat"
                           value="{{old('penerima_surat')}}">
                    @error('penerima_surat')
                    <div class="has-error">
                        <span class="help-block">
                            {{ $message }}
                        </span>
                    </div>
                    @enderror
                </div>

            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Arsip Surat</button>
                <a href="{{route('admin.surat_keluar.index')}}" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
@endsection

