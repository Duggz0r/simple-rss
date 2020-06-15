<h3>Instructions</h3>
<hr/>

<p>This app has been created with Laravel, yes it's probably a little overkill, but hey ho!</p>

<p>Ensure Composer and Node are installed, using NVM for my node version management, currently using npm v8.11.2 due to current environment setup</p>

<p>I know you're a mac user! Use homebrew to install the following.</p>
<p>Homebrew</p>
<p><code>/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install.sh)"</code></p>

<p>Composer</p>
<p><code>brew install composer</code></p>

<p>NVM and NPM</p>
<p><code>curl -o- https://raw.githubusercontent.com/creationix/nvm/v0.33.0/install.sh | bash</code></p>
<p><code>nvm install 8.11.2</code></p>

<ol>
    <li>Navigate to directory where project is checked out to</li>
    <li>Run the following commands: <code>composer install && npm install && npm run dev</code></li>
    <li>Start up your favourite web server or run: <code>php artisan serve</code></li>
    <li>If using <code>php artisan serve</code>, enter the IP it provides you in your browser.</li>
</ol>

<p>The app has also been deployed, visit the app at <a href="https://duggz0r-simple-rss.herokuapp.com/" target="_blank">https://duggz0r-simple-rss.herokuapp.com/</a>. SQL Database is hosted online</p>

<h3>Test RSS Feeds<h3>
<hr/>

<p><a href="https://www.php.net/news.rss" target="_blank">https://www.php.net/news.rss</a></p>
<p><a href="http://rss.slashdot.org/Slashdot/slashdot" target="_blank">http://rss.slashdot.org/Slashdot/slashdot</a></p>
<p><a href="http://newsrss.bbc.co.uk/rss/newsonline_uk_edition/front_page/rss.xml" target="_blank">http://newsrss.bbc.co.uk/rss/newsonline_uk_edition/front_page/rss.xml</a></p>

