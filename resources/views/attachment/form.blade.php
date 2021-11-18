@include('components.form_errors')
{{ csrf_field() }}

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">{{ $heading }} Information</h4>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}title"
                                   class="form-label">Title</label>
                            <input type="text" value="{{ isset($item) ? $item->title:old('title') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}title"
                                   name="title">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}list"
                                   class="form-label">Document Number</label>
                            <input type="text" value="{{ isset($item) ? $item->documentNumber:old('documentNumber') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}documentNumber"
                                   name="documentNumber">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}version"
                                   class="form-label">Version</label>
                            <input type="text" value="{{ isset($item) ? $item->version:old('version') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}version"
                                   name="version">
                        </div>
                    </div>
                    </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}date"
                                   class="form-label">Date</label>
                            <input type="date" value="{{ isset($item) ? $item->date:old('date') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}date"
                                   name="date">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}description"
                                   class="form-label">Description</label>
                            <input type="text" value="{{ isset($item) ? $item->description:old('description') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}description"
                                   name="description">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}category"
                                   class="form-label">Category</label>
                            <input type="text" value="{{ isset($item) ? $item->category:old('category') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}category"
                                   name="category">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}subCategory"
                                   class="form-label">Sub Category</label>
                            <input type="text" value="{{ isset($item) ? $item->subCategory:old('subCategory') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}subCategory"
                                   name="subCategory">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}files"
                                   class="form-label">Description</label>
                            <input type="file"
                                   class="form-control" multiple id="{{ isset($item) ? $item->id:'' }}files"
                                   name="files[]">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
