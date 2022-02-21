<option value="">Select IP Address</option>
@for($i = $start_ip; $i<= $end_ip ; $i++)
    <option
        {{ $ipAddress == ($startingAddress.'.'.$i) ? 'selected' :'' }}
        value="{{ $startingAddress.'.'.$i }}">{{ $startingAddress.'.'.$i }}</option>
@endfor
