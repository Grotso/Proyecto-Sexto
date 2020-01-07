
CREATE TABLE actuador (
                id_a INT IDENTITY NOT NULL,
                nombre VARCHAR(25) NOT NULL,
                estado BOOLEAN NOT NULL,
                CONSTRAINT actuador_pk PRIMARY KEY (id_a)
)

CREATE TABLE registro_actuador (
                id_ra INT NOT NULL,
                fecha DATETIME NOT NULL,
                valor DECIMAL(5,2) NOT NULL,
                n_paquetes_pasan INT NOT NULL,
                n_paquetes_no_pasan INT NOT NULL,
                id_a INT NOT NULL,
                CONSTRAINT registro_actuador_pk PRIMARY KEY (id_ra)
)

CREATE TABLE sensor (
                id_sensor INT IDENTITY NOT NULL,
                nombre VARCHAR(25) NOT NULL,
                valor REAL NOT NULL,
                CONSTRAINT sensor_pk PRIMARY KEY (id_sensor)
)

CREATE TABLE registro_sensor (
                id_rs INT NOT NULL,
                fecha DATETIME NOT NULL,
                valor DECIMAL(5,2) NOT NULL,
                id_sensor INT NOT NULL,
                CONSTRAINT registro_sensor_pk PRIMARY KEY (id_rs)
)

ALTER TABLE registro_actuador ADD CONSTRAINT sensor_registro_sensor_fk
FOREIGN KEY (id_a)
REFERENCES actuador (id_a)
ON DELETE NO ACTION
ON UPDATE NO ACTION

ALTER TABLE registro_sensor ADD CONSTRAINT sensor_registro_sensor_fk
FOREIGN KEY (id_sensor)
REFERENCES sensor (id_sensor)
ON DELETE NO ACTION
ON UPDATE NO ACTION
