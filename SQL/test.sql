-- Clubs table
CREATE TABLE clubs (
    id INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(256) NOT NULL,
    image VARCHAR(256), -- URL or path to the club image
    PRIMARY KEY (id)
);

-- Club Activities table
CREATE TABLE club_activities (
    id INT(11) NOT NULL AUTO_INCREMENT,
    club_id INT(11) NOT NULL,
    name VARCHAR(256) NOT NULL,
    image VARCHAR(256), -- URL or path to the club activity image
    PRIMARY KEY (id),
    FOREIGN KEY (club_id) REFERENCES clubs(id) ON DELETE CASCADE
);

-- Club Activity Chats table
CREATE TABLE club_activity_chats (
    id INT(11) NOT NULL AUTO_INCREMENT,
    club_activity_id INT(11) NOT NULL,
    club_id INT(11),
    name VARCHAR(256) NOT NULL,
    content TEXT NOT NULL, -- Chat content
    PRIMARY KEY (id),
    FOREIGN KEY (club_activity_id) REFERENCES club_activities(id) ON DELETE CASCADE
    FOREIGN KEY (club_id) REFERENCES clubs(id) ON DELETE CASCADE
);

-- Club Activity Images table
CREATE TABLE club_activity_images (
    id INT(11) NOT NULL AUTO_INCREMENT,
    club_activity_id INT(11),
    club_id INT(11),
    image VARCHAR(256) NOT NULL, -- URL or path to the image
    PRIMARY KEY (id),
    FOREIGN KEY (club_activity_id) REFERENCES club_activities(id) ON DELETE CASCADE,
    FOREIGN KEY (club_id) REFERENCES clubs(id) ON DELETE CASCADE
);
