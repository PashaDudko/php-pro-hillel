INSERT INTO parks (address) VALUES ('addr1'), ('addr2'), ('addr3');
INSERT INTO customers (name, phone) VALUES ('name1', '111'), ('name2', '222'), ('name3', '333');
INSERT INTO cars (park_id, model, price) VALUES (1, 'model1', 8.5),(2, 'model2', 9.5),(3, 'model3', 7.5);
INSERT INTO drivers (car_id, name, phone) VALUES (1, 'driver1', '044111'),(2, 'driver2', '044222'),(3, 'driver3', '044333');
INSERT INTO orders (driver_id, customer_id, start, finish, total) VALUES (1, 1, 'a', 'b', 25.1 ), (2, 2, 'c', 'a', 24.1 ), (3, 3, 'c', 'b', 26.1 );

ALTER TABLE customers CHANGE name customer_name CHAR(10);
ALTER TABLE drivers ADD column rating INT DEFAULT 1;

SELECT c.phone FROM customers c JOIN orders o ON c.id = o.customer_id WHERE o.total > 25;

SELECT * FROM parks;
SELECT * FROM drivers ORDER BY name DESC;

UPDATE parks SET address = 'new_add1' WHERE id = 1;

SELECT name FROM drivers UNION SELECT total FROM orders;

DELETE FROM parks WHERE id = 1;
