#Gos Fixture Bundle#

[![Build Status](https://travis-ci.org/GeniusesOfSymfony/FixtureBundle.svg?branch=master)](https://travis-ci.org/GeniusesOfSymfony/FixtureBundle) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/GeniusesOfSymfony/FixtureBundle/badges/quality-score.png?s=f5fe7dba5af6243e59eedc410981f47e4aec63ce)](https://scrutinizer-ci.com/g/GeniusesOfSymfony/FixtureBundle/) [![Code Coverage](https://scrutinizer-ci.com/g/GeniusesOfSymfony/FixtureBundle/badges/coverage.png?s=fca85f8c62e5c63aa7ecf17d7037376811844fb6)](https://scrutinizer-ci.com/g/GeniusesOfSymfony/FixtureBundle/)

**This project is currently in developpement, please take care.**

Installation
------------

Add this line in your `AppKernel.php`

```php
$bundles = array(

	//Other bundles

	new Gos\Bundle\FixtureBundle\GosFixtureBundle(),
);
```

Configuration
-------------

That define we must looking for your yaml data file, you can add several path.

```yaml
gos_fixture:
    directories:
        - 'src/*/*/DataFixtures/YML/'
```

You can also see
----------------
* [Gos Fixture component](https://github.com/GeniusesOfSymfony/Fixture)
* [Doctrine Data Fixture](https://github.com/doctrine/data-fixtures)
* [Doctrine Fixtures Bundles](https://github.com/doctrine/DoctrineFixturesBundle)


Running the tests:
------------------

PHPUnit 3.5 or newer together with Mock_Object package is required. To setup and run tests follow these steps:

* go to the root directory of fixture
* run: composer install --dev
* run: phpunit

License
---------

The project is under MIT lisence, for more information see the LICENSE file inside the project