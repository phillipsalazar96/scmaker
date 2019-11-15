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


<div id="t1" class="add_shortcode_boxes" name="text">
<form>
<h4>Shortcode: Text</h4>
<input type="text" name="sc-name" placeholder="Shortcode name">
<input type="text" name="sc-content" placeholder="Content...">
<?php submit_button("Add Shortcode") ?>
</form>
</div>
<div id="t2" class="add_shortcode_boxes" name="image">
  <form>
  <h4>Shortcode: Image</h4>
  <input type="text" name="scname" placeholder="Shortcode name">
  <br/>
  <input type="text" name="sc-source" placeholder="Source...">
  <br/>
  <input type="text" name="sc-alt" placeholder="Alternate text...">
  <br/>
  <input type="number" name="sc-height">
  <br/>
  <input type="number" name="sc-width">
  <?php submit_button("Add Shortcode") ?>
  </form>
</div>
<div id="t3" class="add_shortcode_boxes" name="link">
  <form>
  <h4>Shortcode: Link</h4>
  <input type="text" name="sc-name" placeholder="Shortcode name">
  <br/>
  <input type="text" name="sc-content" placeholder="Content...">
  <br/>
  <input type="text" name="sc-url" placeholder="Url...">
  <?php submit_button("Add Shortcode") ?>
  </form>

</div>
<div id="t4" class="add_shortcode_boxes" name="video">
  <form enctype="multipart/form-data">
  <h4>Shortcode: Text</h4>
  <input type="text" name="sc-name" placeholder="Shortcode name">
  <input type="text" name="sc-content" placeholder="Content...">
      <input type="file" name="fileToUpload" id="fileToUpload">
  <?php submit_button("Add Shortcode") ?>
  </form>
</div>

<div id="t5" class="add_shortcode_boxes" name="audio">
  <form enctype="multipart/form-data">
  <h4>Shortcode: Text</h4>
  <input type="text" name="sc-name" placeholder="Shortcode name">
  <input type="text" name="sc-content" placeholder="Content...">
  <input type="file" name="fileToUpload" id="fileToUpload">
  <?php submit_button("Add Shortcode") ?>
  </form>
</div>

</div>
