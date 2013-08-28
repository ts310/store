CREATE TABLE `products` (
	item_id INT AUTO_INCREMENT,
	item_title VARCHAR(255),
	item_comment TEXT,
	items_left INT,
	stock INT,
	price INT,
	release_date DATETIME,
	created_date DATETIME,
	modified_date DATETIME,
	brand_name VARCHAR(100),
	brand_name_kana VARCHAR(100),
	user_id VARCHAR(100),
	user_nickname VARCHAR(100),
	PRIMARY KEY (item_id)
) ENGINE InnoDb DEFAULT CHARACTER SET utf8;