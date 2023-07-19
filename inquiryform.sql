SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `givenName` varchar(20) NOT NULL,
  `firstNameKana` varchar(20) NOT NULL,
  `givenNameKana` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `birth` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `telNum` varchar(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `hashedPassword` varchar(20) NOT NULL,
  `zip` varchar(6) NOT NULL,
  `prefectur` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
