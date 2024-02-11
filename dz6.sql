create table parks
(
    id int auto_increment primary key,
    address varchar(255) not null
)

create table customers
(
    id int auto_increment primary key,
    name varchar(255) not null,
    phone varchar(255) default null
)

create table cars
(
    id int auto_increment primary key,
    park_id int not null,
    model varchar(255) not null,
    price float not null,
    constraint FK_park
        foreign key (park_id) references parks (id) on delete cascade
)

create table drivers
(
    id int auto_increment primary key,
    car_id int not null,
    name varchar(255) not null,
    phone varchar(255) default null,
    constraint FK_car
        foreign key (car_id) references cars (id) on delete cascade
)

create table orders
(
    id int auto_increment primary key,
    driver_id int not null,
    customer_id int not null,
    start text not null,
    finish text not null,
    total float not null,
    constraint FK_driver
        foreign key (driver_id) references drivers (id) on delete cascade,
    constraint FK_customer
        foreign key (customer_id) references customers (id) on delete cascade
)
