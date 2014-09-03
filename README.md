stack-overflowed
================

Stack Overflow commands from console

Login
-----

Replace your Stack Exchange credentials in `SOverflowed/Console/Command/LoginCommand.php`

    protected $userConfig = array(
      'email' => 'johndoe@example.com',
      'password' => 'foobar1234')
    );

For example, if you want a *Fanatic* **gold badge** by visiting the site each day for 100 consecutive days, add the script as a daily cronjob `$crontab -e`

```
0 4 * * * php ~/my/path/to/application.php stackoverflow:login
```
