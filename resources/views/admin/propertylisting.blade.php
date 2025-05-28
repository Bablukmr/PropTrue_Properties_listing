@extends('admin.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="background-color: #ffffff;">
        <!-- Content Header (Page header) -->
        <section class="content-header" style="background-color: #48254a; color: #ffffff;">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Property Listing</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#" style="color: #b1b2b1;">Dashboard</a></li>
                            <li class="breadcrumb-item active" style="color: #ffffff;">Add Property</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary" style="border-color: #d33593;">
                            <div class="card-header mt-2 " style="background-color: #48254a; color: #ffffff;">
                                <h3 class="card-title">Property Information</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="#" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Basic Information -->
                                        <div class="col-md-6">
                                            <div class="card card-secondary" style="border-color: #b1b2b1;">
                                                <div class="card-header" style="background-color: #717271; color: #ffffff;">
                                                    <h3 class="card-title">Basic Information</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="title">Property Title*</label>
                                                        <input type="text" class="form-control" id="title"
                                                            name="title" placeholder="e.g. Beautiful 3 BHK Apartment"
                                                            required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="slug">Slug*</label>
                                                        <input type="text" class="form-control" id="slug"
                                                            name="slug" placeholder="e.g. beautiful-3bhk-apartment"
                                                            required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="description">Description*</label>
                                                        <textarea class="form-control text-editor" id="description" name="description" rows="3"
                                                            placeholder="Detailed description of the property" required></textarea>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="property_type">Property Type*</label>
                                                                <select class="form-control" id="property_type"
                                                                    name="property_type" required>
                                                                    <option value="">Select Type</option>
                                                                    <option value="Apartment">Apartment</option>
                                                                    <option value="Villa">Villa</option>
                                                                    <option value="Residential Plot">Residential Plot
                                                                    </option>
                                                                    <option value="Commercial">Commercial</option>
                                                                    <option value="Penthouse">Penthouse</option>
                                                                    <option value="House">House</option>
                                                                    <option value="Condo">Condo</option>
                                                                    <option value="Townhouse">Townhouse</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="listing_type">Listing Type*</label>
                                                                <select class="form-control" id="listing_type"
                                                                    name="listing_type" required>
                                                                    <option value="">Select Type</option>
                                                                    <option value="For Rent">For Rent</option>
                                                                    <option value="For Sale">For Sale</option>
                                                                    <option value="Lease">Lease</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="price">Price*</label>
                                                                <div class="input-group">
                                                                    <input type="number" class="form-control"
                                                                        id="price" name="price"
                                                                        placeholder="e.g. 500000" required>
                                                                    <div class="input-group-append">
                                                                        <select class="form-control" id="price_unit"
                                                                            name="price_unit"
                                                                            style="background-color: #d33593; color: #ffffff;">
                                                                            <option value="₹">₹</option>
                                                                            {{-- <option value="$">$</option>
                                                                            <option value="€">€</option>
                                                                            <option value="£">£</option> --}}
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="security_deposit">Security Deposit</label>
                                                                <input type="number" class="form-control"
                                                                    id="security_deposit" name="security_deposit"
                                                                    placeholder="e.g. 50000">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Location Details -->
                                        <div class="col-md-6">
                                            <div class="card card-secondary" style="border-color: #b1b2b1;">
                                                <div class="card-header"
                                                    style="background-color: #717271; color: #ffffff;">
                                                    <h3 class="card-title">Location Details</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="address">Address*</label>
                                                        <input type="text" class="form-control" id="address"
                                                            name="address" placeholder="Full address" required>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="city">City*</label>
                                                                <input type="text" class="form-control" id="city"
                                                                    name="city" placeholder="City" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="state">State*</label>
                                                                <input type="text" class="form-control" id="state"
                                                                    name="state" placeholder="State" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="zip_code">ZIP Code</label>
                                                                <input type="text" class="form-control" id="zip_code"
                                                                    name="zip_code" placeholder="ZIP/Pincode">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="country">Country</label>
                                                                <input type="text" class="form-control" id="country"
                                                                    name="country" value="India" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="latitude">Latitude</label>
                                                                <input type="text" class="form-control" id="latitude"
                                                                    name="latitude" placeholder="e.g. 28.6139">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="longitude">Longitude</label>
                                                                <input type="text" class="form-control" id="longitude"
                                                                    name="longitude" placeholder="e.g. 77.2090">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="google_map_link">Google Map Link</label>
                                                        <input type="url" class="form-control" id="google_map_link"
                                                            name="google_map_link"
                                                            placeholder="https://maps.google.com/...">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Property Details -->
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="card card-secondary" style="border-color: #b1b2b1;">
                                                <div class="card-header"
                                                    style="background-color: #717271; color: #ffffff;">
                                                    <h3 class="card-title">Property Details</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="bedrooms">Bedrooms</label>
                                                                <input type="number" class="form-control" id="bedrooms"
                                                                    name="bedrooms" placeholder="0">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="bathrooms">Bathrooms</label>
                                                                <input type="number" class="form-control" id="bathrooms"
                                                                    name="bathrooms" placeholder="0">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="balconies">Balconies</label>
                                                                <input type="number" class="form-control" id="balconies"
                                                                    name="balconies" placeholder="0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="floors">Total Floors</label>
                                                                <input type="number" class="form-control" id="floors"
                                                                    name="floors" placeholder="e.g. 10">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="floor_number">Floor Number</label>
                                                                <input type="number" class="form-control"
                                                                    id="floor_number" name="floor_number"
                                                                    placeholder="e.g. 5">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="super_area">Super Area (sq.ft)</label>
                                                                <input type="number" step="0.01" class="form-control"
                                                                    id="super_area" name="super_area"
                                                                    placeholder="e.g. 1200">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="carpet_area">Carpet Area (sq.ft)</label>
                                                                <input type="number" step="0.01" class="form-control"
                                                                    id="carpet_area" name="carpet_area"
                                                                    placeholder="e.g. 1000">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="plot_area">Plot Area (sq.ft)</label>
                                                                <input type="number" step="0.01" class="form-control"
                                                                    id="plot_area" name="plot_area"
                                                                    placeholder="e.g. 2400">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="year_built">Year Built</label>
                                                                <input type="number" class="form-control"
                                                                    id="year_built" name="year_built"
                                                                    placeholder="e.g. 2015">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="age_of_property">Age of Property</label>
                                                                <input type="number" class="form-control"
                                                                    id="age_of_property" name="age_of_property"
                                                                    placeholder="e.g. 5">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Furnishing & Features -->
                                        <div class="col-md-6">
                                            <div class="card card-secondary" style="border-color: #b1b2b1;">
                                                <div class="card-header"
                                                    style="background-color: #717271; color: #ffffff;">
                                                    <h3 class="card-title">Furnishing & Features</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="furnishing">Furnishing</label>
                                                        <select class="form-control" id="furnishing" name="furnishing">
                                                            <option value="">Select Furnishing</option>
                                                            <option value="Fully Furnished">Fully Furnished</option>
                                                            <option value="Semi Furnished">Semi Furnished</option>
                                                            <option value="Unfurnished">Unfurnished</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Features</label>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="features[]" value="Swimming Pool"
                                                                        style="accent-color: #d33593;">
                                                                    <label class="form-check-label">Swimming Pool</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="features[]" value="Gym"
                                                                        style="accent-color: #d33593;">
                                                                    <label class="form-check-label">Gym</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="features[]" value="Parking"
                                                                        style="accent-color: #d33593;">
                                                                    <label class="form-check-label">Parking</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="features[]" value="Garden"
                                                                        style="accent-color: #d33593;">
                                                                    <label class="form-check-label">Garden</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="features[]" value="Security"
                                                                        style="accent-color: #d33593;">
                                                                    <label class="form-check-label">Security</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="features[]" value="Lift"
                                                                        style="accent-color: #d33593;">
                                                                    <label class="form-check-label">Lift</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="features[]" value="Power Backup"
                                                                        style="accent-color: #d33593;">
                                                                    <label class="form-check-label">Power Backup</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="features[]" value="WiFi"
                                                                        style="accent-color: #d33593;">
                                                                    <label class="form-check-label">WiFi</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Amenities</label>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="amenities[]" value="Air Conditioning"
                                                                        style="accent-color: #d33593;">
                                                                    <label class="form-check-label">Air
                                                                        Conditioning</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="amenities[]" value="Heating"
                                                                        style="accent-color: #d33593;">
                                                                    <label class="form-check-label">Heating</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="amenities[]" value="TV"
                                                                        style="accent-color: #d33593;">
                                                                    <label class="form-check-label">TV</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="amenities[]" value="Washing Machine"
                                                                        style="accent-color: #d33593;">
                                                                    <label class="form-check-label">Washing Machine</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="amenities[]" value="Microwave"
                                                                        style="accent-color: #d33593;">
                                                                    <label class="form-check-label">Microwave</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="amenities[]" value="Refrigerator"
                                                                        style="accent-color: #d33593;">
                                                                    <label class="form-check-label">Refrigerator</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="amenities[]" value="Dishwasher"
                                                                        style="accent-color: #d33593;">
                                                                    <label class="form-check-label">Dishwasher</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="amenities[]" value="Balcony"
                                                                        style="accent-color: #d33593;">
                                                                    <label class="form-check-label">Balcony</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Availability & Media -->
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="card card-secondary" style="border-color: #b1b2b1;">
                                                <div class="card-header"
                                                    style="background-color: #717271; color: #ffffff;">
                                                    <h3 class="card-title">Availability & Status</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="availability">Availability*</label>
                                                        <select class="form-control" id="availability"
                                                            name="availability" required>
                                                            <option value="Immediate">Immediate</option>
                                                            <option value="After Date">After Date</option>
                                                            <option value="Negotiable">Negotiable</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="available_from_group">
                                                        <label for="available_from">Available From</label>
                                                        <input type="date" class="form-control" id="available_from"
                                                            name="available_from">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="preferred_tenants">Preferred Tenants</label>
                                                        <select class="form-control" id="preferred_tenants"
                                                            name="preferred_tenants">
                                                            <option value="">Anyone</option>
                                                            <option value="Family">Family</option>
                                                            <option value="Professionals">Professionals</option>
                                                            <option value="Students">Students</option>
                                                            <option value="Company">Company</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="property_status">Property Status</label>
                                                        <select class="form-control" id="property_status"
                                                            name="property_status">
                                                            <option value="Available">Available</option>
                                                            <option value="Rented">Rented</option>
                                                            <option value="Sold">Sold</option>
                                                            <option value="Under Maintenance">Under Maintenance</option>
                                                        </select>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input class="custom-control-input" type="checkbox"
                                                                        id="is_featured" name="is_featured"
                                                                        value="1" style="accent-color: #d33593;">
                                                                    <label for="is_featured"
                                                                        class="custom-control-label">Featured
                                                                        Property</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input class="custom-control-input" type="checkbox"
                                                                        id="is_verified" name="is_verified"
                                                                        value="1" style="accent-color: #d33593;">
                                                                    <label for="is_verified"
                                                                        class="custom-control-label">Verified
                                                                        Property</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Media & Documents -->
                                        <div class="col-md-6">
                                            <div class="card card-secondary" style="border-color: #b1b2b1;">
                                                <div class="card-header"
                                                    style="background-color: #717271; color: #ffffff;">
                                                    <h3 class="card-title">Media & Documents</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="image">Main Image*</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input"
                                                                    id="image" name="main_image" accept="image/*"
                                                                    onchange="previewImage(event)">
                                                                <label class="custom-file-label" for="image">Choose
                                                                    file</label>
                                                            </div>
                                                        </div>

                                                        <!-- Preview Section -->
                                                        <div id="image-preview-container" class="mt-2"
                                                            style="position: relative; display: none;">
                                                            <img id="image-preview" src="#" alt="Preview"
                                                                style="max-width: 150px; border: 1px solid #ddd; border-radius: 4px;">
                                                            <button type="button" onclick="removeImage()"
                                                                style="position: absolute; top: -10px; right: -10px; background: red; color: white; border: none; border-radius: 50%; width: 25px; height: 25px;">&times;</button>
                                                        </div>

                                                        @error('image')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>




                                                    <div class="form-group">
                                                        <label for="property_images">Additional Images</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input"
                                                                    id="property_images" name="property_images[]"
                                                                    accept="image/*" multiple>
                                                                <label class="custom-file-label"
                                                                    for="property_images">Choose files</label>
                                                            </div>
                                                        </div>
                                                        <small class="text-muted">You can select multiple images</small>
                                                        <div class="row mt-2" id="additional_images_preview"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="video_url">Video URL</label>
                                                        <input type="url" class="form-control" id="video_url"
                                                            name="video_url" placeholder="YouTube/Vimeo link">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="floor_plan_image">Floor Plan Image</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input"
                                                                    id="floor_plan_image" name="floor_plan_image"
                                                                    accept="image/*">
                                                                <label class="custom-file-label"
                                                                    for="floor_plan_image">Choose file</label>
                                                            </div>
                                                        </div>
                                                        <div class="image-preview mt-2" id="floor_plan_preview"
                                                            style="display: none;">
                                                            <img id="floor_plan_preview_img" src="#"
                                                                alt="Floor Plan Preview"
                                                                style="max-width: 100px; max-height: 100px; border: 1px solid #b1b2b1; padding: 2px;" />
                                                            <button type="button"
                                                                class="btn btn-danger btn-sm delete-image"
                                                                data-target="#floor_plan_image"
                                                                style="position: absolute; top: 0; right: 0; padding: 0.15rem 0.3rem; font-size: 0.7rem;">×</button>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="brochure">Brochure (PDF)</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input"
                                                                    id="brochure" name="brochure" accept=".pdf">
                                                                <label class="custom-file-label" for="brochure">Choose
                                                                    file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Additional Information -->
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <div class="card card-secondary" style="border-color: #b1b2b1;">
                                                <div class="card-header"
                                                    style="background-color: #717271; color: #ffffff;">
                                                    <h3 class="card-title">Additional Information</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="keyfeatures">Key Features</label>
                                                        <textarea class="form-control text-editor" id="keyfeatures" name="keyfeatures" rows="3"
                                                            placeholder="List key features of the property"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="notes">Notes</label>
                                                        <textarea class="form-control text-editor" id="notes" name="notes" rows="3"
                                                            placeholder="Any additional notes"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer" style="background-color: #f8f9fa;">
                                    <button type="submit" class="btn btn-primary"
                                        style="background-color: #d33593; border-color: #d33593;">Submit Property</button>
                                    <button type="reset" class="btn btn-secondary"
                                        style="background-color: #717271; border-color: #717271;">Reset</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const previewContainer = document.getElementById('image-preview-container');
            const previewImage = document.getElementById('image-preview');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewContainer.style.display = 'inline-block';
                }
                reader.readAsDataURL(file);
            }
        }

        function removeImage() {
            const input = document.getElementById('image');
            const previewContainer = document.getElementById('image-preview-container');
            const previewImage = document.getElementById('image-preview');

            input.value = '';
            previewImage.src = '#';
            previewContainer.style.display = 'none';
        }
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <style>
        .card-primary {
            border-color: #d33593;
        }

        .card-header {
            background-color: #48254a;
            color: #ffffff;
        }

        .btn-primary {
            background-color: #d33593;
            border-color: #d33593;
        }

        .btn-primary:hover {
            background-color: #b12a7c;
            border-color: #b12a7c;
        }

        .btn-secondary {
            background-color: #717271;
            border-color: #717271;
        }

        .btn-secondary:hover {
            background-color: #5a5b5a;
            border-color: #5a5b5a;
        }

        .custom-control-input:checked~.custom-control-label::before {
            background-color: #d33593;
            border-color: #d33593;
        }

        .form-check-input:checked {
            background-color: #d33593;
            border-color: #d33593;
        }

        .image-preview {
            position: relative;
            display: inline-block;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        .image-preview img {
            max-width: 100px;
            max-height: 100px;
            border: 1px solid #b1b2b1;
            padding: 2px;
        }

        .delete-image {
            position: absolute;
            top: 0;
            right: 0;
            padding: 0.15rem 0.3rem;
            font-size: 0.7rem;
            background-color: #dc3545;
            border: none;
            border-radius: 0;
        }

        .note-editor.note-frame {
            border-color: #b1b2b1;
        }

        .note-editor.note-frame .note-toolbar {
            background-color: #f8f9fa;
            border-bottom-color: #b1b2b1;
        }

        .additional-image-preview {
            position: relative;
            margin-right: 10px;
            margin-bottom: 10px;
            display: inline-block;
        }

        .additional-image-preview img {
            max-width: 100px;
            max-height: 100px;
            border: 1px solid #b1b2b1;
            padding: 2px;
        }

        .delete-additional-image {
            position: absolute;
            top: 0;
            right: 0;
            padding: 0.15rem 0.3rem;
            font-size: 0.7rem;
            background-color: #dc3545;
            border: none;
            border-radius: 0;
        }

        .note-editor.note-frame .note-statusbar {
            background-color: #f8f9fa;
        }

        .note-btn {
            background-color: #f8f9fa;
            border-color: #dee2e6;
        }

        .note-btn:hover {
            background-color: #e9ecef;
        }

        .note-editable {
            background-color: #ffffff;
        }
    </style>
@endsection
