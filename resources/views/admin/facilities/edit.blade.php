@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit {{ ucfirst($facility->type) }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.facilities.index', ['type' => $facility->type]) }}">{{ ucfirst($facility->type) }}s</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <form action="{{ route('admin.facilities.update', $facility) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="type" value="{{ $facility->type }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           value="{{ old('name', $facility->name) }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="icon">Icon</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i id="iconPreview" class="{{ $facility->icon }}"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="icon" name="icon"
                                               value="{{ old('icon', $facility->icon) }}" required>
                                    </div>
                                    <small class="text-muted">Use Font Awesome icon classes (e.g. fas fa-swimming-pool)</small>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="is_active"
                                               name="is_active" {{ $facility->is_active ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="is_active">Active</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('admin.facilities.index', ['type' => $facility->type]) }}"
                                   class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Font Awesome Icons</h3>
                        </div>
                        <div class="card-body">
                            <p>Browse icons at <a href="https://fontawesome.com/icons" target="_blank">Font Awesome</a></p>
                            <p>Common icons:</p>
                            <ul class="list-unstyled">
                                <li><i class="fas fa-swimming-pool"></i> fas fa-swimming-pool</li>
                                <li><i class="fas fa-dumbbell"></i> fas fa-dumbbell</li>
                                <li><i class="fas fa-car"></i> fas fa-car</li>
                                <li><i class="fas fa-wifi"></i> fas fa-wifi</li>
                                <li><i class="fas fa-tv"></i> fas fa-tv</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    document.getElementById('icon').addEventListener('input', function() {
        document.getElementById('iconPreview').className = this.value;
    });
</script>
@endsection
