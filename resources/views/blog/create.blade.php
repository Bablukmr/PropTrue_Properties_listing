@extends('admin.layout')

@section('content')
    <div class="container my-4">
        <h2>Create New Blog</h2>
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

        <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Title --}}
            <div class="mb-3">
                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="title" name="title" required
                    value="{{ old('title') }}">
            </div>

            {{-- Image --}}
            <div class="mb-3">
                <label for="image" class="form-label">Blog Image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                <div id="image-preview-container" class="mt-2" style="position: relative; display: none;">
                    <img id="image-preview" src="#" alt="Preview"
                        style="max-width: 150px; border: 1px solid #ddd; border-radius: 4px;">
                    <button type="button" onclick="removeImage()"
                        style="position: absolute; top: -10px; right: -10px; background: red; color: white; border: none; border-radius: 50%; width: 25px; height: 25px;">&times;</button>
                </div>
            </div>

            {{-- Short Description --}}
            <div class="mb-3">
                <label for="short_description" class="form-label">Short Description <span
                        class="text-danger">*</span></label>
                <textarea class="form-control " name="short_description" rows="3" required>{{ old('short_description') }}</textarea>
            </div>

            {{-- Content --}}
            <div class="mb-3">
                <label for="content" class="form-label">Full Content <span class="text-danger">*</span></label>
                <textarea id="content" name="content" class="form-control text-editor" rows="6" required>{{ old('content') }}</textarea>
            </div>

            {{-- Date --}}
            <div class="mb-3">
                <label for="date" class="form-label">Date *</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}"
                    required>
            </div>

            {{-- Hashtags --}}
            <div class="mb-3">
                <label for="hashtags" class="form-label">Hashtags (comma separated)</label>
                <input type="text" class="form-control" name="hashtags" value="{{ old('hashtags') }}">
            </div>

            {{-- Show on Home --}}
            <div class="form-check mb-3">
                <input type="hidden" name="show_on_home" value="0">

                <input type="checkbox" class="form-check-input" id="show_on_home" name="show_on_home" value="1"
                    {{ old('show_on_home', isset($blog) && $blog->show_on_home ? true : false) ? 'checked' : '' }}>
                <label class="form-check-label" for="show_on_home">Show on Home Page</label>
            </div>

            <button type="submit" class="btn btn-primary">Create Blog</button>
        </form>
    </div>
@endsection

@section('extraJs')
    <!-- Summernote -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <style>
        /* Summernote custom styling */
        .note-editor.note-frame {
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        .note-editor.note-frame .note-toolbar {
            background-color: #f8f9fa;
            border-bottom: 1px solid #ced4da;
        }

        .note-editor.note-frame .note-statusbar {
            background-color: #f8f9fa;
            border-top: 1px solid #ced4da;
        }
    </style>

    <script>
        $(document).ready(function() {
            // Initialize Summernote for text editors
            $('.text-editor').summernote({
                height: 200,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                callbacks: {
                    onInit: function() {
                        // Fix for AdminLTE3 conflict
                        $('.note-editor').css('margin-bottom', '0');
                    }
                }
            });

            // Image preview functionality
            document.getElementById('image').addEventListener('change', function(event) {
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
            });
        });

        function removeImage() {
            const input = document.getElementById('image');
            const previewContainer = document.getElementById('image-preview-container');
            const previewImage = document.getElementById('image-preview');

            input.value = '';
            previewImage.src = '#';
            previewContainer.style.display = 'none';
        }
    </script>
@endsection
