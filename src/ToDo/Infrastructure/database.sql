drop table if exists to_do_list;

create table to_do_list
(
    name varchar(250)  not null,
    json varchar(4000) not null
);

insert into to_do_list (name, json)
values ('Łukasz', '[]');

insert into to_do_list (name, json)
values ('Ilona', '[]');