<?php require_once ("db.inc"); ?>
<?php require_once ("topsplash.php"); ?>
<tr>
<?php banner ('Welcome'); ?>
</tr><tr>
  <td valign="top" align="left" colspan="3">
    <table cellspacing="15">
    <tr>
      <td valign="top" align="left">
        <?php readfile ("menu.html"); ?>
      </td>
      <td valign="top" align="left">
        <table bgcolor="orange" cellpadding="10" width="300">
        <tr>
          <td bgcolor="white">
            <?php EventsBlurb (); ?>
          </td>
        </tr>
        </table>
      </td>
      <td valign="top" align="center" width="600">
        <table bgcolor="orange" cellpadding="10">
        <tr>
          <td bgcolor="white">This page you have tried to access has either moved or no longer exists.</td>
        </tr>
        </table>
      </td>
      <td valign="top" align="center">
        <table bgcolor="orange" cellpadding="10">
        <tr>
          <td bgcolor="white" align="left" valign="top"><?php ourfriends (); ?></td>
        </tr>
        </table>
      </td>
    </tr>
    </table>
  </td>
<?php readfile ("bottom.html") ?>