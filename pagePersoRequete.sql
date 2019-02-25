PagePerso.


CREATE DATABASE PagePerso CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE USER 'adminPagePerso'@'localhost' IDENTIFIED BY 'P@gePers0';

GRANT ALL PRIVILEGES ON PagePerso.* TO 'adminPagePerso'@'localhost';


CREATE TABLE article (
    id INT(100) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(100),
    texte VARCHAR(10000),
    dateParution DATE
);


CREATE TABLE commentaire(
    id INT(100) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_article INT(100),
    pseudo VARCHAR(100),
    texte VARCHAR(10000),
    dateParution DATE,
    FOREIGN KEY (id_article) REFERENCES article(id)
);

CREATE TABLE photo(
    id INT(100) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_article INT(100),
    photo VARCHAR(100),
    FOREIGN KEY (id_article) REFERENCES article(id)
);

/* Article Mini-Facebook */
INSERT INTO article(titre,texte,dateParution)
    VALUES (
    "Mini-Facebook",
    "Ce projet fÃ»t une excellente expÃ©rience, j'ai adorÃ© pratiquer le
    front-end en particulier.
    En ce qui concerne le back-end PHP/MySQL ce fÃ»t plus compliquÃ© car
    c'Ã©tait ma premiÃ¨re fois.
    Le petit plus de ce projet que nous avons rajoutÃ©,
    c'est une fonction qui fait changer les lettres
    de couleurs alÃ©atoirement.",
    "2019-02-20"
);


/* Article Doggo-Gram */
INSERT INTO article(titre,texte, dateParution)
    VALUES (
    "Doggo-Gram",
    "Une expÃ©rience humaine trÃ¨s enrichissante, nous avons travaillÃ© en
    trinÃ´me sur ce projet.
    J'ai dÃ©veloppÃ© une affinitÃ© avec PHP/MYSQL que je n'aurais jamais cru
    aprÃ¨s mon projet prÃ©cÃ©dent.
    Le front-end toujours un plaisir de le pratiquer,
    sachant que j'aime les interface soft et clair.",
    "2019-02-21"
);

/* Photo Mini-Facebook*/
INSERT INTO photo(id_article,photo)
    VALUES (2, "inscriptionMiniFacebook.png");

INSERT INTO photo(id_article,photo)
    VALUES (2, "pageContactMiniFacebook.png");

INSERT INTO photo(id_article,photo)
    VALUES (2, "pagePersoMiniFacebook.png");


/* Photo Mini-Facebook*/
INSERT INTO photo(id_article,photo)
    VALUES (3, "acceuil.png");

INSERT INTO photo(id_article,photo)
    VALUES (3, "inscriptionUser.png");

INSERT INTO photo(id_article,photo)
    VALUES (3, "identification.png");

INSERT INTO photo(id_article,photo)
    VALUES (3, "listeChien.png");

INSERT INTO photo(id_article,photo)
    VALUES (3, "profilChien.png");

INSERT INTO photo(id_article,photo)
    VALUES (3, "profilChien1.png");

INSERT INTO photo(id_article,photo)
    VALUES (3, "article.png");



/* Commentaire d'Utilisateur */
INSERT INTO commentaire(
   "id","id_article","pseudo","texte"
    "dateParution")
    VALUES (
    "", "", "",
    ""
);

/* Commentaire d'Utilisateur */
INSERT INTO photo(
   "id","id_article","pseudo","texte"
    "dateParution")
    VALUES (
    "", "", "",
    ""
);

