CREATE TABLE users(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    admin INTEGER NOT NULL DEFAULT 0
)