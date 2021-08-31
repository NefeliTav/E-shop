CREATE DATABASE `e-shop`;
USE `e-shop`;
CREATE TABLE `cart` (
  `userId` bigint(20) UNSIGNED NOT NULL,
  `id` bigint(20) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `messages` (
  `email` varchar(20) NOT NULL,
  `text` text NOT NULL,
  `newsletter` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `messages` (`email`, `text`, `newsletter`) VALUES
('example@gmail.com', 'I want to ask something about polaroid cameras.', 1);

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `addr` varchar(30) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `psw` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `tel`, `addr`, `postcode`, `psw`) VALUES
(1, 'Giorgos', 'Nikolaou', 'example@yahoo.gr', '6949123456', 'Peiraia', '12345', '$2y$10$7xMY2LxZgNfJeaZDBJgP4uv.elqLvWrOk8l1iZDJexTiEOf4J1FEi');

/*psw = 123456*/

CREATE TABLE `purchase` (
  `userId` bigint(20) UNSIGNED NOT NULL,
  `id` varchar(20) NOT NULL,
  `itemIndex` bigint(20) UNSIGNED NOT NULL,
  `orderIndex` int(11) NOT NULL,
  `First_Name` varchar(40) NOT NULL,
  `Last_Name` varchar(40) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `addr` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `brand` varchar(10) NOT NULL,
  `mp` float NOT NULL,
  `optical` float NOT NULL,
  `digital` float NOT NULL,
  `screen` float NOT NULL,
  `color` varchar(20) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `products` (`id`, `name`, `brand`, `mp`, `optical`, `digital`, `screen`, `color`, `price`, `image`) VALUES
('0', 'Canon Powershot SX530 HS', 'canon', 16, 50, 4, 3, 'black', 269, './images/camera.png'),
('1', 'Compact Nikon A1000', 'nikon', 16, 35, 4, 3, 'black', 299, './images/camera2.png'),
('2', 'Compact Nikon Coolpix W150', 'nikon', 14.17, 3, 6, 2.7, 'white', 139, './images/camera9.png'),
('3', 'Compact Nikon Coolpix W150', 'nikon', 14.17, 3, 6, 2.7, 'red', 139, './images/camera8.png'),
('4', 'Compact Nikon Coolpix W150', 'nikon', 14.17, 3, 6, 2.7, 'blue', 139, './images/camera5.png'),
('5', 'Compact Waterproof Leica X-U (Typ 113)', 'leica', 16.2, 0, 0, 3, 'black', 2725.5, './images/camera3.png'),
('6', 'Compact Camera Canon PowerShot G3X', 'canon', 20.2, 25, 0, 3, 'black', 749.5, './images/camera4.png'),
('7', 'Compact Nikon Coolpix A900', 'nikon', 20.3, 35, 4, 3, 'grey', 278.5, './images/camera7.png'),
('8', 'Compact Sony Cyber-shot DSC W800', 'sony', 20.1, 5, 10, 2.7, 'grey', 105, './images/camera6.png'),
('9', 'Compact Camera Canon PowerShot G5X', 'canon', 20.1, 5, 4, 3, 'black', 929, './images/camera18.png'),
('10', 'Compact Nikon Coolpix B600', 'nikon', 16, 60, 0, 3, 'black', 299, './images/camera10.png'),
('11', 'Compact Camera Canon PowerShot G7X II', 'canon', 20.1, 4.2, 0, 3, 'black', 574, './images/camera11.png'),
('12', 'Sony Cyber-shot DSC-RX100', 'sony', 20.2, 3.6, 0, 3, 'black', 349, './images/camera12.png'),
('13', 'Sony Cyber-shot DSC-HX60', 'sony', 20.4, 30, 120, 3, 'black', 279, './images/camera13.png'),
('14', 'Compact Sony DSC - HX80B', 'sony', 20.1, 30, 120, 3, 'black', 349, './images/camera14.png'),
('15', 'Compact Camera Canon PowerShot G7X II ', 'canon', 20.1, 4.2, 0, 3, 'black', 529, './images/camera15.png'),
('16', 'Panasonic Lumix Waterpoof DC-FT7EG', 'panasonic', 20.4, 4.6, 6.4, 3, 'red', 299.48, './images/camera16.png'),
('17', 'Nikon Coolpix P1000', 'nikon', 16, 125, 250, 3.2, 'black', 990, './images/camera17.png');

CREATE TABLE `wishlist` (
  `userId` bigint(20) UNSIGNED NOT NULL,
  `id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

