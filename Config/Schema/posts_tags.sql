create table posts_tags (
    id int unsigned not null auto_increment primary key,
    post_id int unsigned not null comment "Foreign key to posts table",
    tag_id int unsigned not null comment "Foreign key to tags table",
    created datetime not null,
    modified datetime not null,
    unique key post_tag (post_id, tag_id),
    key tag_id (tag_id)
) engine=innodb default charset=utf8 comment="HABTM relationship table";
