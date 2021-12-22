
INSERT INTO tipus_usuari VALUES (">18");
INSERT INTO tipus_usuari VALUES ("9-18");
INSERT INTO tipus_usuari VALUES ("<9");

INSERT INTO tipus_contracte VALUES ("mensual");
INSERT INTO tipus_contracte VALUES ("trimestral");

INSERT INTO usuari VALUES("Alberto",">18","alberto1","Cugat Martin",False);
INSERT INTO usuari VALUES("Jaume",">18","jaume1","Julia Vallespir",True);
INSERT INTO usuari VALUES("Pau",">18","Pau1","Capella Ballester",False);
INSERT INTO usuari VALUES("Alejandro","9-18","alejandro1","Medina Perello",True);
INSERT INTO usuari VALUES("Carlos","<9","carlos1","Ecker Oliver",False);
INSERT INTO usuari VALUES("Antoine","<9","antoine1","Griezmann",False);



INSERT INTO contracte VALUES ("1","Alberto","mensual","2021-12-15","2022-1-14",True);
INSERT INTO contracte VALUES ("2","Carlos","trimestral","2021-12-15","2022-3-15",True);
INSERT INTO contracte VALUES ("3","Antoine","mensual","2021-11-15","2021-12-15",False);


INSERT INTO categoria VALUES ("drama");
INSERT INTO categoria VALUES ("comedia");
INSERT INTO categoria VALUES ("romance");
INSERT INTO categoria VALUES ("accion");
INSERT INTO categoria VALUES ("documental");

INSERT INTO contingut VALUES ("comedia","Nerver gonna give you up","https://www.youtube.com/watch?v=dQw4w9WgXcQ","2021-11-21");
INSERT INTO contingut VALUES ("romance","historia de amor coreano","https://www.youtube.com/watch?v=e-pb72a5l80","2021-12-20");
INSERT INTO contingut VALUES ("drama","Padre dona el corazon a su hijo","https://www.youtube.com/watch?v=zAcK0r7ma1A","2021-12-15");
INSERT INTO contingut VALUES ("accion","Shape-Shifters [AMV] I'm Dangerous","https://www.youtube.com/watch?v=KHkCxmGOi4c","2021-12-21");
INSERT INTO contingut VALUES ("documental","Base de Datos 2 - Práctica 2","https://youtu.be/2MIyBOz9KMw","2021-12-22");

INSERT INTO contfav VALUES ("1","https://www.youtube.com/watch?v=e-pb72a5l80");
INSERT INTO contfav VALUES ("1","https://www.youtube.com/watch?v=KHkCxmGOi4c");
INSERT INTO contfav VALUES ("2","https://www.youtube.com/watch?v=e-pb72a5l80");

INSERT INTO catfav VALUES ("1","drama");
INSERT INTO catfav VALUES ("2","romance");
INSERT INTO catfav VALUES ("1","comedia");

INSERT INTO factura VALUES ("1","1","2021-12-15","15");
INSERT INTO factura VALUES ("2","2","2021-12-15","40");
INSERT INTO factura VALUES ("3","3","2021-11-15","15");

INSERT INTO recomanat VALUES (">18","https://www.youtube.com/watch?v=zAcK0r7ma1A");
INSERT INTO recomanat VALUES ("9-18","https://www.youtube.com/watch?v=e-pb72a5l80");
INSERT INTO recomanat VALUES ("9-18","https://www.youtube.com/watch?v=KHkCxmGOi4c");
INSERT INTO recomanat VALUES ("<9","https://www.youtube.com/watch?v=dQw4w9WgXcQ");

INSERT INTO missatge VALUES ("1","Alberto","https://www.youtube.com/watch?v=KHkCxmGOi4c","Se ha añadido este video",True);
INSERT INTO missatge VALUES ("2","Alberto","https://www.youtube.com/watch?v=e-pb72a5l80","Se ha añadido este video",False);
INSERT INTO missatge VALUES ("3","Carlos","https://www.youtube.com/watch?v=zAcK0r7ma1A","Se ha añadido este video",True);
INSERT INTO missatge VALUES ("4","Antoine","https://www.youtube.com/watch?v=dQw4w9WgXcQ","Se ha añadido este video",False);


