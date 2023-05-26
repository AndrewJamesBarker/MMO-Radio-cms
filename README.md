BRICKMMO Radio Reporter cms

A CMS for managing the Reporter side of the Brick MMO Radio Application.

* If logged in as a User with the role of reporter, all views are restricted to just segment_forms CRUD.
* Any other role will have full CRUD access to all tables.

There is one porthole for login. The Reporter must register prior to log in, and is forced to use an email with a
@humbermail.ca address, at which point they are automatically assigned a 'Reporter' role, thus restricting their access.

If you have an account created from within the system, you can assign whichever role you desire upon creation.

