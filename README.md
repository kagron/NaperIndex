# NaperIndex
##### Created by Kyle Grondin
##### This application is for a job application to Plaidypus

Template was taken from [here](https://startbootstrap.com/template-overviews/agency/)

Background image was taken from [here](http://cgarchitecturalphotography.com/fall-color-views-moser-tower-millennium-carillon-naperville-riverwalk/) 

My instructions were given [here](https://jira.seraphdevelopment.com/stash/projects/PCC/repos/yelp-app-php/browse)

## About

---

PHP 7.1.3
Laravel 5.6+
VueJS 2.5.7

Welcome to NaperIndex!  This is a Laravel & VueJS based app built to search business in Naperville using the Yelp Fusion API.

## Installation

---

1.  Download the latest release of PHP from [here](https://secure.php.net/downloads.php)
2.  Download the lastest version of Composer [here](https://getcomposer.org/)
3.  Open command prompt/terminal and type `composer global require "laravel/installer"`
3a. Make sure to place composer's system-wide vendor bin directory in your $PATH so the laravel executable can be located by your       system. 
4.  Download the latest release of git from [here](https://git-scm.com/)
5.  Download the latest version of NPM/NodeJS from [here](https://www.npmjs.com/get-npm)
6.  Type `git clone https://github.com/kagron/NaperIndex.git` into your command prompt/terminal
7.  `cd Naperindex` to get into the directory in your command prompt/terminal
8.  Either open your file explorer or use terminal to rename .env.example to .env
9.  Make an account on Yelp [here](https://www.yelp.com/developers/documentation/v3/get_started) and create a new App to get your private API key
10.  In your .env file, add API_KEY=your private API key from Yelp.
11.  type `npm install` in the command prompt/terminal while in the NaperIndex directory
12.  `composer install`
13.  `npm run dev`
14.  `php artisan serve`
15.  Open up your favorite internet browser to navigate to localhost:8000