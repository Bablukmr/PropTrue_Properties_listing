@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Contact Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Edit Contact</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@elseif (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@elseif ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Update Contact Info</h3>
                </div>

                <form action="{{ route('contactdetails.update', $contact->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body row">
                        <div class="form-group col-md-4">
                            <label>Phone (Contact)</label>
                            <input type="text" name="phone_contact" class="form-control"
                                   value="{{ old('phone_contact', $contact->phone_contact) }}"
                                   placeholder="Enter contact phone">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Phone (Sell)</label>
                            <input type="text" name="phone_sell" class="form-control"
                                   value="{{ old('phone_sell', $contact->phone_sell) }}"
                                   placeholder="Enter sales phone">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Phone (WhatsApp)</label>
                            <input type="text" name="phone_whatsapp" class="form-control"
                                   value="{{ old('phone_whatsapp', $contact->phone_whatsapp) }}"
                                   placeholder="Enter WhatsApp number">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Email (Contact)</label>
                            <input type="email" name="email_contact" class="form-control"
                                   value="{{ old('email_contact', $contact->email_contact) }}"
                                   placeholder="Enter contact email">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Email (HR)</label>
                            <input type="email" name="email_hr" class="form-control"
                                   value="{{ old('email_hr', $contact->email_hr) }}"
                                   placeholder="Enter HR email">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Email (Sell)</label>
                            <input type="email" name="email_sell" class="form-control"
                                   value="{{ old('email_sell', $contact->email_sell) }}"
                                   placeholder="Enter sales email">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update Contact</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
