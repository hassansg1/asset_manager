@foreach($items as $item)
    @php($padding = 0)
    @include('tree_files.clause_table',['padding' => $padding])
@endforeach

