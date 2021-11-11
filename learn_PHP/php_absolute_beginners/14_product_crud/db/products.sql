create table php_product_crud.products (
    id          int auto_increment
        primary key,
    title       varchar(512)   not null,
    description longtext       null,
    image       varchar(2048)  null,
    price       decimal(10, 2) not null,
    create_date datetime       not null
);

