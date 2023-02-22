<form class="form" id="addForm">
    <div class="radioBtns">
        <input type="radio" name="post_lang" id="en_btn" value="en"><label for="EN_post">EN</label>
        <input type="radio" name="post_lang" id="kr_btn" value="kr"><label for="KR_post">KR</label>
    </div>
    <br>
    <div class="radioBtns" id="radioBtns">
        <input type="radio" name="radio" id="articles" required>
        <label for="Articles">Article</label>
        <input type="radio" name="radio" id="events">
        <label for="Events">Event</label>
        <input type="radio" name="radio" id="exhibitions">
        <label for="Exhibitions">Exhibition</label>
    </div>
    <div class="checkboxContainer">
        <input type="checkbox" name="featured" id="featured">
        <label for="featured">Featured</label>
    </div>
    <input type="text" name="title" id="title" placeholder="Title" required>
    <div id="drop">
        <input type="checkbox" name="link_post" id="link_post"><label for="link_post">link a post.</label>
    <select class="post_reference" name="post_reference" id="post_reference">

    </select>
        <textarea name="subheader" class="textArea" id="subheader" placeholder="Short Description"></textarea>
        <input type="file" name="cover" id="uploadMedia" accept="file_extension,audio/*,video/*,image/*,media_type" placeholder="Choose a cover">
        <div class="shared_container" id="shared_media_container">
            <!-- <div class="shared_media" id="somepath">
                <img  class="media_src" id = "someimg" src="https://images.unsplash.com/photo-1453728013993-6d66e9c9123a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8bGVuc3xlbnwwfHwwfHw%3D&w=1000&q=80">
            </div> -->
        </div>
        <input type="file" id="add_media_input" accept="image/*" style="display:none" />
        <button class="bttn" id="add_shared_media_btn">
            Add media to storage.
        </button>
        <textarea name="content" id="myTextarea" class="textArea" placeholder="Description" cols="30" rows="10"></textarea>
        <div id="category_container" class="selected_elements"></div>

        <select name="categories" id="category">
            <option value="select..." selected="selected">Select a category...</option>
        </select>
        <div id="sponser_container" class="selected_elements"></div>
        <select name="spounsors" id="spounsors">
            <option value="select..." selected="selected">Select a sponsor...</option>
        </select>
        <div id="contrib_container" class="selected_elements"></div>
        <select name="contribs" id="contribs">
            <option value="select..." selected="selected">Select Contributer...</option>
        </select>
        

        <div class="btnContainer">
            <input type="submit" class="bttn" value="Publish">
            <input type="button" id="clear" class="bttn" value="Clear">
        </div>
    </div>
</form>