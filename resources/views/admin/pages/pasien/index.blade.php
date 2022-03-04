@extends('admin.templates.default')

{{--style datatable--}}
@section('style_datatable')
    <link rel="stylesheet" href="{{asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')
    <div class="box table-responsive no-padding">
        <div class="box-body">
{{--            <a href="{{route('admin.pasien.create')}}" class="btn btn-primary btn-sm" style="margin-bottom: 10px">--}}
{{--                <i class="fa fa-pencil-square-o"></i> Craete patient </button>--}}
{{--            </a>--}}

            @if (session('message'))
                <x-alert :type="session('type')" :message="session('message')" />
            @endif


            <table id="gejala1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>NO</th>
                    <th>NAME</th>
                    <th>GANRE</th>
                    <th>PROFESI</th>
                    <th>PHONE</th>
                    <th>EMAIL</th>
                    <th>STATUS</th>
                    <th>PERSENTASE</th>
                    <th>AKSI</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach($data as $dt)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$dt->name }}</td>
                        <td>{{ $dt->gender }}</td>
                        <td>{{ $dt->profession }}</td>
                        <td>{{ $dt->phone_number }}</td>
                        <td>{{ $dt->email }}</td>
                        <td>{{ $dt->status }}</td>
                        <td>{{ $dt->value }}%</td>
                        <td>
{{--                            <a href="{{ route('admin.pasien.edit',[$dt->id]) }}" class="btn btn-primary btn-sm" style="margin-bottom: 10px;"><i class="fa fa-edit"></i></a>--}}

                            <form action="{{route('admin.pasien.destroy',[$dt->id])}}" class="d-inline" onsubmit="return confirm('Apakah anda ingin menghapus ini secara permanen ?')" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm">
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
            $('#gejala1').DataTable()
            $('#gejala2').DataTable({
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
