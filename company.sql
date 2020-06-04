-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2020-06-04 05:00:12
-- 服务器版本： 10.1.37-MariaDB
-- PHP 版本： 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `company`
--

-- --------------------------------------------------------

--
-- 表的结构 `客户信息`
--

CREATE TABLE `客户信息` (
  `客户编号` int(7) UNSIGNED ZEROFILL NOT NULL,
  `姓名` varchar(100) NOT NULL,
  `类型` varchar(10) NOT NULL,
  `联系电话` varchar(100) NOT NULL,
  `地址` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `客户信息`
--

INSERT INTO `客户信息` (`客户编号`, `姓名`, `类型`, `联系电话`, `地址`) VALUES
(0000001, '成亦峻', 'VIP', '18811451297', '北京化工大学'),
(0000002, '胡澳', '非VIP', '13240205288', '湖北黄冈'),
(0000003, '丁泽正', '非VIP', '15124061868', '阿富汗');

-- --------------------------------------------------------

--
-- 表的结构 `库存信息`
--

CREATE TABLE `库存信息` (
  `存储编号` int(7) UNSIGNED ZEROFILL NOT NULL,
  `产品编号` int(3) UNSIGNED ZEROFILL NOT NULL,
  `仓库编号` int(2) UNSIGNED ZEROFILL NOT NULL,
  `单价` int(10) UNSIGNED NOT NULL,
  `生产日期` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `库存信息`
--

INSERT INTO `库存信息` (`存储编号`, `产品编号`, `仓库编号`, `单价`, `生产日期`) VALUES
(0000001, 001, 02, 500, '2020-01-01'),
(0000002, 002, 01, 600, '2019-12-31'),
(0000003, 003, 02, 1000, '2018-10-10'),
(0000004, 002, 02, 600, '2020-12-31');

-- --------------------------------------------------------

--
-- 表的结构 `订单信息`
--

CREATE TABLE `订单信息` (
  `订单编号` int(7) UNSIGNED ZEROFILL NOT NULL,
  `总金额` int(10) UNSIGNED NOT NULL,
  `订货日期` date NOT NULL,
  `到货日期` date NOT NULL,
  `客户编号` int(7) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `订单信息`
--

INSERT INTO `订单信息` (`订单编号`, `总金额`, `订货日期`, `到货日期`, `客户编号`) VALUES
(0000001, 1100, '2020-02-02', '2020-02-05', 0000001),
(0000002, 1600, '2020-02-03', '2020-02-09', 0000002),
(0000003, 1500, '2018-01-01', '2020-02-09', 0000003);

-- --------------------------------------------------------

--
-- 表的结构 `订单明细`
--

CREATE TABLE `订单明细` (
  `流水号` int(7) UNSIGNED ZEROFILL NOT NULL,
  `订单编号` int(7) UNSIGNED ZEROFILL NOT NULL,
  `产品编号` int(3) UNSIGNED ZEROFILL NOT NULL,
  `单价` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `订单明细`
--

INSERT INTO `订单明细` (`流水号`, `订单编号`, `产品编号`, `单价`) VALUES
(0000001, 0000001, 001, 500),
(0000002, 0000001, 002, 600),
(0000003, 0000002, 002, 600),
(0000004, 0000002, 003, 1000),
(0000005, 0000003, 001, 500),
(0000006, 0000003, 003, 1000);

-- --------------------------------------------------------

--
-- 表的结构 `销售单信息`
--

CREATE TABLE `销售单信息` (
  `销售单流水号` int(7) UNSIGNED ZEROFILL NOT NULL,
  `收银员工号` int(2) UNSIGNED ZEROFILL NOT NULL,
  `总金额` int(10) UNSIGNED NOT NULL,
  `客户编号` int(7) UNSIGNED ZEROFILL NOT NULL,
  `类型` varchar(10) NOT NULL,
  `实收金额` int(10) UNSIGNED NOT NULL,
  `销售日期` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `销售单信息`
--

INSERT INTO `销售单信息` (`销售单流水号`, `收银员工号`, `总金额`, `客户编号`, `类型`, `实收金额`, `销售日期`) VALUES
(0000001, 01, 1100, 0000001, 'VIP', 825, '2020-02-02'),
(0000002, 02, 1600, 0000002, '非VIP', 1600, '2020-01-01'),
(0000003, 01, 1500, 0000003, '非VIP', 1500, '2020-01-10');

-- --------------------------------------------------------

--
-- 表的结构 `销售明细`
--

CREATE TABLE `销售明细` (
  `销售单流水号` int(7) UNSIGNED ZEROFILL NOT NULL,
  `产品编号` int(3) UNSIGNED ZEROFILL NOT NULL,
  `单价` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `销售明细`
--

INSERT INTO `销售明细` (`销售单流水号`, `产品编号`, `单价`) VALUES
(0000001, 001, 500),
(0000001, 002, 600),
(0000002, 002, 600),
(0000002, 003, 1000),
(0000003, 001, 500),
(0000003, 003, 1000);

--
-- 转储表的索引
--

--
-- 表的索引 `客户信息`
--
ALTER TABLE `客户信息`
  ADD PRIMARY KEY (`客户编号`);

--
-- 表的索引 `库存信息`
--
ALTER TABLE `库存信息`
  ADD PRIMARY KEY (`存储编号`);

--
-- 表的索引 `订单信息`
--
ALTER TABLE `订单信息`
  ADD PRIMARY KEY (`订单编号`);

--
-- 表的索引 `订单明细`
--
ALTER TABLE `订单明细`
  ADD PRIMARY KEY (`流水号`);

--
-- 表的索引 `销售单信息`
--
ALTER TABLE `销售单信息`
  ADD PRIMARY KEY (`销售单流水号`);

--
-- 表的索引 `销售明细`
--
ALTER TABLE `销售明细`
  ADD PRIMARY KEY (`销售单流水号`,`产品编号`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
