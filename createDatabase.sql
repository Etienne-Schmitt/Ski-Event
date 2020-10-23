create or replace table epreuves
(
    id   int          not null auto_increment primary key,
    lieu varchar(255) not null,
    date datetime     not null unique
);

create or replace table profils
(
    id  int          not null auto_increment primary key,
    nom varchar(255) not null unique
);

create or replace table categories
(
    id  int          not null auto_increment primary key,
    nom varchar(255) not null unique
);

create or replace table participants
(
    id                int          not null auto_increment primary key,
    nom               varchar(255) not null,
    prenom            varchar(255) not null,
    date_de_naissance date         not null,
    email             varchar(255) not null unique,
    photo_chemin      varchar(255) not null
);

create or replace table resultats
(
    id             int not null auto_increment primary key,
    epreuve_id     int not null,
    participant_id int not null,

    constraint fk_resultats__epreuve_id
        foreign key (epreuve_id) references epreuves (id),

    constraint fk_resultats__participant_id
        foreign key (participant_id) references participants (id)
);

create or replace table participants_categorie
(
    id             int not null auto_increment primary key,
    participant_id int not null,
    categorie_id   int not null,

    constraint fk_participants_categorie__participant_id
        foreign key (participant_id) references participants (id),

    constraint fk_participants_categorie__categorie_id
        foreign key (categorie_id) references categories (id)
);

create or replace table participants_profil
(
    id             int not null auto_increment primary key,
    participant_id int not null,
    profil_id      int not null,

    constraint fk_participants_profil__participant_id
        foreign key (participant_id) references participants (id),

    constraint fk_participants_profil__profils_id
        foreign key (profil_id) references profils (id)
);
