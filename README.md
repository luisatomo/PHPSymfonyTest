BCV Symfony Candidates Test
===========================

Hi there! 
Here at BCVSocial, we use Symfony as our PHP development framework.

You, as a backend team developer, will be working mainly for our ActiveSocial app RESTful API.

**On a daily basis you will be** 
- adding new features
- debugging and bug fixing
- implementing 3rd party social networks
- improving app performance
- writing tests
among others.

**On backend team we appreciate:**

- Following PHP and Symfony best practices
- Following RESTFul conventions
- coding clean and organized 

For this test we have pre-installed in the repo a set of most useful and popular FOS bundles:

- FOSOauthServerBundle
- FOSRestBundle
- FOSUserBundle
- AliceBundle
- NelmioApiDocBundle

You also will find several classes already in the repo. Thanks to them, you can know 
how some features are already handled. 

_You can use them as a guide and continue codding accordingly._
 
#### We encourage you to use as many Symfony components and classes as you know:
 
```
Routing, Methods, Responses, Annotation,        
Doctrine, Entities, Managers, Repositories, DQL,
Forms, Form Types, Voters, Security, Events, Event Dispatchers,
Services, Traits, Helpers, Mailers, Templates ...
```

Building an API
===============

This test is about to create a simple API that will work with **Users**, **Clients** and **Companies**.

On this repository we have a base PHP and Symfony 3.4 scaffolding project, with some already 
developed files on it. 
You'll need to **use, add or tweak any of the existing endpoints and classes** on this project 
to get all the test tasks done.


Project contains Docker configuration so you can easily run API.
Simply run `docker-compose up` and you are done.
Nginx will be available on `localhost:80` and PostgreSQL on `localhost:5432`. 

How to deliver your work?
=========================

This is important as this will show us how you work with GIT.

You need to follow this approach:
1. Create a new branch with your name 
2. Push your code to your branch name
3. Commit every single tasks separately  
4. When finished, you'll need to create a pull request 

Entities
========

The app entities main structure consist in

- Users
- Companies
- Clients

**(1) Creating new or tweak the existing entities like follows**
----------------------------------------------------------------

**1.1 _Client entity_**
<br>Every Client need these fields
- name
- Company (relational Company field)
- ClientUsers (inverse relationship field)
- email (only valid emails accepted)
- phone (only numbers accepted)
    
**1.2 _ClientUser entity_**
<br>You need to create this relational entity from scratch. 
This will relate client with users and contains more properties.
- Client (relational Client field)
- User (relational User field)
- createdAt
- updatedAt
- deletedAt
- active

**1.3 _Company entity_**
<br>You need to add this fields to the actual entity
- A related Company
          
Controllers
===========

On the next task you have to create the missing controllers for every entity. 
Once done, you need to place the endpoints requested on the tasks below.
```
You will be using FOSRest bundle that is currently installed for this.
You can see the FOSRest bundle annotaton example on UserController.php
Follow the same pattern and use the proper restful methods for every endpoint
```

**(2) Create the following endpoints for**
------------------------------------------

### 2.1) - List app Users
The endpoint needs to be able to filter by username.

### 2.2) - Replace all User fields at once
The endpoint must update all fields at once.

### 2.3) - Create some Client
Needs to validate that the company used isn't taken by other Client yet.

### 2.4) - Change any Client field
The endpoint should be able to change any single field at a time, many, or even all at once. 

Doctrine query language
=======================

**(3) Create some repository method with some custom query for the following**
----------------------------------------------------------------------------------
```
You have to use DQL or SQL (2 each)
```

3.1. Search for Clients by:<br>
  - **User email** _i.e. retrieve all Clients by a  given User email_

3.2. Search for Companies by employees range.<br> 
  - **Employees range** _i.e. list Companies that has employees range between 500 and 2000_

3.3. Search for Companies by:<br>
  - **Name: i.e.** _i.e. retrieve companies within company's name occurrences_

3.4. Using one raw SQL:<br>
  - get a list of companies where each company has max revenue in its industry: e.g. `Amazon` for `E-commerce`

Services
========

**(4) Create a service for sending emails with different templates** 
--------------------------------------------------------------------

This email service needs to accept:
- email_to
- subject
- body

This service has to set, so every new user gets added a welcome email is sent. 

Security
========
 
**(5) Add security to some endpoints**
----------------------------------------------------------------------------------------

Secure the following endpoints:

5.1. The create Client endpoint (2.3) to allow only ROLE_ADMIN users to use it

5.2. The change any Client field endpoint (2.4) to allow only ROLE_ADMIN users or an specific user with `username=user3`

- Proper usage of Voters is expected to accomplish these tasks.

Events
======

**(6) Fire events when a client is created**
----------------------------------------------
 
6.1. Upon any Client creation, a ClientCreationEvent event should be fired.

6.2. An event listener/subscriber must detect that event and send 2 emails:
    - One to the user that created the Client
    - Another to the associated Company contact email

Use the email service you previously created.

REGEX
=====

**(7) Add some regex**
----------------------
- Add some regex to validate emails on `GET /user/profile` endpoint.

Commands
========

**(8) Develop a symfony command**
---------------------------------

You need to create a new `symfony-test:init` that will reset all the app at once

In short, you need to develop a command that has to execute other current built-in/existing doctrine commands, like:
- doctrine:database
- doctrine:generate
- doctrine:mapping
- doctrine:cache
- doctrine:schema
- doctrine:query
- doctrine:migrations

Pick the right commands fom above to achieve the following:
1. drop database
2. create new database from scratch
3. load your current entities schema into the DB
4. load the SQL fixtures provided
    - Companies.sql
   
Unit and/or Functional Tests
============================

```
phpunit is currently instaled for this:
 
$ phpunit -c app/
```

**(9) Assert tests from the list below**
----------------------------------------------------------------
9.1. There is only 1 company with more than 200000 employees.

9.2. A ROLE_USER user can NOT create a User

9.3. A Client can be created properly 

9.4. Assert that result from (3.3) contains `Amazon` and `Google` and not contains any other company from `E-Commerce` industry

DOCKER
=====

**(10) Improve docker implementation**
----------------------
- Currently, in our `docker-compose.yml` commands are executed without checking is Postgres service available.
Using [wait-for-it](https://github.com/vishnubob/wait-for-it) bash script run commands only if the Postgres service is accessible. 

Documenting
===========

Any app success is based on great documentation.
Writing meaningful and easy to understand docs is another skill of every great developer.

You have currently installed **NelmioApiDocBundle** for that matter so you can start 
using the ApiDocs right now. 

**(11) Show us your documenting skills.**
----------------------------------------
Writing some docs on all the endpoints you have created. 
