@include('components.form_errors')
{{ csrf_field() }}


<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label >Select Approver</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                <option value="">Search by Name</option>
                                <optgroup label="Approvers">
                                    @foreach(getUsers() as $row)
                                        <option value="{{ $row->id }}" {{ isset($item) && $item->user_id == $row->id  ? 'selected' : ''}}>{{ $row->username }}</option>
                                    @endforeach
                                </optgroup>
                            </select>

                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
