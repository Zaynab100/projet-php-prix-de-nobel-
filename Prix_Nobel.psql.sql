------creation table laureat
CREATE TABLE IF NOT EXISTS Laureat(
	     laureat_id  SERIAL PRIMARY KEY,  
	     laureat_nom VARCHAR(50) NOT NULL,
	     laureat_date_naissance TIME NOT NULL, 
	     laureat_sexe CHAR(1) CHECK (laureat_sexe IN ('F','H')), 
	     laureat_nationalite VARCHAR(50) NOT NULL
);
------creation table prix
CREATE TABLE IF NOT EXISTS Prix(
	prix_id SERIAL PRIMARY KEY, 
	prix_discipline VARCHAR(15) NOT NULL,
	prix_montant  real,
	prix_comite VARCHAR(200)CHECK (prix_comite IN ('Academie royale des sciences de Suede','Academie suedoise','Comite Nobel norvegien',
		'Institut Karolinska'))
	);

------creation table gagne
CREATE TABLE IF NOT EXISTS gagne(
	 laureat_id INTEGER,
	 prix_id INTEGER,
	 prix_annee TIME,
	 PRIMARY KEY (laureat_id , prix_id),
	 FOREIGN KEY (laureat_id) REFERENCES Laureat(laureat_id),
	 FOREIGN KEY (prix_id) REFERENCES Prix(prix_id)
);
-- insertion des laureats
INSERT INTO Laureat(laureat_nom, laureat_date_naissance, laureat_sexe, laureat_nationalite)
            VALUES('Comite international de la Croix-Rouge (CICR)', '1863-02-17', NULL, 'Suisse'),
                  ('Perrin', '1870-09-30', 'H', 'Française'), 
                  ('Arrhenius', '1859-02-19', 'H', 'Sudoise'),
                  ('Ernaux', '1940-09-01', 'F', 'Française'),
                  ('Rontgen', '1845-03-27', 'H', 'Allemande'),
                  ('Greene Balch', '1867-01-08', 'F', 'Americaine'),
                  ('Institut de droit international', '1873-09-08', NULL, 'Belge');

----- -- insertion prix
     INSERT INTO Prix(prix_discipline, prix_montant,prix_comite)
            VALUES('Paix', 920000 , 'Comite Nobel norvegien'),
                 ('Physique', 920000, 'Academie royale des sciences de Suede'), 
                  ('Chimie', 860000, 'Academie royale des sciences de Suede'),
                  ('Litterature', 830000, 'Academie suedoise');

---- insertion gagne
 INSERT INTO gagne(prix_id,laureat_id,prix_annee)
             VALUES((SELECT prix_id FROM Prix WHERE prix_discipline ="Paix"),(SELECT laureat_id  FROM Laureat WHERE laureat_nom = "Comite international de la Croix-Rouge (CICR)"),1917),
             ((SELECT prix_id FROM Prix WHERE prix_discipline ="Paix"),(SELECT laureat_id  FROM Laureat WHERE laureat_nom = "Greene Balch"),1946),
             ((SELECT prix_id FROM Prix WHERE prix_discipline ="Paix"),(SELECT laureat_id  FROM Laureat WHERE laureat_nom = "Institut de droit international"),1904),
             

               ((SELECT prix_id FROM Prix WHERE prix_discipline ="Physique"),(SELECT laureat_id  FROM Laureat WHERE laureat_nom = "Perrin"),1926),
             ((SELECT prix_id FROM Prix WHERE prix_discipline ="Physique"),(SELECT laureat_id  FROM Laureat WHERE laureat_nom = "Rontgen"),1901),

              ((SELECT prix_id FROM Prix WHERE prix_discipline ="Chimie"),(SELECT laureat_id  FROM Laureat WHERE laureat_nom = "Arrhenius"),1903),

              ((SELECT prix_id FROM Prix WHERE prix_discipline ="Litterature"),(SELECT laureat_id  FROM Laureat WHERE laureat_nom = "Ernaux"),2022);
             

