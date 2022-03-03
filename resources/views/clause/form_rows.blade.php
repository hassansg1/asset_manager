@foreach($items as $item)
    @php($padding = 5)
    @include('tree_files.clause_table',['padding' => $padding])
@endforeach


