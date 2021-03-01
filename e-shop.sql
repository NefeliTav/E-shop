SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

DROP DATABASE `e-shop`;
CREATE DATABASE `e-shop`;


CREATE TABLE `messages` (
  `email` varchar(20) NOT NULL,
  `text` text NOT NULL,
  `newsletter` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `messages` (`email`, `text`, `newsletter`) VALUES
('example@gmail.com', 'I want to ask something about polaroid cameras.', 1);


CREATE TABLE `users` (
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `addr` varchar(30) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `psw` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`firstname`, `lastname`, `email`, `tel`, `addr`, `postcode`, `psw`) VALUES
('Nefeli', 'Tavoulari', 'example@yahoo.gr', '6942302343', 'Pavlou Mela 2', '12486', '123456');

ALTER TABLE `users`
  ADD PRIMARY KEY (`email`,`psw`);
COMMIT;



CREATE TABLE `products` (
  `id` varchar(10) NOT NULL,
  `name` varchar(40) NOT NULL,
  `brand` varchar(10) NOT NULL,
  `mp` int NOT NULL,
  `optical` int NOT NULL,
  `digital` int NOT NULL,
  `screen` int NOT NULL,
  `color` varchar(20) NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);
COMMIT;

INSERT INTO `products` (`id`,`name`, `brand`, `mp`, `optical`, `digital`, `screen`, `color`,`price`) VALUES
('0','Canon Powershot SX530 HS', 'Canon', '16', '50', '4', '3', 'black','269');

INSERT INTO `products` (`id`,`name`, `brand`, `mp`, `optical`, `digital`, `screen`, `color`,`price`) VALUES
('1','Compact Nikon A1000', 'Nikon', '16', '35', '4', '3', 'black','299');

INSERT INTO `products` (`id`,`name`, `brand`, `mp`, `optical`, `digital`, `screen`, `color`,`price`) VALUES
('2','Compact Nikon Coolpix W150', 'Nikon', '14.17', '3', '6', '2.7', 'white','139');

INSERT INTO `products` (`id`,`name`, `brand`, `mp`, `optical`, `digital`, `screen`, `color`,`price`) VALUES
('3','Compact Nikon Coolpix W150', 'Nikon', '14.17', '3', '6', '2.7', 'orange','139');

INSERT INTO `products` (`id`,`name`, `brand`, `mp`, `optical`, `digital`, `screen`, `color`,`price`) VALUES
('4','Compact Nikon Coolpix W150', 'Nikon', '14.17', '3', '6', '2.7', 'blue','139');

INSERT INTO `products` (`id`,`name`, `brand`, `mp`, `optical`, `digital`, `screen`, `color`,`price`) VALUES
('5','Compact Waterproof Leica X-U (Typ 113)', 'Leica', '16.2', '0', '0', '3', 'black','2725.5');

INSERT INTO `products` (`id`,`name`, `brand`, `mp`, `optical`, `digital`, `screen`, `color`,`price`) VALUES
('6','Compact Camera Canon PowerShot G3X', 'Canon', '20.2', '25', '0', '3', 'black','749.5');

INSERT INTO `products` (`id`,`name`, `brand`, `mp`, `optical`, `digital`, `screen`, `color`,`price`) VALUES
('7','Compact Nikon Coolpix A900', 'Nikon', '20.3', '35', '4', '3', 'grey','278.5');

INSERT INTO `products` (`id`,`name`, `brand`, `mp`, `optical`, `digital`, `screen`, `color`,`price`) VALUES
('8','Compact Sony Cyber-shot DSC W800', 'Sony', '20.1', '5', '10', '2.7', 'grey','105');

