# --- Created by Ebean DDL
# To stop Ebean DDL generation, remove this comment and start using Evolutions

# --- !Ups

create table unit (
  id                        bigint not null,
  name                      varchar(255) not null,
  symbol                    varchar(255) not null,
  constraint uq_unit_name unique (name),
  constraint uq_unit_symbol unique (symbol),
  constraint pk_unit primary key (id))
;

create table user (
  id                        bigint not null,
  email                     varchar(255) not null,
  password                  varchar(255),
  name                      varchar(255),
  last_name                 varchar(255),
  justification             varchar(255),
  permission                integer,
  constraint ck_user_permission check (permission in (0,1,2,3)),
  constraint uq_user_email unique (email),
  constraint pk_user primary key (id))
;

create sequence unit_seq;

create sequence user_seq;




# --- !Downs

SET REFERENTIAL_INTEGRITY FALSE;

drop table if exists unit;

drop table if exists user;

SET REFERENTIAL_INTEGRITY TRUE;

drop sequence if exists unit_seq;

drop sequence if exists user_seq;

