<table cellSpacing=0 cellPadding=0 border=0>
  <tbody>
  <tr>
    <td vAlign=top align=right>
      <table cellSpacing=0 cellPadding=0 width=300 border=0>
        <tbody>
        <tr>
          <td class=gridbox_tl><img height=5 src="images/login_screens/spacer.gif" width=5 /></td>
          <td class=gridbox_t> <img height=5 src="images/login_screens/spacer.gif" width=5 /></td>
          <td class=gridbox_tr><img height=5 src="images/login_screens/spacer.gif" width=5 /></td>
        </tr>
        <tr>
          <td class=gridbox_l></td>
          <td class=black_content>
            <table cellSpacing=0 cellPadding=1 width="100%" border=0>
              <tbody>
              <tr>
                <td class=gridtext align=left><strong>GRID STATUS:</strong></td>
                <td class=gridtext align=right>
				  <?php if($GRIDSTATUS == '1'){?>
				    <span class=ONLINE>ONLINE</span>
				  <?php }else {?>
				    <span class=OFFLINE>OFFLINE</span>
				  <?php } ?>
				</td>
              </tr>
              </tbody>
            </table>

            <div id=GREX style="MARGIN: 1px 0px 0px"><img height=1 src="images/login_screens/spacer.gif" width=1 /></div>
            <table cellSpacing=0 cellPadding=0 width="100%" border=0>
              <tbody>
              <tr bgColor=#151515>
                <td class=gridtext vAlign=top noWrap align=left>Total Users:</td>
                <td class=gridtext vAlign=top noWrap align=right width="1%"><?php echo $USERCOUNT?></td>
              </tr>
              <tr bgColor=#000000>
                <td class=gridtext vAlign=top noWrap align=left>Total Regions:</td>
                <td class=gridtext vAlign=top noWrap align=right width="1%"><?php echo $REGIONSCOUNT?></td>
              </tr>
              <tr bgColor=#151515>
                <td class=gridtext vAlign=top noWrap align=left>Unique Visitors last 30 days:</td>
                <td class=gridtext vAlign=top noWrap align=right width="1%"><?php echo $LASTMONTHONLINE?></td>
              </tr>
			  <tr bgColor=#000000>
                <td class=gridtext vAlign=top noWrap align=left><strong>Online Now:</strong></td>
                <td class=gridtext vAlign=top noWrap align=right width="1%"><strong><?php echo $NOWONLINE?></strong></td>
              </tr>
			  </tbody>
            </table>
          </td>
          <td class=gridbox_r></td>
        </tr>
        <tr>
          <td class=gridbox_bl></td>
          <td class=gridbox_b></td>
          <td class=gridbox_br></td>
        </tr>
        </tbody>
      </table>
    </td>
  </tr>
  </tbody>
</table>
