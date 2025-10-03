CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
INSERT INTO `posts` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES (1, 'Welcome to My Blog', 'This is the first post on my new Laravel blog. Stay tuned for updates!', '2025-01-01 10:00:00', '2025-01-01 10:00:00');
INSERT INTO `posts` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES (2, 'Learning Laravel Basics', 'Today I learned about routes, controllers, and Blade templates in Laravel.', '2025-01-05 14:30:00', '2025-01-05 14:30:00');
INSERT INTO `posts` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES (3, 'Database Migrations', 'Migrations in Laravel make it super easy to manage database schemas.', '2025-01-10 09:15:00', '2025-01-10 09:15:00');
INSERT INTO `posts` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES (4, 'Building My First CRUD App', 'Today I built a simple CRUD app using Laravel''s MVC structure.', '2025-01-15 17:45:00', '2025-01-15 17:45:00');
INSERT INTO `posts` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES (5, 'Adding Bootstrap UI', 'I styled my blog using Bootstrap and added dark/light mode toggle.', '2025-01-20 20:20:00', '2025-01-20 20:20:00');