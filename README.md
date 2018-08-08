### PHP Bulk Mailk Sender

* A simple php script to send mail to recipents for some small ocassions/event.
* Good to send mail when number of recipients are less in number.
* Send custom HTML format for the emails.
* Provide the credentials of the account from which you wish to send the emails in "mail.php".

Run from terminal as:

	php mail.php file_contain_recipeient_data template.html mail_subject

Format for the data file is as:

	Some Name,someoneelse@example.com

The script uses PHPMailer. A classic email sending library for PHP.
Link: https://github.com/PHPMailer/PHPMailer
