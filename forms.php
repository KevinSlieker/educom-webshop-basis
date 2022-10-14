<?php
/*
showFormStart();
showFormSectionStart("preamble");
showFormItem("preamble", "select", "Aanhef:", $data, NULL, array('mr'  => "Meneer", 'mrs' => "Mevrouw"));
showFormSectionEnd();

<div class="preamble">
<label for="preamble">Aanhef: </label>
<select id="preamble" name="preamble">
    <option value="mr"';  if (isset($data['preamble']) && $data['preamble'] == "mr") echo "selected"; echo'>Meneer</option>
    <option value="mrs"';  if (isset($data['preamble']) && $data['preamble'] == "mrs") echo "selected"; echo'>Mevrouw</option>
</select> <br>
</div>



showFormSectionStart("info");
showFormItem("name", "text", "Naam:", $data,  "John");

...
showFormEnd("contact", "Submit");


<div class="info">
		<br>
		<label for="name">Naam:</label>
		<input type="text" id="name" name="name" value="' . $data['name']. '" placeholder="John">
		<span class="error"> ' . $data['nameErr'] . ' </span><br><br>
		<label for="email">Email:</label>
		<input type="email" id="email" name="email" value="' . $data['email'] . '" placeholder="Doe@gmail.com">
		<span class="error"> ' . $data['emailErr'] . ' </span><br><br>
		<label for="phonenumber">Telefoonnummer:</label>
		<input type="tel" id="phonenumber" name="phonenumber" value="' . $data['phonenumber'] . '" placeholder="0612345678">
		<span class="error">' . $data['phonenumberErr'] . '</span><br><br>
	</div>
*/

function showFormStart() {
    echo '<form action="index.php" method="post">' . PHP_EOL;
}

function showFormSectionStart($key) {
    echo '<div class="' . $key . '">' . PHP_EOL;
}

function showFormItem($key, $type, $label, $data, $placeholder = NULL, $options = array()) {
    echo '<label for="' . $key . '">' . $label . ' </label>' . PHP_EOL;
        if ($type == "select"){
            echo '<' . $type . ' id="' . $key . '" name="' . $key . '">' . PHP_EOL;
        } else {
            echo '<input type="' . $type . '"id="' . $key . '" name="' . $key . '" placeholder="' . $placeholder . '">' . PHP_EOL;
        }
       '<span class="error"> ' . $data['' . $key . 'Err'] . ' </span><br><br>' . PHP_EOL;
        if ($type == "select") {
            foreach($options as $key => $value){
            echo '<option value="' . $key .'"'; if (isset($data[$key]) && $data[$key] == "$key") echo "selected"; echo'>' . $value . '</option>' . PHP_EOL;
        }  echo '</select>' . PHP_EOL;
    }
}

function showFormSectionEnd() {
    echo '</div>' . PHP_EOL;
}

function showFormEnd() {
    echo '</form>' . PHP_EOL;
}


?>