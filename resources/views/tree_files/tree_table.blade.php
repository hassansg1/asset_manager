<?php
$nodes = \App\Models\Location::get()->toTree();
$depth = 0;
$traverse = function ($categories, $prefix = '&nbsp') use (&$traverse, $depth) {
foreach ($categories as $category) {
?>
<tr
    data-hierarchy="">
    <td>
        {!! $prefix !!}
        <input data-rand=""
               class="form-check-input location_check " name="location[]"
               value="{{ $category->id }}"
               type="checkbox" id="formCheck">
        <label class="form-check-label" for="formCheck">

            {{$category->text}}
        </label>
    </td>
    <?php
    foreach (getAllPossibleChildTablesOfParent() as $objType) {
    ?>
    <td>
        <input data-rand="" data-type="View{{$category->type}}"
               class="View{{$category->type}} form-check-input permission_check  "
               name="permissions[]"
               type="checkbox"
               value="{{ 'view'.$objType }}"
            {{--                        {{ permissionExist('view'.$objType) && $item->hasPermissionTo('view'.$objType) ? 'checked' :'' }}--}}
        >
        <label class="form-check-label">View</label>

        <input data-rand="" data-type="Create{{$category->type}}"
               class="Create{{$category->type}} form-check-input permission_check  "
               name="permissions[]" type="checkbox"
               {{--                           {{ permissionExist('create'.$objType) && $item->hasPermissionTo('create'.$objType) ? 'checked' :'' }}--}}
               value="{{ 'create'.$objType }}">
        <label class="form-check-label">Create</label>

        <input data-rand="" data-type="Edit{{$category->type}}"
               class="Edit{{$category->type}} form-check-input permission_check  "
               name="permissions[]" type="checkbox"
               {{--                           {{ permissionExist('edit'.$objType) && $item->hasPermissionTo('edit'.$objType) ? 'checked' :'' }}--}}
               value="{{ 'edit'.$objType }}">
        <label class="form-check-label">Edit</label>

        <input data-rand="" data-type="Delete{{$category->type}}"
               class="Delete{{$category->type}} form-check-input permission_check  "
               name="permissions[]" type="checkbox"
               {{--                           {{ permissionExist('delete'.$objType) && $item->hasPermissionTo('delete'.$objType) ? 'checked' :'' }}--}}
               value="{{ 'delete'.$objType }}">
        <label class="form-check-label">Delete</label>
    </td>

    <?php
    }
    ?>
</tr>

<?php
$depth++;
if ($depth < 2)
    $traverse($category->children, $prefix . '&nbsp&nbsp');
}
};

$traverse($nodes);
?>

{{--@php($rand = rand(10000,100000))--}}
{{--@if (count($parent->noAssetChilds()) > 0 && $level < 2)--}}
{{--    @foreach($parent->noAssetChilds() as $parent)--}}
{{--        @include('tree_files.tree_table', ['parent' => $parent,'level' => $level+1,'class' => $class.' level_'.$category->id])--}}
{{--    @endforeach--}}
{{--@endif--}}
