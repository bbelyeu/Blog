CREATE TABLE tags (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    created DATETIME NOT NULL,
    modified DATETIME NOT NULL,
    unique key name (name)
) engine=innodb default charset=utf8 comment="Blog post tags";
