<?php
    require 'session.php'; 

    if(isset($_POST['submit']))
    {
        require_once('../PHPMailer/PHPMailerAutoload.php');
        $from=$_POST['send'];
        $password=$_POST['password'];
        $to=$_POST['receive'];
        $cc=$_POST['cc'];
        $bcc=$_POST['bcc'];
        $sub=$_POST['sub'];
        $body=$_POST['body'];

        $headers="From: ".$from."\r\n";


        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = '465';
        $mail->isHTML();
        $mail->Username = $from;

        $mail->Password = $password;
        $mail->Subject = $sub;
        $mail->Body = $body;
        $mail->AddAddress($to);
        $mail->AddBCC($bcc);
        $mail->AddCC($cc);

        if($mail->Send()){
            //echo "<h2>Email sent successfully!!!</h2>";
            echo "<script>alert('email sent')</script>";
            header("location: contact.php");

        }
        else echo "<h2>There was an error, Please try again!!!</h2>";
    }

?>

<!DOCTYPE html>
<html>
    
    <?php include('templates/header.php'); ?>
    
    <table>
        <form action="send_mail.php" method="post">
            <tr>
            	<td><label style="font-size: 25px">Sender:</label>	</td>
            	<td><input type="email" name="send" value="<?php echo htmlspecialchars($_COOKIE['user_email'])?>"></td>
            </tr>
            <tr>
            	<td><label style="font-size: 25px">Sender Password:</label><br></td>
            	<td><input type="password" name="password" required></td>
            </tr>
            <tr>
            	<td><label style="font-size: 25px">Receiver:</label> </td>
            	<td><input type="email" name="receive" value="<?php echo htmlspecialchars($_POST['receiver_email'])?>"> </td>
            </tr>
            <tr>
            	<td><label style="font-size: 25px">CC:</label></td>
            	<td><input type="email" name="cc"></td>
            </tr>
            <tr>
            	<td><label style="font-size: 25px">BCC:</label></td>
            	<td><input type="email" name="bcc">	</td>
            </tr>
            <tr>
            	<td><label style="font-size: 25px">Subject:</label></td>
            	<td><input type="text" name="sub" required></td>
            </tr>
            <tr>
            	<td><label style="font-size: 25px">Content:</label></td>
            	<td><input type="text" name="body"></td>
            </tr>
            <tr>
            	<td colspan=2><center><input type="submit" name="submit" value="Send" class="btn brand z-depth-0"></center></td>
            </tr>
        </form>
    </table>

    <?php include('templates/footer.php'); ?>

</html>