CREATE DATABASE phpproject;


CREATE TABLE users (
	id int NOT NULL primary key AUTO_INCREMENT,
	userName VARCHAR(50),
    userPass VARCHAR(300),
	userEmail VARCHAR(100),
	is_admin int,
	reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE genres (
    id varchar(3) NOT NULL PRIMARY KEY,
    title VARCHAR(50)
);

CREATE TABLE article (
	id int NOT NULL primary key AUTO_INCREMENT,
	title VARCHAR(50),
	descArt TEXT,
	imageUrl VARCHAR(100),
	genre varchar(3) NOT NULL,
	FOREIGN KEY (genre) REFERENCES genres(id) ON DELETE CASCADE
);

CREATE TABLE reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id int,
    game_id int,
    rating INT,
    review TEXT,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (game_id) REFERENCES article(id) ON DELETE CASCADE
);





INSERT INTO `genres` VALUES ("str", "Strategy");
INSERT INTO `genres` VALUES ("rpg", "Role-Playing Game");
INSERT INTO `genres` VALUES ("fps", "First Person Shooter");
INSERT INTO `genres` VALUES ("sim", "Simulation Game");
INSERT INTO `genres` VALUES ("???", "Other");

INSERT INTO `users` VALUES (NULL, "root", "_J9..rasm.TV7il9LjPk", "root@admin.com", 1, NULL);


