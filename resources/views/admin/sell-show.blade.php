@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Property Enquiry Details</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.property.sell') }}">Sell Enquiries</a></li>
                            <li class="breadcrumb-item active">Details</li>
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
                            <div class="card-header">
                                <h3 class="card-title">Basic Information</h3>
                            </div>
                            <div class="card-body">
                                <p><strong>Name:</strong> {{ $enquiry->name }}</p>
                                <p><strong>Mobile:</strong> {{ $enquiry->mobile }}</p>
                                <p><strong>Email:</strong> {{ $enquiry->email ?? 'N/A' }}</p>
                                <p><strong>Status:</strong>
                                    <span
                                        class="badge
                                        {{ $enquiry->status == 'pending'
                                            ? 'bg-warning'
                                            : ($enquiry->status == 'contacted'
                                                ? 'bg-primary'
                                                : 'bg-success') }}">
                                        {{ ucfirst($enquiry->status) }}
                                    </span>
                                </p>
                                <p><strong>Submitted:</strong> {{ $enquiry->created_at->format('d M Y, h:i A') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Property Details</h3>
                            </div>
                            <div class="card-body">
                                <p><strong>Type:</strong> {{ $enquiry->property_type }}</p>
                                <p><strong>Address:</strong> {{ $enquiry->address }}</p>
                                <p><strong>Bedrooms:</strong> {{ $enquiry->bedrooms ?? 'N/A' }}</p>
                                <p><strong>Bathrooms:</strong> {{ $enquiry->bathrooms ?? 'N/A' }}</p>
                                <p><strong>Area:</strong> {{ $enquiry->area ? $enquiry->area . ' sq ft' : 'N/A' }}</p>
                                <p><strong>Price:</strong>
                                    {{ $enquiry->price ? '₹' . number_format($enquiry->price) : 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Description & Images</h3>
                            </div>
                            <div class="card-body">
                                <p><strong>Description:</strong></p>
                                <p>{{ $enquiry->description ?? 'No description provided' }}</p>

                                @if ($enquiry->message)
                                    <p><strong>Message:</strong></p>
                                    <p>{{ $enquiry->message }}</p>
                                @endif

                                @if ($enquiry->images)
                                    <div class="mt-4">
                                        <h5>Property Images</h5>
                                        <div class="row">
                                            @foreach ($enquiry->images as $index => $image)
                                                <div class="col-md-3 mb-3">
                                                    <div class="position-relative">
                                                        <img src="{{ asset($image) }}" alt="Property Image"
                                                            class="img-fluid img-thumbnail">
                                                        <a href="{{ route('admin.property.sell.deleteImage', ['enquiry' => $enquiry->id, 'imageIndex' => $index]) }}"
                                                            class="btn btn-danger btn-xs position-absolute"
                                                            style="top: 5px; right: 5px;"
                                                            onclick="return confirm('Are you sure you want to delete this image?')">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
