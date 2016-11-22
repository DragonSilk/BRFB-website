<?php require_once ("db.inc"); ?>
<?php require_once ("topsplash.php"); ?>
<tr>
  <td>
    <?php banner ('Welcome'); ?>
  </td>
</tr>
</table>
<table>
<tr>
  <td valign="top" align="left" colspan="3">
    <table cellspacing="15" border="0">
    <tr>
      <td valign="top" align="left" width="5%">
        <?php readfile ("menu.html"); ?>
      </td>
      <td valign="top" align="left" width="25%">
            <?php EventsBlurb (); ?>
      </td>
      <td valign="top" align="center">
        <? announcement (); ?>
        <? displaystoryNoTitle ("Front Page", 1); ?>
      </td>
      <td valign="top" align="center" width="25%">
        <?php ourfriends (); ?>
      </td>
    </tr>
    </table>
  </td>
<?php readfile ("bottom.html") ?>