@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
    <button onclick="history.back()" class="btn btn-secondary mb-2">
        <i class="fas fa-arrow-left"></i> Back to Applications
    </button>
    <h1>Application Details</h1>
</div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{ route('admin.career.joinussubmitionlist') }}">Applications</a></li>
                            <li class="breadcrumb-item active">View</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-primary">
                            @if($application->jobOpening)
                                <div class="card-header">
                                    <h3 class="card-title">Application for {{ $application->jobOpening->title ?? 'N/A' }}</h3>
                                </div>
                            @endif

                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <h4>Applicant Information</h4>
                                        <p><strong>Name:</strong> {{ $application->name ?? 'N/A' }}</p>
                                        <p><strong>Email:</strong> {{ $application->email ?? 'N/A' }}</p>
                                        <p><strong>Phone:</strong> {{ $application->phone ?? 'N/A' }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h4>Application Details</h4>
                                        <p><strong>Status:</strong>
                                            <span class="badge
                                                @if($application->status == 'pending') badge-secondary
                                                @elseif($application->status == 'reviewed') badge-info
                                                @elseif($application->status == 'rejected') badge-danger
                                                @elseif($application->status == 'hired') badge-success @endif">
                                                {{ ucfirst($application->status) ?? 'N/A' }}
                                            </span>
                                        </p>
                                        <p><strong>Applied On:</strong> {{ $application->created_at->format('M d, Y H:i') ?? 'N/A' }}</p>
                                    </div>
                                </div>

                                @if(!empty($application->message))
                                    <div class="mb-4">
                                        <h4>Message</h4>
                                        <p>{{ $application->message }}</p>
                                    </div>
                                @endif

                                @if(!empty($application->resume_path))
                                    <div class="mb-4">
                                        <h4>Resume</h4>
                                        <a href="/{{ $application->resume_path }}" class="btn btn-primary"
                                            download="{{ ($application->name ?? 'applicant') . '_Resume.pdf' }}">
                                            <i class="fas fa-download"></i> Download Resume
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Update Status</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.career.application.status', $application->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="reviewed" {{ $application->status == 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                                            <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                            <option value="hired" {{ $application->status == 'hired' ? 'selected' : '' }}>Hired</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Status</button>
                                </form>
                            </div>
                        </div>

                        @if($application->jobOpening)
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Job Details</h3>
                            </div>
                            <div class="card-body">
                                <p><strong>Title:</strong> {{ $application->jobOpening->title ?? 'N/A' }}</p>
                                <p><strong>Department:</strong> {{ $application->jobOpening->department ?? 'N/A' }}</p>
                                <p><strong>Type:</strong> {{ $application->jobOpening->job_type ?? 'N/A' }}</p>
                                <p><strong>Posted:</strong> {{ $application->jobOpening->created_at->format('M d, Y') ?? 'N/A' }}</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
