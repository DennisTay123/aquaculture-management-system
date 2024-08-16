@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'gallery'
])

@section('content')
<div class="content">
    <h1>Gallery</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <input type="file" name="media[]" id="media" class="form-control d-none" multiple required>
            <button type="button" class="btn btn-secondary" id="chooseFileBtn">Choose Files</button>
            <span id="file-names"></span>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button> Maximum file size: 20MB
    </form>

    <form id="multiDeleteForm" action="{{ route('gallery.multiDelete') }}" method="POST">
        @csrf
        @method('DELETE')

        <div class="row">
            <div class="col-md-4" id="column-1"></div>
            <div class="col-md-4" id="column-2"></div>
            <div class="col-md-4" id="column-3"></div>
        </div>
    </form>
</div>

@php
    $column = 1;
@endphp

@foreach($galleries as $gallery)
    <div class="card mb-4 shadow-sm">
        @if ($gallery->media_type === 'video')
            <video controls width="100%">
                <source src="{{ $gallery->url }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        @else
            <img src="{{ $gallery->url }}" alt="Image" class="img-fluid">
        @endif
        <div class="card-body d-flex justify-content-between align-items-center">
            <a href="{{ $gallery->url }}" class="btn btn-info" target="_blank">View</a>
            <div>
                <input type="checkbox" name="selected[]" value="{{ $gallery->id }}" class="multi-select-checkbox ml-2">
                <button type="button" class="btn btn-danger delete-btn">Delete</button>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('column-{{ $column }}').appendChild(
            document.currentScript.previousElementSibling
        );
    </script>

    @php
        $column = $column % 3 + 1; // Rotate through columns 1, 2, 3
    @endphp
@endforeach

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog"
    aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Deletion</h5>
                <button type="button
                class=" close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete the selected media?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('chooseFileBtn').addEventListener('click', function () {
        document.getElementById('media').click();
    });

    document.getElementById('media').addEventListener('change', function () {
        var fileNames = Array.from(this.files).map(file => file.name).join(', ');
        document.getElementById('file-names').textContent = fileNames;
    });

    let deleteButtonClicked = null;

    document.querySelectorAll('.delete-btn').forEach(function (button) {
        button.addEventListener('click', function () {
            var checkbox = this.closest('.card-body').querySelector('.multi-select-checkbox');
            checkbox.checked = true;
            deleteButtonClicked = this;
            $('#deleteConfirmationModal').modal('show');
        });
    });

    document.getElementById('confirmDeleteBtn').addEventListener('click', function () {
        document.getElementById('multiDeleteForm').submit();
    });

    document.addEventListener('DOMContentLoaded', function () {
        setTimeout(function () {
            var alert = document.querySelector('.alert-success');
            if (alert) {
                alert.remove();
            }
        }, 5000); // 5000 milliseconds = 5 seconds
    });
</script>
@endsection