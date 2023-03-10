@extends('index')

@section('title')
    Evnet
@endsection

@section('content')
    @vite('resources/js/tinymce/js/tinymce/tinymce.min.js')
    <h3><i class="fa fa-plus"></i> Update event</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('events.update', $event->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col">
                <div id="form-en">
                    <div>
                        <input type="text" name="title_en" id="title_en" placeholder="Title (EN)" value="{{ $event->title_en }}" required>
                    </div>
                    <div>
                        <textarea name="description_en" placeholder="Short Description (EN)" rows="2">{{ $event->description_en }}</textarea>
                    </div>
                    <div>
                        <textarea name="body_en" class="bodies" id="body_en" placeholder="Content (EN)" rows="6">{{ $event->body_en}}</textarea>
                    </div>
                </div>
                <hr>
                <div id="lang-options">
                    <div class="row">
                        <div class="col-auto">
                            <input type="checkbox" name="ku_check" @if ($event->title_ku)
                            checked
                            @endif 
                            id="ku_check">
                            <label for="ku_check">KU</label>
                        </div>
                        <div class="col-auto">
                            <input type="checkbox" name="ar_check" @if ($event->title_ar)
                                checked
                                @endif id="ar_check">
                            <label for="ar_check">AR</label>
                        </div>
                    </div>
                    <hr>
                </div>
                <div id="form-ku" style="display:none;">
                    <div>
                        <input type="text" name="title_ku" value="{{ $event->title_ku }}" placeholder="Title (KU)">
                    </div>
                    <div>
                        <textarea name="description_ku" placeholder="Short Description (KU)" rows="2">{{ $event->description_ku }}</textarea>
                    </div>
                    <div>
                        <textarea name="body_ku" class="bodies" placeholder="Content (KU)" rows="6">{{ $event->body_ku}}</textarea>
                    </div>
                </div>
                <div id="form-ar" style="display:none;">
                    <div>
                        <input type="text" name="title_ar" value="{{ $event->title_ar }}" placeholder="Title (????)">
                    </div>
                    <div>
                        <textarea name="description_ar" placeholder="Short Description (????)" rows="2">{{ $event->description_ar }}</textarea>
                    </div>
                    <div>
                        <textarea name="body_ar" class="bodies" placeholder="Content (????)" rows="6">{{ $event->body_ar }}</textarea>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
            <div class="col">

                <div class="row">
                    <div class="col-auto">
                        <input type='hidden' name='featured'value='off'>
                        <input type="checkbox" name="featured" {{$event->featured ==1? 'checked':''}} id="featured">
                        <label for="featured">Featured</label>
                    </div>
                </div>
                <div>
                    <input type="datetime-local" value="{{$event->start_date}}" name="start_date" id="start_date" class="date">
                </div>
                <div>
                    <input type="file" name="cover" id="uploadMedia" accept="media_type" placeholder="Choose a cover">
                </div>
                <div>
                    <label for="tags">Tags:</label>
                    <select name="tags[]" id="tags" data-placeholder="Select Tags" class="select" multiple>
                        @if ($tags)
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}" 
                                {{  
                                    in_array($tag->id, $event_tags) ? 'selected' : '' 
                                }}
                                >{{ $tag->name_en }}
                                </option>
                            @endforeach
                        @endif
                    </select>   
                </div>
                <div>
                    <label for="sponsers">Sponsors:</label>
                    <select name="sponsers[]" id="sponsers" data-placeholder="Select Sponsors" class="select" multiple>
                        @if ($sponsers)
                            @foreach ($sponsers as $sponser)
                                <option value="{{ $sponser->id }}"
                                    {{  
                                        in_array($sponser->id, $event_sponsers) ? 'selected' : '' 
                                    }}
                                    >{{ $sponser->name }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div>
                    <label for="profiles">Contributers:</label>
                    <select name="profiles[]" id="profiles" data-placeholder="Select Profiles" class="select" multiple>
                        @if ($profiles)
                            @foreach ($profiles as $profile)
                                <option value="{{ $profile->id }}" 
                                    
                                    {{
                                        in_array($profile->id, $event_profiles) ? 'selected' : '' 
                                    }}
                                    
                                    >{{ $profile->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="bttn"><i class="fa fa-check"></i> Update</button>
                    </div>
                    <div class="col">
                        <button type="reset" class="bttn text-muted"><i class="fa fa-undo text-muted"></i> Clear All</button>
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

                if (kucheck.checked) {
                    document.querySelector("#form-ku").style.display = 'block'
                }
                if (archeck.checked) {
                    document.querySelector("#form-ar").style.display = 'block'
                }
                const example_image_upload_handler = (blobInfo, progress) =>
                    new Promise((resolve, reject) => {
                        let xhr = new XMLHttpRequest();
                        xhr.withCredentials = false;
                        xhr.open('POST', '/upload/media/event');
                        xhr.setRequestHeader('X-CSRF-TOKEN', {{ Js::from(csrf_token()) }})
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

                const sendDeleteXHR = function(url) {
                    new Promise((resolve, reject) => {
                        let xhr = new XMLHttpRequest();
                        xhr.withCredentials = false;
                        xhr.open('POST', '/delete/media/event');
                        xhr.setRequestHeader('X-CSRF-TOKEN', {{ Js::from(csrf_token()) }})
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
                            if (xhr.status != 200) {
                                reject("error happened: " + xhr.status)
                                return;
                            }
                            resolve();
                        }
                        const formData = new FormData();
                        formData.append('img', url);
                        xhr.send(formData);
                    });
                }

                tinymce.init({
                    selector: '.bodies',
                    plugins: 'preview  importcss searchreplace autolink  charmap autosave save code codesample autosave directionality visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount  help  charmap  quickbars  emoticons',
                    file_picker_types: 'image',
                    images_upload_handler: example_image_upload_handler,
                    image_title: true,
                    image_advtab: true,
                    file_picker_types: "image media",
                    video_template_callback: function(data) {
                        alert('hello');
                    },
                    skin: 'oxide-dark',
                    content_css: "dark",

                    setup: function(ed) {
                        ed.on('keydown', function(ex) {
                            if ((ex.keyCode == 8 || ex.keyCode == 46) && ed.selection) {
                                var selectedNode = ed.selection.getNode();

                                if (selectedNode && selectedNode.nodeName == 'IMG') {
                                    sendDeleteXHR(selectedNode.src);
                                }
                            }
                        });
                    }
                });

            }
    </script>
@endsection
