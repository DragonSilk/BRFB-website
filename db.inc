<?php
/* ------
    Include file that opens the connection to the database and keeps the open connection in the 
    session variable.  Also contains other functions for the system.
   ------ */
session_start();

$db = new mysqli("localhost", "root", "b1gm0n3y", "brfb");
if ($db->connect_errno)
{
  echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
  exit;
}

$imageArray = array();
$sql = "select * from SlideShowImages where Enabled = 1";
$results = $db->query ($sql);
if ($db->errno > 0)
  $StatusMsg = '<span style="color:red">' . $db->error . '</span>';
else
{
  $i = 0;
  while ($row = $results->fetch_assoc())
  {
    $ImageID = $row['ImageID'];
    $ImagePathname = $row['ImagePathname'];
    $ImageName = $row['ImageName'];
    $ImageWidth = $row['ImageWidth'];
    $imageArray[$i]['ImageID'] = $ImageID;
    $imageArray[$i]['ImagePathname'] = $ImagePathname;
    $imageArray[$i]['ImageName'] = $ImageName;
    $imageArray[$i]['ImageWidth'] = $ImageWidth;
    $i++;
  }
  $_SESSION['ImageArray'] =& $imageArray;
}
 
$_SESSION['DB'] =& $db;

function displaystory ($AreaName, $numberofstories)
{
  $db = $_SESSION['DB'];

  $sql = "select a.Title, a.StoryContent, a.StoryID from Story a join AreaStory b on a.StoryID = b.StoryID join Area c on c.AreaID = b.AreaID where c.AreaName = '". $AreaName."' and a.Enabled = 1 and BeginDisplayDate <= CurDate();";
  $results = $db->query($sql);
  if ($db->errno)
    $StatusMsg = '<span style="color:red">' . $db->error . '</span>';
  if (strlen($StatusMsg) > 0)
  {
?>
<tr>
  <td>
      <?=$StatusMsg?>
  </td>
</tr>
<?php
  }
  else
  {
    for ($i=0; $i < $numberofstories; $i++)
    {
      $row = $results->fetch_assoc();
      $Title = $row['Title'];
      $Title = displaystring ($Title);
      $StoryContent = $row['StoryContent'];
      $StoryID = $row['StoryID'];

      if (strlen($StoryContent) == 4000)
      {
        $sql = "select ParaText from ExtraText where StoryID = " . $StoryID . " and ParaType = 1 order by ParaOrder";
        $paraResults = $db->query($sql);
        while ($paraRow = $paraResults->fetch_assoc())
        {
          $StoryContent .= $paraRow['ParaText'];
        }
      }
      $StoryContent = displaystring ($StoryContent);
?>
<tr>
  <td align="left" valign="top" bgcolor="white">
    <h2><?=$Title?></h2><br /><?=$StoryContent?>
  </td>
</tr>
<?php
    }
  }
}

function displaystoryNoTitle ($AreaName, $numberofstories)
{
?>
<table cellpadding="10" width="50%" bgcolor="orange" border="1">
<?php
  $db = $_SESSION['DB'];

  $sql = "select a.Title, a.StoryContent, a.StoryID from Story a join AreaStory b on a.StoryID = b.StoryID join Area c on c.AreaID = b.AreaID where c.AreaName = '". $AreaName."' and a.Enabled = 1 and BeginDisplayDate <= CurDate();";
  $results = $db->query($sql);
  if ($db->errno)
    $StatusMsg = '<span style="color:red">' . $db->error . '</span>';
  if (strlen($StatusMsg) > 0)
  {
?>
<tr>
  <td bgcolor="white" border="1">
      <?=$StatusMsg?>
  </td>
</tr>
<?php
  }
  else
  {
    for ($i=0; $i < $numberofstories; $i++)
    {
      $row = $results->fetch_assoc();
      $StoryContent = $row['StoryContent'];
      $StoryID = $row['StoryID'];

      if (strlen($StoryContent) == 4000)
      {
        $sql = "select ParaText from ExtraText where StoryID = " . $StoryID . " and ParaType = 1 order by ParaOrder";
        $paraResults = $db->query($sql);
        while ($paraRow = $paraResults->fetch_assoc())
        {
          $StoryContent .= $paraRow['ParaText'];
        }
      }
      $StoryContent = displaystring ($StoryContent);
?>
<tr>
  <td align="left" valign="top" bgcolor="white">
    <?=$StoryContent?>
  </td>
</tr>
<?php
    }
  }
?>
</table>
<?php
}

