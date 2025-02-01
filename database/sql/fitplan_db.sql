-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitplan_db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Ćwiczenia dla mężczyzn', 'Programy treningowe skoncentrowane na budowie siły i masy mięśniowej dla mężczyzn.', 'cwiczenia_dla_mezczyzn.jpg', '2024-11-30 11:12:48', '2024-11-30 11:12:48'),
(2, 'Ćwiczenia dla kobiet', 'Ćwiczenia mające na celu poprawę sylwetki, zwiększenie siły i wytrzymałości u kobiet.', 'cwiczenia_dla_kobiet.jpg', '2024-11-30 11:12:48', '2024-11-30 11:12:48'),
(3, 'Budowanie mięśni', 'Zestawy ćwiczeń ukierunkowanych na rozwój masy i siły mięśniowej.', 'budowanie_miesni.jpg', '2024-11-30 11:12:48', '2024-11-30 11:12:48'),
(4, 'Spalanie tłuszczu', 'Ćwiczenia cardio i siłowe pomagające w redukcji tkanki tłuszczowej.', 'spalanie_tluszczu.jpg', '2024-11-30 11:12:48', '2024-11-30 11:12:48'),
(5, 'Zwiększanie siły', 'Treningi ukierunkowane na rozwój siły i wytrzymałości mięśni.', 'zwiekszanie_sily.jpg', '2024-11-30 11:12:48', '2024-11-30 11:12:48'),
(6, 'Trening brzucha', 'Ćwiczenia skupiające się na wzmocnieniu i rzeźbie mięśni brzucha.', 'trening_brzucha.jpg', '2024-11-30 11:12:48', '2024-11-30 11:12:48'),
(7, 'Trening całego ciała', 'Kompleksowe zestawy ćwiczeń angażujące wszystkie grupy mięśniowe.', 'trening_calego_ciala.jpg', '2024-11-30 11:12:48', '2024-11-30 11:12:48'),
(8, 'Budowa masy ciała', 'Programy treningowe dla osób chcących zwiększyć masę ciała.', 'budowa_masy_ciala.jpg', '2024-11-30 11:12:48', '2024-11-30 11:12:48'),
(9, 'Początkujący', 'Proste i efektywne ćwiczenia dla osób rozpoczynających swoją przygodę z treningiem.', 'poczatkujacy.jpg', '2024-11-30 11:12:48', '2024-11-30 11:12:48'),
(10, 'Ćwiczenia w domu', 'Treningi dostosowane do warunków domowych, niewymagające specjalistycznego sprzętu.', 'cwiczenia_w_domu.jpg', '2024-11-30 11:12:48', '2024-11-30 11:12:48'),
(11, 'Cardio', 'Ćwiczenia poprawiające wydolność serca i płuc, idealne do spalania kalorii.', 'cardio.jpg', '2024-11-30 11:12:48', '2024-11-30 11:12:48'),
(12, 'Ćwiczenia klatki piersiowej', 'Treningi koncentrujące się na wzmocnieniu mięśni klatki piersiowej.', 'cwiczenia_klatki_piersiowej.jpg', '2024-11-30 11:12:48', '2024-11-30 11:12:48'),
(13, 'Trening pleców', 'Ćwiczenia wspierające rozwój i wzmocnienie mięśni pleców.', 'trening_plecow.jpg', '2024-11-30 11:12:48', '2024-11-30 11:12:48'),
(14, 'Ćwiczenia na biceps', 'Skuteczne treningi na rozwój i rzeźbę mięśni bicepsów.', 'cwiczenia_na_biceps.jpg', '2024-11-30 11:12:48', '2024-11-30 11:12:48'),
(15, 'Ćwiczenia ramion', 'Zestawy ćwiczeń poprawiające siłę i wygląd ramion.', 'cwiczenia_ramion.jpg', '2024-11-30 11:12:48', '2024-11-30 11:12:48'),
(16, 'Trening nóg', 'Programy treningowe wzmacniające i rzeźbiące mięśnie nóg.', 'trening_nog.jpg', '2024-11-30 11:12:48', '2024-11-30 11:12:48'),
(17, 'Ćwiczenia na triceps', 'Ćwiczenia ukierunkowane na wzmocnienie i rozwój mięśni tricepsów.', 'cwiczenia_na_triceps.jpg', '2024-11-30 11:12:48', '2024-11-30 11:12:48'),
(18, 'Trening pośladków', 'Ćwiczenia pomagające w ujędrnieniu i wzmocnieniu mięśni pośladkowych.', 'trening_posladkow.jpg', '2024-11-30 11:12:48', '2024-11-30 11:12:48');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `exercise`
--

