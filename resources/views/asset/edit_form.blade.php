<div class="row">
    <div class="col-lg-12">
        <form class="item_form" method="post" enctype="multipart/form-data" action="{{ route($route.'.update',$item->id) }}">
            <input type="hidden" name="current_obj_id" id="current_obj_id" value="{{ $item->id }}">
            @method('put')
            @include($route.'.form')
            @include('components.edit_form_submit_btns')
        </form>
        <br>
    </div>
</div>

