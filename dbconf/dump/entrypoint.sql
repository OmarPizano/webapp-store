CREATE DATABASE store;
USE store;

CREATE TABLE users (
    id              VARCHAR(6) NOT NULL,
    user_name       VARCHAR(20) NOT NULL,
    user_email      VARCHAR(255) NOT NULL,
    user_password   VARCHAR(60) NOT NULL,
    user_role       VARCHAR(6) NOT NULL,
    user_image      VARCHAR(255),
    user_address    VARCHAR(255),
    CONSTRAINT pk_users PRIMARY KEY (id),
    CONSTRAINT uq_user_name UNIQUE(user_name),
    CONSTRAINT uq_user_email UNIQUE(user_email)
);

-- Usuario por defecto de administrador.
-- password: admin12345
INSERT INTO users VALUES (
    '111111',
    'admin',
    'admin@email.com',
    '$2y$10$LRBt5eUcESD8ZWuUC3O9E.FoZ9hMcmOl56r2MaUupWoNIsitYEl4S',
    'admin',
    NULL,
    NULL
);

-- password: comprador
INSERT INTO users VALUES (
    'aaaaaa',
    'comprador',
    'comprador@email.com',
    '$2a$12$gTFOHxlkEqRU2D56heiiBePTcfAjXbL61aJESmUhiWEUphYB2z..i',
    'client',
    NULL,
    NULL
);

-- CREATE TABLE addresses (
--     id              INT(4) UNSIGNED ZEROFILL AUTO_INCREMENT NOT NULL,
--     user_id         VARCHAR(6) NOT NULL,
--     address_state   VARCHAR(20) NOT NULL,
--     address_city    VARCHAR(20) NOT NULL,
--     address_street  VARCHAR(30) NOT NULL,
--     address_number  VARCHAR(5) NOT NULL,
--     CONSTRAINT pk_addresses PRIMARY KEY (id),
--     CONSTRAINT fk_address_user FOREIGN KEY (user_id) REFERENCES users (id)
-- );

CREATE TABLE categories (
    id              INT(4) UNSIGNED ZEROFILL AUTO_INCREMENT NOT NULL,
    category_name   VARCHAR(20) NOT NULL,
    CONSTRAINT pk_categories PRIMARY KEY (id),
    CONSTRAINT uq_category UNIQUE (category_name)
);

INSERT INTO categories VALUES(NULL, 'Tecnología');
INSERT INTO categories VALUES(NULL, 'Supermercado');
INSERT INTO categories VALUES(NULL, 'Ropa');

CREATE TABLE products (
    id                  INT(4) UNSIGNED ZEROFILL AUTO_INCREMENT NOT NULL,
    category_id         INT(4) UNSIGNED ZEROFILL NOT NULL,
    product_name        VARCHAR(50) NOT NULL,
    product_description VARCHAR(255),
    product_price       FLOAT(10,2) UNSIGNED NOT NULL,
    product_stock       INT UNSIGNED NOT NULL,
    product_discount    TINYINT UNSIGNED NOT NULL,
    product_image       VARCHAR(255),
    CONSTRAINT pk_products PRIMARY KEY (id),
    CONSTRAINT fk_product_category FOREIGN KEY (category_id) REFERENCES categories (id),
    CONSTRAINT uq_product_name UNIQUE (product_name)
);

INSERT INTO products VALUES(NULL, 0001, 'Laptop Lenovo Thinkpad T430s', NULL, 6000.00, 4, 0, NULL);
INSERT INTO products VALUES(NULL, 0002, 'Refresco CocaCola 600ml', NULL, 17.00, 100, 0, NULL);
INSERT INTO products VALUES(NULL, 0003, 'Sudadera Pull&Bear Negra CH', NULL, 2000.00, 10, 50, NULL);

CREATE TABLE orders (
    id              INT(4) UNSIGNED ZEROFILL AUTO_INCREMENT NOT NULL,
    user_id         VARCHAR(6) NOT NULL,
    order_status    VARCHAR(8) NOT NULL,
    order_date      DATETIME NOT NULL,
    order_total     FLOAT(10,2) UNSIGNED NOT NULL,
    CONSTRAINT pk_orders PRIMARY KEY (id),
    CONSTRAINT fk_order_user FOREIGN KEY (user_id) REFERENCES users (id)
);

INSERT INTO orders VALUES(NULL, 'aaaaaa', 'pending', '2023-01-02 13:23:33', 7017.00);

CREATE TABLE order_items (
    id          INT(4) UNSIGNED ZEROFILL AUTO_INCREMENT NOT NULL,
    order_id    INT(4) UNSIGNED ZEROFILL NOT NULL,
    product_id  INT(4) UNSIGNED ZEROFILL NOT NULL,
    item_count  TINYINT UNSIGNED NOT NULL,
    CONSTRAINT pk_items PRIMARY KEY (id),
    CONSTRAINT fk_item_order FOREIGN KEY (order_id) REFERENCES orders (id),
    CONSTRAINT fk_item_product FOREIGN KEY (product_id) REFERENCES products (id)
);

INSERT INTO order_items VALUES(NULL, 0001, 0001, 1);
INSERT INTO order_items VALUES(NULL, 0001, 0002, 1);
INSERT INTO order_items VALUES(NULL, 0001, 0003, 1);