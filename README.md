<div align="center">
<a href="https://laravel.com" target="_blank">
<img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</a>

#### Simple rest api, can be used as boilerplate

</div>



## Prerequisites

- ^PHP 8.1
- [Composer](https://getcomposer.org/)
- [Docker](https://www.docker.com/)

## Postman

You will find in the folder [postman](postman) the exported file of the collection

## How to install and run

Rename the file [.env.example](.env.example) to ```.env``` and enter the database information. **Do not change the host**!

- Then install the composer dependencies
```bash
$ composer i
```
- Then just run the following command:
```bash
$ composer dev
```
If all goes well, you should see a message similar to this one:

*it's Working! 🎉 go to http://localhost:8000 to test*

## Documentation

The api documentation is available at the link [/doc](http://localhost:8000/doc)


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
