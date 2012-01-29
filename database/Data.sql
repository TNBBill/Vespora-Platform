-- Inserting user permissions

INSERT INTO `VesporaPlatform`.`vespora_user_permission`
(`rolename`, `superadmin`,`admin`)
VALUES
('Guest',0,0),
('User',0,0),
('Admin',0,1);
