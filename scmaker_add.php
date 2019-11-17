<?php
$name;
$url;

if ( ! empty( $_POST['name'] && !empty($_POST['content']) ) ) {

  $name = $scmaker->stringSafe($_POST['name']);
  $content = $scmaker->stringSafe($_POST['content']);
  $scmaker->add_Item($name, $content);
}
else if (!empty($_POST['delete']))
{
  $scmaker->delete_Item($_POST['delete']);
}
else if (!empty($_POST['name_update']) && !empty($_POST['content_update']))
{
  $name = $scmaker->stringSafe($_POST['name_update']);
  $content = $scmaker->stringSafe($_POST['content_update']);
  $scmaker->update_Item($_POST['update'], $name, $content);
}


 ?>
 <h3>Make a Shortcode!</h3>
 <select id="selecttype" name="update" onchange="scmakerSelection()">
   <option value="nothing">Nothing</option>
   <option value="text">Text</option>
   <option value="image">image</option>
   <option value="link">Link</option>
   <option value="video">video</option>
   <option value="audio">audio</option>
</select>

<button class="button button-primary" onclick="viewShortCode()">View!</button>

<div id="text-box-form" class="add_shortcode_boxes" name="text">
<form>
<h4>Shortcode: Text</h4>
<label>Name your shortcode</label>
<br/>
<input type="text" name="sc-name" placeholder="Shortcode name">
<br/>
<label>Add Text for yout shortcode</label>
<br/>
<input type="text" name="sc-content" placeholder="Content...">
<input type="hidden" name="type" value="text"/>
<?php submit_button("Add Shortcode") ?>
</form>
</div>




<div id="image-box-form" class="add_shortcode_boxes" name="image">
  <form>
  <h4>Shortcode: Image</h4>
  <label>Name your shortcode</label>
  <br/>
  <input type="text" name="scname" placeholder="Shortcode name" >
  <br/>
  <label>Add image source</label>
  <br/>
  <input type="text" name="sc-source" placeholder="Source...">
  <br/>
  <label>Add an alternate text</label>
  <br/>
  <input type="text" name="sc-alt" placeholder="Alternate text...">
  <br/>
  <label>Hight of image</label>
  <br/>
  <input id="imagesizesmall" type="radio" name="gender">Small<br>
  <input id="imagesizemedium" type="radio" name="gender">Medium<br>
  <input id="imagesizelarge" type="radio" name="gender">Large<br>

  <input type="hidden" name="type" value="image"/>
  <?php submit_button("Add Shortcode") ?>
  </form>
</div>




<div id="link-box-form" class="add_shortcode_boxes" name="link">
  <form>
  <h4>Shortcode: Link</h4>
  <label>Name your shortcode</label>
  <br/>
  <input type="text" name="sc-name" placeholder="Shortcode name">
  <br/>
  <label>Add your content for the link</label>
  <br/>
  <input type="text" name="sc-content" placeholder="Content...">
  <br/>
  <label>Add url for link</label>
  <br/>
  <input type="text" name="sc-url" placeholder="Url...">
  <input type="hidden" name="type" value="link"/>
  <?php submit_button("Add Shortcode") ?>
  </form>

</div>

<div id="view-box">
</div>



<div id="video-box-form" class="add_shortcode_boxes" name="video">
  <form enctype="multipart/form-data">
  <h4>Shortcode: Video</h4>
  <label>Name your shortcode</label>
  <br/>
  <input type="text" name="sc-name" placeholder="Shortcode name">
  <br/>
  <label>Add your video link</label>
  </br>
  <input type="text" name="sc-name" placeholder="Shortcode name">
  <input type="hidden" name="type" value="video"/>
  <?php submit_button("Add Shortcode") ?>
  </form>
</div>



<div id="audio-box-form" class="add_shortcode_boxes" name="audio">
  <form enctype="multipart/form-data">
  <h4>Shortcode: Audio</h4>
  <label>Name your shortcode</label>
  </br>
  <input type="text" name="sc-name" placeholder="Shortcode name">
  </br>
  <label>Add your audio link</label>
  </br>
  <input type="text" name="sc-content" placeholder="Content...">
  <input type="hidden" name="type" value="audio"/>
  <?php submit_button("Add Shortcode") ?>
  </form>
</div>

<div id="display-area">
</div>
