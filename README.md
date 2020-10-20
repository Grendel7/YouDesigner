# YouDesigner - The Ultimate YouHosting Theme Developers Tool!

**Archive notice: with YouHosting being shut down, this tool is no longer being maintained.**

Would you like to test your new **YouHosting control panel** theme without having to upload it to the actual control panel? Would you prefer to design your theme using your favorite HTML and CSS editor instead of having to use a basic text area for it?

This tool provides the solution: a local web application which can render YouHosting theme files just like the actual control panel!


## Getting Started
To use this tool, you need to have a local Apache server (with mod_rewrite) and PHP (>=5.3) installed. If you don't have that yet, you can install packages like [XAMPP](https://www.apachefriends.org/index.html) which make setting it up easy.

Next you will have to download YouDesigner itself and extract it to the document root of your locally installed web server. Two editions are available:

 * Designers Edition - A ready to go package which should work right away.
 * Developers Edition - Includes all files to be installed with Composer.

## Using YouDesigner
All theme files reside in the "theme" directory in the application main folder. YouDesigner comes preinstalled with the Windy default theme which can be used as a base for your own theme. Every file in that folder maps to a template file (e.g. login.html is the Login page, default.html is the Default page).

In addition to the theme files are the files newaccount.html and upgrade.html. These files represent the customizable New Account Form and Upgrade Account Form. This way you can also test your new forms.

After you've placed your own theme in the folder, navigate to the application root folder in your browser. You'll see a page with links to all available theme pages. Simply click these links to see your theme in use.

## Issues and Feature Requests
As with all software, there can be issues and room for improvement. If you find anything missing or encounter an issue, please post it under the Issues section on GitHub. 

If you would like to contribute, I'm happy to accept pull requests!
