create table images_posts (
    id int unsigned not null auto_increment primary key,
    image_id int unsigned not null,
    post_id int unsigned not null,
    created datetime not null,
    modified datetime not null,
    key image_id (image_id),
    key post_id (post_id)
) engine=innodb default charset=utf8 comment="If an image model is used can be the HABTM relationship";
