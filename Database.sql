-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2023 at 03:38 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `fav_prod`
--

CREATE TABLE `fav_prod` (
  `img_src` varchar(255) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `view_details` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `alert_state` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fav_prod`
--

INSERT INTO `fav_prod` (`img_src`, `item_name`, `price`, `view_details`, `user_email`, `alert_state`) VALUES
('https://www.startech.com.bd/image/cache/catalog/laptop/lenovo/ideapad-1-15ada7/ideapad-1-15ada7-04-228x228.webp', 'Lenovo IdeaPad 1 15AMN7 AMD Ryzen 5 15.6', 60500.00, 'https://www.startech.com.bd/lenovo-ideapad-1-15amn7-amd-ryzen-5-laptop', 'asif.bhuiyan3330@gmail.com', 1),
('https://www.startech.com.bd/image/cache/catalog/laptop/lenovo/ideapad-3-15alc6/ideapad-3-15alc6-228x228.webp', 'Lenovo IdeaPad 3 15ALC6 AMD Ryzen 7 5700U 15.6', 78000.00, 'https://www.startech.com.bd/lenovo-ideapad-3-15alc6-ryzen-7-5700u-laptop', 'asif.bhuiyan3330@gmail.com', NULL),
('https://www.startech.com.bd/image/cache/catalog/laptop/toshiba/satellite-pro-c40-g-109/satellite-pro-c40-g-109-01-228x228.webp', 'Toshiba Dynabook Satellite Pro C40-G-13F Celeron 5205U 14', 31000.00, 'https://www.startech.com.bd/toshiba-dynabook-satellite-pro-c40-g-13f-laptop', 'asif.bhuiyan3330@gmail.com', NULL),
('https://www.startech.com.bd/image/cache/catalog/laptop/lenovo/ideapad-3-15alc6/ideapad-3-15alc6-228x228.webp', 'Lenovo IdeaPad 3 15ALC6 AMD Ryzen 7 5700U 15.6', 78000.00, 'https://www.startech.com.bd/lenovo-ideapad-3-15alc6-ryzen-7-5700u-laptop', 'shadman@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `naam` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `feedback` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`naam`, `email`, `feedback`) VALUES
('Asif', 'asif.bhuiyan3330@gmail.com', 'nice');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `img_src` varchar(1000) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `view_details` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`img_src`, `item_name`, `price`, `view_details`) VALUES
('https://www.startech.com.bd/image/cache/catalog/laptop/lenovo/ideapad-1-15ada7/ideapad-1-15ada7-04-228x228.webp', 'Lenovo IdeaPad 1 15AMN7 AMD Ryzen 5 15.6\" FHD Laptop with DDR5 RAM', 60500.00, 'https://www.startech.com.bd/lenovo-ideapad-1-15amn7-amd-ryzen-5-laptop'),
('https://www.startech.com.bd/image/cache/catalog/laptop/lenovo/ideapad-1-15ada7/ideapad-1-15ada7-04-228x228.webp', 'Lenovo IdeaPad 1 15AMN7 AMD Ryzen 5 512GB SSD 15.6\" FHD Laptop with DDR5 RAM', 65000.00, 'https://www.startech.com.bd/lenovo-ideapad-1-15amn7-amd-ryzen-5-laptop'),
('https://www.startech.com.bd/image/cache/catalog/laptop/lenovo/ideapad-3-15alc6/ideapad-3-15alc6-228x228.webp', 'Lenovo IdeaPad 3 15ALC6 AMD Ryzen 7 5700U 15.6\" FHD Laptop', 78000.00, 'https://www.startech.com.bd/lenovo-ideapad-3-15alc6-ryzen-7-5700u-laptop'),
('https://www.startech.com.bd/image/cache/catalog/laptop/lenovo/ideapad-3-15alc6/ideapad-3-15alc6-228x228.webp', 'Lenovo IdeaPad 3 15ALC6 AMD Ryzen 7 5700U 15.6\" FHD Laptop With WiFi 6', 78000.00, 'https://www.startech.com.bd/lenovo-ideapad-3-15alc6-ryzen-7-5700u-laptop'),
('https://www.startech.com.bd/image/cache/catalog/laptop/lenovo/ideapad-gaming-3/ideapad-gaming-3-001-228x228.jpg', 'Lenovo IdeaPad Gaming 3 15ACH6 Ryzen 5 5600H RTX 3050 4GB Graphics 15.6\" FHD Laptop', 70000.00, 'https://www.startech.com.bd/lenovo-ideapad-gaming-3-15ach6-ryzen-5-5600h-laptop'),
('https://www.startech.com.bd/image/cache/catalog/laptop/toshiba/satellite-pro-c40-g-109/satellite-pro-c40-g-109-01-228x228.webp', 'Toshiba Dynabook Satellite Pro C40-G-109 Celeron 5205U 14\" HD Laptop', 29600.00, 'https://www.startech.com.bd/toshiba-dynabook-satellite-pro-c40-g-13f-laptop'),
('https://www.startech.com.bd/image/cache/catalog/laptop/doel/freedom-a9/a9-01-228x228.webp', 'DOEL Freedom A9 AMD A9-9425 14.1\" HD Laptop', 26999.00, 'https://www.startech.com.bd/doel-freedom-a9-amd-a9-9425-laptop'),
('https://www.startech.com.bd/image/cache/catalog/laptop/toshiba/satellite-pro-c40-g-109/satellite-pro-c40-g-109-01-228x228.webp', 'Toshiba Dynabook Satellite Pro C40-G-13F Celeron 5205U 14\" HD Laptop', 31000.00, 'https://www.startech.com.bd/toshiba-dynabook-satellite-pro-c40-g-13f-laptop'),
('https://www.startech.com.bd/image/cache/catalog/laptop/acer/travelmate-tmb-311-31-c3cd/travelmate-tmb-311-31-c3cd-01-228x228.jpg', 'Acer TravelMate TMB 311-31-C3CD Celeron N4020 11.6\" HD Laptop', 34500.00, 'https://www.startech.com.bd/acer-travelmate-tmb-311-31-c3cd-celeron-n4020-aptop'),
('https://www.startech.com.bd/image/cache/catalog/laptop/acer/ideapad-slim-3i/ideapad-slim-3i-01-228x228.webp', 'Lenovo IdeaPad Slim 3i Intel Celeron N4020 15.6\" HD Laptop', 35500.00, 'https://www.startech.com.bd/lenovo-ideapad-slim-3i-intel-celeron-n4020-laptop'),
('https://www.startech.com.bd/image/cache/catalog/laptop/acer/ideapad-slim-3i/ideapad-slim-3i-01-228x228.webp', 'Lenovo IdeaPad Slim 3i Intel Celeron N4020 256GB SSD 15.6\" HD Laptop', 35500.00, 'https://www.startech.com.bd/lenovo-ideapad-slim-3i-intel-celeron-n4020-laptop'),
('https://www.startech.com.bd/image/cache/catalog/laptop/lenovo/d330/d330-1-228x228.jpg', 'Lenovo IdeaPad D330 10IGL Intel CDC N4020 10.1\" HD Touch Laptop', 35800.00, 'https://www.startech.com.bd/lenovo-ideapad-d330-cdc-n4020-laptop'),
('https://www.startech.com.bd/image/cache/catalog/laptop/lenovo/ideapad-slim-3i/ideapad-slim-3i-0010-228x228.jpg', 'Lenovo IdeaPad Slim 3i 15IGL Intel Celeron N4020 15.6\" HD Laptop', 36000.00, 'https://www.startech.com.bd/lenovo-ideapad-slim-3i-intel-celeron-n4020-laptop'),
('https://www.startech.com.bd/image/cache/catalog/laptop/acer/ideapad-slim-3i/ideapad-slim-3i-01-228x228.webp', 'Lenovo IdeaPad Slim 3i Intel Celeron N4020 15.6\" FHD Laptop', 36000.00, 'https://www.startech.com.bd/lenovo-ideapad-slim-3i-intel-celeron-n4020-laptop'),
('https://www.startech.com.bd/image/cache/catalog/laptop/asus/vivobook-e410ma/vivobook-e410ma-01-228x228.webp', 'Asus Vivobook E210MA Celeron N4020 11.6\" HD Laptop', 37000.00, 'https://www.startech.com.bd/asus-vivobook-e410ma-celeron-n4020-hd-laptop'),
('https://www.startech.com.bd/image/cache/catalog/laptop/asus/p1511cma/p1511cma-slate-grey-01-228x228.webp', 'Asus P1511CMA Intel Celeron N4020 15.6-Inch HD Laptop', 37500.00, 'https://www.startech.com.bd/asus-p1511cma-intel-celeron-n4020-hd-laptop'),
('https://www.startech.com.bd/image/cache/catalog/laptop/walton/prelude-n40-pro/prelude-n40-pro-01-228x228.webp', 'Walton Prelude N40 Pro Celeron N4020 14\" FHD Laptop', 39750.00, 'https://www.startech.com.bd/walton-prelude-n40-pro-celeron-n4020-laptop'),
('https://www.startech.com.bd/image/cache/catalog/laptop/asus/vivobook-15-x515ea/vivobook-15-x515ea-01-228x228.jpg', 'Asus Vivobook X515MA Celeron N4500 15.6\" HD Laptop', 40500.00, 'https://www.startech.com.bd/asus-vivobook-x515ma-celeron-n4500-laptop'),
('https://www.startech.com.bd/image/cache/catalog/laptop/asus/vivobook-15-x515ea/vivobook-15-x515ea-01-228x228.jpg', 'Asus Vivobook X515MA Celeron N4500 15.6\" HD Laptop', 40500.00, 'https://www.startech.com.bd/asus-vivobook-x515ma-celeron-n4500-laptop'),
('https://www.startech.com.bd/image/cache/catalog/laptop/walton/prelude-n40-pro/prelude-n40-pro-01-228x228.webp', 'Walton Prelude N40 Pro Celeron N4020 14\" FHD Laptop', 39750.00, 'https://www.startech.com.bd/walton-prelude-n40-pro-celeron-n4020-laptop'),
('https://www.startech.com.bd/image/cache/catalog/drones/dji/dji-mini-se/dji-mini-se-drone-combo-with-zhiyun-smooth-xs-gimbal-228x228.png', 'DJI Mini 2 SE Drone Combo With Free Zhiyun Smooth-XS Gimbal', 0.00, 'https://www.startech.com.bd/dji-mini-2-se-drone-combo-with-zhiyun-smooth-xs-gimbal'),
('https://www.startech.com.bd/image/cache/catalog/drones/dji/mini-3-4k/mini-3-4k-228x228.webp', 'DJI Mini 3 Drone Fly More Combo', 100000.00, 'https://www.startech.com.bd/dji-mini-3-4k-drone-fly-more-combo'),
('https://www.startech.com.bd/image/cache/catalog/drones/dji/mini-3/mini-3-fly-more-combo-01-228x228.webp', 'DJI Mini 3 Drone Fly More Combo with DJI RC Remote Controller', 115000.00, 'https://www.startech.com.bd/dji-mini-3-drone-fly-more-combo'),
('https://www.startech.com.bd/image/cache/catalog/gadget/drone/dji/dji-tello/tello-228x228.jpg', 'DJI Tello Quadcopter Drone with HD Camera', 29000.00, 'https://www.startech.com.bd/dji-tello-drone'),
('https://www.startech.com.bd/image/cache/catalog/gadget/drone/dji/air-2s/dji-air-2s-01-228x228.jpg', 'DJI Air 2S All-in-One Drone Quadcopter Combo', 180000.00, 'https://www.startech.com.bd/dji-air-2s-drone-quadcopter'),
('https://www.startech.com.bd/image/cache/catalog/drones/toy-drone/dj1/dj1-01-228x228.webp', 'DJ1 Dual Battery Folding Camera Toy Drone', 5500.00, 'https://www.startech.com.bd/dj1-dual-battery-folding-camera-toy-drone'),
('https://www.startech.com.bd/image/cache/catalog/drones/toy-drone/a9002/a9002-01-228x228.webp', 'A9002 4K HD Camera Toy Drone', 5500.00, 'https://www.startech.com.bd/a9002-camera-toy-drone'),
('https://www.startech.com.bd/image/cache/catalog/drones/toy-drone/s89/s89-05-228x228.webp', 'S89 Dual 4K Camera WiFi Toy Drone', 5500.00, 'https://www.startech.com.bd/s89-dual-4k-camera-wifi-toy-drone'),
('https://www.startech.com.bd/image/cache/catalog/drones/toy-drone/lsrc-ls-xt6/lsrc-ls-xt6-01-228x228.webp', 'LSRC LS-XT6 Pocket 4K Camera Toy Drone', 5500.00, 'https://www.startech.com.bd/lsrc-ls-xt6-pocket-4k-camera-toy-drone'),
('https://www.startech.com.bd/image/cache/catalog/drones/toy-drone/hj78-rc-4k-camera-small-toy-drone/hj78-05-228x228.webp', 'HJ78 RC 4K Camera Small Toy Drone', 5500.00, 'https://www.startech.com.bd/hj78-rc-4k-camera-small-toy-drone'),
('https://www.startech.com.bd/image/cache/catalog/drones/toy-drone/998-pro/998-pro-01-228x228.webp', '998 Pro Foldable Camera Toy Drone', 5700.00, 'https://www.startech.com.bd/998-pro-foldable-camera-toy-drone'),
('https://www.startech.com.bd/image/cache/catalog/drones/toy-drone/e88-pro/e88-pro-01-228x228.webp', 'E88 Pro Foldable Camera Toy Drone', 5700.00, 'https://www.startech.com.bd/e88-pro-foldable-camera-toy-drone'),
('https://www.startech.com.bd/image/cache/catalog/drones/toy-drone/f185-pro/f185-pro-01-228x228.webp', 'ZFR F185 Pro 4K Dual Camera Toy Drone', 5700.00, 'https://www.startech.com.bd/zfr-f185-pro-4k-dual-camera-toy-drone'),
('https://www.startech.com.bd/image/cache/catalog/drones/toy-drone/e68/e68-01-228x228.webp', 'E68 4K Camera Foldable RC Toy Drone', 5900.00, 'https://www.startech.com.bd/e68-4k-camera-foldable-toy-drone'),
('https://www.startech.com.bd/image/cache/catalog/drones/toy-drone/e99-k3-pro/e99-k3-pro-01-228x228.webp', 'E99 K3 Pro FPV 4K Dual Camera Toy Drone', 5900.00, 'https://www.startech.com.bd/e99-k3-pro-toy-drone'),
('https://www.startech.com.bd/image/cache/catalog/drones/toy-drone/s70-pro/s70-pro-228x228.webp', 'S70 Pro Duel 4K Camera Toy Drone', 6000.00, 'https://www.startech.com.bd/s70-pro-duel-4k-camera-toy-drone'),
('https://www.startech.com.bd/image/cache/catalog/drones/toy-drone/l703/l703-228x228.webp', 'L703 4K Camera Toy Drone', 6000.00, 'https://www.startech.com.bd/l703-4k-camera-toy-drone'),
('https://www.startech.com.bd/image/cache/catalog/drones/toy-drone/dm97/dm97-228x228.webp', 'DM97 WiFi FHD Toy Drone', 6000.00, 'https://www.startech.com.bd/dm97-wifi-fhd-toy-drone'),
('https://www.startech.com.bd/image/cache/catalog/drones/toy-drone/dm97/dm97-228x228.webp', 'AK03 4K Camera Toy Drone', 6000.00, 'https://www.startech.com.bd/ak03-4k-camera-toy-drone'),
('https://www.startech.com.bd/image/cache/catalog/drones/toy-drone/520s/520s1-228x228.webp', 'BB126 3-Side Obstacle Avoidance HD Dual Camera Toy Drone', 6000.00, 'https://www.startech.com.bd/bb126-hd-dual-camera-toy-drone'),
('https://www.startech.com.bd/image/cache/catalog/ssd/transcend/esd310c/esd310c-01-228x228.webp', 'Transcend ESD310C 256GB USB Type-C Portable SSD', 3700.00, 'https://www.startech.com.bd/transcend-esd310c-256gb-usb-type-c-portable-ssd'),
('https://www.startech.com.bd/image/cache/catalog/ssd/teutons/palladium/palladium-1-228x228.jpg', 'Teutons PALLADIUM 256GB Type-C M.2 Portable SSD', 3900.00, 'https://www.startech.com.bd/teutons-256gb-palladium-portable-ssd'),
('https://www.startech.com.bd/image/cache/catalog/ssd/transcend/esd270c/esd270c-01-228x228.jpg', 'Transcend ESD270C 500GB USB 3.1 Gen 2 Type-C External SSD', 4500.00, 'https://www.startech.com.bd/transcend-esd270c-500gb-usb-type-c-external-ssd'),
('https://www.startech.com.bd/image/cache/catalog/ssd/teutons/palladium/palladium-1-228x228.jpg', 'Teutons PALLADIUM 512GB Type-C M.2 Portable SSD', 4700.00, 'https://www.startech.com.bd/teutons-512gb-palladium-portable-ssd'),
('https://www.startech.com.bd/image/cache/catalog/ssd/transcend/esd260c/esd260c-03-228x228.webp', 'Transcend ESD260C 500GB Type-C Portable External SSD', 5200.00, 'https://www.startech.com.bd/transcend-esd260c-500gb-type-c-external-ssd'),
('https://www.startech.com.bd/image/cache/catalog/ssd/transcend/esd310c/esd310c-512gb-01-228x228.webp', 'Transcend ESD310C 512GB USB Type-C Portable SSD', 5200.00, 'https://www.startech.com.bd/transcend-esd310c-512gb-usb-type-c-portable-ssd'),
('https://www.startech.com.bd/image/cache/catalog/ssd/transcend/esd310s/esd310s-01-228x228.webp', 'Transcend ESD310S 512GB USB Type-C Portable SSD', 5200.00, 'https://www.startech.com.bd/transcend-esd310S-512gb-usb-type-c-portable-ssd'),
('https://www.startech.com.bd/image/cache/catalog/ssd/transcend/esd300c/esd300c-512gb-01-228x228.webp', 'Transcend ESD300C 512GB USB Type-C Portable SSD', 5200.00, 'https://www.startech.com.bd/transcend-esd300c-512gb-usb-type-c-portable-ssd'),
('https://www.startech.com.bd/image/cache/catalog/ssd/pny/pny-pro-elite/pny-pro-elite-001-228x228.jpg', 'PNY Pro Elite 250GB USB 3.1 Gen 2 Type-C Portable SSD', 6000.00, 'https://www.startech.com.bd/pny-pro-elite-250gb-portable-ssd'),
('https://www.startech.com.bd/image/cache/catalog/hdd/transcend/esd370c/Pp_ESD350C-1-228x228.jpg', 'Transcend ESD370C 500GB USB 3.1 Portable External SSD', 6599.00, 'https://www.startech.com.bd/transcend-esd370c-500gb-portable-hdd'),
('https://www.startech.com.bd/image/cache/catalog/ssd/transcend/esd270c/esd270c-01-228x228.jpg', 'Transcend ESD270C 1TB USB 3.1 Gen 2 Type-C External SSD Black', 6699.00, 'https://www.startech.com.bd/transcend-esd270c-1tb-external-ssd'),
('https://www.startech.com.bd/image/cache/catalog/ssd/transcend/esd260c/esd260c-03-228x228.webp', 'Transcend ESD260C 1TB Type-C Portable External SSD', 7500.00, 'https://www.startech.com.bd/transcend-esd260c-1tb-type-c-external-ssd'),
('https://www.startech.com.bd/image/cache/catalog/ssd/transcend/esd300c/esd300c-1tb-01-228x228.webp', 'Transcend ESD300C 1TB USB Type-C Portable SSD', 7599.00, 'https://www.startech.com.bd/transcend-esd300c-1tb-usb-type-c-portable-ssd'),
('https://www.startech.com.bd/image/cache/catalog/ssd/transcend/esd310s/esd310s-1tb-01-228x228.webp', 'Transcend ESD310S 1TB USB Type-C Portable SSD', 7900.00, 'https://www.startech.com.bd/transcend-esd310s-1tb-usb-type-c-portable-ssd'),
('https://www.startech.com.bd/image/cache/catalog/ssd/transcend/esd310c/esd310c-1tb-01-228x228.webp', 'Transcend ESD310C 1TB USB Type-C Portable SSD', 8000.00, 'https://www.startech.com.bd/transcend-esd310c-1tb-usb-type-c-portable-ssd'),
('https://www.startech.com.bd/image/cache/catalog/ssd/team/t-force-m200/t-force-m200-1-228x228.jpg', 'TEAM T-Force M200 250GB USB3.2 Type-C Portable SSD', 8200.00, 'https://www.startech.com.bd/team-t-force-m200-250gb-portable-ssd'),
('https://www.startech.com.bd/image/cache/catalog/ssd/team/pd1000/pd1000-01-228x228.webp', 'TEAM PD1000 1TB USB3.2 Type-C Portable SSD', 8899.00, 'https://www.startech.com.bd/team-pd1000-1tb-portable-ssd'),
('https://www.startech.com.bd/image/cache/catalog/hdd/transcend/esd370c/Pp_ESD350C-1-228x228.jpg', 'Transcend ESD370C 1TB Type-C Portable External SSD', 8950.00, 'https://www.startech.com.bd/transcend-esd370c-1tb-Portable-ssd'),
('https://www.startech.com.bd/image/cache/catalog/ssd/teutons/palladium/palladium-1-228x228.jpg', 'Teutons PALLADIUM 1TB Type-C M.2 Portable SSD', 8999.00, 'https://www.startech.com.bd/teutons-1tb-palladium-portable-ssd'),
('https://www.startech.com.bd/image/cache/catalog/ssd/transcend/esd380c/esd380c-01-228x228.jpg', 'Transcend ESD380C 1TB USB 3.2 Gen 2 Type-C Portable SSD', 9400.00, 'https://www.startech.com.bd/transcend-esd380c-1tb-type-c-portable-ssd'),
('https://www.startech.com.bd/image/cache/catalog/ip-camera/uniview/ipc2122lr3-pf40m-d/ipc2122lr3-pf40m-d-01-228x228.webp', 'Uniview IPC2122LR3-PF40M-D 2MP IR IP Bullet Camera', 3500.00, 'https://www.startech.com.bd/uniview-ipc2122lr3-pf40m-d-2mp-ip-camera'),
('https://www.startech.com.bd/image/cache/catalog/ip-camera/hikvision/ds-2cd1143g2-i/ds-2cd1143g2-i-02-228x228.webp', 'Hikvision DS-2CD1143G2-I 4MP IR Fixed Dome IP Camera', 6000.00, 'https://www.startech.com.bd/hikvision-ds-2cd1143g2-i-4mp-dome-ip-camera'),
('https://www.startech.com.bd/image/cache/catalog/ip-camera/hikvision/ds-2cd1043g2-i/ds-2cd1043g2-i-228x228.webp', 'Hikvision DS-2CD1043G2-I 4MP EXIR Fixed Mini Bullet IP Camera', 6200.00, 'https://www.startech.com.bd/hikvision-ds-2cd1043g2-i-4mp-mini-bullet-ip-camera'),
('https://www.startech.com.bd/image/cache/catalog/cc-camera/jovision/jvs-n815-ywc-r4-poe/jvs-n815-ywc-r4-poe-228x228.webp', 'Jovision JVS-N815-YWC-R4-POE 2.0MP Outdoor Camera', 3000.00, 'https://www.startech.com.bd/jovision-jvs-n815-ywc-r4-poe-2-0mp-outdoor-camera'),
('https://www.startech.com.bd/image/cache/catalog/ip-camera/hikvision/ds-2cd1323g0e-i/ds-2cd1323g0e-i-228x228.jpg', 'Hikvision DS-2CD1323G0E-I 2MP Basic IR Mini Dome IP-Camera', 3200.00, 'https://www.startech.com.bd/hikvision-ds-2cd1323g0e-i-2mp-ip-camera'),
('https://www.startech.com.bd/image/cache/catalog/ip-camera/jovision/jvs-n913-k1-pe/2jvs-n913-k1-pe-04-228x228.webp', 'Jovision JVS-N913-K1-PE 3MP Starlight Audio PoE IP Camera', 3250.00, 'https://www.startech.com.bd/jovision-jvs-n913-k1-pe-3mp-ip-camera'),
('https://www.startech.com.bd/image/cache/catalog/security-camera/dahua/ipc-hfw1230s1p/ipc-hfw1230s1p-1-228x228.jpeg', 'Dahua IPC-HFW1230S1P 2MP IR-30M Bullet Network Camera', 3300.00, 'https://www.startech.com.bd/dahua-ipc-hfw1230s1p-camera'),
('https://www.startech.com.bd/image/cache/catalog/security-camera/dahua/ipc-hdw1230t1p/ipc-hdw1230t1p-1-228x228.jpg', 'Dahua IPC-HDW1230T1P 2MP IR-30M IR Eyeball Camera', 3300.00, 'https://www.startech.com.bd/dahua-ipc-hdw1230t1p-ir-eyeball-camera'),
('https://www.startech.com.bd/image/cache/catalog/ip-camera/hikvision/kvision-ds-2cd1t23g0-i/kvision-ds-2cd1t23g0-i-228x228.jpg', 'Hikvision DS-2CD1T23G0-I 2MP Basic IR Bullet IP Camera', 3500.00, 'https://www.startech.com.bd/hikvision-kvision-ds-2cd1t23g0-i-2mp-ip-camera'),
('https://www.startech.com.bd/image/cache/catalog/ip-camera/hikvision/ds-2cd1t23g2-i/ds-2cd1t23g2-i-04-228x228.webp', 'Hikvision DS-2CD1T23G2-I 2MP Fixed Bullet Network Camera', 3500.00, 'https://www.startech.com.bd/hikvision-ds-2cd1t23g2-i-bullet-network-camera'),
('https://www.startech.com.bd/image/cache/catalog/ip-camera/armor/ar-b2pip3a/ar-b2pip3a-01-228x228.jpg', 'ARMOR AR-B2PIP3A 3MP IP Bullet Camera', 3550.00, 'https://www.startech.com.bd/armor-ar-b2pip3a-3mp-ip-bullet-camera'),
('https://www.startech.com.bd/image/cache/catalog/ip-camera/uniview/ipc2122lb-sf40-a/ipc2122lb-sf40-a-01-228x228.webp', 'Uniview IPC2122LB-SF40-A 2MP IR Mini IP Bullet Camera', 3800.00, 'https://www.startech.com.bd/uniview-ipc2122lb-sf40-a-2mp-ip-camera'),
('https://www.startech.com.bd/image/cache/catalog/ip-camera/armor/ar-b28qip4a/ar-b28qip4a-01-228x228.jpg', 'ARMOR AR-B28QIP4A 4MP IP Bullet Camera', 4000.00, 'https://www.startech.com.bd/armor-ar-b28qip4a-4mp-ip-bullet-camera'),
('https://www.startech.com.bd/image/cache/catalog/cc-camera/dahua/ipc-hdw1230t1-a/ipc-hdw1230t1-a-03-228x228.webp', 'Dahua IPC-HDW1230T1-A 2MP IR 30M Dome Network IP Camera', 4000.00, 'https://www.startech.com.bd/dahua-ipc-hdw1230t1-a-2mp-ir-dome-network-camera'),
('https://www.startech.com.bd/image/cache/catalog/ip-camera/dahua/dh-ipc-hfw1230s1-a/dh-ipc-hfw1230s1-a-228x228.webp', 'Dahua DH-IPC-HFW1230S1-A 2MP 30 Meter IR Bullet Network Camera', 4000.00, 'https://www.startech.com.bd/dahua-dh-ipc-hfw1230s1-a-bullet-network-camera'),
('https://www.startech.com.bd/image/cache/catalog/ip-camera/hikvision/ds-2cd1323g0-iuf/ds-2cd1323g0-iuf-01-228x228.webp', 'Hikvision DS-2CD1323G0-IUF 2MP Dome IP Audio Network Camara', 3850.00, 'https://www.startech.com.bd/hikvision-ds-2cd1323g0-iuf-dome-ip-camera'),
('https://www.startech.com.bd/image/cache/catalog/ip-camera/dahua/ipc-hdw1239t1p-led-2mp/ipc-hdw1239t1p-led-2mp-228x228.jpg', 'Dahua IPC-HDW1239T1P-LED 2MP Lite Full-color Fixed-focal Eyeball Network Camera', 3870.00, 'https://www.startech.com.bd/dahua-ipc-hdw1239t1p-led-2mp-camera'),
('https://www.startech.com.bd/image/cache/catalog/ip-camera/dahua/ipc-hdw1239t1p-led-2mp-bullet/ipc-hdw1239t1p-led-2mp-bullet-228x228.jpg', 'Dahua IPC-HFW1239S1P-LED 2MP Lite Full-color Fixed-focal Bullet Network Camera', 4200.00, 'https://www.startech.com.bd/dahua-ipc-hfw1239s1p-led-2mp-bullet-camera'),
('https://www.startech.com.bd/image/cache/catalog/ip-camera/dahua/ipc-hdw1230sp-2mp/ipc-hdw1230sp-2mp-228x228.jpg', 'Dahua DH-IPC-HDW1230S-S5 2MP IR Dome Network Camera', 4200.00, 'https://www.startech.com.bd/dahua-ipc-hdw1230sp-2mp-camera'),
('https://www.startech.com.bd/image/cache/catalog/ip-camera/dahua/ipc-hfw1230sp-2mp/ipc-hfw1230sp-2mp-228x228.jpg', 'Dahua DH-IPC-HFW1230S-S5 2MP IR Bullet Network Camera', 4200.00, 'https://www.startech.com.bd/dahua-ipc-hfw1230sp-2mp-camera');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `birth_date` date NOT NULL,
  `pw` varchar(255) NOT NULL,
  `reset_key` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`first_name`, `last_name`, `mobile_number`, `sex`, `email`, `birth_date`, `pw`, `reset_key`) VALUES
('Asif', 'Bhuiyan', '01632734014', 'male', 'asif.bhuiyan3330@gmail.com', '2001-01-24', '12345678', NULL),
('Shadman', 'Taqi', '01300000000', 'male', 'shadman@gmail.com', '2023-10-02', 'asdfghjkl', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
