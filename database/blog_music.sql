DROP DATABASE blogMusica;
CREATE DATABASE blogMusica;
USE blogMusica;

CREATE TABLE usuarios(
    id           int(255) AUTO_INCREMENT not null,
    nombre       varchar(100) not null,
    apellidos    varchar(100) not null,
    email        varchar(255) not null,
    password     varchar(255) not null,
    role         varchar(255) not null,
    fecha        date not null,
    CONSTRAINT pk_usuarios PRIMARY KEY (id),
    CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;

CREATE TABLE categorias(
    id      int AUTO_INCREMENT not null,
    nombre  varchar(100),
    CONSTRAINT pk_categorias PRIMARY KEY (id)
)ENGINE=InnoDb;

CREATE TABLE noticias(
    id              int(255) AUTO_INCREMENT not null,
    usuario_id      int(255) not null,
    categoria_id    int(255) not null,
    titulo          varchar(255) not null,  
    descripcion     MEDIUMTEXT,
    imagen          VARCHAR(255),
    fecha           date not null,
    CONSTRAINT pk_noticias PRIMARY KEY (id),
    CONSTRAINT fk_noticia_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id),
    CONSTRAINT fk_noticia_categoria FOREIGN KEY(categoria_id) REFERENCES categorias(id)
)ENGINE=InnoDb;