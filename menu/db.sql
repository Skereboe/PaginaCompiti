SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

SET NAMES utf8mb4;

CREATE TABLE `utenti` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `ordini` (
  `id` int(11) NOT NULL,
  `piatto` varchar(100) NOT NULL,
  `bevanda` varchar(100) NOT NULL,
  `dessert` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `utenti` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2y$10$examplehashedpassword1', '2025-01-27 12:00:00'),
(2, 'testuser', '$2y$10$examplehashedpassword2', '2025-01-27 12:10:00');

INSERT INTO `ordini` (`id`, `piatto`, `bevanda`, `dessert`, `created_at`) VALUES
(1, 'Fërgesë', 'Raki', 'Bakllava', '2025-01-27 12:15:00'),
(2, 'Byrek', 'Vino Rosso', 'Trilece', '2025-01-27 12:20:00');

ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

ALTER TABLE `ordini`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `utenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `ordini`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

COMMIT;
