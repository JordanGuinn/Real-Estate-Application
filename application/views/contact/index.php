<div class="minimal-content">
    <div class="container-fluid">
        <div class="col-md-1"></div>
        <address class="col-md-4">
            <h2 class="page-header">Listed Inc.</h2>
            <h3> <p>1600 Holloway Ave </p>
                <p>San Francisco, CA 94132</p>
                <p>Phone: 415-338-0000</p>
                <p>Fax: 405-338-0000</p>
                <p>Email: hello@Listed.com</p>
                <p>Hours: Mon-Fri (8:00 - 5:00)</p>
            </h3>
        </address>
        <div class=" bs-example row col-md-5 center-block">
            <h3>Contact us</h3>
            <form action="#" >
                <div class="form-group">
                    <label for="inputName">Name:</label>
                    <input type="text" class="form-control" id="inputName" placeholder="Name" required/>
                    <label for="inputNumber">Contact Number:</label>
                    <input type="number" class="form-control" id="inputNumber" placeholder="Number" required/>
                    <label for="inputEmail">Email:</label>
                    <input type="email" class="form-control" id="inputEmail" placeholder="Email" required/> 
                    <label for="inputMessage">Message:</label>
                    <textarea class="form-control" rows="5" id="inputMessage" placeholder="Message" required></textarea>
                    <br> <button type="submit" class=" btn btn-primary btn-lg col-lg-offset-10" onclick="sendemail()">Send</button> <br>
                </div>
            </form>
        </div> 
    </div>
</div>
<script>
<?php

function sendemail() {
    require_once('class.phpmailer.php');
    $mail = new PHPMailer(); // defaults to using php "mail()"
    $mail->IsSendmail(); // telling the class to use SendMail transport
    $mail->AddReplyTo("jordanguinn91@gmail.com", "First Last");
    $mail->SetFrom('jordanguinn91@gmail.com', 'First Last');
    $mail->AddReplyTo("jordanguinn91@gmail.com", "First Last");
    $address = "jordanguinn91@gmail.com";
    $mail->AddAddress($address, "John Doe");
    $mail->Subject = "PHPMailer Test Subject via Sendmail, basic";
    $mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
    $mail->MsgHTML($body);
    if (!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
    }
}
?>
</script>