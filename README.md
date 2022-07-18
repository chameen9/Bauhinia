## Laravel Version

You need to configure Laravel version 8

## Bootsrap Version

You need to configure Bootsrap version 5.2

## Database Setup

You need to create a database in MySQL and database name should be 'bauhiniya'.

## SQL Quaries for tables

create TABLE customers(
    email VARCHAR(100) NOT NULL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    password VARCHAR(50) NOT NULL,
    delivery_address VARCHAR(250) NOT NULL,
    primary_contact_number VARCHAR(15) NOT NULL,
    secondary_contact_number VARCHAR(15) NOT NULL
);

create TABLE employees(
    id VARCHAR(50) NOT NULL PRIMARY KEY,
    email VARCHAR(100) NOT NULL,
    name VARCHAR(100),
    role VARCHAR(100),
    password VARCHAR(50),
    address VARCHAR(250),
    contact_number VARCHAR(15),
    gender VARCHAR(10),
    date_of_birth VARCHAR(12)
);

create TABLE carts(
    product_id VARCHAR(50) NOT NULL PRIMARY KEY,
    cus_email VARCHAR(100) NOT NULL,
    product_name VARCHAR(200),
    brand VARCHAR(100),
    colour VARCHAR(100),
    size VARCHAR(50),
    qty INT,
    FOREIGN KEY (cus_email) REFERENCES customers(email)
);
