@foreach($items as $item)
    @php($padding = 0)
    @include('tree_files.compliance_table',['padding' => $padding])
@endforeach
