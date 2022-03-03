@foreach($items as $item)
    @php($padding = 10)
    @include('tree_files.applicable_clause_table',['padding' => $padding])
@endforeach
