# Underwaf - Opensource Laravel Firewall by ICWR - TECH
---
This package to protect your laravel web app from SQLI , XSS , RFI , RCE , AND LFI attacks. With this package all malicious input request will blocked and write on laravel log as Alert Log.

## Installations
1. Run Command below 
```bash
composer create-project icwrtech/underwaf
```
2. Insert into your provider in ````config/app.php```` file
```php
<?php
/*
* Other Provider Configuration
*/
 Icwrtech\Underwaf\UnderwafLaravelProvider::class,

```
3. Set protection with middleware in your routes to underwaf example :
```php
Route::middleware(['underwaf'])->group(function (){
/*
* Your Route
*
*/

});

```
## Contributing
- all Contribute we all open !. you want to update or fix bugs just fork this project and create pull request !
## Issue 
- You can create new issues if there any issue you want to mention
## Devs Contact
- Instagram : <a href="https://instagram.com/_nugrah.p" target="_blank">`_nugrah.p`</a> 

