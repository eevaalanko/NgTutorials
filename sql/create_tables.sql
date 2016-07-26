CREATE TABLE Usr (id  SERIAL PRIMARY KEY, 
					email varchar(255) NOT NULL, 
					name varchar(255) NOT NULL, 
					password varchar(50) NOT NULL
					);
					
CREATE TABLE Tutorial (id  SERIAL PRIMARY KEY, 
						name varchar(255) NOT NULL, 
						description varchar(255), 
						link varchar(255), 
						added date,
                                                publisher int4 REFERENCES Tutorial(id) on delete cascade 
						);

CREATE TABLE Review (id  SERIAL PRIMARY KEY, 
					review varchar(255) NOT NULL, 
					usr_id int4 REFERENCES Usr(id) on delete cascade,
					tutorial_id int4 REFERENCES Tutorial(id) on delete cascade, 
					added date,
                                        stars integer 
					);
					
CREATE TABLE Favorites (id  SERIAL PRIMARY KEY, 
						usr_id int4 REFERENCES Usr(id) ON DELETE CASCADE, 
						tutorial_id int4 REFERENCES Tutorial(id) ON DELETE CASCADE
						);	
