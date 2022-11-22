-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2022 at 12:49 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `we`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `color` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'orange',
  `updated_at` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `historico_contacts`
--

CREATE TABLE `historico_contacts` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `data_envio` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` varchar(250) DEFAULT NULL,
  `created_at` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `historico_contacts`
--

INSERT INTO `historico_contacts` (`id`, `nome`, `email`, `descricao`, `data_envio`, `updated_at`, `created_at`) VALUES
(1, 'Liandra Teste Meirelles', 'meirellesliandra@gmail.com', 'lalis', '2022-11-01 03:00:00', '2022-11-01 01:22:14', '2022-11-01 01:22:14'),
(2, 'Liandra Teste Meirelles', 'meirellesliandra@gmail.com', 'lalis teste', '2022-11-01 03:00:00', '2022-11-01 12:53:13', '2022-11-01 12:53:13');

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(250) NOT NULL,
  `EMAIL` varchar(250) NOT NULL,
  `SENHA` varchar(250) NOT NULL,
  `created_at` varchar(250) NOT NULL,
  `updated_at` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`ID`, `NAME`, `EMAIL`, `SENHA`, `created_at`, `updated_at`) VALUES
(1, 'liandra', 'meirellesliandra@gmail.com', '61fbe41b9178d0b159a256c5c44baec5', '2022-11-22 01:01:34', '2022-11-22 01:01:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_08_30_010132_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produtos`
--

CREATE TABLE `produtos` (
  `ID` int(11) NOT NULL,
  `NOME_PRODUTO` varchar(250) NOT NULL,
  `DESCRICAO` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produtos`
--

INSERT INTO `produtos` (`ID`, `NOME_PRODUTO`, `DESCRICAO`) VALUES
(0, 'Produto 1', 'Além de criar o seu material publicitário, este pacote inclui a criação de relatórios com métricas úteis para a sua empresa! Assim, você poderá analisar e determinar suas estratégias de marketing com maior embasamento e segurança.'),
(1, 'Produto 2', 'Criamos o material publicitário ideal para o tipo de negócio do cliente.'),
(2, 'Produto 3', 'Criamos o material publicitário ideal para o tipo de negócio do cliente, e criamos relatórios com métricas úteis ao cliente, para que estes possam analisar e determinar suas estratégias de marketing com embasamento. '),
(3, 'Produto 4', 'Prestamos serviço de consultoria para o cliente, auxiliando-o em questões do marketing digital (criação de publicações, ferramentas de tratamento de imagem, fotografia, gerenciamento das redes sociais, entre outros).'),
(4, 'Produto 5', 'Palestra abordando os temas de fundamentos do marketing digital e gerenciamento das redes sociais'),
(6, 'Produto 6', 'Repensamos, e remodelamos a identidade de marca da empresa\r\ndo cliente (logomarca/logotipo, identidade visual, entre outros), a fim de satisfazer as necessidades do mesmo. Pagamento único, orçado especificamente para o serviço prestado.'),
(7, 'Produto 7', 'Nossa palestra abordando os temas fundamentais do marketing digital, gerenciamento das redes sociais, e as aplicações disso tudo na prática!');

-- --------------------------------------------------------

--
-- Table structure for table `produtos_fixos`
--

CREATE TABLE `produtos_fixos` (
  `ID` int(11) NOT NULL,
  `NOME_PRODUTO` varchar(250) NOT NULL,
  `DESCRICAO` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produtos_fixos`
--

INSERT INTO `produtos_fixos` (`ID`, `NOME_PRODUTO`, `DESCRICAO`) VALUES
(1, 'CLIENTE FIEL/CRIA PRA MIM PLUS', 'Além de criar o seu material publicitário, este pacote inclui a criação de relatórios com métricas úteis para a sua empresa! Assim, você poderá analisar e determinar suas estratégias de marketing com maior embasamento e segurança.'),
(2, 'CRIA PRA MIM', 'Criamos o material publicitário ideal para o tipo de negócio do cliente.'),
(3, 'CLIENTE FIEL', 'Criamos o material publicitário ideal para o tipo de negócio do cliente, e criamos relatórios com métricas úteis ao cliente, para que estes possam analisar e determinar suas estratégias de marketing com embasamento. '),
(4, 'ME ENSINA QUE EU FAÇO', 'Prestamos serviço de consultoria para o cliente, auxiliando-o em questões do marketing digital (criação de publicações, ferramentas de tratamento de imagem, fotografia, gerenciamento das redes sociais, entre outros).'),
(5, 'ME LEVA PRO DIGITAL', 'Palestra abordando os temas de fundamentos do marketing digital e gerenciamento das redes sociais'),
(6, 'MINHA IDENTIDADE', 'Repensamos, e remodelamos a identidade de marca da empresa\r\ndo cliente (logomarca/logotipo, identidade visual, entre outros), a fim de satisfazer as necessidades do mesmo. Pagamento único, orçado especificamente para o serviço prestado.'),
(7, 'ME LEVA PRO DIGITAL', 'Nossa palestra abordando os temas fundamentais do marketing digital, gerenciamento das redes sociais, e as aplicações disso tudo na prática!');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('LP9SyngwMrXvPu87UQHuWGVRdHsq8fpojTtnwq0D', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRjFERzAxdFE1ZUhIOUhSMTIzaEc5UHRYdEZBRm8xN0lQYUtGMVY5ZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1669080119);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Liandra', 'liameirelles.dev@gmail.com', NULL, '$2y$10$q.9j5ZKwQosG5iSUzCyc2OUznMI6C35EE9M.To9aBBZuod8bSjGWS', NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-01 03:56:52', '2022-09-01 03:56:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `historico_contacts`
--
ALTER TABLE `historico_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `historico_contacts`
--
ALTER TABLE `historico_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
