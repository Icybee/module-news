# News [![Build Status](https://travis-ci.org/Icybee/modules-news.png?branch=master)](https://travis-ci.org/Icybee/modules-news)

The News module (`news`) introduces the "News" content type to the CMS
[Icybee](http://icybee.org).





## Requirement

The package requires PHP 5.3 or later.





## Installation

The recommended way to install this package is through [Composer](http://getcomposer.org/).
Create a `composer.json` file and run `php composer.phar install` command to install it:

```json
{
	"minimum-stability": "dev",
	"require":
	{
		"icybee/module-news": "*"
	}
}
```





### Cloning the repository

The package is [available on GitHub](https://github.com/Icybee/module-news), its repository can be
cloned with the following command line:

	$ git clone git://github.com/Icybee/module-news.git news





## Testing

The test suite is ran with the `make test` command. [Composer](http://getcomposer.org/) is
automatically installed as well as all the dependencies required to run the suite. The package
directory can later be cleaned with the `make clean` command.

The package is continuously tested by [Travis CI](http://about.travis-ci.org/).

[![Build Status](https://travis-ci.org/Icybee/modules-news.png?branch=master)](https://travis-ci.org/Icybee/modules-news)





## Documentation

The documentation for the package and its dependencies can be generated with the `make doc`
command. The documentation is generated in the `docs` directory using [ApiGen](http://apigen.org/).
The package directory can later by cleaned with the `make clean` command.





## License

The module is licensed under the New BSD License - See the LICENSE file for details.