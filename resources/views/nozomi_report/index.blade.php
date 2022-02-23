@extends('layouts.master')

@section('title') Nozomi Report @endsection

@section('content')
    @include('components.form_errors')
    @include('nozomi_report.fetch_data')
    @include('nozomi_report.content')
@endsection
@section('script')
    <script>
        $(document).ready(function (){
            var table = $('#nozomi_table').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis'],
            });
            table.buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
