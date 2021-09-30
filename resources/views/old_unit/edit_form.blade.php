<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                @foreach($items as $item)
                    <form method="post" enctype="multipart/form-data" action="{{ route($route.'.update',$item->id) }}">
                        @method('put')
                        @include($route.'.form')
                        @include('components.edit_form_submit_btns')
                    </form>
                    <br>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>

