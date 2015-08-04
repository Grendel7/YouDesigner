<h1>Welcome to YouDesigner</h1>
<p>The following URLS are available:</p>
<ul>
    <li><a href="<?= $app['url_generator']->generate('login') ?>">Login Page</a></li>
    <li><a href="<?= $app['url_generator']->generate('profile') ?>">Profile Page</a></li>
    <li><a href="<?= $app['url_generator']->generate('default') ?>">Default Page</a></li>
    <li><a href="<?= $app['url_generator']->generate('inner') ?>">Inner (Control Panel Section) Page</a></li>
    <li><a href="<?= $app['url_generator']->generate('public') ?>">Public Ticket Page</a></li>
    <li><a href="<?= $app['url_generator']->generate('upgrade') ?>">Upgrade Page</a></li>
    <li><a href="<?= $app['url_generator']->generate('newaccount') ?>">New Account Page</a></li>
</ul>