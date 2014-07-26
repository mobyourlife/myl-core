CREATE DATABASE mobyourlife;

USE mobyourlife;

CREATE TABLE myl_accounts
(
	admin_uid BIGINT NOT NULL,
	admin_name VARCHAR(50) NOT NULL,
	admin_email VARCHAR(100) NOT NULL,
	page_fbid BIGINT NOT NULL,
	access_token VARCHAR(512) NOT NULL
);

CREATE TABLE myl_subdomains
(
	page_fbid BIGINT NOT NULL,
	subdomain VARCHAR(30) NOT NULL
);
