create table students (
seq_no int PRIMARY KEY AUTO_INCREMENT,
roll_no varchar(31) unique not null,
full_name varchar(255) not null,
department varchar(63),
program varchar(31),
first_guide varchar(255),
second_guide varchar(255),
research_domain varchar(255),
project_title varchar(255),
date_of_joining date,
personal_email varchar(255),
tenure DOUBLE(8,2),
stipend DOUBLE(8,2),
profile_url varchar(255),
photo varchar(255)
);

alter table students add column active TINYINT default 1;
alter table students add column phone varchar(15) default null;
alter table students add column institute varchar(255) default null;
alter table students add column updated_at timestamp default null;
alter table students add column created_at timestamp default null;


create table interns (
seq_no int PRIMARY KEY AUTO_INCREMENT,
intern_no varchar(31) unique not null,
full_name varchar(255) not null,
institute varchar(255),
role varchar(63),
guide varchar(255),
work_area varchar(255),
phone varchar(15),
date_of_joining date,
personal_email varchar(255),
tenure DOUBLE(8,2),
stipend DOUBLE(8,2),
profile_url varchar(255),
photo varchar(255),
active TINYINT default 1
);
alter table interns add column updated_at timestamp default null;
alter table interns add column created_at timestamp default null;
ALTER TABLE interns add column department varchar(63) default null after institute;
ALTER TABLE interns add column qualification varchar(63) default null after department;



create table staffs (
seq_no int PRIMARY KEY AUTO_INCREMENT,
emp_id varchar(31) not null,
full_name varchar(255) not null,
designation varchar(255),
email varchar(127),
reporting varchar(255),
phone varchar(15),
date_of_joining date,
date_of_exit date,
qualification varchar(255),
tenure DOUBLE(8,2),
salary DOUBLE(8,2),
active TINYINT default 1,
updated_at timestamp,
created_at timestamp
);

alter table tihan.staffs add column type tinyint after active;

create table pdf (
seq_no int PRIMARY KEY AUTO_INCREMENT,
roll_no varchar(31) unique not null,
full_name varchar(255) not null,
department varchar(63),
program varchar(31),
first_guide varchar(255),
second_guide varchar(255),
research_domain varchar(255),
project_title varchar(255),
date_of_joining date,
personal_email varchar(255),
tenure DOUBLE(8,2),
fellowship DOUBLE(8,2),
profile_url varchar(255),
photo varchar(255)
);

alter table pdf add column active TINYINT default 1;
alter table pdf add column phone varchar(15) default null;
alter table pdf add column institute varchar(255) default null;
alter table pdf add column updated_at timestamp default null;
alter table pdf add column created_at timestamp default null;

create table forms (
seq_no int PRIMARY KEY AUTO_INCREMENT,
title varchar(255),
file varchar(255),
url varchar(255),
updated_at timestamp,
created_at timestamp
);

create table assets (
seq_no int PRIMARY KEY AUTO_INCREMENT,
asset_id varchar(31) not null,
name varchar(255) not null,
category_book varchar(255),
category_fin varchar(255),
identification varchar(255),
life tinyint,
user varchar(255),
order_date date,
supplier_name varchar(255),
voucher DOUBLE(8,2),
cost DOUBLE(8,2),
discount DOUBLE(8,2),
receive_date date,
remaining DOUBLE(8,2),
days DOUBLE(8,2),
rate_as_par DOUBLE(8,2),
updated_at timestamp,
created_at timestamp
);



alter table tihan.users drop column full_name, drop column contact_no, drop column institute, drop column department, drop column first_manager, drop column second_manager, drop column admin_rights;
alter table tihan.users add column user_type tinyint after password, 
add column social_id varchar(255) after user_type,
add column login_per tinyint default 0 after social_id,
add column leave_apply tinyint default 0 after login_per,
add column leave_managment tinyint default 0 after leave_apply,
add column website_data tinyint default 0 after leave_managment,
add column accounts tinyint default 0 after website_data,
add column assets tinyint default 0 after accounts,
add column attendance tinyint default 0 after assets;

alter table tihan.users add column hr tinyint default 0 after assets;

