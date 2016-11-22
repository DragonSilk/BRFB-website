<?php require_once ("db.inc");?>
<?php readfile ("top.html"); ?>
<tr>
<?php
banner ("Performances");

$db = $_SESSION['DB'];
?>
</tr><tr>
  <td valign="top" align="left" colspan="3">
    <table cellspacing="15">
    <tr>
      <td valign="top" align="left">
        <?php readfile ("menu.html"); ?>
      </td>
      <td valign="top" align="left">
        <table width="300">
        <tr>
          <td>
            <?php EventsBlurb (); ?>
          </td>
        </tr>
        </table>
      </td>   
      <td valign="top" align="center" width="700">
        <table bgcolor="orange" cellpadding="10">
<?php
$sql = "select * from Events where (BeginDisplayDate < CURDATE() AND EndDisplayDate >= CURDATE()) AND Enabled = 1 ORDER BY EventDate ASC";
$results = $db->query($sql);
if ($db->errno > 0)
{
  $StatusMsg = '<span style="color:red">' . $db->error . '</span>';
  echo $StatusMsg;
}
else
{
  while ($row = $results->fetch_assoc())
  {
?>
        <tr>
          <td bgcolor="white">
            <a name="<?=$row['EventID']?>"></a><img src="<?=$row['Thumbnail']?>" alt="<?=$row['Title']?>">
          </td>
          <td valign="top" align="left" bgcolor="white">
            <b><a name=""><?=$row['DateAndTime']?></a></b> - <?=$row['Title']?><br/>
            <p><b>Venue:</b> <?=$row['Location']?></p>
            <p><?=$row['ShortBlurb']?></p>
          </td>
        </tr>
        
<?php
  }
}
?>
        </table>
      </td>
      <td align="left" valign="top">
        <table>
        <tr>
          <td><?php ourfriends (); ?></td>
        </tr>
        </table>
       </td>
    </tr>
    </table>
    <br />
  </td>
<?php readfile ("bottom.html"); ?>