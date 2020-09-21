# Server Mamager

## Requirements

**Lando**

lando is used to create a local environment with Docker. Lando is not required to make this application working but to build the application quickly, the `.lando.yml` is provided. To download Lando, go to the Lando [download page](https://lando.dev/download/).

## Build the application

Considering you have successfully installed Lando, here are the steps to make the application works.

**Clone the Git repository to you computer.**

`git clone git@github.com:marcolivierfortin/server-manager.git`

**Move in the project directory.**

`cd server-manager/`

**Start the Lando containers.**

`lando start`

**Import the MySQL database.**

`lando db-import database/db.sql`

**Access the web application**

Go in your favorite browser with the following address. Note that the SSL certificate is not verified so you will need to manually approve it in the browser.

https://server-manager.lndo.site/

If you decide to use Docker directly without Lando, note that the provided URL will not work, you will have a different URL and to make sure that the application is working with your URL, you will need to change the URL in this configuration file `web/application/config/config.php` at line 26.

`$config['base_url'] = 'https://server-manager.lndo.site/';`

## Use the application

### User management

Two user accounts has been created for the site, one is active and the other one is inactive. The first one will be able to log in to the site and the second one not, this is to demonstrate the ability to have inactive users (there is not UI build for the user management).

**Active user account**

Username : `first-administrator`
Password : `SaZRp@89gc`

**Inactive user account**

Username : `second-administrator`
Password : `XAV-R_ejGH`

After logged in to the site, a log out button will be displayed on all pages to quit the site.

### Server management

After sucessfully logged in to the site, you will be redirected to the "All servers" page. This page list all the servers on the site.

On this page, you will be able to create new servers with the "Add server" link. The list below will display all servers with their information (name and description) in a table. In each row, a "Edit" link and a "Delete" link will be displayed and will allow you to get to the right form to perform the required operation.

After each operation you make on the site, a message will be displayed to you to confirm that the operations was done successfully.
