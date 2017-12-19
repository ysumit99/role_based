# role_based
This is a simple role based system.There are three types of users viz. 1.Admin, 2.Manager and 3.User
There is only 1 admin.Admin has more rights than Manager and Users.Admin can Register new Managers and Create Projects.
Manager(s) comes second in hierarchy.They can Register new Users and Assign Projects to users.
User(s) have the least authority. They can just view the projects assigned to them.

There are certain constraints in the system:

1.A user is assigned project only by a single Manager.
2.A user can be assigned to multiple projects.
3.A manager can assign projects to users only if it is not yet assigned by any other manager.
