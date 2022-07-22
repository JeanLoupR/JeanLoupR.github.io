<?php

//rajout JLR Si le champ remarque est saisi, c’est un spam, les données sont écartées
if ($_POST['remarque'] != "") { die(); }
//Si le champ remarque n’existe pas, et dans ce cas le formulaire a été traité par un robot de spam à partir de la réponse HTTP, les données sont également écartées
if ( ! isset($_POST['remarque']) ) { die(); }

// if the url field is empty
if(isset($_POST['website']) && $_POST['website'] == ''){

	// put your email address here
	$youremail = 'jeanloup@richet.it';

	// prepare a "pretty" version of the message
	// Important: if you added any form fields to the HTML, you will need to add them here also
	$body = "This is the form that was just submitted:
	Name:  $_POST[name]
	E-Mail: $_POST[email]
	Message: $_POST[message]";

	// Use the submitters email if they supplied one
	// (and it isn't trying to hack your form).
	// Otherwise send from your email address.
	if( $_POST['email'] && !preg_match( "/[\r\n]/", $_POST['email']) ) {
	  $headers = "From: $_POST[email]";
	} else {
	  $headers = "From: $youremail";
	}

	// finally, send the message
	mail($youremail, 'Contact Form', $body, $headers );

}

// otherwise, let the spammer think that they got their message through

?>
<!DOCTYPE HTML>
<html>
<head>

<title>Thanks!</title>

</head>
<body>

<h1>Thanks</h1>
<p>I will get back to you as soon as possible.</p>

</body>
</html>