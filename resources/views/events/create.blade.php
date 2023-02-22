@extends('index')

@section('title')
    Create new Event
@endsection

@section('content')
@vite('resources/js/tinymce/js/tinymce/tinymce.min.js');
    <h3><i class="fa fa-plus"></i> Create new Event</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col">
                <div id="form-en">
                    <div>
                        <input type="text" name="title_en" placeholder="Title (EN)" value="{{ old('title_en') }}"" required>
                    </div>
                    <div>
                        <textarea name="description_en" placeholder="Short Description (EN)" rows="2">{{ old('description_en') }}</textarea>
                    </div>
                    <div>
                        <textarea name="body_en" placeholder="Content (EN)" rows="6">{{ old('body_en') }}</textarea>
                    </div>
                </div>
                <hr>
                <div id="lang-options">
                    <div class="row">
                        <div class="col-auto">
                            <input type="checkbox" name="ku_check" id="ku_check">
                            <label for="ku_check">KU</label>
                        </div>
                        <div class="col-auto">
                            <input type="checkbox" name="ar_check" id="ar_check">
                            <label for="ar_check">AR</label>
                        </div>
                    </div>
                    <hr>
                </div>
                <div id="form-ku" style="display:none;">
                    <div>
                        <input type="text" name="title_ku" placeholder="Title (KU)">
                    </div>
                    <div>
                        <textarea name="description_ku" placeholder="Short Description (KU)" rows="2"></textarea>
                    </div>
                    <div>
                        <textarea name="body_ku" placeholder="Content (KU)" rows="6"></textarea>
                    </div>
                </div>
                <div id="form-ar" style="display:none;">
                    <div>
                        <input type="text" name="title_ar" placeholder="Title (آر)">
                    </div>
                    <div>
                        <textarea name="description_ar" placeholder="Short Description (آر)" rows="2"></textarea>
                    </div>
                    <div>
                        <textarea name="body_ar" placeholder="Content (آر)" rows="6"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
            <div class="col">

                <div class="row">
                    <div class="col-auto">
                        <input type='hidden' name='featured'value='off'>
                        <input type="checkbox" name="featured" id="featured">
                        <label for="featured">Featured</label>
                    </div>
                </div>
                <div>
                    <input type="datetime-local" name="start_date" id="start_date" class="date">
                </div>
                <div>
                    <input type="file" name="cover" id="uploadMedia" accept="file_extension,audio/*,video/*,image/*,media_type" placeholder="Choose a cover">
                </div>
                <div>
                    <label for="tags">Tags</label>
                    <select name="tags[]" id='tags' class="select" multiple>
                        @if ($tags)
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name_en }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div>
                    <label for="sponsers">Sponsers</label>
                    <select name="sponsers[]" id="sponsers" class="select" multiple>
                        @if ($sponsers)
                            @foreach ($sponsers as $sponser)
                                <option value="{{ $sponser->id }}">{{ $sponser->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div>
                    <label for="contributers">Contributers</label>
                    <select name="contributers[]" id="contributers" class="select" multiple>
                        @if ($profiles)
                            @foreach ($profiles as $profile)
                                <option value="{{ $profile->id }}">{{ $profile->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="bttn"><i class="fa fa-check"></i> Publish</button>
                    </div>
                    <div class="col">
                        <button type="reset" class="bttn text-muted"><i class="fa fa-undo text-muted"></i> Clear</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('script')
<script>
    window.onload = (e) => {
        let kucheck = document.querySelector("#ku_check");
        let archeck = document.querySelector("#ar_check");

        kucheck.addEventListener('click', function() {
            let form = document.querySelector("#form-ku");
            let btn = document.querySelector("#ku_check");

            form.style.display = btn.checked ? 'block' : 'none';
        });

        archeck.addEventListener('click', function() {
            let form = document.querySelector("#form-ar");
            let btn = document.querySelector("#ar_check");

            form.style.display = btn.checked ? 'block' : 'none';
        });

        if(kucheck.checked)
        {
            document.querySelector("#form-ku").style.display = 'block'
        }
        if(archeck.checked)
        {
            document.querySelector("#form-ar").style.display = 'block'
        }
    }
</script>
@endsection
