<option value="0">- Select -</option>

<?php
foreach($lists as $l) {
    echo "<option value='$l[id]' data-price='$l[price]'>$l[name] / " . App::price($l['price']) . "</option>";
}
?>