<?php
    session_start();
    if(!isset($_SESSION['username'])){
         $home_url = 'http://' . $_SERVER['HTTP_HOST'] .'/login.php';
         header('Location: ' . $home_url);
    }
    //echo $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>New Project</title>
    <link rel="stylesheet" href="p1_v2.css">
    <script type="text/javascript">

		function BuildFormFields($amount)
		{
			var
				$container = document.getElementById('FormFields'),
				$item, $field, $i;

			$container.innerHTML = '';
			for ($i = 0; $i < $amount; $i++) {
				$item = document.createElement('div');
				$item.style.margin = '3px';

				$field = document.createElement('span');
				$field.innerHTML = 'Faculty ID';
				$field.style.marginRight = '10px';
				$item.appendChild($field);

				$field = document.createElement('input');
				$field.name = 'facs[' + $i + ']';
				$field.type = 'text';
				$item.appendChild($field);

				$field = document.createElement('span');
				$field.innerHTML = 'Role';
				$field.style.margin = '0px 10px';
				$item.appendChild($field);

				$field = document.createElement('input');
				$field.name = 'role[' + $i + ']';
				$field.type = 'text';
				$item.appendChild($field);

				$container.appendChild($item);
			}
		}

	</script>
</head>

<body>
    <div class="container">  
            <form id="contact" action="insert_project.php" method="get">
                <h3>New Project</h3>
                <h4>Enter the details for the new project :</h4>
                <fieldset>
                    <input placeholder="Project ID" type="text" name="id" tabindex="1" required autofocus>
                    </fieldset>
                    <fieldset>
                    <input placeholder="Name" type="text" name = "name" tabindex="2" required>
                    </fieldset>
                    <fieldset>
                    <input placeholder="Budget" type="text" name = "bug" tabindex="3" required>
                    </fieldset>
                    <fieldset>
                            <input placeholder="Sponsor" type="text" name = "sp" tabindex="3" required>
                    </fieldset>
                    <fieldset>
                            <input type="text" placeholder="Number of faculties" onkeyup="BuildFormFields(parseInt(this.value, 10));" />
		                    <div id="FormFields" style="margin: 10px 0px;"></div>
                    </fieldset>
                    <fieldset>
                        <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
                    </fieldset>
                </form>
                </div>

</body>
</html>