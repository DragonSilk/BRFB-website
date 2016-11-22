<?php include ("db.inc"); ?>
<?php require_once ("top.html"); ?>
<tr>
  <?php banner ('Contact'); ?>
</tr><tr>
  <td valig="top" align="left" colspan="3">
    <table cellspacing="15">
    <tr>
      <td align="center" valign="top" width="15%">
        <?php readfile ("menu.html"); ?>
      </td>
      <td valign="top" align="left">
        <table bgcolor="orange" cellpadding="10" width="20%">
        <tr>
          <td bgcolor="white">
            <?php EventsBlurb (); ?>
          </td>
        </tr>
        </table>
      </td>
      <td valign="top" align="center" width="50%">
        <table bgcolor="orange" cellpadding="10">
          <?php displaystory ("Contact Methods", 1); ?>
        </table>
      </td>
      <td align="left" valign="top">
        <table bgcolor="orange" cellpadding="10">
        <tr>
          <td bgcolor="white"><?php ourfriends (); ?></td>
        </tr>
        </table>
       </td>
    </tr>
    </table>
  </td>
<?php readfile ("bottom.html"); ?>