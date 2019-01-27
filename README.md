# TOFI: online matchmaking system
## The Problem
Work, work, work—wherever we go, that is the message being imposed on us. We live in a world where 60-hour workweeks and sleepless nights are glorified, however, life is much more dynamic than simply working all the time. Relationships are one of the fundamental (and oft-neglected) needs of every person, and they are just as important in determining a person’s success as their work is. 

Through our web app we hope to address this problem.

## What is TOFI?
- TOFI helps people to find & build relationships based on common interests, hobbies and attributes, through which they can also meet (hangout/date) with each other.
- User data will contain their names, D.O.B and user id’s.
- For each user there are some associated attributes like bio, education, height, ethnicity etc. For each user there is also an associated entity for storing their profile pictures.
- Each user will be able to match some other user(s) (who shares similar interests and hobbies) to set up a hangout. Only matched users will be able to send each other messages.
- A user may go on 1 or more hangouts/meetings with another user and the details of the meeting like location, date, and participants will be stored. A hangout may only occur between 2 users only.
- A user is also involved in many activities. An activity can further be classified into an interest or a hobby. Each user must have some interests and some hobbies. Interests include things a user would like in a potential partner like preferred skin color, hair color etc. Hobbies include things like a user’s favorite sport and favorite recreational activity.
- Each hangout can have at most 2 separate feedbacks associated with it (given by each of the 2 participating users).
- Feedback about hangouts is stored. Users will be allowed to rate each other and this rating, along with a specification of whether they will meet again or not will also be stored.

## Relational DBMS Schema:
[!schema](README-assets/snapshot-8.JPG)

## Setup instructions
- You must have Xampp server installed. Clone this repo inside htdocs folder of Xampp server.
- Import the file relationshipdb.sql into Xampp server.
- Open Phpmyadmin to view database and its contents
- In your browser type address:
```
http://localhost/tofi-online-matchmaking-system/
```
to run the app.

## App demo
## homepage
[!](README-assets/snapshot-1.JPG)
## more homepage
[!](README-assets/snapshot-2.JPG)
## login page
[!](README-assets/snapshot-3.JPG)
## User matches 
[!](README-assets/snapshot-4.JPG)
## hangout history
[!](README-assets/snapshot-5.JPG)
## Edit profile
[!](README-assets/snapshot-6.JPG)
## View matched user profile
[!](README-assets/snapshot-7.JPG)


