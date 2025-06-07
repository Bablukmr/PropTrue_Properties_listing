@extends('admin.layout')

@section('content')
    <div class="container my-4">
        <h2>Edit Job Opening</h2>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Please check the form for errors.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.career.opening.update', $opening->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Title --}}
            <div class="mb-3">
                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="title" name="title" required
                    value="{{ old('title', $opening->title) }}">
            </div>

            {{-- Description --}}
            <div class="mb-3">
                <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                <textarea class="form-control" name="description" rows="3" required>{{ old('description', $opening->description) }}</textarea>
            </div>

            {{-- Designation --}}
            <div class="mb-3">
                <label for="designation" class="form-label">Designation <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="designation" name="designation" required
                    value="{{ old('designation', $opening->designation) }}">
            </div>

            {{-- Department --}}
            <div class="mb-3">
                <label for="department" class="form-label">Department <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="department" name="department" required
                    value="{{ old('department', $opening->department) }}">
            </div>

            {{-- Job Type --}}
            <div class="mb-3">
                <label for="job_type" class="form-label">Job Type <span class="text-danger">*</span></label>
                <select class="form-control" id="job_type" name="job_type" required>
                    <option value="">Select Job Type</option>
                    <option value="Full-time" {{ old('job_type', $opening->job_type) == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                    <option value="Part-time" {{ old('job_type', $opening->job_type) == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                    <option value="Contract" {{ old('job_type', $opening->job_type) == 'Contract' ? 'selected' : '' }}>Contract</option>
                    <option value="Internship" {{ old('job_type', $opening->job_type) == 'Internship' ? 'selected' : '' }}>Internship</option>
                </select>
            </div>

            {{-- Benefits --}}
            <div class="mb-3">
                <label for="benefits" class="form-label">Benefits</label>
                <input type="text" class="form-control" id="benefits-input" placeholder="Type benefit and press Enter">
                <div id="benefits-tags" class="mt-2">
                    @php
                        $benefits = json_decode($opening->benefits, true) ?? [];
                    @endphp
                    @foreach($benefits as $benefit)
                        <span class="badge bg-primary text-white me-1 mb-1">
                            {{ $benefit }}
                            <span class="ms-1" style="cursor:pointer;" onclick="this.parentElement.remove(); removeTag('{{ $benefit }}')">
                                &times;
                            </span>
                        </span>
                    @endforeach
                </div>
                <input type="hidden" name="benefits" id="benefits-hidden"
                    value="{{ old('benefits', implode(',', $benefits)) }}">
                <small class="form-text text-muted">Add multiple benefits by pressing Enter after each one</small>
            </div>

            {{-- Opening Dates --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="opening_start_date" class="form-label">Opening Start Date</label>
                    <input type="date" class="form-control" id="opening_start_date" name="opening_start_date"
                        value="{{ old('opening_start_date', $opening->opening_start_date ? $opening->opening_start_date->format('Y-m-d') : '') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="opening_end_date" class="form-label">Opening End Date</label>
                    <input type="date" class="form-control" id="opening_end_date" name="opening_end_date"
                        value="{{ old('opening_end_date', $opening->opening_end_date ? $opening->opening_end_date->format('Y-m-d') : '') }}">
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Update Opening</button>
                <a href="{{ route('admin.career.opening') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection

@section('extraJs')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const input = document.getElementById("benefits-input");
            const hiddenInput = document.getElementById("benefits-hidden");
            const tagContainer = document.getElementById("benefits-tags");
            let benefits = hiddenInput.value ? hiddenInput.value.split(',') : [];

            function createTag(value) {
                const tag = document.createElement('span');
                tag.classList.add('badge', 'bg-primary', 'text-white', 'me-1', 'mb-1');
                tag.innerHTML = `
                    ${value}
                    <span class="ms-1" style="cursor:pointer;" onclick="this.parentElement.remove(); removeTag('${value}')">
                        &times;
                    </span>
                `;
                tagContainer.appendChild(tag);
            }

            function updateHiddenInput() {
                hiddenInput.value = benefits.join(',');
            }

            function addTag(value) {
                value = value.trim();
                if (!value || benefits.includes(value)) return;

                benefits.push(value);
                updateHiddenInput();
                createTag(value);
            }

            input.addEventListener("keydown", function(event) {
                if (event.key === "Enter") {
                    event.preventDefault();
                    addTag(input.value);
                    input.value = '';
                }
            });

            window.removeTag = function(value) {
                benefits = benefits.filter(tag => tag !== value);
                updateHiddenInput();
            };
        });
    </script>
@endsection
