CREATE TABLE posts (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    image_id int unsigned not null,
    title VARCHAR(255) NOT NULL,
    body TEXT NOT NULL,
    publish DATETIME NOT NULL,
    created DATETIME NOT NULL,
    modified DATETIME NOT NULL
) engine=innodb default charset=utf8 comment="Blog Post data";
