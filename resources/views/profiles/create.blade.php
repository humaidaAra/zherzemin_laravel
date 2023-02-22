@extends('index')

@section('title')
    Create new Profile
@endsection

@section('content')
@vite('resources/js/tinymce/js/tinymce/tinymce.min.js');
    <h3><i class="fa fa-plus"></i> Create new Profile</h3>
    <form action="{{ route('profiles.store') }}" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col">
                @csrf
                <div id="form-en">
                    <div>
                        <input type="text" name="name" placeholder="Name" required>
                    </div>
                    <div>
                        <textarea name="description" placeholder="Description" rows="2" required></textarea>
                    </div>
                    <div>
                        <input type="file" name="image" id="uploadMedia" accept="file_extension,image/*,media_type" placeholder="Choose a cover">
                    </div>
                </div>
                
            <div class="col-1"></div>
            <div class="col">
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="bttn"><i class="fa fa-check"></i> Publish</button>
                    </div>
                    <div class="col-3">
                        <button type="reset" class="bttn text-muted"><i class="fa fa-undo text-muted"></i> Clear</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
