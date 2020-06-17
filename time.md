<p>
    10 minutes - quickly decided I wanted to use Laravel, it's what I'm used to and it works brilliantly.
</p>

<p>
    30 minutes - Drew a basic bootstrap table design how I envisaged the page looking. Wanted a nice simple single page layout.
</p>

<p>
    30 minutes - Set up basic laravel environment, using MAMP for my web server. Also thought about deploying the application.
    Researched some free web app deployment sites and decided on Heroku. It quickly connects to github and offers free SQL 
    Databases (basic ones with minimal tables/columns). 
</p>

<p>
    10 minutes - Set up SQL database via Heroku add-ons. Table 'rss_feeds' with 'id', 'url', 'created_at' and 'updated_at' fields.
</p>

<p>
    Luckily as I already have an environment setup, I didn't need to install any additional packages. Instructions added for new environment setup however.
</p>

<p>
    2 Hours - Started coding, initially just got the application to parse the infomation from a set RSS to the page.
    Once I was happy with the data being generated and passed to the page, I then started working on the design. I decided
    I wanted to have an input box with the ability to store the drop down fields from our database. 
</p>

<p>
    1 Hour - Tested SQL insert and delete code, made sure I was happy the database connection was working prior to creating
    the Feeds.php model to handle this correctly.
</p>

<p>
    2 Hours - Created the Feeds.php model located within app/, specified the table name in order to use later on.
    I am now able to retrieve, add, delete and update the records in the database without writing SQL code. Also as the laravel
    query builder uses PDO parameter binding, it protects the application from SQL injection.
</p>

<p>
    4 Hours - Flesh this app out! Wrote all of the functions for adding, updating and deleting URL's from the Database.
    Started by throwing normal exceptions to the page for errors. Will update these to nicer errors later.
</p>

<p>
    2 Hours - Create table to edit the URL's, wanted the ability to update multiple records at a time rather than 1 by 1.
    Added ability to delete after edit was working.
</p>

<p>
    30 minutes - Add nicer error messages, return these to the page and display with bootstrap rather than a generic exception.
    Success messages also added.
</p>

<p>
    1 Hour - Trying to break it! Spoiler alert, I broke it... Hadn't taken into account when editing the list, I was able to
    enter a non-xml link, this then appeared in the drop down list and would cause the user to think they are able to load 
    the incorrect site.
</p>

<p>
    30 minutes - Add some nice markup to explain what each part of my code is doing.
</p>
