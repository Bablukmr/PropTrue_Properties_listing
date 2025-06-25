@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <div class="container p-2" style="min-height: 83vh">
            <h2>RERA Disclaimer</h2>

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
                    <strong>Error!</strong> Please check the form for issues.
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

            <form action="{{ route('admin.reradesclemar.update') }}" method="POST">
                @csrf
                {{-- @method('PUT') --}}

                <div class="mb-3">
                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="title" name="title" required
                        value="{{ old('title', $legal->title) }}">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Short Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $legal->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content <span class="text-danger">*</span></label>
                    <textarea id="content" name="content" class="form-control text-editor" rows="10" required>{{ old('content', $legal->content) }}</textarea>
                </div>

                {{-- <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <input type="text" class="form-control" id="type" name="type"
                       value="{{ old('type', $legal->type) }}">
            </div> --}}
                <input type="hidden" name="type" value="rera_disclaimer">
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection

@section('extraJs')
    <!-- Summernote -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <style>
        .note-editor.note-frame {
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        .note-toolbar,
        .note-statusbar {
            background-color: #f8f9fa !important;
        }
    </style>

    <script>
        $(document).ready(function() {
            $('.text-editor').summernote({
                height: 300,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
@endsection
