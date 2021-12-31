@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/add_adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/add_style.css')}}">
@stop

@section('title', '顧客一覧')

@section('page_name','顧客一覧')

@section('content')


@section('content')
    <!-- 顧客一覧 -->

    <div class="row">
        <div class="col-12">
            <div class="card-body">
                <div class="card-body inbox-size">
                    <table id="example1" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>顧客名</th>
                                <th>最終購入日</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($members as $member)
                                <tr data-href="{{ route('detail', ['id'=>$member->id]) }}">
                                    <td>{{ $member->id }}</td>
                                    <td>{{ $member->club_name }}</td>
                                    <td>{{ $member->created_at }}</td>
                                    <td class="row">
                                        <div class="col-md-6 sale_change cliant_change">
                                            <a href="{{ route('edit',['id'=>$member->id]) }}">編集</a>
                                        </div>
                                        <div class="col-md-6 sale_change delete_link">
                                            <a href="{{ route('delete',['id'=>$member->id]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>            
            </div>                           
        </div> 
    </div>






@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script> console.log('Hi!'); </script>

<script src="{{asset('vendor/adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('vendor/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('vendor/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('vendor/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('vendor/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('vendor/adminlte/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('vendor/adminlte/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('vendor/adminlte/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('vendor/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('vendor/adminlte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('vendor/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            'language': {
                'url': "https://cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Japanese.json"
            },

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
@stop