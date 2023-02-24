@extends('index')

@section('title')
    Create new article
@endsection

@section('content')
    @vite('resources/js/tinymce/js/tinymce/tinymce.min.js');
    <h3><i class="fa fa-plus"></i> Create new article</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col">
                <div id="form-en">
                    <div>
                        <input type="text" name="title_en" id="title_en" placeholder="Title (EN)" value="{{ old('title_en') }}">
                    </div>
                    <div>
                        <textarea name="description_en" placeholder="Short Description (EN)" rows="2">{{ old('description_en') }}</textarea>
                    </div>
                    <div>
                        <textarea name="body_en" id="body_en" placeholder="Content (EN)" rows="6">{{ old('body_en') }}</textarea>
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
                        <input type="text" name="title_ku" value="{{ old('title_ku') }}" placeholder="Title (KU)">
                    </div>
                    <div>
                        <textarea name="description_ku" placeholder="Short Description (KU)" rows="2">{{ old('description_ku') }}</textarea>
                    </div>
                    <div>
                        <textarea name="body_ku" placeholder="Content (KU)" rows="6">{{ old('body_ku') }}</textarea>
                    </div>
                </div>
                <div id="form-ar" style="display:none;">
                    <div>
                        <input type="text" name="title_ar" value="{{ old('title_ar') }}" placeholder="Title (آر)">
                    </div>
                    <div>
                        <textarea name="description_ar" placeholder="Short Description (آر)" rows="2">{{ old('description_ar') }}</textarea>
                    </div>
                    <div>
                        <textarea name="body_ar" placeholder="Content (آر)" rows="6">{{ old('body_ar') }}</textarea>
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
                    <input type="file" name="cover" id="uploadMedia" accept="file_extension,audio/*,video/*,image/*,media_type" placeholder="Choose a cover">
                </div>
                <div>
                    <label for="tags">Tags:</label>
                    <select name="tags[]" id="tags" class="select" multiple>
                        @if ($tags)
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}>{{ $tag->name_en }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div>
                    <label for="sponsers">Sponsers:</label>
                    <select name="sponsers[]" id="sponsers" data-placeholder="select a sponser" class="select" multiple>
                        @if ($sponsers)
                            @foreach ($sponsers as $sponser)
                                <option value="{{ $sponser->id }}" {{ in_array($sponser->id, old('sponsers', [])) ? 'selected' : '' }}>{{ $sponser->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div>
                    <label for="profiles">Contributers:</label>
                    <select name="profiles[]" id="profiles" class="select" multiple>
                        @if ($profiles)
                            @foreach ($profiles as $profile)
                                <option value="{{ $profile->id }}" {{ in_array($profile->id, old('profiles', [])) ? 'selected' : '' }}>{{ $profile->name }}</option>
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

            document.getElementById("ku_check").addEventListener('click', function() {
                let form = document.querySelector("#form-ku");
                let btn = document.querySelector("#ku_check");

                form.style.display = btn.checked ? 'block' : 'none';
            });

            document.querySelector("#ar_check").addEventListener('click', function() {
                let form = document.querySelector("#form-ar");
                let btn = document.querySelector("#ar_check");

                form.style.display = btn.checked ? 'block' : 'none';
            });
            const example_image_upload_handler = (blobInfo, progress) =>
                new Promise((resolve, reject) => {
                    console.log('xhr init');
                    const xhr = new XMLHttpRequest();
                    xhr.withCredentials = false;
                    xhr.open('POST', '/api/upload/media/article');

                    xhr.onload = () => {
                        console.log('response returned');
                        if (xhr.status === 403) {
                            reject({
                                message: 'HTTP Error: ' + xhr.status,
                                remove: true
                            });
                            return;
                        }

                        if (xhr.status < 200 || xhr.status >= 300) {
                            reject('HTTP Error: ' + xhr.status);
                            return;
                        }
                        const json = JSON.parse(xhr.responseText);
                        console.log('resolving')
                        resolve(json.location);
                    }
                    const formData = new FormData();
                    formData.append('img', blobInfo.blob(), blobInfo.filename());
                    xhr.send(formData);
                });

            tinymce.init({
                selector: '#body_en',
                plugins: 'preview  importcss searchreplace autolink  charmap autosave save code codesample autosave directionality visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount  help  charmap  quickbars  emoticons',
                file_picker_types: 'image',
                images_upload_handler: example_image_upload_handler,
                
                }   


            });
            
            /*
            images_upload_url: '{{ route('articleUpload') }}',
            image_title: true,
            automatic_uploads: true,
            file_picker_callback: function(cv, value, meta) {
                    var input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');
                    input.onchange = function() {
                        var file = this.files[0];
                        var reader = new FileReader();
                        reader.readAsDataURL(file);
                        render.onload = function() {
                            var id = 'blobid' + (new Date()).getTime();
                            var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                            var base64 = reader.result.split(',')[1];
                            var blobInfo = blobCache.create(id, file, base64);
                            blobCache.add(blobInfo);
                            cb(blobInfo.blobUri(), {
                                title: file.name
                            });
                        };
                    };
                    input.click();
                }
            */
        }
    </script>
    {{-- <script>
        console.log({{ Js::from(csrf_token()) }});
    </script> --}}
@endsection
