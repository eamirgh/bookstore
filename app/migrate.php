<?php
require_once __DIR__ . '/db.php';

function migratesubs()
{
    $db = (new db())->db();
    $q = 'CREATE TABLE subs(
    sid BIGINT AUTO_INCREMENT PRIMARY KEY,
    sname VARCHAR(255) NOT NULL
    );';
    $db->exec($q);
}

function migratebooks()
{
    $db = (new db())->db();
    $q = 'CREATE TABLE books(
    bid BIGINT AUTO_INCREMENT PRIMARY KEY,
    bname VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    price BIGINT NOT NULL,
    sid BIGINT NOT NULL,
    des TEXT NOT NULL,
    cover VARCHAR(255) NOT NULL,
    status INT NOT NULL
    );';
    $db->exec($q);
}

function migrateUsers()
{
    $db = (new db())->db();
    $q = 'CREATE TABLE users(
    uid BIGINT AUTO_INCREMENT PRIMARY KEY,
    uname VARCHAR(255) NOT NULL,
    mobile VARCHAR(255) NOT NULL,
    addr VARCHAR(255) NOT NULL,
    pass VARCHAR(255) NOT NULL,
    role VARCHAR(255) NOT NULL,
    status INT NOT NULL
    );';
    $db->exec($q);
}

function migrateOrders()
{
    $db = (new db())->db();
    $q = 'CREATE TABLE orders(
    oid BIGINT AUTO_INCREMENT PRIMARY KEY,
    odate DATETIME NOT NULL,
    uid BIGINT NOT NULL,
    addr VARCHAR(255) NOT NULL,
    sid INT NOT NULL
    );';
    $db->exec($q);
}
function migrateStatuses()
{
    $db = (new db())->db();
    $q = 'CREATE TABLE states(
    sid BIGINT AUTO_INCREMENT PRIMARY KEY,
    sname VARCHAR(255) NOT NULL
    );';
    $db->exec($q);
    $q = "INSERT INTO states (sname) VALUES ('منتظر پرداخت'),('پرداخت شده'),('در حال پردازش'),('ارسال شده'),('تحویل شده'),('مرجوع شده');";
    $db->exec($q);
}
function migrateItems()
{
    $db = (new db())->db();
    $q = 'CREATE TABLE items(
    tid BIGINT AUTO_INCREMENT PRIMARY KEY,
    oid BIGINT NOT NULL,
    bid BIGINT NOT NULL,
    price BIGINT NOT NULL,
    qty INT NOT NULL
    );';
    $db->exec($q);
}

migratesubs();
migratebooks();
migrateUsers();
migrateOrders();
migrateStatuses();
migrateItems();
