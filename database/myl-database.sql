CREATE DATABASE mobyourlife;

USE mobyourlife;

CREATE TABLE myl_accounts
(
	admin_uid BIGINT NOT NULL,
	admin_name VARCHAR(50) NOT NULL,
	admin_email VARCHAR(100) NOT NULL,
	page_fbid BIGINT NOT NULL,
	register_date DATETIME NOT NULL,
	access_token VARCHAR(512) NOT NULL
);

CREATE TABLE myl_subdomains
(
	page_fbid BIGINT NOT NULL,
	subdomain VARCHAR(30) NOT NULL
);

CREATE TABLE myl_themes
(
	theme_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	theme_name VARCHAR(30) NOT NULL
);

CREATE TABLE myl_profiles
(
	admin_uid BIGINT NOT NULL,
	is_fanpage BIT NOT NULL,
	page_name VARCHAR(60) NOT NULL,
	theme_id INT NULL REFERENCES myl_themes (theme_id)
);

INSERT INTO myl_themes (theme_id, theme_name) VALUES (1, 'amelia');
INSERT INTO myl_themes (theme_id, theme_name) VALUES (2, 'cerulean');
INSERT INTO myl_themes (theme_id, theme_name) VALUES (3, 'cosmo');
INSERT INTO myl_themes (theme_id, theme_name) VALUES (4, 'cyborg');
INSERT INTO myl_themes (theme_id, theme_name) VALUES (5, 'darkly');
INSERT INTO myl_themes (theme_id, theme_name) VALUES (6, 'flatly');
INSERT INTO myl_themes (theme_id, theme_name) VALUES (7, 'journal');
INSERT INTO myl_themes (theme_id, theme_name) VALUES (8, 'lumen');
INSERT INTO myl_themes (theme_id, theme_name) VALUES (9, 'readable');
INSERT INTO myl_themes (theme_id, theme_name) VALUES (10, 'simplex');
INSERT INTO myl_themes (theme_id, theme_name) VALUES (11, 'slate');
INSERT INTO myl_themes (theme_id, theme_name) VALUES (12, 'spacelab');
INSERT INTO myl_themes (theme_id, theme_name) VALUES (13, 'superhero');
INSERT INTO myl_themes (theme_id, theme_name) VALUES (14, 'united');
INSERT INTO myl_themes (theme_id, theme_name) VALUES (15, 'yeti');

/***********************************************************/

SELECT * FROM myl_accounts;
SELECT * FROM myl_subdomains;
SELECT * FROM myl_themes;
SELECT * FROM myl_profiles;