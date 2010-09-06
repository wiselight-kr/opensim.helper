<?php
if ($BOX_COLOR=="" or  ($BOX_COLOR!="white" and $BOX_COLOR!="green" and $BOX_COLOR!="red" and $BOX_COLOR!="yellow")) {
	$BOX_COLOR = "white";
}
$color_box = "box".$BOX_COLOR;
?>
<table cellSpacing=0 cellPadding=0 width=300 border=0 align=center>
  <tbody>
  <tr>
    <td vAlign=top align=left>
      <table cellSpacing=0 cellPadding=0 width=300 border=0>
        <tbody>
        <tr>
          <td class=<?php echo $color_box?>_tl><img height=11 src="../images/login_screens/icons/spacer.gif" width=5 /></td>
          <td class=<?php echo $color_box?>_t ><img height=11 src="../images/login_screens/icons/spacer.gif" width=5 /></td>
          <td class=<?php echo $color_box?>_tr><img height=11 src="../images/login_screens/icons/spacer.gif" width=5 /></td>
        </tr>
        <tr>
          <td class=<?php echo $color_box?>_l></td>
          <td class=black_content>
            <img src="../images/login_screens/icons/alert.png" align=absMiddle />&nbsp;<strong><?php echo $BOX_TITLE?></strong> 
            <div id=GREX style="margin: 1px 0px 0px"><img height=11 src="../images/login_screens/icons/spacer.gif" width=1 /><div>
            <div class=boxtext><?php echo $BOX_INFOTEXT?></div>
          </td>
          <td class=<?php echo $color_box?>_r></td>
        </tr>
        <tr>
          <td class=<?php echo $color_box?>_bl></td>
          <td class=<?php echo $color_box?>_b ></td>
          <td class=<?php echo $color_box?>_br></td>
        </tr>
        </tbody>
      </table>
    </td>
  </tr>
  </tbody>
</table>

