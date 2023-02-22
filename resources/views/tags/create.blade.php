@extends('index')

@section('title')
    Create new Tag
@endsection

@section('content')

    <h3><i class="fa fa-plus"></i> Create new Tag</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('tags.store') }}">
        @csrf
        <div class="row">
            <div class="col">
                <div id="form-en">
                    <div>
                        <input type="text" name="name_en" placeholder="Tag Name" required>
                    </div>
                    <div class="ccenter">
                        Enabled
                        <label class="switch">
                            <input type="checkbox" id="togBtn">
                            <div class="slider round">
                                <!--ADDED HTML -->
                                <span class="on">ON</span>
                                <span class="off">OFF</span>
                                <!--END-->
                            </div>
                        </label>
                    </div>
                    <div>
                        <button type="submit" class="bttn"><i class="fa fa-check"></i>Create</button>
                    </div>

                </div>
            </div>
        </div>
    </form>
    {{-- <form>
        <div class="row">
            <div class="col">
                <div id="form-en">
                    <div>
                        <input type="text" name="title_en" placeholder="Title (EN)" required>
                    </div>
                    <div>
                        <textarea name="description_en" placeholder="Short Description (EN)" rows="2"></textarea>
                    </div>
                    <div>
                        <textarea name="content_en" placeholder="Content (EN)" rows="6"></textarea>
                    </div>
                </div>
                <div id="form-ku" style="display:none;">
                    <div>
                        <input type="text" name="title_ku" placeholder="Title (KU)" required>
                    </div>
                    <div>
                        <textarea name="description_ku" placeholder="Short Description (KU)" rows="2"></textarea>
                    </div>
                    <div>
                        <textarea name="content_ku" placeholder="Content (KU)" rows="6"></textarea>
                    </div>
                </div>
                <div id="form-ar" style="display:none;">
                    <div>
                        <input type="text" name="title_ar" placeholder="Title (آر)" required>
                    </div>
                    <div>
                        <textarea name="description_ar" placeholder="Short Description (آر)" rows="2"></textarea>
                    </div>
                    <div>
                        <textarea name="content_ar" placeholder="Content (آر)" rows="6"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <button type="submit" class="bttn"><i class="fa fa-check"></i> Publish</button>
                    </div>
                    <div class="col">
                        <button type="reset" class="bttn text-muted"><i class="fa fa-undo text-muted"></i> Clear</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <input type="checkbox" name="featured" id="featured">
                        <label for="featured">Featured</label>
                    </div>
                    <div class="col-auto">
                        <input type="checkbox" name="link_post" id="link_post">
                        <label for="link_post">link a post.</label>
                    </div>
                </div>
                <div>
                    <input type="file" name="cover" id="uploadMedia" accept="file_extension,audio/*,video/*,image/*,media_type" placeholder="Choose a cover">

                    <div>
                        <div class="shared_container" id="shared_media_container">
                        </div>
                    </div>
                </div>
                <div>
                    <select name="categories" id="category">
                        <option value="select..." selected="selected">Select a category...</option>
                    </select>
                </div>
                <div>
                    <div id="sponser_container" class="selected_elements"></div>
                    <select name="spounsors" id="spounsors">
                        <option value="select..." selected="selected">Select a sponsor...</option>
                    </select>
                </div>
                <div>
                    <div id="contrib_container" class="selected_elements"></div>
                    <select name="contribs" id="contribs">
                        <option value="select..." selected="selected">Select Contributer...</option>
                    </select>
                </div>
            </div>
        </div>
    </form> --}}
@endsection
