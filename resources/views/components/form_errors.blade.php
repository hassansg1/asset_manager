@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ rec_id_replacer($error) }}</li>
            @endforeach
        </ul>
    </div>
@endif
