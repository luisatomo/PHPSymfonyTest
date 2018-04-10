BCV Symfony Candidates Test
===========================

We work with a RESTful API on a daily basis.
We use Symfony as our PHP development framework.

You will need to use all the Symfony built in tools and modules to achieve a series of tasks in the 
more appropriate manner.

- Following PHP and Symfony development best practices
- Following REST principles and using proper methods for each endpoint
- Meaningful and optimized responses with proper HTTP codes 

FYI: We have pre-installed in this repo many very useful and popular FOS bundles.

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

This test is about to create a simple API that will work with Users, Clients and Companies.

On this repository we have a base PHP and Symfony 2.x scaffolding project, with some already 
developed files on it.

You'll need to **use, add or tweak any of the existing endpoints and classes** on this project 
to get all the test tasks done. 


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


**(1) Your first task consist in creating/tweaking some entities**
-----------------------------------------------------------------

**_Client entity_**
Every Client need these fields
- name
- User (relational User field)
- Company (relational Company field)
- email (only valid emails accepted)
- phone (only numbers accepted)
    
**_ClientUsers entity_**
You need to create this relational entity from scratch. 
This will relate clients with users.
- client
- users

**_Company entity_**
You need to add this fields to the actual entity
- A related Company
- An inverse side relationship named `users` for retrieving all the **Users** for the company.
          
Controllers
===========

On the next task you have to create the missing controllers for every entity. 
Once done, you need to place the endpoints requested on the tasks below.
```
You will be using FOSRest bundle that is currently installed for this.
You can see the FOSRest bundle annotaton example on UserController.php
Follow the same pattern and use the proper restful methods for every endpoint
```

**(2) Create the following endpoints**
-------------------------------------- 

**2.1 - Develop an endpoint for listing Users**

The endpoint needs to be able to filter by username.

**2.2 Develop an endpoint to replace all User fields at once**

The endpoint must update all fields at once.
    
**2.3 Develop an endpoint to create a Client**

Needs to validate that the company used isn't taken by other Client yet.

**2.4 Develop an endpoint to change any Client field**

The endpoint should be able to change any single field at a time, many, or even all at once. 

Doctrine query language
=======================

**(6) Create some repository method with some custom DQL query for the following**
----------------------------------------------------------------------------------
1. List Companies filtering by 
    - **Employees range:** _i.e. 500~2000 employees_
2. List 
  
Services
========

**(7) Create a service for sending emails with different templates** 
--------------------------------------------------------------------

This email service needs to accept:
- email_to
- subject
- body

This service has to set, so every new user gets added a welcome email is sent. 

Security
========
 
**(8) Secure the Create User endpoint(4) to allow only ROLE_ADMIN users.**
--------------------------------------------------------------------------
- The use of Voters is a plus.

Events
======

**(9) Fire events when a client is created**
----------------------------------------------
 
- Upon Client creation an new ClientCreationEvent should be fired.
- Need to create an event listener or subscriber for that event that should send 2 emails:
    - One to the user that created the Client
    - Another to the Company associated

Use the email service you previously created.

Commands
========

**(2) Develop a symfony command**
---------------------------------

You need to create a new `symfony-test:init` that will reset all the app at once

In short, you need to develop a command that has to execute other current built-in/existing doctrine ones, like:
- doctrine:database
- doctrine:generate
- doctrine:mapping
- doctrine:cache
- doctrine:schema
- doctrine:query
- doctrine:migrations

Pick the right commands to achieve the following:
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

**(10) Pick at least 3 tests from the list below and assert ...**
-----------------------------------------------------------------

1. There is only 1 company with more than 200000 employees.
2. A ROLE_USER user can NOT create a User
3. A Client can be created properly 
4. A Company without a proper contact email can't be created
5. A Company without employees can't be created 

Documenting
===========

Any app success is based on great documentation.
Writing meaningful and easy to understand docs is another skill of every great developer.

You have currently installed **NelmioApiDocBundle** for that matter so you can start 
using the ApiDocs right now. 

**(13) Show us your skills writing some docs on the endpoints you have created.**
---------------------------------------------------------------------------------