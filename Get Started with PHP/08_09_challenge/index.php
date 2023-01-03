<?php $form_complete = null; ?>
<h2>Contact</h2>
<style>
    .alert {
        color: red;
        font-weight: bold;
    }
</style>
<form name="contact" method="post" action="process.php">
	<div>
        <?php
            if (isset($_POST['name']) && empty(trim($_POST['name']))) {
                echo "<p class=\"alert\">Name is required</p>";
                $form_complete = false;
            }
        ?>
        <label for="name">Name: </label>
        <input id="name" type="text" name="name" placeholder="Your Name" required/>
    </div>
    <div>
        <?php
            $email_regex = '^[\w\.=-]+@[\w\.-]+\.[\w]{2,3}$^';
            if (isset($_POST['email']) && empty(trim($_POST['email']))) {
                echo "<p class=\"alert\">Email is required</p>";
                $form_complete = false;
            } else if (isset($_POST['email']) && !preg_match($email_regex, $_POST['email'])) {
                echo "<p class=\"alert\">Please enter a valid Email Address.</p>";
            }
        ?>
        <label for="email">Email:</label>
        <input id="email" type="email" name="email" placeholder="Your Email" required/>
    </div>
    <div>
        <p>Reason for Contact</p>
        <input type="radio" name="reason" id="request" value="request" required/>
        <label for="request">Request</label>
        <input type="radio" name="reason" id="suggest" value="suggest" required/>
        <label for="suggest">Suggest</label>
        <input type="radio" name="reason" id="inform" value="inform" required/>
        <label for="suggest">Inform</label>
    </div>
    <div>
        <label for="message">Enter your message!</label>
        <textarea name="message" id="message" required></textarea>
    </div>
    
    <br>
    <input type="submit" name="submit" vaslue="Submit"/>
    <pre>
        <?php var_dump($_POST) ?>
    </pre>
</form>
