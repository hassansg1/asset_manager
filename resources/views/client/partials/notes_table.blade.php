@foreach($items as $item)
    <div class="row">
        <div class="col-sm-4">
            <h5 class="font-size-15 text-truncate">{{ universalDateFormatter($item->created_at) }}</h5>
            <h6 class="text-muted mb-0 text-truncate">{{ $item->notes_content }}</h6>
            <button onclick="editNote('{{ $item->id }}','{{ route('notes.show',$item->id) }}')" title="Edit" type="button"
                    class="btn btn-light btn-form btn-no-color dropdown-toggle">
                <i class="fas fa-edit"></i>
            </button>
            <button onclick="if(confirm('Are you sure you want to delete?')) deleteNote('{{ $item->id }}')"
                    title="Delete" type="button" class="btn btn-light btn-form btn-no-color dropdown-toggle" s>
                <i class="fas fa-trash-alt"></i>
            </button>
        </div>
    </div>
    <br>
    <br>
    <br>
@endforeach
