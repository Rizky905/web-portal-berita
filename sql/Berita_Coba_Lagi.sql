#
# TABLE STRUCTURE FOR: admin_groups
#

DROP TABLE IF EXISTS `admin_groups`;

CREATE TABLE `admin_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: admin_users
#

DROP TABLE IF EXISTS `admin_users`;

CREATE TABLE `admin_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: admin_users_groups
#

DROP TABLE IF EXISTS `admin_users_groups`;

CREATE TABLE `admin_users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: users
#

DROP TABLE IF EXISTS `USERS`;

CREATE TABLE `USERS` (
  `id_user` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

create table ARTICLES
(
   ID_ARTICLES          int not null AUTO_INCREMENT,
   TITLE_ARTICLES       varchar(50),
   SUMMARY_ARTICLES     varchar(200),
   BODY_ARTICLES        text,
   CREATED_DATE         date,
   primary key (ID_ARTICLES)
);

/*==============================================================*/
/* Table: CATEGORY                                              */
/*==============================================================*/
create table CATEGORY
(
   ID_CATEGORY          int not null AUTO_INCREMENT,
   NAME_CATEGORY        varchar(50),
   SLUG_CATEGORY        varchar(50),
   STATUS_CATEGORY      smallint,
   primary key (ID_CATEGORY)
);

/*==============================================================*/
/* Table: MEDIA                                                 */
/*==============================================================*/
create table MEDIAS
(
   ID_MEDIA             int not null AUTO_INCREMENT,
   TITLE_MEDIA          varchar(25),
   CAPTION_MEDIA        varchar(50),
   primary key (ID_MEDIA)
);

/*==============================================================*/
/* Table: TAG                                                   */
/*==============================================================*/
create table TAG
(
   ID_TAG               int not null AUTO_INCREMENT,
   TAG_NAME             varchar(50),
   SLUG                 varchar(50),
   primary key (ID_TAG)
);

create table ADMIN_CREATED_ARTICLES
(
   ID_ARTICLES          int not null,
   ID_ADMIN             int not null,
   primary key (ID_ARTICLES, ID_ADMIN)
);

create table ARTICLES_HAVE_CATEGORY
(
   ID_CATEGORY          int not null,
   ID_ARTICLES          int not null,
   primary key (ID_CATEGORY, ID_ARTICLES)
);

CREATE TABLE articles_have_tag(
    ID_TAG int(11),
    ID_ARTICLES int(11),
    PRIMARY KEY(ID_TAG,ID_ARTICLES)
);

create table ARTICLES_HAVE_MEDIA
(
   ID_MEDIA             int not null,
   ID_ARTICLES          int not null,
   primary key (ID_MEDIA, ID_ARTICLES)
);

alter table articles_have_tag add constraint FK_ARTICLES_HAVE_TAG foreign key (ID_TAG)
      references TAG (ID_TAG) on delete restrict on update restrict;

alter table articles_have_tag add constraint FK_ARTICLES_HAVE_TAG2 foreign key (ID_ARTICLES)
      references ARTICLES (ID_ARTICLES) on delete restrict on update restrict;

alter table ARTICLES_HAVE_CATEGORY add constraint FK_ARTICLES_HAVE_CATEGORY foreign key (ID_CATEGORY)
      references CATEGORY (ID_CATEGORY) on delete restrict on update restrict;

alter table ARTICLES_HAVE_CATEGORY add constraint FK_ARTICLES_HAVE_CATEGORY2 foreign key (ID_ARTICLES)
      references ARTICLES (ID_ARTICLES) on delete restrict on update restrict;

alter table ARTICLES_HAVE_MEDIA add constraint FK_ARTICLES_HAVE_MEDIA foreign key (ID_MEDIA)
      references MEDIA (ID_MEDIA) on delete restrict on update restrict;

alter table ARTICLES_HAVE_MEDIA add constraint FK_ARTICLES_HAVE_MEDIA2 foreign key (ID_ARTICLES)
      references ARTICLES (ID_ARTICLES) on delete restrict on update restrict;


INSERT INTO `admin_groups` (`id`, `name`, `description`) VALUES ('1', 'webmaster', 'Webmaster');
INSERT INTO `admin_groups` (`id`, `name`, `description`) VALUES ('2', 'admin', 'Administrator');
INSERT INTO `admin_groups` (`id`, `name`, `description`) VALUES ('3', 'manager', 'Manager');
INSERT INTO `admin_groups` (`id`, `name`, `description`) VALUES ('4', 'staff', 'Staff');

INSERT INTO `admin_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`) VALUES ('1', '127.0.0.1', 'webmaster', '$2y$08$/X5gzWjesYi78GqeAv5tA.dVGBVP7C1e1PzqnYCVe5s1qhlDIPPES', NULL, NULL, NULL, NULL, NULL, NULL, '1451900190', '1465489592', '1', 'Webmaster', '');
INSERT INTO `admin_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`) VALUES ('2', '127.0.0.1', 'admin', '$2y$08$7Bkco6JXtC3Hu6g9ngLZDuHsFLvT7cyAxiz1FzxlX5vwccvRT7nKW', NULL, NULL, NULL, NULL, NULL, NULL, '1451900228', '1465489580', '1', 'Admin', '');
INSERT INTO `admin_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`) VALUES ('3', '127.0.0.1', 'manager', '$2y$08$snzIJdFXvg/rSHe0SndIAuvZyjktkjUxBXkrrGdkPy1K6r5r/dMLa', NULL, NULL, NULL, NULL, NULL, NULL, '1451900430', '1465489585', '1', 'Manager', '');
INSERT INTO `admin_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`) VALUES ('4', '127.0.0.1', 'staff', '$2y$08$NigAXjN23CRKllqe3KmjYuWXD5iSRPY812SijlhGeKfkrMKde9da6', NULL, NULL, NULL, NULL, NULL, NULL, '1451900439', '1465489590', '1', 'Staff', '');

INSERT INTO `admin_users_groups` (`id`, `user_id`, `group_id`) VALUES ('1', '1', '1');
INSERT INTO `admin_users_groups` (`id`, `user_id`, `group_id`) VALUES ('2', '2', '2');
INSERT INTO `admin_users_groups` (`id`, `user_id`, `group_id`) VALUES ('3', '3', '3');
INSERT INTO `admin_users_groups` (`id`, `user_id`, `group_id`) VALUES ('4', '4', '4');