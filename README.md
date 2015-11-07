## HOW TO USE WP_FEED
The file structure of wp_feed consists of two files
  wp_feed.php
  message_db.txt

**wp_feed.php**
This file contains the text reader, code reformat and mysql queries necesary
for this bot to can post your content on your website.
The code is simple and does not contain backend. In order to make it works you need
to setup your wordpress connection data in wp_feed.php<br />
  `$server = "localhost";` <br />
  `$username = "wpadmin";` <br />
  `$password = "password";`<br />

**message_db.txt**
This file contains the text to post in the correct format **POST TITLE|POST DATA**
As you can see the pipe **|** is used to separate the post title from the content
so the reader in wp_feed.php can separate it in two variables
  `$title` <br />
  `$content` <br />

**Adding content to message_db.txt**
I recommend using **notepad++** for this task. <br />
Press CTRL-H to bring up the Find/Replace Dialog. Choose the "Regular expressions" checkbox near the bottom of the dialog. <br />
To add something to the beginning of each line, type ^ in the "Find what" field and "whathever your text is" in the "Replace with" field. Then hit "Replace All". <br />
If you want to add something at the end of line type $
in the "Find what" field and type "your text" in the
"Replace with" field. Then "Replace All". <br />
