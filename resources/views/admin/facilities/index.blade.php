@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ ucfirst($type) }} Facilities</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Facilities</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <div class="btn-group">
                                    <a href="{{ route('admin.facilities.index', ['type' => 'amenity']) }}"
                                       class="btn {{ $type === 'amenity' ? 'btn-primary' : 'btn-outline-primary' }}">
                                        Amenities
                                    </a>
                                    <a href="{{ route('admin.facilities.index', ['type' => 'feature']) }}"
                                       class="btn {{ $type === 'feature' ? 'btn-primary' : 'btn-outline-primary' }}">
                                        Features
                                    </a>
                                </div>
                                <a href="{{ route('admin.facilities.create', ['type' => $type]) }}"
                                   class="btn btn-success">
                                    <i class="fas fa-plus"></i> Add New
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Icon</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($facilities as $facility)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $facility->name }}</td>
                                        <td><i class="{{ $facility->icon }}"></i> {{ $facility->icon }}</td>
                                        <td>
                                            <form action="{{ route('admin.facilities.toggleStatus', $facility) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-{{ $facility->is_active ? 'success' : 'danger' }}">
                                                    {{ $facility->is_active ? 'Active' : 'Inactive' }}
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.facilities.edit', $facility) }}"
                                               class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.facilities.destroy', $facility) }}"
                                                  method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
