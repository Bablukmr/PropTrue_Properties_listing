@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sell Property Enquiries</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Sell Enquiries</li>
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
                                <a href="{{ route('admin.property.sell.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Add New Enquiry
                                </a>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Property Type</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($enquiries as $enquiry)
                                            <tr>
                                                <td>{{ $enquiry->id }}</td>
                                                <td>{{ $enquiry->name }}</td>
                                                <td>{{ $enquiry->mobile }}</td>
                                                <td>{{ $enquiry->property_type }}</td>
                                                <td>{{ $enquiry->price ? '₹' . number_format($enquiry->price) : 'N/A' }}</td>
                                                <td>
                                                    <span class="badge
                                                        {{ $enquiry->status == 'pending' ? 'bg-warning' :
                                                           ($enquiry->status == 'contacted' ? 'bg-primary' : 'bg-success') }}">
                                                        {{ ucfirst($enquiry->status) }}
                                                    </span>
                                                </td>
                                                <td>{{ $enquiry->created_at->format('d M Y') }}</td>
                                                <td>
                                                    <a href="{{ route('admin.property.sell.show', $enquiry->id) }}"
                                                       class="btn btn-sm btn-info" title="View">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.property.sell.edit', $enquiry->id) }}"
                                                       class="btn btn-sm btn-primary" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.property.sell.destroy', $enquiry->id) }}"
                                                          method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                                title="Delete" onclick="return confirm('Are you sure?')">
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

@section('extraJs')
    <!-- DataTables -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