function announcement ()
{
  $db = $_SESSION['DB'];

  $sql = "select a.Title, a.StoryContent from Story a join AreaStory b on a.StoryID = b.StoryID join Area c on c.AreaID = b.AreaID where c.AreaName = 'Announce' and a.Enabled = 1 and BeginDisplayDate <= CurDate();";
  $results = $db->query($sql);
  if ($db->errno)
    $StatusMsg = '<span style="color:red">' . $db->error . '</span>';
  else
  {
    $row = $results->fetch_assoc();
    if (strlen ($row['StoryContent']) > 0)
    {
      $StoryContent = $row['StoryContent'];
      $StoryContent = displaystring ($StoryContent);
?>
  <table border="0" cellspacing="5" cellpadding="0" bgcolor="red">
  <tr>
    <td bgcolor="white"><?=$StoryContent?></td>
  </tr>
  </table>
<?php
    }
  }
}

function banner ($AreaName)
{
?>
<table border="0" cellspacing="10">
<tr>
  <td valign="top" align="center"><a href="index.php"><img src="images/Logos/Logo2.jpg" width="500"></a></td>
  <td valign="center" width="600">
    <table bgcolor="orange" cellpadding="10">
      <?php displaystory ($AreaName, 1); ?>
    </table>
  </td>
  <td valign="center">
    <table bgcolor="orange" cellpadding="10">
    <tr>
      <td bgcolor="white" valign="center" align="left">
        <?php slideshow(); ?>
      </td>
    </tr>
    </table>
  </td>
</tr>
</table>
<?php
}

function ourfriends()
{
?>
<table bgcolor="orange" border="1" cellpadding="10">
<tr>
  <td bgcolor="white">
<div align="left">
<h2><u>Associations and Friends</u></h2><br />
<?php
  $db = $_SESSION['DB'];
  $sql = "select * from FriendWebsites where Enabled = 1 order by FriendTitle";
  $results = $db->query ($sql);
  if ($db->errno > 0)
  {
    $StatusMsg = '<span style="color:red">' . $db->error . '</span>';
    echo $StatusMsg;
  }
  else
  {
    while ($row = $results->fetch_assoc())
    {
      $FriendTitle = $row['FriendTitle'];
      $FriendTitle = displaystring ($FriendTitle);
      $FriendLink = $row['FriendLink'];
      $FriendLink = displaystring ($FriendLink);
?>
<a href="http://<?=$FriendLink?>" target="_blank"><?=$FriendTitle?></a><br />
<?php
    }
  }
?>
</div>
  </td>
</tr>
</table>
<?php
}

function EventsBlurb ()
{
?>
<table bgcolor="orange" cellpadding="10" width="100%">
<tr>
  <td bgcolor="white">
    <h2><u>Upcoming Events</u></h2>
<?php
  $db = $_SESSION['DB'];

  $sql = "select EventID, Title, Location, DateAndTime, ShortBlurb from Events where (BeginDisplayDate < CURDATE() AND EndDisplayDate >= CURDATE()) AND Enabled = 1 ORDER BY EventDate ASC";
  $results = $db->query($sql);

  while ($row = $results->fetch_assoc())
  {
    $EventID = $row['EventID'];
    $Title = $row['Title'];
    $Title = displaystring ($Title);
    $Location = $row['Location'];
    $DateAndTime = $row['DateAndTime'];
    $DateAndTime = displaystring ($DateAndTime);   
?>
      <br /><a href="events.php#<?=$EventID?>"><?=$Title?></a> - <?=$Location?><br />
      <?=$DateAndTime?><br />
<?php
  }
?>
  </td>
</tr>
</table>
<?php
}

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

function savestring ($StringValue)
{
  $ReturnValue = str_replace ("'", "&#39;", $StringValue);
  $ReturnValue = str_replace ('"', "&quot;", $ReturnValue);
  return ($ReturnValue);
}

function displaystring ($StringValue)
{
  $ReturnValue = str_replace ("&#39;", "'", $StringValue);
  $ReturnValue = str_replace ("&quot;", '"', $ReturnValue);
  return ($ReturnValue);
}
?>