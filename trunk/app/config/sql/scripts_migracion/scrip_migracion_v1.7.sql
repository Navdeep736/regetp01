ALTER TABLE planes DROP COLUMN sector;
ALTER TABLE planes DROP COLUMN sector_id;
ALTER TABLE planes DROP COLUMN subsector_id;
ALTER TABLE instits DROP COLUMN depto;
ALTER TABLE instits DROP COLUMN localidad;
ALTER TABLE instits DROP COLUMN fecha_mod;
ALTER TABLE instits DROP COLUMN actualizacion;
ALTER TABLE planes DROP COLUMN old_item;
ALTER TABLE planes DROP COLUMN ciclo_mod;
DROP TABLE logs;