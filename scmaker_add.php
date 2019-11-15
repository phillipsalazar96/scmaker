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
   <option value="text">Text</option>
   <option value="image">image</option>
   <option value="link">Link</option>
   <option value="code">code</option>
   <option value="label">Label</option>
   <option value="button">Button</option>
   <option value="bar">Bar</option>
   <option value="video">video</option>
   <option value="audio">audio</option>
</select>
<!--
<div class="input-box">
<form method="post" action="">
    <h4>Add short code</h4>
    <label>Shortcode</label>
    <input type="text" name="name" />
    <label>Content</label>
    <input type="text" name="content" />

  <br/>
 <?php// submit_button('Add shortcode') ?>

</form>
-->

<p id="t1" class="exp" value="text">text 1</p>
<p id="t2" class="exp" value="image">text 2</p>
<p id="t3" class="exp" value="link">text 3</p>

</div>
