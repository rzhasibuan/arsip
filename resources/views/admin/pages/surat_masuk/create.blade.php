@extends('admin.templates.default')
@section('style_datatable')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('assets/bower_components/select2/dist/css/select2.min.css')}}">

@endsection

@section('content')
    <div class="box box-primary">
        <form action="{{route('admin.surat_masuk.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="box-body">

                <div class="form-group">
                    <label for="judul_surat">Judul surat</label>
                    <input type="text"
                           class="form-control @error('judul_surat') is-invalid @enderror"
                           id="judul_surat"
                           placeholder="Judul surat"
                           name="judul_surat"
                           value="{{old('judul_surat')}}">
                    @error('judul_surat')
                    <div class="has-error">
                        <span class="help-block">
                            {{ $message }}
                        </span>
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="asal_surat">Asal surat</label>
                    <select name="asal_surat" id="asal_surat" class="form-control @error('asal_surat') is-invalid @enderror">
                        <option value="dinas">Dinas</option>
                        <option value="sekolah">Sekolah</option>
                        <option value="lainnya">Lainnya</option>
                    </select>

                    @error('asal_surat')
                    <div class="has-error">
                        <span class="help-block">
                            {{$message}}s
                        </span>
                    </div>
                    @enderror
                </div>


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
                    <input type="file" class="form-control @error('file') is-invalid @enderror " id="file" name="file">
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
                    <label for="pengirim_surat">Pengirim surat</label>
                    <input type="text"
                           class="form-control @error('pengirim_surat') is-invalid @enderror"
                           id="pengirim_surat"
                           placeholder="Pengirim surat"
                           name="pengirim_surat"
                           value="{{old('pengirim_surat')}}">
                    @error('pengirim_surat')
                    <div class="has-error">
                        <span class="help-block">
                            {{ $message }}
                        </span>
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tanggal_surat">Tanggal masuk surat </label>
                    <input type="date"
                           class="form-control @error('tanggal_surat') is-invalid @enderror"
                           id="tanggal_surat"
                           name="tanggal_surat"
                           value="{{old('tanggal_surat')}}">
                    @error('tanggal_surat')
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
                <a href="{{route('admin.surat_masuk.index')}}" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
@endsection

