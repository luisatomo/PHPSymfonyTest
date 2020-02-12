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
- Coding clean and organized 

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

We already have setup a FOSOAuthServerBundle client so you can authenticate and request our API endpoints.
To get an access token you can execute the following command using CURL (using the default OAuth v2 Token endpoint):
```
curl --location --request POST 'http://localhost/oauth/v2/token' \
    --header 'Content-Type: application/x-www-form-urlencoded' \
    --data-urlencode 'grant_type=password' \
    --data-urlencode 'client_id=4_5rll3ugxh3gosko88sskskooo0ws8kggkgo4kkckgwgw0c8kco' \
    --data-urlencode 'client_secret=439yxyh5maww48cosw0gwwo4gow0w4s4g4oosog4sww40os08c' \
    --data-urlencode 'username=admin1' \
    --data-urlencode 'password=admin1'
```

When making a request to an API endpoint remember to append the following header using the `access_token` you got from that command:

`Authorization: Bearer "access_token"`

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

**Steps**:

5.1. Secure the "Create Client" endpoint (2.3) to allow access to users with ROLE_ADMIN only

5.2. Secure the "Change any Client field" endpoint (2.4) to allow access to user with `username=user3` only

- _At least one endpoint needs to be secured using Voters._

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
**Use regex to validate emails on `GET /user/profile` endpoint.**

The regex should satisfy the following conditions (actual email address RFC has more, this is an example):
1. Must start with a valid `local part`, followed by only one `@`, and ending with a valid  `domain`.
2. `local part` must follow the following constraints:
    - Cannot be empty
    - May contain uppercase/lowercase latin letters (A to Z and a to z).
    - May contain Digits from 0 to 9.
    - May contain a dot (`.`) except at the start or the end of the string, also there cannot be two adjacent dots (`..`).
    - May contain printable characters from this list: `_-&`.
    - A maximum size of 64 characters is allowed.
3. `domain` must follow the at least the following constraints:
    - Cannot be empty
    - May contain one or more DNS labels separated by a dot (`.`) and limited to a maximum length of 63 characters.
    - Each DNS label may contain uppercase/lowercase latin letters (A to Z and a to z).
    - Each DNS label may contain Digits from 0 to 9.
    - Each DNS label may contain hyphen (`-`) except at the start or end of the string.
    - A maximum size of 255 characters is allowed for the entire `domain`.

**Example valid emails that your regex should allow:**
- john.doe@example.com
- foobar2020@example.org
- John&Lynda_Doe@example.net
- john-doe@example.com
- foo_bar@foo-bar.com

**Example invalid emails that your regex should reject:**
- foobar
- foo@bar@foo
- @bar
- foo@
- john..doe@example.com
- this-local-part-is-too-long-to-be-accepted-by-the-rfc-standard-and-should-not-be-allowed-to-be-entered-on-an-email@example.com
- john.doe@example.com&example.net
- john.doe@invalid.
- john.doe@.domain
- foo.bar@-invalid.domain
- foo.bar@invalid.domain-

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

9.5 Add a Unit test so you can assert all email cases from task (7).
All valid email cases must succeed on your delivered regex, as well as all the invalid ones must fail.

DOCKER
=====

**(10) Improve docker implementation**
----------------------
- Currently, in our `docker-compose.yml` commands are executed without checking if Postgres service available.
Using [wait-for-it](https://github.com/vishnubob/wait-for-it) bash script run commands only if the Postgres service is accessible. 

Third Party API integration
===========================

We rely on third party APIs to get social network accounts details and link those details to our database users.

**(11) Retrieve Twitter followers count for an existing User**
----------------------------------------
This implementation requirements are not production ready and are just used to illustrate a Twitter API use case.
What we intend to know is if you are able to call a third party API to get some data and link it to our existing model. 

To get a Twitter Bearer Token use these sandbox app client credentials:

https://developer.twitter.com/en/docs/basics/authentication/api-reference/token
* API Key: i3nk7FhqCVgkddGuUTOkeHhw2
* API Secret Key: cRVrKVIeWZwKQbxCmN1DXjFUefoEfKp0eqwVGov8E82tmhJQPm

**Note**
You will need to call Twitter API endpoint to get an User object using Twitter `screen_name` field.
See: https://developer.twitter.com/en/docs/tweets/data-dictionary/overview/user-object

You can use GuzzleHTTP or ext-curl to make Twitter API HTTP Requests.

**Steps**

1. Add a new field to the User entity: `twitter_followers_count`.

2. Update src/AppBundle/DataFixtures/ORM/002-user.yml and add an User with `email` equal to `sample@bcv.social`
and `username` equal to `bcvsocial` (this corresponds to a real Twitter `screen_name`).

3. On endpoint `/users/profile?email=sample@bcv.social` you should call Twitter API to retrieve the `followers_count`
for the Twitter User with the same `screen_name` you just created, then store Twitter API `followers_count` response
on `twitter_followers_count`.

**Definition of done**

After your code is done, you'll need to create a test that makes the request to the Social Network,
and then assert the value is properly stored on User entity.


Documenting
===========

Any app success is based on great documentation.
Writing meaningful and easy to understand docs is another skill of every great developer.

You have currently installed **NelmioApiDocBundle** for that matter so you can start 
using the ApiDocs right now. 

**(12) Show us your documenting skills**
----------------------------------------
Writing some docs on all the endpoints you have created. 
