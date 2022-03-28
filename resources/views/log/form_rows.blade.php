@foreach($items as $item)
    <tr id="{{ $item->id }}">
        <td>{{ explode('\\',$item->model)[2] }}</td>
        <td>{{ $item->recId() ?? '' }}</td>
        <td>{{ $item->reason }}</td>
        <td>
            @if($item->descriptionItems())
                @foreach($item->descriptionItems() as $key => $value)
                    @if($key != 'updated_at')
                        {{ $key }} :
                        @if(isset($item->old()->{$key}))
                            <strong>{{ $item->old()->{$key} }}</strong>  =>
                        @endif
                        <strong>{{ $value }}</strong>
                    @endif
                    <br>
                @endforeach
            @endif
        </td>
        <td>{{ $item->user->name }}</td>
        <td>
            {{ universalDateFormatter($item->updated_at) }}
        </td>
    </tr>
@endforeach
