SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `list_id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `description` tinytext NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `checked` int(1) NOT NULL DEFAULT '0',
  `checked_time` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `list` (
  `id` int(11) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `token` varchar(60) NOT NULL,
  `list_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_list_id` (`list_id`);

ALTER TABLE `list`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `token`
  ADD PRIMARY KEY (`id`),
  ADD KEY `token_list_id` (`list_id`) USING BTREE;


ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`list_id`) REFERENCES `list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `token`
  ADD CONSTRAINT `token_ibfk_1` FOREIGN KEY (`list_id`) REFERENCES `list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
