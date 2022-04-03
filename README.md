# KVS external smtp

This project working [**Kernel Video Sharing Scripts  （KVS）**](https://www.kernel-video-sharing.com/en/ "**Kernel Video Sharing Scripts **")	
  	
The KVS php mail function use by default , it's not good idea 		  

We extended it to support external SMTP		  

now you can use

- [AWS SES](https://aws.amazon.com "AWS SES")
- [SendGrid](https://sendgrid.com "SendGrid")
- [MailGun](https://www.mailgun.com/smtp/ "MailGun")
- more

### Using
download this file
upload to /admin/include

### Configure
edit  /admin/include/setup.php

```
// # SMTP Config
$config['smtp_host']="email-smtp.us-east-1.amazonaws.com";
$config['smtp_port']="587";
$config['smtp_user']="you user";
$config['smtp_pass']="your pass";
$config['smtp_from']="noreply@yourdomain.com";
$config['smtp_name']="Sender Name";
$config['replytous']="support@yourmail.com";

```
change the value and add this to after `$config['project_title']="CMS";` line

### Testing
login you KVS site admin `https://youdomain.com/admin/emailing.php`
1. go to Memberzone  => Create emailing

3. input  subject , content and email address

5. try click Send
6. check your mailbox

enjoy


### debug



