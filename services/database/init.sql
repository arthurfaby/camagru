CREATE DATABASE IF NOT EXISTS camagru_db;
CREATE TABLE test (
    id int primary key not null unique autoincrement,
    username text
);