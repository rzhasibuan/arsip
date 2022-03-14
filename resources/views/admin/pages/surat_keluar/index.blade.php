@extends('admin.templates.default')

{{--style datatable--}}
@section('style_datatable')
    <link rel="stylesheet" href="{{asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')
    <div class="box table-responsive no-padding">
        <div class="box-body">
            <a href="{{route('admin.surat_keluar.create')}}" class="btn btn-primary btn-sm" style="margin-bottom: 10px">
                <i class="fa fa-pencil-square-o"></i> Arsip Surat Keluar</button>
            </a>

            @if (session('message'))
                <x-alert :type="session('type')" :message="session('message')" />
            @endif


            <table id="arsip_surat1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nomer Surat</th>
                    <th>Penerima</th>
                    <th>View & Share</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach($data as $dt)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{ $dt->nomer_surat }}</td>
                        <td>{{ $dt->penerima }}</td>
                        <td>
                            <a href="{{url('storage/'. $dt->file)}}" class="btn btn-app"><ion-icon name="arrow-down-circle-outline" title="view and download file"></ion-icon></a>
                        </td>
                        <td>
                            <form action="{{route('admin.surat_keluar.destroy',[$dt->id])}}" class="d-inline" onsubmit="return confirm('Apakah anda ingin menghapus ini secara permanen ?')" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-app">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
@endsection

{{--script datatable--}}
@section('js_datatable')
    <script src="{{asset('assets/bower_components/bs-notify/bootstrap-notify.min.js')}}"></script>
    <script src="{{asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script>
        $(function () {
            $('#arsip_surat1').DataTable()
            $('#arsip_surat2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWifakh'   : false
            })
        })
    </script>
@endsection
