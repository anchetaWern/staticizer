###Yet Another Static Site Generator?

No. This isn't unlike any static site generator out there. I created this project to create a static version for my [antares project](https://github.com/anchetaWern/antares). So you can use this to create a static version of an existing project. All it really does is request a URL in your local machine and create an HTML file out of it.

###How to Use

First you have to update the `index.php` file and write your own code for fetching the pages in the website you want to convert to a static one.

Next, update the `config.php` file and change the values for the `BASE_URL` and `STATIC_PATH`. The `BASE_URL` is the base URL of the website you want to convert. The `STATIC_PATH` is the base directory where you want to save the generated HTML files. And the `JSON_PATH` is the base directory where you want to save the generated JSON files if any.

```
<?php
define('BASE_URL', 'http://antaresapp.dev/');
define('STATIC_PATH', 'site');
define('JSON_PATH', 'json');
?>
```

####Deployment

This works best with Github pages. Just create a new Github account that directly matches the name of the website. As an example, I created a Github account and named it antaresapp. I then created a new repository named [antaresapp.github.io](https://github.com/antaresapp/antaresapp.github.io). This will serve as the repository that the Github page will use. Remember that you can only create a single Github page for every Github account.

On your static path, initialize a new Git repo and add the Github page repository as a remote. 

Lastly, you can use this project by executing the following commands from your terminal. 

To update the database:

```
php update.php
```

To generate the static HTML files and JSON files:

```
php generate.php
```

To push the changes to the Github repo:

```
php push.php
```

When you push to the repo for the first time, you need to use the credential store to store the username and password and then push to the repo with git. This would then ask you for your Github username and password. Enter those and the credential store will store it so that next time you can already push using the PHP script `push.php`.

```
git config credential.helper store
git push -u origin master
```


##Project Status

Abandonware. I no longer have any plans on improving and maintaining this project.


##License

The MIT License (MIT) Copyright (c)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.