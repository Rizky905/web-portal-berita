/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     2/13/2019 11:04:04 AM                        */
/*==============================================================*/


drop table if exists ADMIN;

drop table if exists ADMIN_CREATED_ARTICLES;

drop table if exists ADMIN_HAVE_GROUP;

drop table if exists ARTICLES;

drop table if exists ARTICLES_HAVE_CATEGORY;

drop table if exists ARTICLES_HAVE_MEDIA;

drop table if exists CATEGORY;

drop table if exists `GROUP`;

drop table if exists MEDIA;

drop table if exists TAG;

/*==============================================================*/
/* Table: ADMIN                                                 */
/*==============================================================*/
create table ADMIN
(
   ID_ADMIN             int not null,
   IP_ADDRESS           varchar(15),
   USERNAME             varchar(100),
   PASSWORD             varchar(255),
   SALT                 varchar(255),
   EMAIL                varchar(100),
   ACTIVATION_CODE      varchar(40),
   FORGOTTEN_PASSWORD_CODE varchar(40),
   FORGOTTEN_PASSWORD_TIME int,
   REMEMBER_CODE        varchar(40),
   CREATED_ON           int,
   LAST_LOGIN           int,
   ACTIVE               smallint,
   FIRST_NAME           varchar(50),
   LAST_NAME            varchar(50),
   primary key (ID_ADMIN)
);

/*==============================================================*/
/* Table: ADMIN_CREATED_ARTICLES                                */
/*==============================================================*/
create table ADMIN_CREATED_ARTICLES
(
   ID_ARTICLES          int not null,
   ID_ADMIN             int not null,
   primary key (ID_ARTICLES, ID_ADMIN)
);

/*==============================================================*/
/* Table: ADMIN_HAVE_GROUP                                      */
/*==============================================================*/
create table ADMIN_HAVE_GROUP
(
   ID_GROUP             int not null,
   ID_ADMIN             int not null,
   primary key (ID_GROUP, ID_ADMIN)
); 

/*==============================================================*/
/* Table: ARTICLES                                              */
/*==============================================================*/
create table ARTICLES
(
   ID_ARTICLES          int not null,
   ID_TAG               int not null,
   TITLE_ARTICLES       varchar(50),
   SUMMARY_ARTICLES     varchar(200),
   BODY_ARTICLES        text,
   CREATED_DATE         date,
   primary key (ID_ARTICLES)
);

/*==============================================================*/
/* Table: ARTICLES_HAVE_CATEGORY                                */
/*==============================================================*/
create table ARTICLES_HAVE_CATEGORY
(
   ID_CATEGORY          int not null,
   ID_ARTICLES          int not null,
   primary key (ID_CATEGORY, ID_ARTICLES)
);

/*==============================================================*/
/* Table: ARTICLES_HAVE_MEDIA                                   */
/*==============================================================*/
create table ARTICLES_HAVE_MEDIA
(
   ID_MEDIA             int not null,
   ID_ARTICLES          int not null,
   primary key (ID_MEDIA, ID_ARTICLES)
);

/*==============================================================*/
/* Table: CATEGORY                                              */
/*==============================================================*/
create table CATEGORY
(
   ID_CATEGORY          int not null,
   NAME_CATEGORY        varchar(50),
   SLUG_CATEGORY        varchar(50),
   STATUS_CATEGORY      smallint,
   primary key (ID_CATEGORY)
);

/*==============================================================*/
/* Table: GROUP                                                 */
/*==============================================================*/
create table `GROUP`
(
   ID_GROUP             int not null,
   NAME                 varchar(20),
   DESCRIPTION          varchar(100),
   primary key (ID_GROUP)
);

/*==============================================================*/
/* Table: MEDIA                                                 */
/*==============================================================*/
create table MEDIA
(
   ID_MEDIA             int not null,
   TITLE_MEDIA          varchar(25),
   CAPTION_MEDIA        varchar(50),
   primary key (ID_MEDIA)
);

/*==============================================================*/
/* Table: TAG                                                   */
/*==============================================================*/
create table TAG
(
   ID_TAG               int not null,
   TAG_NAME             varchar(50),
   SLUG                 varchar(50),
   primary key (ID_TAG)
);

alter table ADMIN_CREATED_ARTICLES add constraint FK_ADMIN_CREATED_ARTICLES foreign key (ID_ARTICLES)
      references ARTICLES (ID_ARTICLES) on delete restrict on update restrict;

alter table ADMIN_CREATED_ARTICLES add constraint FK_ADMIN_CREATED_ARTICLES2 foreign key (ID_ADMIN)
      references ADMIN (ID_ADMIN) on delete restrict on update restrict;

alter table ADMIN_HAVE_GROUP add constraint FK_ADMIN_HAVE_GROUP foreign key (ID_GROUP)
      references `GROUP` (ID_GROUP) on delete restrict on update restrict;

alter table ADMIN_HAVE_GROUP add constraint FK_ADMIN_HAVE_GROUP2 foreign key (ID_ADMIN)
      references ADMIN (ID_ADMIN) on delete restrict on update restrict;

alter table ARTICLES add constraint FK_ARTICLES_HAVE_TAG foreign key (ID_TAG)
      references TAG (ID_TAG) on delete restrict on update restrict;

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