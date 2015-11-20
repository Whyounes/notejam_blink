Notejam: Blink framework
========================

Notejam demo application using Blink framework

Installation
------------

- Clone the repository to you machine.
- Run `vagrant up` to create the VM.
- SSH to do VM.
- Install Swoole extension. Check this [article](http://sitepoint.com).
- Go to the application directory. (`cd /vagrant/blink/`)
- Run `composer update`.
- Create the database file. `touch src/database/blink.sqlite`
- Run migrations. `php blink migrate`
- Run the server. `php blink server serve`
- Open app on your browser. `http://yourhost.local:8080`

Contribution
------------

Please send your pull requests in the master branch. Always prepend your commits with framework name:

```
Blink: Implemented sign in functionality
```

Read [contribution](https://github.com/komarserjio/notejam/blob/master/contribute.rst) guide for details.
