-- - dang nhap mysql 
mysql -uroot -p
show databases;

-- create database 
create database thanh_databas;

create database thanh_database character set utf8 collate utf8_unicode_ci;
use thanh_database;
create table users (
    id int(11) auto_increment primary key,
    username varchar(100) not null,
     email varchar(100) not null,
      password varchar(250) not null,
       avatar varchar(125000) not null,
        status int(10) default(1)
);


-- see tables 
show tables;

describe table_name;

create table products (
    id int(11) auto_increment primary key,
    name varchar(100) not null,
    description text,
    slug varchar(100),
    category_id int(10) not null,
    price varchar(250) not null,
    image varchar(250),
    status int(10) default(1)
);

create table categories (
    id int(11) auto_increment primary key,
    name varchar(100) not null,
    description text,
    slug varchar(100),
    image varchar(250),
    status int(10) default(1)
);

-- insert data into database 
insert into table_name () values ();

insert into users (username, email, password) values ('Admin', 'admin@gmail.com', 123456);

insert into users set username = 'letoan', email = 'toan@gmail.com', password = '123456';

-- INSERT INTO users (img, status) VALUES ('1233', 0);
-- INSERT INTO users set img = 'sdasd';
INSERT INTO categories (name, slug, image) VALUES ('Iphone 5s', 'iphone-5s', 'iphone5.png');

insert into users (username, email, password) values ('Admin 1', 'admin1@gmail.com', md5(123456));
insert into users (username, email, password) values ('Admin 1', 'admin1@gmail.com', sha1(123456));

insert into users (username, email, password) values (ucase('le van toan'), 'admin1@gmail.com', sha1(123456));

SELECT * FROM users;

update users set column = value;

-- $pass = '123456';
-- md5($pass) 

-- update data from database 
update users set username = 'levantoan' where id = 2;

-- delate data from database 
delete from users where id = 10;

change field name (add)

alter table users add column name varchar(100) after id;

insert into products (name, slug, price, category_id) values (
    'iphone 6s', 'iphone-6s', 1200, 1
), (
    'oppo 4x', 'oppo-4x', 1100, 1
), (
    'Samsung galaxy s2', 'samsung-galaxy-s2', 1200, 1
), (
    'Macbook pro', 'macbook-pro', 2200, 2
), (
    'Dell insperion', 'dell-insperion', 2200, 2
), (
    'HP i100', 'hp-i100', 3200, 2
);


update products set status = 0 where id%2 = 0;
select *, max(price) from products;

select max(price) as max_price from products;
select * from products where price = (select max(price) from products);

SELECT 
    *
FROM
    payments
WHERE
    amount = (SELECT 
            MAX(amount)
        FROM
            payments);


select *, price*stock as stock_value from products;
-- select 2 condition
select * from products where name like '%p%';select *, if(status = 1, 'Con Hang', 'Het Hang') as stock_status from products;

-- multiple condition
SELECT OrderID, Quantity,
CASE
    WHEN Quantity > 30 THEN "The quantity is greater than 30"
    WHEN Quantity = 30 THEN "The quantity is 30"
    ELSE "The quantity is under 30"
END
FROM OrderDetails;

create table suppliers (
    id int(11) auto_increment primary key,
    name varchar(100) not null,
    description text,
    logo varchar(250),
    address varchar(250),
    status int(10) default(1)
);


create table product_suppliers (
    id int(11) auto_increment primary key,
    supplier_id int(11) not null,
    product_id int(11) not null
);

-- 1. join (inner join)

-- 2. left join

-- 3. right join

-- 4. full join (union)
select categories.*, products.id as product_id, products.name as product_name from categories inner join products on categories.id = products.

select c.*, p.id as product_id, p.name as product_name from categories as c inner join products as p on c.id = p.category_id where c.id = 1;


select s.id, s.name as supplier_name, p.id as product_id, p.name as product_name from suppliers as s
left join product_suppliers as ps on ps.supplier_id = s.id 
left join products as p on p.id = ps.product_id
where s.id = 1;
----------------------- where supplier_id = 1;