function addGamePlay(){
  var td = '<td><label for="gp<?php echo $count ?>"></label><br /><br /><textarea name="gp<?php echo $count ?>" id="gp<?php echo $count ?>" cols="30" rows="2"><?php if (isset($gp[$count])) { echo $gp[$count]; } ?></textarea><br /><label for="gpn<?php echo $count ?>"></label><input type="text" name="gpn<?php echo $count ?>" id="gpn<?php echo $count ?>" value="<?php if (isset($gpn[$count])) { echo $gpn[$count]; } ?>" size="32"><?php $count++; ?></td><td><label for="gp<?php echo $count ?>"></label><br /><br /><textarea name="gp<?php echo $count ?>" id="gp<?php echo $count ?>" cols="30" rows="2"><?php if (isset($gp[$count])) { echo $gp[$count]; } ?></textarea><br /><label for="gpn<?php echo $count ?>"></label><input type="text" name="gpn<?php echo $count ?>" id="gpn<?php echo $count ?>" value="<?php if (isset($gpn[$count])) { echo $gpn[$count]; } ?>" size="32"><?php $count++; ?></td><td><label for="gp<?php echo $count ?>"></label><br /><br /><textarea name="gp<?php echo $count ?>" id="gp<?php echo $count ?>" cols="30" rows="2"><?php if (isset($gp[$count])) { echo $gp[$count]; } ?></textarea><br /><label for="gpn<?php echo $count ?>"></label><input type="text" name="gpn<?php echo $count ?>" id="gpn<?php echo $count ?>" value="<?php if (isset($gpn[$count])) { echo $gpn[$count]; } ?>" size="32"><?php $count++; ?></td>';
  var newtr = document.createElement("tr");
  var tdtags = document.createTextNode(td);
  newtr.appendChild(tdtags);

}

function removeGamePlay(){

}
