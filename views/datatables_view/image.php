<?php
$imgs_array = explode(", ", $imgs);
foreach($imgs_array as $img)
{
echo '<a href="'.base_url().'assets/upload/'.$img.'" class="fancybox-button" data-rel="fancybox-button">
<img src="'.base_url().'assets/upload/'.$img.'" class="small-img-thumb" width="50px" height="50px"></a>';
}
?>
