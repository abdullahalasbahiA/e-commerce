CREATE TABLE users(
--  user (might be better)
	users_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    users_uid VARCHAR(128) NOT NULL,
    users_pwd VARCHAR(255) NOT NULL,
    users_email VARCHAR(255) NOT NULL
);

--           products (may be better)
CREATE TABLE product(
	product_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    product_name VARCHAR(255) NOT NULL,
    product_price VARCHAR(20) NOT NULL,
    product_quantity INT(11) NOT NULL,
    product_vendor_id INT(11) NOT NULL,
    FOREIGN KEY(product_vendor_id) REFERENCES users(users_id)
);

CREATE TABLE cart( 
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    product_price INT(11) NOT NULL,
    product_quantity INT(11) NOT NULL,
    product_image VARCHAR(255) NOT NULL,
    product_id INT(11) NOT NULL,
    user_id INT(11) NOT NULL,
    product_vendor_id INT(11) NOT NULL,
    FOREIGN KEY(product_vendor_id) REFERENCES users(users_id),
    FOREIGN KEY(product_id) REFERENCES product(product_id),
    FOREIGN KEY(user_id) REFERENCES users(users_id) 
);


CREATE TABLE orders( 
    id INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    product_name VARCHAR(255) NOT NULL,
    product_price INT(11) NOT NULL,
    product_quantity INT(5) NOT NULL,
    product_image VARCHAR(255) NOT NULL,
    product_id INT(11) NOT NULL,
    user_id INT(11) NOT NULL,
    product_vendor_id INT(11) NOT NULL,
    FOREIGN KEY(product_vendor_id) REFERENCES users(users_id),
    FOREIGN KEY(product_id) REFERENCES product(product_id),
    FOREIGN KEY(user_id) REFERENCES users(users_id)
);


-- SOME useful ALTER
ALTER TABLE cart ADD COLUMN column_name INT(11) AFTER column_name;
ALTER TABLE cart ADD FOREIGN KEY(product_vendor_id) REFERENCES users(users_id);
