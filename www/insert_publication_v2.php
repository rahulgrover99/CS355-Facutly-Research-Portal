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
	<script language="Javascript">
               	function hideA(x) {
				   if (x.checked) {
				     document.getElementById("A").style.display = "none";
				     document.getElementById("B").style.display = "block";
				   }
				 }

				 function hideB(x) {
				   if (x.checked) {
				     document.getElementById("B").style.display = "none";
				     document.getElementById("A").style.display = "block";
				   }
				 }
           </script>
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
                $field.innerHTML = 'Author Rank';
                $field.style.margin = '0px 10px';
                $item.appendChild($field);

                $field = document.createElement('input');
                $field.name = 'arank[' + $i + ']';
                $field.type = 'text';
                $item.appendChild($field);

                $container.appendChild($item);
            }
        }

    </script>
	<title>Add Publication</title>
    <link rel="stylesheet" href="p1_v2.css">
</head>
<body>
<div class="container">  
        <form id="contact" action="insert_publication.php" method="get">
            <h3>New Publication</h3>
            <h4>Enter the details for the new publication :</h4>
            <fieldset>
            <input placeholder="Publication ID" type="text" name="id" tabindex="1" required autofocus>
            </fieldset>
            <fieldset>
            <input placeholder="Pages" type="text" name = "pg" tabindex="2" required>
            </fieldset>
            <fieldset>
            <input placeholder="Paper Name" type="text" name = "name" tabindex="3" required>
            </fieldset>
            <fieldset>
            <input placeholder="Topic" type="text" name = "topic" tabindex="4" required>
            </fieldset>
            <fieldset>
                    Date of Publish : 
            <input placeholder="Date of Publish" type="date" name = "dop" tabindex="5" required>
            </fieldset>
            <fieldset>
                    <input type="radio" onchange="hideB(this)" name="aorb" checked>Conference&emsp;
                    <input type="radio" onchange="hideA(this)" name="aorb">Journal
            </fieldset>
           
                <div id="A">
                 <fieldset><input type="text" name="cn" placeholder="Conference Name"></fieldset>
                </div>
                <div id="B" style="display:none">
                 <fieldset><input type="text" name="jn" placeholder="Journal Name"></fieldset>
                 <fieldset></fieldset><input type="text" name="vol" placeholder="Volume"></fieldset>
                 <fieldset></fieldset><input type="text" name="num" placeholder="Number"></fieldset>
                </div>

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