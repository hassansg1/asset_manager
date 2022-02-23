<option value="">Select IP Address</option>
@for($i = $start_ip; $i<= $end_ip ; $i++)
    <option
        {{ in_array(($startingAddress.'.'.$i),$usedIpAddress) ? 'disabled' : '' }}
        {{ $ipAddress == ($startingAddress.'.'.$i) ? 'selected' :'' }}
        value="{{ $startingAddress.'.'.$i }}">
        {{ $startingAddress.'.'.$i }}
        {{ in_array(($startingAddress.'.'.$i),$usedIpAddress) ? '(Already in use)' : '' }}
    </option>
@endfor
