# Scenario Project
This repository consists of the scenario.

# Getting Started
This project is based on BLT 13.x with Lando local env, an open-source project template and tool that enables building, testing, and deploying Drupal installations following Acquia Professional Services best practices. While this is one of many methodologies, it is our recommended methodology.

1. Review the [Required / Recommended Skills](https://docs.acquia.com/blt/developer/skills/) for working with a BLT project.
2. Ensure that your computer meets the minimum installation requirements (and then install the required applications). See the [System Requirements](https://docs.acquia.com/blt/install/).

# Setting Up this Project
1. Clone this repository. By default, Git names this "origin" on your local.
```
$ git clone git@github.com:acquia-pso/scenario.git
```

2. Install Composer dependencies.
After you have forked, cloned the project and setup your blt.yml file install Composer Dependencies. (Warning: this can take some time based on internet speeds.)
```
$ composer install
```
3. Setup Lando.
Provision the Lando containers
```
$ lando start
```

4. Setup a local Drupal site with an empty database.
Use BLT to setup the site with configuration.
```
$ lando blt setup
```

10. Log into your site with drush.
Access the site and do necessary work at https://scenario.lndo.site.
```
$ lando drush uli
```

# Resources

Additional [BLT documentation](https://docs.acquia.com/blt/) may be useful. You may also access a list of BLT commands by running this:
```
$ blt
```

Note the following properties of this project:
* Primary development branch: Develop
* Local site URL: http://scenario.lndo.site

## Working With a BLT Project
BLT projects are designed to instill software development best practices (including git workflows). \
Our BLT Developer documentation includes an [example workflow](https://docs.acquia.com/blt/developer/dev-workflow/).

### Important Configuration Files
BLT uses a number of configuration (`.yml` or `.json`) files to define and customize behaviors. Some examples of these are:

* `blt/blt.yml` (formerly blt/project.yml prior to BLT 9.x)
* `blt/local.blt.yml` (local only specific blt configuration)
* `.lando.yml` (Lando configuration)
* `composer.json` (includes required components, including Drupal Modules, for this project)
