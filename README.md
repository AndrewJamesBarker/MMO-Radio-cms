BRICKMMO Radio Reporter cms

A CMS for managing the Reporter side of the Brick MMO Radio Application.

Restrictions are in place if logged in with a User role of Reporter. They are implimented using middleware, Kernal, and the Routes.

* If logged in as a User with the role of reporter, all views are restricted to just segment CRUD.

* Any other role will have full CRUD access to all tables.

There is one porthole for login. The Reporter must register prior to log in, and is forced to use an email with a
@humbermail.ca address, at which point they are automatically assigned a 'Reporter' role, thus restricting their access.

If you have an account created from within the system, you can assign whichever role you desire upon creation.

* 'Segment Forms' views and logic are for Reporters, and use dynamic and conditional rendering to create different forms depending on what type of segment is being made (Report/Game/Joke/etc), and then provides dropdown selection for sub_types 
(local news, entertainment, Knock Knock Joke, etc).
