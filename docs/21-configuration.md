Configuration
=============

The Phundament config structure is straight forward, there are three config files for an application:

 - `.env` - environment depended configuration
 - `config/main.php` - application configuration

See also [Dev/prod parity](http://12factor.net/dev-prod-parity).

### Virtual Hosts and nice URLs
 
If you choose `APP_PRETTY_URLS=1` in your `.env` file, activate the `web/.htaccess` if you are devleoping on your local machine.

```
cp web/.htaccess-dist web/.htaccess
```
