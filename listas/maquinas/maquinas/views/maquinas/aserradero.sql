create database aserradero
use aserradero

create table tipo_usuario(
id_tipo_usuario int not null AUTO_INCREMENT PRIMARY KEY,
nombre varchar(250),
descripcion varchar(500)
)

create table usuarios(
id_usuarios int not null AUTO_INCREMENT PRIMARY KEY,
nombre varchar(250),
apellido varchar(250),
correo varchar(250),
telefono numeric(9),
contrasena varchar(250),
id_tipo_usuario int,
foreign key(id_tipo_usuario) references tipo_usuario (id_tipo_usuario)
)

create table nave(
id_nave int not null AUTO_INCREMENT PRIMARY KEY,
nombre varchar(250),
descripcion varchar(500)
)
create table shipper(
id_shipper int not null AUTO_INCREMENT PRIMARY KEY,
nombre varchar(250),
descripcion varchar(500)
)
create table especificacion(
id_especificacion int not null AUTO_INCREMENT PRIMARY KEY,
nombre varchar(250),
descripcion varchar(500)
)

create table categorias(
id_categoria int not null AUTO_INCREMENT PRIMARY KEY,
nombre varchar(250),
descripcion varchar(500)
)

create table materiales(
id_material int not null AUTO_INCREMENT PRIMARY KEY,
nombre varchar(250),
largo decimal(19,2),
grueso decimal(19,2),
ancho decimal(19,2),
m_cuadrados decimal(19,2),
id_categoria int,
FOREIGN KEY (id_categoria) references categorias(id_categoria)
)


create table bodegas(
id_bodega int not null AUTO_INCREMENT PRIMARY KEY,
nombre varchar(250),
ubicacion varchar(250),
descripcion varchar(500)
)

create table packing_list(
id_packing_list int not null AUTO_INCREMENT PRIMARY KEY,
numero_factura varchar(250),
codigo_embarque varchar(250),
razon_social varchar(250),
mes varchar(250),
fecha date,
total_contenedores numeric(9),
contenedores_ingresados numeric(9),
paquetes numeric(9),
paquetes_fisicos numeric(9),
obervaciones varchar(250),
id_shipper int,
id_nave int,
id_especificacion int,
FOREIGN KEY (id_shipper) REFERENCES shipper(id_shipper),
FOREIGN KEY (id_nave) REFERENCES nave(id_nave),
FOREIGN KEY (id_especificacion) REFERENCES especificacion(id_especificacion)
)

create table contenedores(
id_contenedor int not null AUTO_INCREMENT PRIMARY KEY,
etiqueta varchar(250),
piezas numeric(9),
multiplo double(19,2),
m_cuadrados decimal(19,2),
tarimas numeric(9),
id_bodega int,
id_packing_list int,
FOREIGN KEY (id_packing_list) REFERENCES packing_list(id_packing_list),
FOREIGN KEY (id_bodega) REFERENCES bodegas(id_bodega)
)

create table maquinas(
id_maquina int not null AUTO_INCREMENT PRIMARY KEY,
nombre varchar(250),
descripcion varchar(250),
id_bodega int,
FOREIGN KEY (id_bodega) REFERENCES bodegas(id_bodega)
)

create table stock(
id_stock int not null AUTO_INCREMENT PRIMARY KEY,
cantidad numeric(19),
id_material int,
id_bodega int,
FOREIGN KEY (id_material) REFERENCES materiales(id_material),
FOREIGN KEY (id_bodega) REFERENCES bodegas(id_bodega)
)

create table estado(
id_estado int not null AUTO_INCREMENT PRIMARY KEY,
nombre varchar(250),
descripcion varchar(500)
)
create table tipo_solicitud(
id_tipo_solicitud int not null AUTO_INCREMENT PRIMARY KEY,
nombre varchar(250),
descripcion varchar(500)
)

create table presets(
id_preset int not null AUTO_INCREMENT PRIMARY KEY,
nombre varchar(250),
descripcion varchar(500)
)

create table detalle_preset(
id_detalle_preset int not null AUTO_INCREMENT PRIMARY KEY,
id_preset int,
id_material int,
cantidad numeric(9)
)

create table proceso(
id_proceso int not null AUTO_INCREMENT PRIMARY KEY,
material_entrada varchar(250),
cantidad_entrada numeric(9),
material_salida varchar(250),
cantidad_salida numeric(9),
productos_creados numeric(9),
rendimiento_esperado numeric(9),
id_contenedor int,
id_maquina int,
id_estado int,
id_tipo_solicitud int,
FOREIGN KEY (id_contenedor) REFERENCES contenedores(id_contenedor),
FOREIGN KEY (id_maquina) REFERENCES maquinas(id_maquina),
FOREIGN KEY (id_estado) REFERENCES estado(id_estado),
FOREIGN KEY (id_tipo_solicitud) REFERENCES tipo_solicitud(id_tipo_solicitud)
)



