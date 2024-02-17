<?php
function COOKIE_DIR()
			{
				require_once 'types.php';
				$cook=$_COOKIE["FM_user"];
			if ($cook) {
					$dir=($cook=="root")?"../":"../{$cook}/";
					$D=scandir($dir);
					echo "<table>";
					echo "<thead>
					<th>Name</th>
					<th>Type</th>
					</thead><tbody>";
					foreach (array_splice($D,2) as $key => $value) {
				
				if (mime_content_type($dir.$value)=='directory') 
					{
						echo "<tr class='callout alert'><td><a href='$dir$value' target='_top'><img src='folder.png' width='30' height='50'>&nbsp;$value</a></td><td style='color:rgb(255,150,120)'>".mime_content_type($dir.$value).'</td></tr>';
					}	
				
					else
					{
							if (mime_content_type($dir.$value)==$types["txt"]) {
								
								echo "<tr class='callout warning '><td><a href='$dir$value' target='_top'><img src='txt.png' width='30' height='50'>&nbsp;$value</a></td><td style='color:rgb(100,205,10)'>"."TXT"."</td></tr>";
							}
							elseif (mime_content_type($dir.$value)==$types["json"]) {
								echo "<tr class='callout warning '><td><a href='$dir$value' target='_top'><img src='json.png' width='30' height='50'>&nbsp;$value</a></td><td style='color:rgb(10,120,50)'>"."JSON"."</td></tr>";
							}
							elseif (mime_content_type($dir.$value)==$types["js"]) {
								echo "<tr class='callout warning '><td><a href='$dir$value' target='_top'><img src='js.png' width='30' height='50'>&nbsp;$value</a></td><td style='color:rgb(20,150,20)'>"."JS"."</td></tr>";
							}
							
						
						elseif (mime_content_type($dir.$value)==$types["html"]) {
								echo "<tr class='callout success darken-1 lime  white-text'><td><a href='$dir$value' target='_blank'><img src='html.png' width='30' height='50'>&nbsp;$value</a></td><td style='color:rgb(10,205,100)'>"."HTML"."</td></tr>";
						}
						elseif (mime_content_type($dir.$value)==$types["php"]) {
							
								echo "<tr class='callout success darken-1 lime  white-text'><td><a href='$dir$value' target='_blank'><img src='php.png' width='30' height='50'>&nbsp;$value</a></td><td style='color:rgb(10,205,100)'>"."PHP"."</td></tr>";
							
						}

						elseif (mime_content_type($dir.$value)==$types["gif"]) {
								echo "<tr class='callout warning ' ><td><a href='$dir$value' target='_top'><img src='gif.png' width='30' height='50'>&nbsp;$value</a></td><td style='color:rgb(10,120,50)'>"."GIF"."</td></tr>";
						}
						elseif (mime_content_type($dir.$value)==$types["png"]) {
								echo "<tr class='callout warning ' ><td><a href='$dir$value' target='_top'><img src='png.png' width='30' height='50'>&nbsp;$value</a></td><td style='color:rgb(5,50,150)'>"."PNG"."</td></tr>";
						}
						elseif (mime_content_type($dir.$value)==$types["svg"] ){
								echo "<tr class='callout warning ' ><td><a href='$dir$value' target='_top'><img src='svg.png' width='30' height='50'>&nbsp;$value</a></td><td style='color:rgba(50,20,80,.3)'>"."SVG"."</td></tr>";
						}
					}

				}
				echo "</tbody></table>";
			}
			else{header("LOCATION:/FM/");}
			return false;
			}	

$SQL=new mysqli("localhost","root","279348","__FM__");
?>
