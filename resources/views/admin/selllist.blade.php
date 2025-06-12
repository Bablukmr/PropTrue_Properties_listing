@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $title ?? 'Properties List' }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Properties List</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header w-100 d-flex justify-content-between align-items-center">
                                <h3 class="card-title mb-0">List</h3>
                               @if($title == 'Sell Enquiries')
                                <a href="{{ route('admin.property.sell.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Add New Enquiry
                                </a>
                                @endif
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
                                        @forelse($enquiries as $enquiry)
                                            <tr>
                                                <td>{{ $enquiry->id }}</td>
                                                <td>{{ $enquiry->name ?? 'N/A' }}</td>
                                                <td>{{ $enquiry->mobile ?? 'N/A' }}</td>
                                                <td>{{ $enquiry->property_type ?? 'N/A' }}</td>
                                                <td>{{ $enquiry->price ? '₹' . number_format($enquiry->price) : 'N/A' }}</td>
                                                <td>
                                                    <span class="badge
                                                        {{ $enquiry->status == 'pending' ? 'bg-warning' :
                                                           ($enquiry->status == 'contacted' ? 'bg-primary' : 'bg-success') }}">
                                                        {{ ucfirst($enquiry->status ?? 'N/A') }}
                                                    </span>
                                                </td>
                                                <td>{{ $enquiry->created_at ? $enquiry->created_at->format('d M Y') : 'N/A' }}</td>
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
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center">No enquiries found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                    <tfoot>
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
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('extraCss')
   <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('extraJs')
    <!-- DataTables  & Plugins -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "lengthMenu": [[20, 50, 100, 300, 800, 1000], [20, 50, 100, 300, 800, 1000]],
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            "order": [], // Disable initial sorting
            "columnDefs": [
                { "orderable": false, "targets": [7] } // Make actions column non-orderable
            ],
            "initComplete": function() {
                // Add buttons to the DOM after table initialization
                this.api().buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            }
        });
    });
    </script>
@endsection
