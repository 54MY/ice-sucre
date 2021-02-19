SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET GLOBAL time_zone = "-04:00";
SET time_zone = "America/La_Paz";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

/*Create Table Director*/
CREATE TABLE icesucre.Director (
  id int(11) NOT NULL,
  user varchar(20) NOT NULL,
  password varchar(250) NOT NULL
)
ENGINE=InnoDB 
DEFAULT CHARSET=utf8;


INSERT INTO icesucre.Director (id, user, password) VALUES
(1, 'icesucre', '7183f4d75354cc5a1437199128677fc4f4b36599');

/*Create Table Acampante*/
CREATE TABLE icesucre.Acampante (
	id INT auto_increment NOT NULL PRIMARY KEY,
	Correo varchar(100) NOT NULL,
	Nombres varchar(100) NOT NULL,
	Apellidos varchar(100) NOT NULL,
	Edad INT NOT NULL,
	Sexo varchar(10) NOT NULL,
	Codigo_Pais varchar(10) NOT NULL,
	Celular BIGINT NOT NULL,
	Pais varchar(100) NOT NULL,
	Ciudad varchar(100) NOT NULL,
	Color varchar(100),
	Numero_Cuarto INT,
	Taller varchar(100),
	Link_Zoom varchar(500),
	Usuario varchar(100) NOT NULL,
	Contrasena varchar(250) NOT NULL,
	Fecha_Registro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP

)
ENGINE=InnoDB 
DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
