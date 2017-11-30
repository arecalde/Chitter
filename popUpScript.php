<?php 

	echo "<a href='#' onclick='showDiv".$ids[$b]."()'>".$firstnames[$b]." ".$lastnames[$b]."</a><br />";
			echo "
				<div id='popup".$ids[$b]."' style='border-style: solid; border-width: 10px;background-color: white; width: 30%; height: 15%; position: absolute; top: 40%; left: 40%;'>
					<a href='#' onclick='hideDiv".$ids[$b]."()'>X</a><br />
					<a href='includes/action.php?act=addCntct&id=".$ids[$b]."'>Add ".$firstnames[$b]." ".$lastnames[$b]." as a contact</a><br />

					<a href='msg.php?id=".$ids[$b]."'>Chat with ".$firstnames[$b]." ".$lastnames[$b]."</a>
				</div>
				<script type='text/javascript'>
					var popup".$ids[$b]." = document.getElementById('popup".$ids[$b]."');
					popup".$ids[$b].".style.display = 'none';
					function showDiv".$ids[$b]."(){
						popup".$ids[$b].".style.display = 'block';

					}
					function hideDiv".$ids[$b]."(){
						popup".$ids[$b].".style.display = 'none';

					}
				</script>";
//all of these variables will be accesible from the page they are called from
?>
