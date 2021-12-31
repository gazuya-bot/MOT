@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{asset('css/add_adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/add_style.css')}}">
@stop

@section('title', '売上管理')

@section('page_name','売上管理')


@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-body">
            <div class="card-body inbox-size">
                <table id="example1" class="table">
                    <thead>
                        <tr>
                            <th>日時</th>
                            <th>事業所名</th>
                            <th>売上</th>
                            <th>支払い金額</th>
                            <th>支払いポイント</th>
                            <th>獲得ポイント</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($points as $point)
                        <tr class="">
                            <td>{{ $point->created_at }}</td>
                            <td>{{ $point->club_name }}</td>
                            <td>{{ $point->sale }} 円</td>
                            <td>{{ $point->pay_cash }} 円</td>
                            <td>{{ $point->pay_point }} pt</td>
                            <td>{{ $point->get_point }} pt</td>

                            <td class="row">
                                <div class="col-sm-6 sale_change">
                                    <a href="{{ url('/price_edit', $point->id) }}" class="">編集</a>
                                </div>
                                <div class="col-sm-6 delete_link">
                                    <a href="{{ url('/price_delete', $point->id) }}" class="delete_link">削除</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

@stop

@section('js')
<script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js" ></script>
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
    var barlabel = <?php echo json_encode($label); ?>;
    var sum_sales = <?php echo json_encode($sum_sales); ?>;

    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": true,
            'language': {
                'url': "https://cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Japanese.json"
            },

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });

</script>
@stop