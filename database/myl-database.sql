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
	admin_uid BIGINT NOT NULL PRIMARY KEY,
	is_fanpage BIT NOT NULL,
	page_name VARCHAR(60) NOT NULL,
	theme_id INT NULL REFERENCES myl_themes (theme_id)
);

CREATE TABLE myl_covers
(
	image_fbid BIGINT NOT NULL PRIMARY KEY,
	page_fbid BIGINT NOT NULL REFERENCES myl_accounts (page_fbid),
	updated_time DATETIME NOT NULL,
	source_url VARCHAR(1024) NOT NULL,
	width INT NOT NULL,
	height INT NOT NULL,
	offset_y INT NOT NULL,
	is_downloaded BIT NOT NULL DEFAULT 0
);

CREATE TABLE myl_categorias
(
	id_categoria BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	page_fbid BIGINT NOT NULL REFERENCES myl_accounts (page_fbid),
	nome_categoria VARCHAR(50) NOT NULL,
	nome_seo VARCHAR(50) NOT NULL
);

CREATE TABLE myl_midia
(
	midia_fbid BIGINT NOT NULL PRIMARY KEY,
	id_categoria BIGINT NOT NULL REFERENCES myl_categorias (id_categoria),
	updated_time DATETIME NOT NULL,
	thumb_source_url VARCHAR(1024) NOT NULL,
	thumb_width INT NOT NULL,
	thumb_height INT NOT NULL,
	thumb_is_downloaded BIT NOT NULL DEFAULT 0,
	full_source_url VARCHAR(1024) NOT NULL,
	full_width INT NOT NULL,
	full_height INT NOT NULL,
	full_is_downloaded BIT NOT NULL DEFAULT 0
);

CREATE TABLE myl_fb_albums
(
	album_id BIGINT NOT NULL PRIMARY KEY,
	page_fbid BIGINT NOT NULL REFERENCES myl_accounts (page_fbid),
	album_type VARCHAR(15) NOT NULL,
	count INT NOT NULL DEFAULT 0,
	updated_time DATETIME NOT NULL,
	synced_time DATETIME NULL
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
SELECT * FROM myl_covers;
SELECT * FROM myl_categorias;
SELECT * FROM myl_midia;
SELECT * FROM myl_fb_albums;

/***********************************************************/
DELETE FROM myl_fb_albums;
DELETE FROM myl_midia;
DELETE FROM myl_categorias;
DELETE FROM myl_covers;
DELETE FROM myl_profiles;
DELETE FROM myl_themes;
DELETE FROM myl_subdomains;
DELETE FROM myl_accounts;