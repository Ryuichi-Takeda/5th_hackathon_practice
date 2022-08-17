DROP SCHEMA IF EXISTS hackathon;

CREATE SCHEMA hackathon;

use hackathon;

drop table if EXISTS users;

create table users (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    age INT(10) NOT NULL
);

INSERT INTO users SET
name='中澤かずき',
age='22';

INSERT INTO users SET
name='福場脩真',
age='20';

INSERT INTO users SET
name='武田龍一',
age='99';

INSERT INTO users SET
name='古屋美羽',
age='20';
