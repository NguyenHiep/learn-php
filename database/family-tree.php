<!DOCTYPE html>
<html>
	<head>
		<title> Tree Family </title>
		<meta charset="UTF-8" />
		<style type="text/css">
			/*Now the CSS*/
			* {margin: 0; padding: 0;}
			.tree{
				margin: 0 auto;
				width: 960px;
			}
			.tree ul {
				padding-top: 20px; position: relative;
				transition: all 0.5s;
				-webkit-transition: all 0.5s;
				-moz-transition: all 0.5s;
			}

			.tree li {
				float: left; text-align: center;
				list-style-type: none;
				position: relative;
				padding: 20px 5px 0 5px;
				
				transition: all 0.5s;
				-webkit-transition: all 0.5s;
				-moz-transition: all 0.5s;
			}

			/*We will use ::before and ::after to draw the connectors*/

			.tree li::before, .tree li::after{
				content: '';
				position: absolute; top: 0; right: 50%;
				border-top: 1px solid #ccc;
				width: 50%; height: 20px;
			}
			.tree li::after{
				right: auto; left: 50%;
				border-left: 1px solid #ccc;
			}

			/*We need to remove left-right connectors from elements without 
			any siblings*/
			.tree li:only-child::after, .tree li:only-child::before {
				display: none;
			}

			/*Remove space from the top of single children*/
			.tree li:only-child{ padding-top: 0;}

			/*Remove left connector from first child and 
			right connector from last child*/
			.tree li:first-child::before, .tree li:last-child::after{
				border: 0 none;
			}
			/*Adding back the vertical connector to the last nodes*/
			.tree li:last-child::before{
				border-right: 1px solid #ccc;
				border-radius: 0 5px 0 0;
				-webkit-border-radius: 0 5px 0 0;
				-moz-border-radius: 0 5px 0 0;
			}
			.tree li:first-child::after{
				border-radius: 5px 0 0 0;
				-webkit-border-radius: 5px 0 0 0;
				-moz-border-radius: 5px 0 0 0;
			}

			/*Time to add downward connectors from parents*/
			.tree ul ul::before{
				content: '';
				position: absolute; top: 0; left: 50%;
				border-left: 1px solid #ccc;
				width: 0; height: 20px;
			}

			.tree li a{
				border: 1px solid #ccc;
				padding: 20px 25px;
				text-decoration: none;
				color: #666;
				font-family: arial, verdana, tahoma;
				font-size: 11px;
				display: inline-block;
				
				border-radius: 5px;
				-webkit-border-radius: 5px;
				-moz-border-radius: 5px;
				
				transition: all 0.5s;
				-webkit-transition: all 0.5s;
				-moz-transition: all 0.5s;
			}

			/*Time for some hover effects*/
			/*We will apply the hover effect the the lineage of the element also*/
			.tree li a:hover, .tree li a:hover+ul li a {
				background: #c8e4f8; color: #000; border: 1px solid #94a0b4;
			}
			/*Connector styles on hover*/
			.tree li a:hover+ul li::after, 
			.tree li a:hover+ul li::before, 
			.tree li a:hover+ul::before, 
			.tree li a:hover+ul ul::before{
				border-color:  #94a0b4;
			}
		</style>
	</head>
	
	<body>
		<div class="tree">
			<?php
					$servername = "localhost";
					$username = "root";
					$password = "";
					$html = '';
					$html .= '<ul>';
					try {
						$conn = new PDO("mysql:host=$servername;dbname=treefamily;charset=utf8", $username, $password);
						// set the PDO error mode to exception
						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						//echo "Kết nối thành công";
						$query = $conn->query("SELECT * FROM tblbinaryusers");
						$data = array();
						while($row=$query->fetch(PDO::FETCH_ASSOC)) {
							if($row['parent_no'] == 0){
								$html .= '<li><a href="#">'.$row['First_name'].'</a>';
									//Query cac bien con
									$query1 = $conn->query("SELECT * FROM tblbinaryusers WHERE parent_no = '".$row['id']."'");
									$count = $query1->rowCount(); //Đếm số recode trả về
									if($count > 0){
										$html .= '<ul>';
											while($row1=$query1->fetch(PDO::FETCH_ASSOC)) {
												if($row1['parent_no'] == $row['id']){
													$html .= '<li><a href="#">'.$row1['First_name'].'</a>';
														$query2 =  $conn->query("SELECT * FROM tblbinaryusers WHERE parent_no = '".$row1['id']."'");
														$count2 = $query2->rowCount(); //Đếm số recode trả về
														if($count2 > 0){
															$html .= '<ul>';
																while($row2=$query2->fetch(PDO::FETCH_ASSOC)) {
																	if($row2['parent_no'] == $row1['id']){
																		$html .= '<li><a href="#">'.$row2['First_name'].'</a>';
																		
																		$html .= '</li>';
																	}
																} //End  loop
															$html.= '</ul>';
														}
													$html .= '</li>';
												}
											} //End loop
																
										$html.= '</ul>';
									}
								$html .= '</li>';
								
							}
						}
						
					}
					catch(PDOException $e){
						echo "Kết nối thất bại: " . $e->getMessage();
					}
					$html .= '</ul>';
					echo $html;
			?>
			
		</div>
			
	</body>
</html>
