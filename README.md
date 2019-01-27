# TOFI: online matchmaking system
## Description
- A web app that helps people to find & build relationships based on common interests, hobbies and attributes, through which they can also meet (hangout) with each other has the following requirements 
- There must be an entity of users which will contain their names, D.O.B and user id’s.
- For each user there will be some associated attributes like bio, education, height, ethnicity etc. For each user there will also be an associated entity for storing their profile pictures.
- Each user will be able to match some other user(s) (who shares similar interests and hobbies) to set up a hangout. Only matched users will be able to send each other messages.
- A user may go on 1 or more hangouts/meetings with another user and the details of the meeting like location, date, and participants will be stored. A hangout may only occur between 2 users only.
- A user must also be involved in many activities. An activity can further be classified into an interest or a hobby. Each user must have some interests and some hobbies. Interests include things a user would like in a potential partner like preferred skin color, hair color etc. Hobbies include things like a user’s favorite sport and favorite recreational activity.
- Each hangout will have at most 2 separate feedbacks associated with it (given by each of the 2 participating users).
- There must be an entity to store feedback about hangouts. Users will be allowed to rate each other and this rating, along with a specification of whether they will meet again or not will be stored.

## Relational DBMS Schema:
[!schema](assets/snapshot-1.jpg)
