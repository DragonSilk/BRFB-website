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
        <? announcement (); ?>
<!-- Begin MailChimp Signup Form -->
        <table bgcolor="orange" cellpadding="10">
        <tr>
          <td bgcolor="white">
            <div id="mc_embed_signup">
              <form action="//blazingriverband.us3.list-manage.com/subscribe/post?u=920f01747de030978cf4afb9d&amp;id=85fa52ed7a" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
              <div id="mc_embed_signup_scroll">
                <h2>Subscribe to our mailing list</h2>
                <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
                <div class="mc-field-group">
	              <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span></label>
	              <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                </div>
                <div class="mc-field-group">
	              <label for="mce-FNAME">First Name </label>
	              <input type="text" value="" name="FNAME" class="" id="mce-FNAME">
                </div>
                <div class="mc-field-group">
	              <label for="mce-LNAME">Last Name </label>
	              <input type="text" value="" name="LNAME" class="" id="mce-LNAME">
                </div>
                <div class="mc-field-group input-group">
                  <strong>I am interested in information about: </strong>
                  <ul>
                    <li><input type="checkbox" value="1" name="group[14793][1]" id="mce-group[14793]-14793-0"><label for="mce-group[14793]-14793-0">Upcoming Performances</label></li>
                    <li><input type="checkbox" value="2" name="group[14793][2]" id="mce-group[14793]-14793-1"><label for="mce-group[14793]-14793-1">Joining Marching Band</label></li>
                    <li><input type="checkbox" value="4" name="group[14793][4]" id="mce-group[14793]-14793-2"><label for="mce-group[14793]-14793-2">Joining Concert Band</label></li>
                    <li><input type="checkbox" value="8" name="group[14793][8]" id="mce-group[14793]-14793-3"><label for="mce-group[14793]-14793-3">Joining Color Guard</label></li>
                    <li><input type="checkbox" value="16" name="group[14793][16]" id="mce-group[14793]-14793-4"><label for="mce-group[14793]-14793-4">Additional Ensembles</label></li>
                  </ul>
                </div>
                <div class="mc-field-group input-group">
                  <strong>Email Format </strong>
                  <ul>
            <li><input type="radio" value="html" name="EMAILTYPE" id="mce-EMAILTYPE-0"><label for="mce-EMAILTYPE-0">html</label></li>
            <li><input type="radio" value="text" name="EMAILTYPE" id="mce-EMAILTYPE-1"><label for="mce-EMAILTYPE-1">text</label></li>
            </ul>
            </div>
            <div id="mce-responses" class="clear">
            <div class="response" id="mce-error-response" style="display:none"></div>
	        <div class="response" id="mce-success-response" style="display:none"></div>
            </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_920f01747de030978cf4afb9d_85fa52ed7a" tabindex="-1" value=""></div>
            <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
            </div>
            </form>
            </div>
            <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
            <script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='MMERGE3';ftypes[3]='text';fnames[4]='MMERGE4';ftypes[4]='text';fnames[5]='MMERGE5';ftypes[5]='text';fnames[6]='MMERGE6';ftypes[6]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
<!--End mc_embed_signup-->
          </td>
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