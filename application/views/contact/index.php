<!-- put html content here -->
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<style type="text/css">
    .bs-example{
        margin: 20px;
    }
</style>
<div class="container-fluid">
    <h2 class="col-md-6"> Our Location</h2>
    <h2 class="col-md-4">Listed HQ</h2>

    <iframe class="embed-responsive-item col-md-6" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12624.201037800864!2d-122.48401866445573!3d37.718498119086085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808f7db005c0e281%3A0xa57a7c9f946a45d3!2sSan+Francisco+State+University!5e0!3m2!1sen!2sus!4v1415239460246" width="350" height="350" frameborder="1" style="border:1"></iframe><br>

    <address class="col-md-4">
        <h3> <p>1600 Holloway Ave </p>
            <p>San Francisco, CA 94132</p>
            <p>Phone: 415-338-0000</p>
            <p>Email: hello@Listed.com</p>
            <p>Hours: M T W T F (8:00 - 5:00)</p>
        </h3>

        <a class="btn btn-social-icon btn-lg btn-twitter">
            <i class="fa fa-twitter"></i>
        </a>
        <a class="btn btn-social-icon btn-lg btn-facebook">
            <i class="fa fa-facebook"></i>
        </a>
        <a class="btn btn-social-icon btn-lg btn-link">
            <i class="fa fa-linkedin"></i>
        </a>
    </address>
    <div class="bs-example">
        <div class="row col-md-8 center-block">
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
                    <br> <button type="submit" class="btn btn-default" onclick="sendemail()">Send</button> <br>
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