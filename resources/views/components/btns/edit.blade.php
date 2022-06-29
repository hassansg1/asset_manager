{{--<button--}}
{{--    href='{{ route($route.".edit",$item->id) }}' title="Edit" type="button"--}}
{{--    class="btn btn-light btn-form btn-no-color dropdown-toggle btn_edit_row" data-bs-toggle="dropdown"--}}
{{--    aria-haspopup="true"--}}
{{--    aria-expanded="false">--}}
{{--    <i class="fas fa-edit"></i>--}}
{{--</button>--}}
<button class="btn-form btn-no-color dropdown-toggle btn_edit_row" style="display: {{ isset($onlyView) && $onlyView == 1 ? 'none' : 'inline' }}" title="Edit">
    <a href="{{  route($route.".edit",$item->id) }}" class="btn-no-color btn-default">
        <i class="fas fa-edit"></i>
    </a>
</button>
