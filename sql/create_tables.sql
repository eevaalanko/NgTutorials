CREATE TABLE Usr (id  SERIAL PRIMARY KEY, 
					email varchar(50) NOT NULL, 
					name varchar(50) NOT NULL, 
					password varchar(50) NOT NULL
					);

CREATE TABLE Favorites (id  SERIAL PRIMARY KEY, 
						usr_id int4 REFERENCES Usr(id), 
						tutorial_id REFERENCES Tutorial(id)
						);


CREATE TABLE Tutorial (id  SERIAL PRIMARY KEY, 
						name varchar(50) NOT NULL, 
						description varchar(255) NOT NULL, 
						link varchar(50) NOT NULL, 
						image bytea NOT NULL, 
						added date 
						);


CREATE TABLE Review (id  SERIAL PRIMARY KEY, 
					review varchar(255) NOT NULL, 
					usr_id int4 REFERENCES Usr(id), 
					tutorial_id REFERENCES Tutorial(id), 
					added date 
					);
