<?php
function slideshow()
{
  $db = $_SESSION['DB'];
  $ImageArray = $_SESSION['ImageArray'];

  $SlideCount = count ($ImageArray);

  $WhichSlide = rand (0, $SlideCount);
  $ImageID = $ImageArray[$WhichSlide]['ImageID'];
  $ImageName = $ImageArray[$WhichSlide]['ImageName'];
  $ImagePathname = $ImageArray[$WhichSlide]['ImagePathname'];
  $ImageWidth = $ImageArray[$WhichSlide]['ImageWidth'];
  if ($ImageWidth > 200)
    $ImageWidth = $ImageWidth / 4;
?>
<div style="text-align:center"><a href="PhotoGallery.php?ImageID=<?=$ImageID?>"><img src="<?=$ImagePathname?>" alt="<?=$ImageName?>" width="<?=$ImageWidth?>"></a></div><br />
<div style="text-align:center"><a href="PhotoGallery.php?ImageID=<?=$ImageID?>">Photo Gallery</a></div>
<?php
}
?>
