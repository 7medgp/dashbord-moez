DROP DATABASE IF EXISTS db_ecole;
CREATE DATABASE  db_ecole CHARACTER SET utf8 COLLATE utf8_general_ci;
USE db_ecole;

CREATE TABLE IF NOT EXISTS admin (
id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
fullname varchar(100) NOT NULL,
pseudo varchar(100) NOT NULL,
password varchar(100) NOT NULL
) ENGINE=InnoDB;
INSERT INTO admin(id,fullname ,pseudo,password) VALUES
(NULL, 'Moez ben rkaya','moezmbr',MD5('moezmbr123'));

CREATE TABLE IF NOT EXISTS departement (
codedept int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
libdept varchar(100) NOT NULL
) ENGINE=InnoDB;

INSERT INTO departement(codedept,libdept) VALUES(NULL, 'Génie logiciel');
INSERT INTO departement(codedept,libdept) VALUES(NULL, 'Mathématiques');
INSERT INTO departement(codedept,libdept) VALUES(NULL, 'Filières courtes');
INSERT INTO departement(codedept,libdept) VALUES(NULL, 'Réseaux');

CREATE TABLE IF NOT EXISTS enseignant (
id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
civilite varchar(100) NOT NULL,
fullname varchar(100) NOT NULL,
email varchar(100) UNIQUE NOT NULL,
dept int(11) NOT NULL
) ENGINE=InnoDB;
ALTER TABLE enseignant ADD FOREIGN KEY (dept) REFERENCES departement (codedept) ;

INSERT INTO enseignant (id, civilite, fullname, email,dept) VALUES  (NULL, 'Mme','Yakout ben rekaya','yakout@gmail.com',1);
INSERT INTO enseignant (id, civilite, fullname, email,dept) VALUES  (NULL, 'Mme','Sana ben hamouda','sana@wanadoo.fr',1);
INSERT INTO enseignant (id, civilite, fullname, email,dept) VALUES  (NULL, 'Mme','Nermine ben aicha','nermine@yafoo.com',2);
INSERT INTO enseignant (id, civilite, fullname, email,dept) VALUES  (NULL, 'Mme','Chaima khlifi','chaima@gmail.com',3);

CREATE TABLE IF NOT EXISTS equipement (
code int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
libelle varchar(100) UNIQUE NOT NULL,
genre varchar(100) NOT NULL
) ENGINE=InnoDB;

INSERT INTO equipement(code, libelle, genre) VALUES(NULL, 'dell1','Ordinateur bureau');
INSERT INTO equipement(code, libelle, genre) VALUES(NULL, 'dell2','Imprimante');
INSERT INTO equipement(code, libelle, genre) VALUES(NULL, 'dell3','Projecteur');
INSERT INTO equipement(code, libelle, genre) VALUES(NULL, 'dell4','Table');
INSERT INTO equipement(code, libelle, genre) VALUES(NULL, 'dell5','Télevision');
INSERT INTO equipement(code, libelle, genre) VALUES(NULL, 'dell6','Souris sans fil');

CREATE TABLE IF NOT EXISTS affectation (
num int(11) NOT NULL AUTO_INCREMENT,
id_enseignement int(11) NOT NULL,
id_equip int(11) NOT NULL,
dateaffec DATETIME NOT NULL,
qtte int(11) NOT NULL,
PRIMARY KEY (num,id_enseignement,id_equip)
) ENGINE=InnoDB;

ALTER TABLE affectation ADD FOREIGN KEY (id_enseignement) REFERENCES enseignant (id);
ALTER TABLE affectation ADD FOREIGN KEY (id_equip) REFERENCES equipement (code) ;