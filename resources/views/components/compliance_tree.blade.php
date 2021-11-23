@foreach($items as $item)
    @include('tree_files.compliance_table', ['parent' => $parent,'level' => 0,'class' => $class,'classString' => $classString ])
@endforeach
