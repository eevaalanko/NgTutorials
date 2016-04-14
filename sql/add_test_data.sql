INSERT INTO Usr (email,name, password) VALUES ('eeva.alanko@helsinki.fi','eeva', 'Eeva123'); 
INSERT INTO Tutorial (name, description, link, image, added) VALUES ('AngularJs','the Official API page, not really categorized as a tutorial','https://angularjs.org/', null, current_date); 
INSERT INTO Tutorial (name, description, link, image, added) VALUES ('Shaping Up With Angular is a complete free interactive Angular course bundle from Code School. It teaches basic Angular, directives, services and forms via video tutorials, challenges and downloadable text tutorials.','https://www.codeschool.com/courses/shaping-up-with-angular-js', null, current_date); 
INSERT INTO Review (usr_id, tutorial_id, review, added) VALUES (1,1,'A very good tutorial indeed', current_date); 
INSERT INTO Favorites (usr_id, tutorial_id) VALUES (1,1); 


