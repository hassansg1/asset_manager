<option value="">Select IP Address</option>
@for($i = $start_ip; $i<= $end_ip ; $i++)
{{--    @if (in_array($usedIpAddress, $startingAddress.'.'.$i ))--}}
{{--        <option--}}
{{--            value="{{ $startingAddress.'.'.$i }}">{{ $startingAddress.'.'.$i }} Already in Used</option>--}}
{{--    @endif--}}
    <option
        {{ $ipAddress == ($startingAddress.'.'.$i) ? 'selected' :'' }}
        value="{{ $startingAddress.'.'.$i }}">{{ $startingAddress.'.'.$i }}</option>
@endfor
