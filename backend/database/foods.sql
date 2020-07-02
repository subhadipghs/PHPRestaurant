
-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- SET AUTOCOMMIT = 0;
-- START TRANSACTION;
-- SET time_zone = "+00:00";


-- CREATE TABLE `foods` (
--   `id` int(11) NOT NULL,
--   `name` varchar(250) NOT NULL,
--   `category` varchar(250) NOT NULL,
--   `price` int(10) NOT NULL,
--   `description` varchar(500) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- ALTER TABLE `foods` 
-- 	ADD PRIMARY KEY(`id`);

-- ALTER TABLE `foods`
--   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;



-- INSERT INTO `foods` (`id`, `name`, `category`, `price`, `description`) VALUES 
-- (1, 'Dosa', 'Indian', 150, `It's a south indian dish`);


INSERT INTO `foods` (`id`, `name`, `category`, `price`, `description`) VALUES 
(2, 'Momo', 'Chinese', 100, 'Momo is a delicious and most famous chinese dish');