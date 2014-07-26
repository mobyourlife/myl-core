CREATE DATABASE mobyourlife;

USE mobyourlife;

CREATE TABLE myl_accounts
(
	admin_uid BIGINT NOT NULL,
	page_uid BIGINT NOT NULL,
	access_token VARCHAR(512) NOT NULL
);

CREATE TABLE myl_subdomains
(
	page_uid BIGINT NOT NULL,
	subdomain VARCHAR(30) NOT NULL
);
