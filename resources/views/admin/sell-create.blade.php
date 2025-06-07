@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create New Property Enquiry</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.property.sell') }}">Sell Enquiries</a></li>
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <form action="{{ route('admin.property.sell.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Full Name</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                       value="{{ old('name') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="mobile">Mobile Number</label>
                                                <input type="text" class="form-control" id="mobile" name="mobile"
                                                       value="{{ old('mobile') }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email Address</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                               value="{{ old('email') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="property_type">Property Type</label>
                                        <select class="form-control" id="property_type" name="property_type" required>
                                            <option value="">Select Property Type</option>
                                            <option value="house" {{ old('property_type') == 'house' ? 'selected' : '' }}>House</option>
                                            <option value="apartment" {{ old('property_type') == 'apartment' ? 'selected' : '' }}>Apartment</option>
                                            <option value="condo" {{ old('property_type') == 'condo' ? 'selected' : '' }}>Condo</option>
                                            <option value="land" {{ old('property_type') == 'land' ? 'selected' : '' }}>Land</option>
                                            <option value="commercial" {{ old('property_type') == 'commercial' ? 'selected' : '' }}>Commercial</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="address">Property Address</label>
                                        <textarea class="form-control" id="address" name="address" rows="2" required>{{ old('address') }}</textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="bedrooms">Bedrooms</label>
                                                <input type="number" class="form-control" id="bedrooms" name="bedrooms"
                                                       value="{{ old('bedrooms') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="bathrooms">Bathrooms</label>
                                                <input type="number" class="form-control" id="bathrooms" name="bathrooms"
                                                       value="{{ old('bathrooms') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="area">Area (sq ft)</label>
                                                <input type="number" step="0.01" class="form-control" id="area" name="area"
                                                       value="{{ old('area') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="price">Asking Price (₹)</label>
                                                <input type="number" step="0.01" class="form-control" id="price" name="price"
                                                       value="{{ old('price') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Property Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="message">Message/Notes</label>
                                        <textarea class="form-control" id="message" name="message" rows="3">{{ old('message') }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="images">Property Images</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="images" name="images[]" multiple required>
                                            <label class="custom-file-label" for="images">Choose files</label>
                                        </div>
                                        <small class="text-muted">Upload property images (multiple allowed)</small>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit Enquiry</button>
                                    <a href="{{ route('admin.property.sell') }}" class="btn btn-default">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('extraJs')
    <!-- bs-custom-file-input -->
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(function () {
            bsCustomFileInput.init();
        });
    </script>
@endsection