CREATE TABLE `exercise` (
  `id_exercise` int(11) NOT NULL,
  `name_exercise` varchar(255) NOT NULL,
  `video_of_exercise` varchar(255) DEFAULT NULL,
  `exercise_type` varchar(255) NOT NULL,
  `equipment_required` varchar(255) DEFAULT NULL,
  `mechanics` varchar(255) DEFAULT NULL,
  `force_type` varchar(255) DEFAULT NULL,
  `experience_level` varchar(255) DEFAULT NULL,
  `secondary_muscles` varchar(255) DEFAULT NULL,
  `id_exercises_by_muscle_group` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exercise`
--

INSERT INTO `exercise` (`id_exercise`, `name_exercise`, `video_of_exercise`, `exercise_type`, `equipment_required`, `mechanics`, `force_type`, `experience_level`, `secondary_muscles`, `id_exercises_by_muscle_group`, `created_at`, `updated_at`) VALUES
(1, 'Maszyna do odwodzenia biodra', 'https://youtu.be/7pbZA7ncuq8', 'Siłowe', 'Maszyna', 'Izolacja', 'Pchający (Bilateralny)', 'Początkujący', 'Mięśnie brzucha, Pośladki, Mięśnie dwugłowe uda', 1, '2024-12-07 19:11:00', '2024-12-07 19:11:22'),
(2, 'Uprowadzenie biodra kablem', 'https://www.youtube.com/watch?v=saVSMtIttZE', 'Siłowe', 'Kabel', 'Izolacja', 'Brak', 'Początkujący', 'Pośladki', 1, '2024-12-07 19:11:00', '2024-12-07 19:11:34'),
(5, 'Unoszenie nóg w leżeniu', 'https://youtu.be/r24ntO4IvKc', 'Siłowe', 'Masa ciała', 'Izolacja', 'Ściąganie (Oburącz)', 'Początkujący', NULL, 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(6, 'Cable Crunch', 'https://www.youtube.com/watch?v=6GMKPQVERzw', 'Siłowe', 'Kabel', 'Izolacja', 'Ściąganie', 'Początkujący', NULL, 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(7, 'Crunch z obciążeniem', 'https://youtu.be/6kHg3JAFNFo', 'Siłowe', 'Inny', 'Izolacja', 'Ściąganie', 'Średniozaawansowany', NULL, 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(8, 'Plank', 'https://www.youtube.com/watch?v=EPiXN2bkLoQ', 'Siłowe', 'Masa ciała', 'Izolacja', 'Statyczne', 'Początkujący', 'Dolne plecy', 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(9, 'Dumbbell Side Bends', 'https://www.youtube.com/watch?v=BDXhn8ta3Vo', 'Siłowe', 'Hantle', 'Izolacja', 'Ściąganie', 'Początkujący', NULL, 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(10, 'Hanging Leg Raise', 'https://www.youtube.com/watch?v=ttdkm6ESUjI', 'Siłowe', 'Masa ciała', 'Izolacja', 'Ściąganie', 'Zaawansowany', 'Przedramiona', 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(11, 'Abdominal Barbell Rollouts', 'https://www.youtube.com/watch?v=3C1TRMJveXo', 'Siłowe', 'Sztanga', 'Złożone', NULL, 'Średniozaawansowany', 'Barki', 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(12, 'Sit Up', 'https://youtu.be/MQDopvLZOS8', 'Siłowe', 'Masa ciała', 'Izolacja', 'Ściąganie (Oburącz)', 'Początkujący', NULL, 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(13, 'Side Plank', 'https://www.youtube.com/watch?v=_R389Jk0tIo', 'Siłowe', 'Masa ciała', 'Izolacja', 'Statyczne', 'Początkujący', 'Dolne plecy', 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(14, 'Decline Sit Up', 'https://www.youtube.com/watch?v=N7hf1_vcX5w', 'Siłowe', 'Masa ciała', 'Izolacja', 'Ściąganie', 'Początkujący', NULL, 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(15, 'Crunch', 'https://youtu.be/Plh1CyiPE_Y', 'Siłowe', 'Masa ciała', 'Izolacja', 'Ściąganie (Oburącz)', 'Początkujący', NULL, 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(16, 'Abdominal Air Bike', 'https://youtu.be/vV_sKNCpiVM', 'Siłowe', 'Masa ciała', 'Złożone', 'Ściąganie (Oburącz)', 'Początkujący', NULL, 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(17, 'Floor Crunch', 'https://www.youtube.com/watch?v=QAftiGYGPrA', 'Siłowe', 'Masa ciała', 'Izolacja', 'Ściąganie', 'Początkujący', NULL, 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(18, 'Russian Twist', 'https://www.youtube.com/watch?v=Tau0hsW8iR0', 'Siłowe', 'Masa ciała', 'Izolacja', 'Ściąganie', 'Początkujący', NULL, 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(19, 'Exercise Ball Crunch', 'https://www.youtube.com/watch?v=O4d3kd1ZLyc', 'Siłowe', 'Piłka do ćwiczeń', 'Izolacja', 'Ściąganie', 'Średniozaawansowany', NULL, 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(20, 'Seated Barbell Twist', 'https://www.youtube.com/watch?v=dDqOeyGRHXE', 'Siłowe', 'Sztanga', 'Izolacja', NULL, 'Początkujący', NULL, 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(21, 'Rotating Mountain Climber', 'https://youtu.be/5ZL0gFRjCTw', 'Siłowe', 'Masa ciała', 'Złożone', 'Izometryczne', 'Średniozaawansowany', NULL, 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(22, 'Hanging Knee Raise', 'https://www.youtube.com/watch?v=RD_A-Z15ER4', 'Siłowe', 'Masa ciała', 'Złożone', 'Ściąganie', 'Średniozaawansowany', 'Przedramiona', 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(23, 'Twisting Hanging Knee Raise', 'https://www.youtube.com/watch?v=fyXp_lfqBQU', 'Siłowe', 'Masa ciała', 'Złożone', 'Ściąganie', 'Średniozaawansowany', 'Przedramiona', 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(24, 'Pallof Press', 'https://youtu.be/SFJprbDnaS0', 'Siłowe', 'Kabel', 'Złożone', 'Izometryczne', 'Początkujący', NULL, 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(25, 'Lying Floor Knee Tuck', 'https://youtu.be/V95h0UX8UyI', 'Siłowe', 'Masa ciała', 'Złożone', 'Ściąganie (Oburącz)', 'Początkujący', NULL, 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(26, 'Chair Leg Raise', 'https://www.youtube.com/watch?v=9FeC5SAB_3g', 'Siłowe', 'Masa ciała', 'Izolacja', NULL, 'Średniozaawansowany', NULL, 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(27, 'Alternate Straight Leg Lower', 'https://youtu.be/eiF6KbbXfb8', 'Siłowe', 'Masa ciała', 'Złożone', 'Izometryczne', 'Początkujący', NULL, 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(28, 'Standing Stomach Vacuum', 'https://youtu.be/ODOHve6b8q8', 'Siłowe', 'Masa ciała', 'Izolacja', 'Ściąganie (Oburącz)', 'Średniozaawansowany', NULL, 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(29, 'Dead Bug', 'https://youtu.be/eEhoSeBFoBk', 'Siłowe', 'Masa ciała', 'Złożone', 'Izometryczne', 'Średniozaawansowany', NULL, 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(30, 'Plank to Hip Raise', 'https://youtu.be/9Wd3xH6-QYw', 'Siłowe', 'Masa ciała', 'Złożone', 'Izometryczne', 'Początkujący', NULL, 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(31, 'Abdominal Hip Thrust', 'https://www.youtube.com/watch?v=6FBgflFsRTk', 'Siłowe', 'Masa ciała', 'Izolacja', NULL, 'Początkujący', NULL, 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(32, 'Turkish Get Up', 'https://youtu.be/kYxmLkgnfD8', 'Siłowe', 'Kettlebells', 'Złożone', 'Wypychanie (Oburącz)', 'Początkujący', 'Przywodziciele, Pośladki, Mięśnie dwugłowe uda, Mięśnie czworogłowe, Barki, Górne plecy', 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(33, 'Lying Leg Raise With Hip Thrust', 'https://www.youtube.com/watch?v=q0JVBRHoLz4', 'Siłowe', 'Masa ciała', 'Złożone', NULL, 'Początkujący', NULL, 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(34, 'Bench Jack Knife', 'https://www.youtube.com/watch?v=CcQDWUuoNro', 'Siłowe', 'Masa ciała', 'Złożone', NULL, 'Początkujący', NULL, 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(35, 'Straight Leg Toe Touch', 'https://youtu.be/yjfLpiFyGxs', 'Siłowe', 'Masa ciała', 'Izolacja', 'Ściąganie (Oburącz)', 'Początkujący', NULL, 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(36, 'Lying Bench Leg Raise', 'https://www.youtube.com/watch?v=jX5QJj5vCjA', 'Siłowe', 'Masa ciała', 'Izolacja', NULL, 'Początkujący', NULL, 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(37, 'Kettlebell Dead Bug', 'https://youtu.be/y1XKOoWCSlo', 'Siłowe', 'Kettlebells', 'Złożone', 'Izometryczne', 'Średniozaawansowany', NULL, 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(38, 'Decline Abdominal Reach', 'https://www.youtube.com/watch?v=AmtNub5k5hs', 'Siłowe', 'Masa ciała', 'Złożone', NULL, 'Początkujący', NULL, 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(39, 'Standing Oblique Cable Crunch', 'https://www.youtube.com/watch?v=XS7O7cXptOg', 'Siłowe', 'Kabel', 'Izolacja', 'Ściąganie', 'Początkujący', NULL, 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(40, 'Half Kneeling Pallof Press', 'https://youtu.be/aGceOEesl2M', 'Siłowe', 'Kabel', 'Złożone', 'Izometryczne', 'Początkujący', NULL, 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(41, 'Dragon Flag', 'https://youtu.be/kaUqM0JSlGU', 'Siłowe', 'Masa ciała', 'Złożone', 'Izometryczne', 'Zaawansowany', NULL, 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(42, 'Hollow Body Hold', 'https://youtu.be/lmkw48_CGm0', 'Siłowe', 'Masa ciała', 'Złożone', 'Izometryczne', 'Średniozaawansowany', NULL, 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(43, 'Twisting Bench Crunch', 'https://www.youtube.com/watch?v=IZ_qoY6nFAE', 'Siłowe', 'Masa ciała', 'Izolacja', 'Ściąganie', 'Początkujący', NULL, 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(44, 'Reverse Crunch to Dead Bug', 'https://youtu.be/Em7c9k765iA', 'Siłowe', 'Kettlebells', 'Złożone', 'Izometryczne', 'Średniozaawansowany', NULL, 2, '2024-12-07 19:55:59', '2024-12-07 19:55:59'),
(45, 'Hip Adduction Machine', 'https://www.youtube.com/watch?v=Oj7IN952fSg', 'Wytrzymałość', 'Maszyna', 'Izolacja', 'Pchający (dwustronny)', 'Początkujący', 'Pośladki, ścięgna podkolanowe', 3, '2025-01-31 16:31:37', '2025-01-31 16:31:37'),
(46, 'Alternating Lateral Lunge with Overhead Reach', 'https://www.youtube.com/watch?v=cGQ3H4sZbSM', 'Rozgrzewka', 'Masa ciała', 'Mieszanina', 'Rozciąganie dynamiczne', 'Początkujący', 'Łydki, ścięgna podkolanowe, ramiona, górna część pleców', 3, '2025-01-31 16:34:00', '2025-01-31 16:34:00'),
(47, 'Deep Squat Prying', 'https://www.youtube.com/watch?v=GWhI41W8xnk&t=1s', 'Rozgrzewka', 'Kettlebells', 'Mieszanina', 'Rozciąganie dynamiczne', 'Początkujący', 'Pośladki, ścięgna podkolanowe, zginacze bioder, czworogłowe', 3, '2025-01-31 16:35:16', '2025-01-31 16:35:16'),
(48, 'Rocking Frog Stretch', 'https://www.youtube.com/watch?v=ABcuTyDyRhU', 'Rozgrzewka', 'Masa ciała', 'Mieszanina', 'Rozciąganie dynamiczne', 'Początkujący', 'Ramiona, górna część pleców', 3, '2025-01-31 16:37:00', '2025-01-31 16:37:00'),
(49, 'Lateral Kneeling Adductor Mobilization', 'https://www.youtube.com/watch?v=NsZRuAHF7sI&embeds_referring_euri=https%3A%2F%2Fwww.muscleandstrength.com%2F&source_ve_path=MjM4NTE', 'Rozgrzewka', 'Masa ciała', 'Mieszanina', 'Rozciąganie dynamiczne', 'Początkujący', 'Łydki', 3, '2025-01-31 16:38:14', '2025-01-31 16:38:14'),
(50, 'Cable Hip Adduction', 'https://www.youtube.com/watch?v=EHq78mQYLbI', 'Wytrzymałość', 'Kabel', 'Izolacja', NULL, 'Początkujący', 'Pośladki, ścięgna podkolanowe', 3, '2025-01-31 16:40:02', '2025-01-31 16:40:02'),
(51, 'Adductor Foam Rolling', 'https://www.youtube.com/watch?v=kk42b6pg3hY', 'SMR', 'Wałek piankowy', 'Izolacja', 'Kompresja', 'Początkujący', NULL, 3, '2025-01-31 16:41:24', '2025-01-31 16:41:24'),
(52, 'Standing Hammer Curl', 'https://www.youtube.com/watch?v=XOQ-c50kYGU', 'Wytrzymałość', 'Hantle', 'Izolacja', 'Ciągnąć', 'Początkujący', 'Przedramiona', 4, '2025-01-31 16:44:46', '2025-01-31 16:44:46'),
(53, 'Standing Dumbbell Curl', 'https://www.youtube.com/watch?v=HnHuhf4hEWY', 'Wytrzymałość', 'Hantle', 'Izolacja', 'Ciągnąć', 'Początkujący', NULL, 4, '2025-01-31 16:50:34', '2025-01-31 16:50:34'),
(54, 'Incline Dumbbell Curl', 'https://www.youtube.com/watch?v=UeleXjsE-98', 'Wytrzymałość', 'Hantle', 'Izolacja', 'Podciągnięcie (dwustronne)', 'Początkujący', 'Przedramiona', 4, '2025-01-31 16:52:23', '2025-01-31 16:52:23'),
(55, 'Standing Barbell Curl', 'https://www.youtube.com/watch?v=bAjQwjDHbLc', 'Wytrzymałość', 'Sztanga', 'Izolacja', 'Ciągnąć', 'Początkujący', NULL, 4, '2025-01-31 16:55:15', '2025-01-31 16:55:15'),
(56, 'Cross Body Hammer Curl (Pinwheel Curls)', 'https://www.youtube.com/watch?v=On2eca-C00E', 'Wytrzymałość', 'Hantle', 'Izolacja', 'Ciągnąć', 'Początkujący', 'Przedramiona', 4, '2025-01-31 16:56:38', '2025-01-31 16:56:38'),
(57, 'Zottman Curl', 'https://www.youtube.com/watch?v=rVEwDJdHE2c', 'Wytrzymałość', 'Hantle', 'Izolacja', 'Pociągnięcie (dwustronne)', 'Średniozaawansowany', 'Przedramiona', 4, '2025-01-31 16:58:12', '2025-01-31 17:19:53'),
(58, 'Cable Curl', 'https://www.youtube.com/watch?v=qX-wGw-eHP0', 'Wytrzymałość', 'Kabel', 'Izolacja', 'Ciągnąć', 'Początkujący', NULL, 4, '2025-01-31 17:01:26', '2025-01-31 17:01:26'),
(59, 'Concentration Curl', 'https://www.youtube.com/watch?v=qX-wGw-eHP0', 'Wytrzymałość', 'Hantle', 'Izolacja', 'Pociągnięcie (jednostronne)', 'Początkujący', 'Przedramiona', 4, '2025-01-31 17:02:23', '2025-01-31 17:02:23'),
(60, 'EZ Bar Preacher Curl', 'https://www.youtube.com/watch?v=hWkz7emm7Tc', 'Wytrzymałość', 'Sztanga', 'Izolacja', 'Ciągnąć', 'Początkujący', NULL, 4, '2025-01-31 17:03:34', '2025-01-31 17:03:34'),
(61, 'Cable Curl (Rope Extension)', 'https://www.youtube.com/watch?v=3UQOGme0i7Y', 'Wytrzymałość', 'Kabel', 'Izolacja', 'Ciągnąć', 'Początkujący', 'Przedramiona', 4, '2025-01-31 17:05:13', '2025-01-31 17:05:13'),
(62, 'Barbell Preacher Curl', 'https://www.youtube.com/watch?v=cb6H9ATIbso', 'Wytrzymałość', 'Sztanga', 'Izolacja', 'Ciągnąć', 'Początkujący', NULL, 4, '2025-01-31 17:06:36', '2025-01-31 17:06:36'),
(63, 'EZ Bar Curl', 'https://www.youtube.com/watch?v=-gSM-kqNlUw', 'Wytrzymałość', 'Sztanga', 'Izolacja', 'Ciągnąć', 'Początkujący', NULL, 4, '2025-01-31 17:07:26', '2025-01-31 17:07:26'),
(64, 'Spider Curl', 'https://www.youtube.com/watch?v=ke2shAeQ0O8', 'Wytrzymałość', 'Sztanga', 'Izolacja', 'Ciągnąć', 'Początkujący', NULL, 4, '2025-01-31 17:08:47', '2025-01-31 17:08:47'),
(65, 'Alternating Standing Dumbbell Curl', 'https://www.youtube.com/watch?v=iixND1P2lik', 'Wytrzymałość', 'Hantle', 'Izolacja', 'Ciągnąć', 'Początkujący', 'Przedramiona', 4, '2025-01-31 17:09:55', '2025-01-31 17:09:55'),
(66, 'Alternating Seated Dumbbell Curl', 'https://www.youtube.com/watch?v=g_FIfe2_GUo', 'Wytrzymałość', 'Hantle', 'Izolacja', 'Ciągnąć', 'Początkujący', NULL, 4, '2025-01-31 17:10:51', '2025-01-31 17:10:51'),
(67, 'Standing Dumbbell Reverse Curl', 'https://www.youtube.com/watch?v=i5h3myNHVFk', 'Wytrzymałość', 'Hantle', 'Izolacja', 'Pociągnięcie (dwustronne)', 'Początkujący', 'Przedramiona', 4, '2025-01-31 17:11:40', '2025-01-31 17:11:40'),
(68, 'Machine Bicep Curl', 'https://www.youtube.com/watch?v=rwo-3PTM8U4', 'Wytrzymałość', 'Maszyna', 'Izolacja', 'Ciągnąć', 'Początkujący', NULL, 4, '2025-01-31 17:14:20', '2025-01-31 17:14:20'),
(69, 'Seated Dumbbell Curl', 'https://www.youtube.com/watch?v=BsULGO70tcU', 'Wytrzymałość', 'Maszyna', 'Izolacja', 'Ciągnąć', 'Początkujący', NULL, 4, '2025-01-31 17:16:57', '2025-01-31 17:16:57'),
(70, 'Dumbbell Hammer Preacher Curl', 'https://www.youtube.com/watch?v=ZdcFOgFi1Dg', 'Wytrzymałość', 'Hantle', 'Izolacja', 'Ciągnąć', 'Początkujący', 'Przedramiona', 4, '2025-01-31 17:18:02', '2025-01-31 17:18:02'),
(71, 'Standing High Pulley Cable Curl', 'https://www.youtube.com/watch?v=XuVMvliWUT8', 'Wytrzymałość', 'Kabel', 'Izolacja', 'Ciągnąć', 'Średniozaawansowany', NULL, 4, '2025-01-31 17:19:06', '2025-01-31 17:20:24'),
(72, 'Seated Hammer Curl', 'https://www.youtube.com/watch?v=BbxA1QF3TxY', 'Wytrzymałość', 'Hantle', 'Izolacja', 'Ciągnąć', 'Początkujący', 'Przedramiona', 4, '2025-01-31 17:21:53', '2025-01-31 17:21:53'),
(73, 'One-Arm Seated Dumbbell Curl', 'https://www.youtube.com/watch?v=tMEGqKuOa-M', 'Wytrzymałość', 'Hantle', 'Izolacja', 'Ciągnąć', 'Początkujący', NULL, 4, '2025-01-31 17:24:05', '2025-01-31 17:24:05'),
(74, 'Alternating Standing Hammer Curl', 'https://www.youtube.com/watch?v=eS0Gg28_-h4', 'Wytrzymałość', 'Hantle', 'Izolacja', 'Ciągnąć', 'Początkujący', 'Przedramiona', 4, '2025-01-31 17:25:04', '2025-01-31 17:25:04'),
(75, 'Smith Machine Bicep Curl', 'https://www.youtube.com/watch?v=kFhrpD-HbPo', 'Wytrzymałość', 'Hantle', 'Izolacja', 'Ciągnąć', 'Początkujący', NULL, 4, '2025-01-31 17:26:03', '2025-01-31 17:26:03'),
(76, 'Cable Preacher Curl', 'https://www.youtube.com/watch?v=P33oQtDURjs', 'Wytrzymałość', 'Kabel', 'Izolacja', 'Ciągnąć', 'Początkujący', NULL, 4, '2025-01-31 17:26:51', '2025-01-31 17:26:51'),
(77, 'Wide Grip Standing Barbell Curl', 'https://www.youtube.com/watch?v=jnfveKq1i3E', 'Wytrzymałość', 'Sztanga', 'Izolacja', 'Ciągnąć', 'Początkujący', NULL, 4, '2025-01-31 17:27:38', '2025-01-31 17:27:38'),
(78, 'Dumbbell Preacher Curl', 'https://www.youtube.com/watch?v=pwEhS1sg9mU', 'Wytrzymałość', 'Hantle', 'Izolacja', 'Pociągnięcie (dwustronne)', 'Początkujący', 'Przedramiona', 4, '2025-01-31 17:28:33', '2025-01-31 17:28:33'),
(79, 'One-Arm Cable Curl', 'https://www.youtube.com/watch?v=9ZUCFkp-5BI', 'Wytrzymałość', 'Kabel', 'Izolacja', 'Ciągnąć', 'Średniozaawansowany', NULL, 4, '2025-01-31 17:30:42', '2025-01-31 17:30:42'),
(80, 'One-Arm Standing Hammer Curl', 'https://www.youtube.com/watch?v=vLnosC7Qi7M', 'Wytrzymałość', 'Hantle', 'Izolacja', 'Ciągnąć', 'Początkujący', 'Przedramiona', 4, '2025-01-31 17:32:22', '2025-01-31 17:32:22'),
(81, 'Standing Dumbbell Drag Curl', 'https://www.youtube.com/watch?v=3ZpEL3xiNhc', 'Wytrzymałość', 'Hantle', 'Izolacja', 'Pociągnięcie (dwustronne)', 'Początkujący', 'Przedramiona', 4, '2025-01-31 17:33:22', '2025-01-31 17:33:22'),
(82, 'Seated Barbell Curl', 'https://www.youtube.com/watch?v=fBceQY9LQzs', 'Wytrzymałość', 'Sztanga', 'Izolacja', 'Ciągnąć', 'Początkujący', NULL, 4, '2025-01-31 17:34:24', '2025-01-31 17:34:24'),
(83, 'Alternating Incline Dumbbell Curl', 'https://www.youtube.com/watch?v=bgYt7ZgFc9M', 'Wytrzymałość', 'Hantle', 'Izolacja', 'Ciągnąć', 'Początkujący', NULL, 4, '2025-01-31 17:35:10', '2025-01-31 17:35:10'),
(84, 'Seated Zottman Curl', 'https://www.youtube.com/watch?v=GIYet6Gcfmg', 'Wytrzymałość', 'Hantle', 'Izolacja', 'Pociągnięcie (dwustronne)', 'Początkujący', 'Przedramiona', 4, '2025-01-31 17:36:16', '2025-01-31 17:36:16');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `exercises_by_muscle_group`
--

CREATE TABLE `exercises_by_muscle_group` (
  `id_exercises_by_muscle_group` int(11) NOT NULL,
  `name_muscle_group` varchar(100) NOT NULL,
  `image_of_muscle_group` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exercises_by_muscle_group`
--

INSERT INTO `exercises_by_muscle_group` (`id_exercises_by_muscle_group`, `name_muscle_group`, `image_of_muscle_group`, `created_at`, `updated_at`) VALUES
(1, 'Odwodziciele', 'odwodziciele.jpg', '2024-12-07 15:44:48', '2024-12-07 15:44:48'),
(2, 'Mięśnie brzucha', 'miesnie_brzucha.jpg', '2024-12-07 15:44:48', '2024-12-07 15:44:48'),
(3, 'Przywodziciele', 'przywodziciele.webp', '2024-12-07 15:44:48', '2024-12-07 15:44:48'),
(4, 'Bicepsy', 'bicepsy.jpg', '2024-12-07 15:44:48', '2024-12-07 15:44:48'),
(5, 'Łydki', 'lydki.webp', '2024-12-07 15:44:48', '2024-12-07 15:44:48'),
(6, 'Klatka piersiowa', 'klatka_piersiowa.jpg', '2024-12-07 15:44:48', '2024-12-07 15:44:48'),
(7, 'Przedramiona', 'przedramiona.jpg', '2024-12-07 15:44:48', '2024-12-07 15:44:48'),
(8, 'Pośladki', 'posladki.webp', '2024-12-07 15:44:48', '2024-12-07 15:44:48'),
(9, 'Mięśnie dwugłowe uda', 'miesnie_dwuglowe_uda.webp', '2024-12-07 15:44:48', '2024-12-07 15:44:48'),
(10, 'Zginacze bioder', 'zginacze_bioder.jpg', '2024-12-07 15:44:48', '2024-12-07 15:44:48'),
(11, 'Pasmo biodrowo-piszczelowe', 'pasmo_biodrowo_piszczelowe.webp', '2024-12-07 15:44:48', '2024-12-07 15:44:48'),
(12, 'Mięśnie najszersze grzbietu', 'miesnie_najszersze_grzbietu.jpg', '2024-12-07 15:44:48', '2024-12-07 15:44:48'),
(13, 'Dolna część pleców', 'dolna_czesc_plecow.jpg', '2024-12-07 15:44:48', '2024-12-07 15:44:48'),
(14, 'Górna część pleców', 'gorna_czesc_plecow.jpg', '2024-12-07 15:44:48', '2024-12-07 15:44:48'),
(15, 'Szyja', 'szyja.jpg', '2024-12-07 15:44:48', '2024-12-07 15:44:48'),
(16, 'Mięśnie skośne brzucha', 'miesnie_skosne_brzucha.jpg', '2024-12-07 15:44:48', '2024-12-07 15:44:48'),
(17, 'Powięź dłoniowa', 'powiez_dloniowa.jpg', '2024-12-07 15:44:48', '2024-12-07 15:44:48'),
(18, 'Powięź podeszwowa', 'powiez_podeszwowa.webp', '2024-12-07 15:44:48', '2024-12-07 15:44:48'),
(19, 'Mięśnie czworogłowe uda', 'miesnie_czworoglowe_uda.webp', '2024-12-07 15:44:48', '2024-12-07 15:44:48'),
(20, 'Barki', 'barki.jpg', '2024-12-07 15:44:48', '2024-12-07 15:44:48'),
(21, 'Mięśnie czworoboczne', 'miesnie_czworoboczne.webp', '2024-12-07 15:44:48', '2024-12-07 15:44:48'),
(22, 'Tricepsy', 'tricepsy.jpg', '2024-12-07 15:44:48', '2024-12-07 15:44:48');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `training_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `trainings`
--

CREATE TABLE `trainings` (
  `id` bigint(20) NOT NULL,
  `user_id` int(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `goal` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `DaysPerWeek` int(11) DEFAULT NULL,
  `TimePerWorkout` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`id`, `user_id`, `category_id`, `name`, `goal`, `description`, `duration`, `created_at`, `updated_at`, `DaysPerWeek`, `TimePerWorkout`) VALUES
(1, NULL, 1, 'Trening tylko z hantlami: 5-tygodniowy trening z hantlami dzielony', 'Zbuduj mięśnie', 'Ten 5-dniowy program ćwiczeń z wykorzystaniem wyłącznie hantli jest idealny dla osób chcących zbudować beztłuszczową masę mięśniową w domu lub w podróży!', 12, NULL, NULL, 5, '45-60 '),
(2, NULL, 1, '6-dniowy trening siłowy Push/Pull/Legs (PPL)', 'Zbuduj mięśnie', 'Ten 6-dniowy trening typu push/pull/legs to system o dużej objętości i przerwach przeznaczony dla średniozaawansowanych podnosicieli ciężarów, którzy chcą zwiększyć masę mięśniową i siłę.', 12, NULL, NULL, 6, '45-60 '),
(3, NULL, 1, '10-tygodniowy program budowy masy', 'Zbuduj mięśnie', 'Ten trening jest zaprojektowany tak, aby zwiększyć masę mięśniową tak bardzo, jak to możliwe w ciągu 10 tygodni. Pracuje ciężko nad każdą grupą mięśni raz w tygodniu, głównie przy użyciu ciężkich ćwiczeń złożonych.', 10, NULL, NULL, 5, '50 '),
(28, 5, 2, 'Robienie oporowego cardio', NULL, 'W dzisiejszym treningu będziemy zajmować się bla bla bla...', 3, '2025-01-03 21:45:45', '2025-01-03 21:45:45', 3, '80');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `training_exercise`
--

CREATE TABLE `training_exercise` (
  `id` bigint(20) NOT NULL,
  `training_id` bigint(20) NOT NULL,
  `exercise_id` int(11) NOT NULL,
  `day` varchar(255) NOT NULL,
  `sets` int(11) NOT NULL,
  `reps` int(11) NOT NULL,
  `name_training_exercise` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `training_exercise`
--

INSERT INTO `training_exercise` (`id`, `training_id`, `exercise_id`, `day`, `sets`, `reps`, `name_training_exercise`, `created_at`, `updated_at`) VALUES
(89, 28, 19, '1', 3, 10, 'Cardio', '2025-01-03 21:45:45', '2025-01-03 21:45:45'),
(90, 28, 18, '1', 3, 15, 'Cardio', '2025-01-03 21:45:45', '2025-01-03 21:45:45'),
(91, 28, 41, '1', 3, 8, 'Cardio', '2025-01-03 21:45:45', '2025-01-03 21:45:45'),
(92, 28, 42, '2', 3, 9, 'Wzmocnienie miesni', '2025-01-03 21:45:45', '2025-01-03 21:45:45'),
(93, 28, 44, '2', 2, 12, 'Wzmocnienie miesni', '2025-01-03 21:45:45', '2025-01-03 21:45:45'),
(94, 28, 10, '3', 1, 10, 'Cale cialo', '2025-01-03 21:45:45', '2025-01-03 21:45:45'),
(95, 28, 8, '3', 2, 11, 'Cale cialo', '2025-01-03 21:45:45', '2025-01-03 21:45:45');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `sport_level` varchar(255) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `goal` varchar(255) DEFAULT NULL,
  `regulations` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeksy dla tabeli `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `exercise`
--
ALTER TABLE `exercise`
  ADD PRIMARY KEY (`id_exercise`),
  ADD KEY `fk_exercises_by_muscle_group` (`id_exercises_by_muscle_group`);

--
-- Indeksy dla tabeli `exercises_by_muscle_group`
--
ALTER TABLE `exercises_by_muscle_group`
  ADD PRIMARY KEY (`id_exercises_by_muscle_group`);

--
-- Indeksy dla tabeli `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeksy dla tabeli `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_favorite` (`user_id`,`training_id`),
  ADD KEY `training_id` (`training_id`);

--
-- Indeksy dla tabeli `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeksy dla tabeli `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeksy dla tabeli `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeksy dla tabeli `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indeksy dla tabeli `training_exercise`
--
ALTER TABLE `training_exercise`
  ADD PRIMARY KEY (`id`),
  ADD KEY `training_id` (`training_id`),
  ADD KEY `exercise_id` (`exercise_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `exercise`
--
ALTER TABLE `exercise`
  MODIFY `id_exercise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `exercises_by_muscle_group`
--
ALTER TABLE `exercises_by_muscle_group`
  MODIFY `id_exercises_by_muscle_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `training_exercise`
--
ALTER TABLE `training_exercise`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exercise`
--
ALTER TABLE `exercise`
  ADD CONSTRAINT `fk_exercises_by_muscle_group` FOREIGN KEY (`id_exercises_by_muscle_group`) REFERENCES `exercises_by_muscle_group` (`id_exercises_by_muscle_group`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`training_id`) REFERENCES `trainings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `trainings`
--
ALTER TABLE `trainings`
  ADD CONSTRAINT `trainings_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `training_exercise`
--
ALTER TABLE `training_exercise`
  ADD CONSTRAINT `training_exercise_ibfk_1` FOREIGN KEY (`training_id`) REFERENCES `trainings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `training_exercise_ibfk_2` FOREIGN KEY (`exercise_id`) REFERENCES `exercise` (`id_exercise`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
