@foreach(getAllParents() as $parent)
    @php
        $classString = '';
    @endphp
    @if($parent->getSelfName())
        @php($class = 'level_'.$parent->combine_name)
        @include('tree_files.'.$file, ['parent' => $parent,'level' => 0,'class' => $class,'classString' => $classString ])
    @endif
@endforeach
