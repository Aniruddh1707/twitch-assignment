# twitch-assignment
A Web application to see their favorite streamer's data with Twitch API using oAuth login.
Application URL: http://twitch-assignment.herokuapp.com/login.php

**Version**: 1.0 release of the twitch-assignment application built using PHP 7.2, JQuery.
***

## Table of Contents
* [Contributor](#contributor)
* [Overview](#overview)
* [Problem Domain](#problem-domain)
* [Feature List](#feature-list)
* [Future improvements](#future-improvements)
* [Technologies Used](#technologies-used)
* [How to run application](#How-to-run-application)
* [Tests](#tests)
* [Contact](#Contact)

## Contributor
* Aniruddhsinh Dhummad https://github.com/Aniruddh1707 
***

## Overview
Here in this application we provides any twitch user to login using twitch authentication UI and stream their favorite streamer live channel. Also enables user to chat on their favorite channels.
Also there is an option to "Set Favourite Streamer" which is used to set streamer video and chat content for searched streamer by user. 
***

## Problem Domain
Build a web application that helps its audience to see their favorite streamer's Twitch events in real-time including chat feature using twitch account login.

## Feature List

- [x] Server:
  - [x] Application Routes
    - [x] login.php
    - [x] home.php
  - [x] Refresh authentication token when it expires
  - [x] Deployed on Heroku

- [x] Client:
    - [x] Actractive layout 
***
## Future improvements
- [x] Improving the design of existing code
- [x] Cloud integration or AWS deployment
- [x] User Experience
    - Better UI experience
***
### Technologies Used
* PHP
* JQuery
* HTML
* CSS3
* Heroku
***

## How to run application
   
### Run on production environment:
* http://twitch-assignment.herokuapp.com/login.php
* Login with Twitch account
* Once on dashboard, enter streamer name and click on search streamer button. 
* Wait for the content to be loaded
* videos and chat support
* If users wants to load searched streamer video & chat insted of default video and chat content then click on "Set As Favourite" button.
* click on logout button to signout of application
***
## Tests
* Postponed for future.
***
## Contact
* Please don't hesitate to reach out to aniruddhsinh.ad@gmail.com if you have any questions or issues while running this application. 
***
## Questions
* How would you deploy the above on AWS? (ideally a rough architecture diagram will help)
    * We can use AWS Elastic Beanstalk.
    * AWS Elastic Beanstalk for PHP makes it easy to deploy, manage, and scale your PHP web applications using Amazon Web Services.
    * ![alt text](https://github.com/Aniruddh1707/twitch-assignment/blob/master/AWS.jpeg)
*  Where do you see bottlenecks in your proposed architecture and how would you approach scaling this app starting from 100 reqs/sec to 900MM reqs/sec over 6 months?

   * Currently this application deployed on Heroku server with PHP environment. If the number of users grow, we should plan for scaling the server to handle more traffic with auto scaling solutions given by AWS Elastic Beanstalk. 
   * AWS Elastic Beanstalk is an easy way to deploy and scale applications written in Python, Ruby, Java, Node.js, Go, or PHP in familiar environments like Apache, Nginx, Passenger, and IIS, without worrying about the infrastructure that runs those applications.
   ### Steps to deploy a PHP application via Elastic Beanstalk
   * Go to your AWS Elastic Beanstalk console.
   * Create a New Application. Choose the Type of application. For now Elastic Beanstalk Supports Docker, PHP, Java Tomcat, Ruby etc. For this we will use PHP 7. We will deploy a basic PHP application.
   * Create Amazon ECR (Elastic Container Registry) and uploading the node.js app image to it
   * Now, Create a new Environment. Choose Web Server.
   * Select the required settings like Auto-scaled or single Instance Environment, VPC/EC2.
   * [x] RDS options:
     - [x] Snapshot : none
     - [x] DB Engine : mysql
     - [x] Instance Class: db.t2.micro (if you want to stay in the free tier)
     - [x] Allocated Storage: 5 to 20 Gb (if you want to stay in the free tier)
     - [x] Availability: Single Availability
   * After this the environment setup starts & you can check the events in the recent events. Also, other configurations, Logs, Alarms & monitoring can be managed from the Elastic Beanstalk Dashboard itself.
   * The last step is to change the endpoint, DB Name, username & password for mysql in configuration file of PHP.
   * Now, just create a zip of all the files & upload via Elastic Beanstalk dashboard & you can access previous application versions as well. Just hit the link given in the Elastic Beanstalk dashboard & the following should open.		
