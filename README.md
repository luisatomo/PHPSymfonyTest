BCV Symfony Candidates Test
===========================

We use Symfony as our PHP development framework.

We work with a RESTful API on a daily basis.

You will need to use all the Symfony built in tools and modules to achieve a series of tasks in the 
more appropriate manner.

- Following PHP and Symfony development best practices
- Following REST principles and using proper methods for each endpoint
- Meaningful and optimized responses with proper HTTP codes 

We have pre-installed in this repo many very useful and popular FOS bundles.

_We encourage you to use them._

- FOSOauthServerBundle
- FOSRestBundle
- FOSUserBundle
- AliceBundle
- NelmioApiDocBundle

You also will find several classes already in the repo. Thanks to them, you can know 
how some features are already handled. 

_You can use them as a guide and continue codding accordingly._
 
After you finish this test you will be evaluated under the following milestones

 - Entities, Repositories and Entity managers
 - Writing and using Services
 - Events and Listeners
 - Symfony Commands  
 - Securing endpoints based on user roles 
 - Writing Function Tests
 - Writing meaningful documentation
 - Following best practices
 
 
#### We encourage you to use as many Symfony components and classes as you know:
 
```
Routing, Methods, Responses, Annotation,        
Doctrine, Entities, Managers, Repositories, DQL,
Forms, Form Types, Voters, Security, Events, Event Dispatchers,
Services, Traits, Helpers, Mailers, Templates ...
```
    
The App API
===========

You are about to create a very simple app API that will handle Users, Clients and Companies.

Your main job is to create all the needed API endpoints and everything else 
needed to achieve all the described features below.

GIT
---

+ You need to create a new branch and commit your work to GIT. 
+ Micro commits per task number would be appreciated. 
+ When finished, you'll need to create a pull request. 

Entities
--------

The app entities main structure consist in
- Users
- Companies
- Clients

**(1) Your first task consist in creating the Client entity**

- Every Client need these fields
    - name
    - User (relational User field)
    - Company (relational Company field)
    - email (only valid emails accepted)
    - phone (only numbers accepted)
          
Commands
--------

**(2) Symfony comes with a lot of handy commands to help you in your development.**

With the current existing commands you must: 
- Create/Drop the database
- Replicate your current entities schema into the DB
- Load current SQL fixtures file provided _( /AppBundle/DataFixtures/SQL/companies.sql )_
- Setup OAuthServer credentials _( hint: create:oauth:client )_
- Load entity fixtures _( hint: hautelook\_alice:doctrine:fixtures:load )_

**(3) Develop a symfony command `symfony-test:init` that will reset all the app at once**

It must execute several commands to achieve the following:
- drop database
- create new database from scratch
- load your current entities schema into the DB
- load all the fixtures provided:
    - Hautelook fixtures (User, OauthServer)
    - Companies.sql


Controllers
-----------

You will need to build a custom controller for every entity (User, Client, Company) 
and place all the following endpoints were appropriate.
```
You will be using FOSRest bundle that is currently installed for this.
Use of proper method for each case is strongly suggested
```

**(4) Develop an endpoint for listing Users** 
- You need to be able to filter by username
- The use of ParamFetcher to retrieve and validate fields is a plus.
    
**(5) Develop an endpoint to create Users**
- Need to validate new user email is unique and currently do not exist 
- The use of Forms (with FormType) or an UserManager will be a plus

**(6) Develop an endpoint to change any Company field**
- You must be able to patch any field, so all must be optional

Doctrine Query Language
-----------------------

**(7) Create an endpoint for listing Companies by employee range**
- Need to build a custom query to allow filtering by employees range _(i.e. 500~2000 employees)_.
  
Services
--------

**(8) Create a service for sending emails with different templates** 

This email service will be used in the following tasks to send different mails with 
using different templates for each.

Security
--------
      
**(9) Secure all the current endpoints with the FOSOauthServer Bundle currently installed.**

_We have already loaded a fixture on step (2) that fixes the client_id and client_secret 
credentials that you cans use_
 ```
client_id:     5rll3ugxh3gosko88sskskooo0ws8kggkgo4kkckgwgw0c8kco
client_secret: 439yxyh5maww48cosw0gwwo4gow0w4s4g4oosog4sww40os08c
```
 
**(10) Secure all CREATE endpoints to grant use only to ROLE_ADMIN users.**
- Use of Voters is a plus.


Events
------

**(11) Create an endpoint to create a Client**
 
- Upon creation an ClientCreationEvent should be fired.
- need to develop a listener for the ClientCreationEvent that should send 2 emails:
    - One to the user that created the Client
    - Another to the Company associated

Functional Tests
----------------

```
phpunit is currently instaled for this:
 
$ phpunit -c app/
```

**(12) You need to write functional tests to assert the following:**

- There is only 1 company with more than 200000 employees.
- A user ROLE_USER can NOT create a client
- A company can be created properly 
- A company without a proper contact email can't be created
- A company without employees can't be created 

Documenting
-----------

Any app success is based on great documentation.
Writing meaningful and easy to understand docs is another skill of every great developer.

You have currently installed **NelmioApiDocBundle** for that matter. 

**(13) Show us your skills writing some docs on the endpoints you have just created.**
 






