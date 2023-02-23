-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2018 at 01:58 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pickup`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `chat_group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `message`, `chat_group_id`, `user_id`, `created_at`, `updated_at`) VALUES
(7, 'Team Created', 9, 1, '2018-03-27 10:02:42', '2018-03-27 10:02:42'),
(8, 'hiiiii', 1, 2, '2018-03-27 10:35:31', '2018-03-27 10:35:31'),
(9, 'hiiiii', 2, 2, '2018-03-27 10:35:31', '2018-03-27 10:35:31'),
(10, 'hiiiii', 2, 2, '2018-03-27 10:35:31', '2018-03-27 10:35:31'),
(11, 'hiiiii', 2, 2, '2018-03-27 10:35:31', '2018-03-27 10:35:31');

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `name`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'Mof Mode Player Point', 'mof-game-player-point', '5', '2018-04-03 18:30:00', '2018-04-03 18:30:00'),
(2, 'League Mode Player Point', 'league-game-player-point', '10', '2018-04-03 18:30:00', '2018-04-03 18:30:00'),
(3, 'League Mode Team Point', 'league-game-team-point', '50', '2018-04-03 18:30:00', '2018-04-03 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `cron_jobs`
--

CREATE TABLE `cron_jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interval_time` decimal(10,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cron_jobs`
--

INSERT INTO `cron_jobs` (`id`, `name`, `action`, `interval_time`, `created_at`, `updated_at`) VALUES
(1, 'Game Win or Loose', 'API\\CronJobsController\\gameWin', '5', '2018-04-02 18:30:00', '2018-04-02 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `mode` enum('MOF','LEAGUE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'MOF',
  `sport_type_id` int(11) NOT NULL,
  `no_of_player` int(11) NOT NULL,
  `match_time` datetime NOT NULL,
  `latitude` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_complated` enum('PENDING','COMPLETE','CANCEL','PROGRESS') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_finished` tinyint(1) NOT NULL DEFAULT '0',
  `is_closed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `name`, `user_id`, `mode`, `sport_type_id`, `no_of_player`, `match_time`, `latitude`, `longitude`, `address`, `is_complated`, `created_at`, `updated_at`, `is_finished`, `is_closed`) VALUES
(1, 'Arvaan Rocks', 1, 'MOF', 1, 11, '2018-03-29 12:00:00', '23.45', '72.456', 'Ahmedabad shymal', 'CANCEL', '2018-02-02 12:53:18', '2018-04-03 14:13:45', 0, 0),
(2, 'tennis', 11, 'LEAGUE', 2, 5, '2018-03-30 12:00:00', '-34.0414', '150.7901', 'Iowa County,Iowa County, IA, USA', 'CANCEL', '2018-02-05 09:09:50', '2018-04-03 14:13:45', 0, 0),
(3, 'tennis', 11, 'MOF', 2, 5, '2018-03-31 12:00:00', '-34.0414', '150.7901', 'Iowa County,Iowa County, IA, USA', 'COMPLETE', '2018-02-05 09:19:19', '2018-04-04 07:35:45', 0, 0),
(9, 'Arvaan Rocks', 1, 'LEAGUE', 1, 11, '2018-03-26 12:59:00', '23.45', '72.456', 'Ahmedabad shymal', 'COMPLETE', '2018-02-08 11:41:21', '2018-04-04 11:14:11', 0, 0),
(10, 'Arvaan Rocks', 1, 'LEAGUE', 1, 11, '2017-12-12 12:00:00', '23.45', '72.456', 'Ahmedabad shymal', 'CANCEL', '2018-02-08 11:43:43', '2018-04-03 14:13:46', 0, 0),
(11, 'Arvaan Rocks', 1, 'LEAGUE', 1, 11, '2018-04-04 12:00:00', '23.45', '72.456', 'Ahmedabad shymal', 'CANCEL', '2018-03-27 09:24:22', '2018-04-04 06:47:53', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `game_player_invite`
--

CREATE TABLE `game_player_invite` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `game_teams`
--

CREATE TABLE `game_teams` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `is_check_in` tinyint(1) NOT NULL DEFAULT '0',
  `is_check_out` tinyint(1) NOT NULL DEFAULT '0',
  `is_check_out_team` tinyint(1) NOT NULL DEFAULT '0',
  `is_win` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `game_teams`
--

INSERT INTO `game_teams` (`id`, `team_id`, `game_id`, `is_check_in`, `is_check_out`, `is_check_out_team`, `is_win`) VALUES
(1, 4, 1, 0, 0, 0, 0),
(2, 5, 1, 0, 0, 0, 0),
(3, 6, 3, 0, 0, 0, 0),
(4, 7, 3, 1, 0, 0, 0),
(6, 3, 9, 1, 1, 2, 0),
(7, 3, 10, 0, 0, 0, 0),
(9, 2, 9, 1, 1, 2, 1),
(11, 2, 10, 0, 0, 0, 0),
(12, 3, 11, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `game_team_invite`
--

CREATE TABLE `game_team_invite` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `game_team_invite`
--

INSERT INTO `game_team_invite` (`id`, `game_id`, `team_id`) VALUES
(1, 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `game_team_players`
--

CREATE TABLE `game_team_players` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `type` enum('PLAYER','SUBTITUTE') DEFAULT 'PLAYER',
  `is_check_in` tinyint(4) NOT NULL DEFAULT '0',
  `is_check_out` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `game_team_players`
--

INSERT INTO `game_team_players` (`id`, `user_id`, `team_id`, `game_id`, `type`, `is_check_in`, `is_check_out`) VALUES
(1, 1, 4, 1, 'PLAYER', 0, 0),
(2, 11, 6, 3, 'PLAYER', 1, 1),
(4, 1, 3, 9, 'PLAYER', 1, 1),
(5, 2, 3, 9, 'PLAYER', 1, 0),
(6, 1, 3, 10, 'PLAYER', 0, 0),
(7, 2, 3, 10, 'PLAYER', 0, 0),
(14, 2, 2, 10, 'PLAYER', 0, 0),
(15, 5, 2, 10, 'PLAYER', 0, 0),
(16, 4, 2, 10, 'PLAYER', 0, 0),
(17, 7, 2, 10, 'PLAYER', 0, 0),
(18, 2, 7, 3, 'PLAYER', 1, 0),
(19, 4, 2, 9, 'PLAYER', 0, 0),
(20, 2, 3, 11, 'PLAYER', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `group_chats`
--

CREATE TABLE `group_chats` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` enum('GAMES','TEAMS') COLLATE utf8mb4_unicode_ci NOT NULL,
  `game_id` int(11) NOT NULL DEFAULT '0',
  `team_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_chats`
--

INSERT INTO `group_chats` (`id`, `type`, `game_id`, `team_id`, `created_at`, `updated_at`) VALUES
(1, 'TEAMS', 0, 14, '2018-03-27 09:13:15', '2018-03-27 09:13:15'),
(2, 'GAMES', 11, 0, '2018-03-27 09:24:22', '2018-03-27 09:24:22'),
(9, 'TEAMS', 0, 16, '2018-03-27 10:02:42', '2018-03-27 10:02:42');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` enum('REQUEST','RESPONSE') COLLATE utf8mb4_unicode_ci NOT NULL,
  `log_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `log_data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `type`, `log_key`, `route`, `log_data`, `file_data`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'RESPONSE', 'DEFAULT', 'DEFAULT', '"game-win"', 'NULL', 0, '2018-04-03 13:00:23', '2018-04-03 13:00:23'),
(2, 'RESPONSE', 'DEFAULT', 'DEFAULT', '"game-win"', 'NULL', 0, '2018-04-03 13:00:30', '2018-04-03 13:00:30'),
(3, 'RESPONSE', 'DEFAULT', 'DEFAULT', '"testint"', 'NULL', 0, '2018-04-03 13:09:49', '2018-04-03 13:09:49'),
(4, 'RESPONSE', 'DEFAULT', 'DEFAULT', '"testint"', 'NULL', 0, '2018-04-03 13:09:52', '2018-04-03 13:09:52'),
(5, 'RESPONSE', 'DEFAULT', 'DEFAULT', '"testint"', 'NULL', 0, '2018-04-03 13:09:55', '2018-04-03 13:09:55'),
(6, 'RESPONSE', 'DEFAULT', 'DEFAULT', '"testint"', 'NULL', 0, '2018-04-03 13:10:52', '2018-04-03 13:10:52'),
(7, 'RESPONSE', 'DEFAULT', 'DEFAULT', '"game-win"', 'NULL', 0, '2018-04-03 13:10:52', '2018-04-03 13:10:52'),
(8, 'RESPONSE', 'DEFAULT', 'DEFAULT', '"game-win"', 'NULL', 0, '2018-04-03 13:11:22', '2018-04-03 13:11:22'),
(9, 'RESPONSE', 'DEFAULT', 'DEFAULT', '"game-win"', 'NULL', 0, '2018-04-03 13:11:23', '2018-04-03 13:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `type` enum('API','EMAIL') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'API',
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`type`, `id`, `key`, `label`, `value_en`) VALUES
('API', 1, 'LOGIN_SUCCESSFULLY', 'Login Success', 'Login successfully please wait.....'),
('API', 2, 'CREDENTIAL_NOT_WORKING', 'Email Or Password Wrong', 'Your Email or Password not valid please try again'),
('API', 3, 'VALIDATION_REQUIRED_MESSAGE', 'Validation required message', 'fields are not valid please input valid data.'),
('API', 4, 'SOMETHING_WENT_WRONG', 'Somethig Went Wrong', 'Something went wrong in server please try again.'),
('API', 5, 'REGISTER_SUCCESS', 'Register Success', 'Your account is register please wait...'),
('EMAIL', 6, 'VERIFY_EMAIL_TITLE', 'Verify Email Mail Title', 'Please verify your account'),
('API', 7, 'RESET_PASSWORD_LINK', 'Reset Password Link Sent', 'Your reset password link sent in your mail please click to reset your password.'),
('API', 8, 'RESEND_EMAIL_LINK', 'Resend Email Link', 'Verify email link resend in your email address please click to verify.'),
('API', 9, 'UPDATE_PROFILE', 'Update Profile success', 'Your profile is saved.'),
('API', 10, 'PASSWORD_CHANGE', 'Password change successfully', 'Your password change successfully'),
('API', 11, 'CURRENT_PASSWORD_WRONG', 'Current Password not match', 'Your current password is not match please try again.'),
('API', 12, 'FACEBOOK_LOGIN', 'Facebool login successfully', 'Facebook login successfully please wait..'),
('API', 13, 'FACEBOOK_REGISTER', 'Facebool register successfully', 'Facebook register successfully please wait..'),
('API', 14, 'USER_BLOCK', 'User block', 'This user add in block list.'),
('API', 15, 'USER_ALREADY_BLOCKED', 'User already blocked', 'This user already in block list.'),
('API', 16, 'USER_UNBLOCK', 'User unblock success', 'This user remove in your block list.'),
('API', 17, 'PROFILE_PICTURE_UPDATE', 'Profile Picture update success', 'Your profile picture update successfully.'),
('API', 18, 'USERS_LOOUT', 'User logout', 'Your account is logout successfully'),
('API', 19, 'EMAIL_IS_NOT_REGISTER', 'Email address is not register.', 'Email address is not register with us.'),
('API', 20, 'ALREADY_FRIEND', 'Already Friends', 'This user is already in friend list.'),
('API', 21, 'ALREADY_FRIEND_REQUEST', 'Friend request already sent', 'Friend request already sent.'),
('API', 22, 'FRIEND_REQUEST_ACCEPT', 'Friend request accept', 'Friend request accept successfully.'),
('API', 23, 'FRIEND_REQUEST_SENT', 'Friend request sent', 'Friend request sent successfully'),
('API', 24, 'FRIEND_REQUEST_CANCEL', 'Friend request cancel', 'Friend request remove successfully'),
('API', 25, 'FRIEND_REMOVE', 'Friend remove successfully', 'This user remove in your friend list.'),
('API', 26, 'GAME_CREATED', 'Game Created success', 'Game created successfully'),
('API', 27, 'GAME_DELETED', 'Game Cancel successfully', 'Game cancel successfully'),
('API', 28, 'PLAYER_INVITE', 'Player Invite successfully', 'Player Invite successfully'),
('API', 29, 'PLAYER_ALREADY_IN_GAME', 'Player Already in game', 'You are already in game'),
('API', 30, 'INVITATION_REJECT', 'Invitaion Rejected', 'Invitation rejected.'),
('API', 31, 'INVITATION_ACCEPT', 'Invitation accepted', 'Invitation Accepted.'),
('API', 32, 'GAME_JOIN', 'Game join success', 'Game join successfully'),
('API', 33, 'GAME_NOT_FOUND', 'Game not found', 'Game is no longer available.'),
('API', 34, 'GAME_NOT_JOIN', 'You was not joined this game so you are not leave this game', 'You was not joined this game so you are not leave this game'),
('API', 35, 'TEAM_CREATE', 'Team Create successfully', 'Your team create successfully.'),
('API', 37, 'TEAM_UPDATE', 'Team Update successfully', 'Your team update successfully'),
('API', 38, 'TEAM_NOT_FOUND', 'Team not found', 'Your team not found please check'),
('API', 39, 'PLAYER_NOT_SELECT', 'Select Player for team', 'Please select any player for team'),
('API', 40, 'PLAYER_ALREADY_TEAM', 'Player already in team', 'This player is already in team'),
('API', 41, 'PLAYER_INVITATION_ALREADY_SENT_TEAM', 'Player invitation already sent for team', 'Player invitation already sent.'),
('API', 42, 'PLAYER_INVITATION_SENT_FOR_TEAM', 'Player team invitation sent', 'Your team invitation sent to the player.'),
('API', 43, 'TEAM_INVITATION_ACCEPT', 'Team invitation accepted', 'you are join this team.'),
('API', 44, 'TEAM_INVITATION_REJECTED', 'Team invitation rejected', 'Your team invitation rejected.'),
('API', 45, 'YOU_ARE_NOT_ADMIN', 'You are not admin of this team so you can''t remove any player', 'You are not admin of this team so you can''t remove any player'),
('API', 46, 'PLAYER_NOT_REMOVE', 'Player was not removed from this team.', 'Please was not removed from on this team. Please try again.'),
('API', 47, 'PLAYER_REMOVE_IN_TEAM', 'Player removed from your team. ', 'Player removed from your team.'),
('API', 48, 'YOU_ARE_ADMIN', 'You are admin so you don''t leave this team', 'You are admin so you don''t leave this team'),
('API', 49, 'LEAVE_TEAM', 'You are leave this game.', 'You have left this team successfully.'),
('API', 50, 'TEAM_INVITATION_SENT_IN_GAME', 'Your team invitation sent successfully.', 'Your team invitation sent successfully. '),
('API', 51, 'OTHER_TEAM_JOIN', 'Other team already joined.', 'Other team already joined.'),
('API', 52, 'TEAM_INVITE_REQUEST_ACCEPT', 'Team invite request accept successfully', 'Team invite request accept successfully'),
('API', 53, 'LEAGUE_GAME_JOIN', 'League mode game joined.', 'League mode game joined.'),
('API', 54, 'CHECK_IN', 'Check In Done', 'You are check in successfully'),
('API', 55, 'GAME_IS_NOT_PROGRESS_MODE', 'Game is not progress mode', 'This game is not start.');

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
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(6, '2016_06_01_000004_create_oauth_clients_table', 2),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2),
(9, '2017_12_27_110555_create_users_blocks_table', 3),
(10, '2017_12_30_095402_create_messages_table', 4),
(11, '2017_12_30_113941_create_sessions_table', 5),
(13, '2018_01_03_091713_create_users_friends_table', 6),
(14, '2018_01_05_070517_create_sport_types_table', 7),
(15, '2018_01_05_073930_create_games_table', 8),
(16, '2018_01_12_155011_create_teams_table', 9),
(17, '2018_01_16_192014_create_logs_table', 10),
(18, '2018_01_19_120623_create_notifications_table', 11),
(19, '2018_03_27_130016_create_group_chats_table', 12),
(20, '2018_03_27_131401_create_chat_messages_table', 13),
(21, '2018_03_27_131719_create_user_messages_table', 14),
(22, '2018_03_28_141001_create_places_table', 15),
(23, '2018_04_03_150208_create_cron_jobs_table', 16),
(24, '2018_04_04_124552_create_configs_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('USER','GAME','TEAM') COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_id` int(11) NOT NULL,
  `from_type` enum('USER','TEAM','GAME') COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_data_id` int(11) NOT NULL,
  `notification_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `type`, `data_id`, `from_type`, `from_data_id`, `notification_type`, `created_at`, `updated_at`) VALUES
(4, 'Kelvins Patels invited you to play Basketball for tennis', 'GAME', 2, 'USER', 1, 'GAME_PLAYER_INVITE', '2018-03-07 12:52:57', '2018-03-07 12:52:57'),
(7, 'kelvin patel has sent invitation for your team.', 'TEAM', 2, 'GAME', 9, 'GAME_TEAM_INVITE', '2018-03-07 13:25:28', '2018-03-07 13:25:28'),
(11, 'kelvin patel has sent invitation for your team.', 'TEAM', 2, 'GAME', 9, 'GAME_TEAM_INVITE', '2018-03-07 13:51:15', '2018-03-07 13:51:15'),
(12, 'Kelvins Patels has invited in his team.', 'TEAM', 10, 'USER', 1, 'PLAYER_INVITE_IN_TEAM', '2018-03-27 09:12:06', '2018-03-27 09:12:06'),
(13, 'Kelvins Patels has invited in his team.', 'TEAM', 11, 'USER', 1, 'PLAYER_INVITE_IN_TEAM', '2018-03-27 09:12:28', '2018-03-27 09:12:28');

-- --------------------------------------------------------

--
-- Table structure for table `notification_user_map`
--

CREATE TABLE `notification_user_map` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `notification_id` int(11) NOT NULL,
  `is_read` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notification_user_map`
--

INSERT INTO `notification_user_map` (`id`, `user_id`, `notification_id`, `is_read`) VALUES
(4, 5, 4, 0),
(7, 2, 7, 0),
(11, 2, 11, 0),
(12, 4, 12, 0),
(13, 4, 13, 0);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `os_type` enum('WEB','IOS','ANDROID') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'WEB',
  `fcm_id` text COLLATE utf8mb4_unicode_ci,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `os_type`, `fcm_id`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('01470818857d7ae11e905cf07beb1ff029dd730617dc42e157c546201456ee5075a466a7aad9c58d', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 05:10:17', '2018-01-17 05:10:17', '2019-01-17 10:40:17'),
('0159e6cde1749dd1a19ab23e86c16b9779748e1346d9bee447f15fadb882744d7bfdc9f73c57fde0', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 05:26:03', '2018-01-17 05:26:03', '2019-01-17 10:56:03'),
('024c091268340dd70ac3e387dd030b4d259b650b1067a6d08b8ab91054ccca5f5803c138098952fe', 1, 1, 'MyApp', 'WEB', '', '[]', 0, '2018-01-08 07:08:21', '2018-01-08 07:08:21', '2019-01-08 12:38:21'),
('0370c9d28fabc61cd4f5b5087b85ed18e5af0f2c2f89f38b42d1a82eb154b4c8782adefe4287fa22', 5, 1, 'MyApp', 'WEB', '', '[]', 0, '2018-01-08 08:31:52', '2018-01-08 08:31:52', '2019-01-08 14:01:52'),
('0534344f2e2a4978c4e4013a38096c4e7d48e4d0a9cb8d5440dcced5153c39046fbb9aa1701e86e9', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 05:58:47', '2018-01-17 05:58:47', '2019-01-17 11:28:47'),
('06f204e062183d92696728c04e0c284a7c5bb95f20f7f7fcd029bdf5126ce53ee8f7806f859cb61b', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 06:09:12', '2018-01-17 06:09:12', '2019-01-17 11:39:12'),
('0835f65038c86169760c710382c42ef2e79b2d59bd59a4d5fc61508d83cf79df3797badb0e05e8c5', 1, 1, 'MyApp', 'WEB', '', '[]', 0, '2018-01-03 01:48:45', '2018-01-03 01:48:45', '2019-01-03 07:18:45'),
('09366ad0aabc3b91dea70b43b486fcc268c199cd839f76bd0d040fa24a73c2e135cf2c8b4a500eba', 3, 1, 'MyApp', 'WEB', 'fCJLPOw3XbY:APA91bFLllYQp7sN45qu80fGT6ToQrQpHeTqau5oGpYPTvyIbgsUE6kK8c-8_mRODxNrnNOWxhzhmOWE1VOqpB0bA9Y2RdX_HaG9AYGgDTyRCamiA0fPY-eTtGfFYAIvHVxdA4J0ODqP', '[]', 0, '2018-02-21 12:45:59', '2018-02-21 12:45:59', '2019-02-21 18:15:59'),
('09996a584d6eb468d5345fe3be81275749b445bec6688cc418d839f1ea516c6cde6bc96397a3072d', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 05:22:22', '2018-01-17 05:22:22', '2019-01-17 10:52:22'),
('09f3ff4ca9a6704cb67ec2c5cc94b06d85f05887ee977da5130dc74218c9e717486d37b7eb75c49c', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 05:22:41', '2018-01-17 05:22:41', '2019-01-17 10:52:41'),
('0a0c33220999f216345918284bac013b9d7614b36dadd31713a693c92d3aaad5d6a88ba24719c5ae', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 06:07:10', '2018-01-17 06:07:10', '2019-01-17 11:37:10'),
('0b77f4b570beaf9ae143bbedd0ea24af2a9a83ca9911257e6dc0911b3d998de59ccbb01686a85dfa', 4, 1, 'MyApp', 'ANDROID', '', '[]', 0, '2018-01-03 03:28:10', '2018-01-03 03:28:10', '2019-01-03 08:58:10'),
('0fa90f34bb7a60c4fd61ff3822942452592fdcc5b0f3a95e85daa36e97cef15e1dc6b7ed21c11bfe', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 05:22:49', '2018-01-17 05:22:49', '2019-01-17 10:52:49'),
('10c36419e50a114c924e620ee4034d4cfa678b946eead62a6f9c519b4c49e16445dcea608501d322', 3, 1, 'MyApp', 'WEB', 'f13H8UoKxnE:APA91bFGJrkSQ571EDFqRlInzn1evqbmzJaR2OCp5rnELL6U6e9ge4gXVSqHvnT0lc9vajx1gzqmXLNlrb3yqx9I-C8Pz1bhBDebfGbWP6MSeyOZuw_GYHcweKkYsMoiOvQ-hUF6kEhg', '[]', 0, '2018-01-10 11:28:14', '2018-01-10 11:28:14', '2019-01-10 16:58:14'),
('1733389fb649c22009738d8aa6b46801acccdb756f31096c9a8ae74381788a6d518cc54f7152bf5f', 5, 1, 'MyApp', 'WEB', '', '[]', 0, '2018-01-05 13:34:27', '2018-01-05 13:34:27', '2019-01-05 19:04:27'),
('17f2a7a0cc05c15b633880b9e33d053af0e42c781f20aa1cf1afaa99d3897d3c77abe82988eaff8f', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 06:14:37', '2018-01-17 06:14:37', '2019-01-17 11:44:37'),
('184d4af5fb66dda34be236faa9261baa9462011c9adb4098da02b5bc8aba4271b7fff6d9e8474728', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 06:06:51', '2018-01-17 06:06:51', '2019-01-17 11:36:51'),
('187e1d2155fce016162d4069cd964f71d60caa62dc34932e6c4456d27caa0832715e266178616a53', 3, 1, 'MyApp', 'WEB', 'fCJLPOw3XbY:APA91bFLllYQp7sN45qu80fGT6ToQrQpHeTqau5oGpYPTvyIbgsUE6kK8c-8_mRODxNrnNOWxhzhmOWE1VOqpB0bA9Y2RdX_HaG9AYGgDTyRCamiA0fPY-eTtGfFYAIvHVxdA4J0ODqP', '[]', 0, '2018-01-10 12:57:01', '2018-01-10 12:57:01', '2019-01-10 18:27:01'),
('18d3e47b87d99e0e8b111e0cfecd1d824b7eea90bfd05b9d30160596507bf510251ae64a7efb3d9c', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 05:32:13', '2018-01-17 05:32:13', '2019-01-17 11:02:13'),
('1a1a2f5bc2f371a0c465e7a2f3ab60a0912ee9aa4fcd32f262e2245c26d08c421991815af50b44f9', 5, 1, 'MyApp', 'WEB', '', '[]', 0, '2018-01-08 06:49:26', '2018-01-08 06:49:26', '2019-01-08 12:19:26'),
('29a8397c409080d86ae455b65c3b37c9ba3072f92dbfa67a12505a2060437c582da846f09d88db5a', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 06:23:29', '2018-01-17 06:23:29', '2019-01-17 11:53:29'),
('2e37e845870fc5c145764e1bcb9cb72a9c28ea95b0d6e42a616b95565feb2c212c9fae0b0f6110b1', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-10 12:59:04', '2018-01-10 12:59:04', '2019-01-10 18:29:04'),
('33c26579b2e8549b63285c5af5db2bd2971a01ba1253f25cb3f856d3d4029b4c3a6e83216a7c57c4', 1, 1, 'MyApp', 'WEB', '', '[]', 0, '2018-01-05 11:58:58', '2018-01-05 11:58:58', '2019-01-05 17:28:58'),
('347dc58b6945543eb03193b42bba051293110ab23ebb1f2ba5759a8e5bee11af9d5b7d7304f595ab', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 05:55:28', '2018-01-17 05:55:28', '2019-01-17 11:25:28'),
('36d5fd676fe8dd6a33ef9c11464d7c38b68f30456f5c7e55a07cb8f1b40c60996bda694b48f2ce1d', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 05:23:53', '2018-01-17 05:23:53', '2019-01-17 10:53:53'),
('3705dfce978f7f1bc5473273c6aa5eb8d5bf9dac7d1d2435b0248e48f3b59f128ff28d49c0cbe3ad', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-16 14:16:51', '2018-01-16 14:16:51', '2019-01-16 19:46:51'),
('384bf27504e84aaa89dd58ac04f8a045d1f17b3aa9d4d2abaf31036043dce8ee0987b005af4072af', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 05:26:16', '2018-01-17 05:26:16', '2019-01-17 10:56:16'),
('3b16ef5b540799b76f2e52fca9391f3528065d7b3a185baf1af0dddfc4245ecba245ef6a92ae0fd7', 1, 1, 'MyApp', 'WEB', '', '[]', 1, '2018-01-02 04:58:50', '2018-01-02 04:58:50', '2019-01-02 10:28:50'),
('3cd86b7e534720e6a867f82c33df49edf5a05c399d7d9b8c6d8cb462dacb6eb885a81c909561476c', 1, 1, 'MyApp', 'WEB', '', '[]', 0, '2018-01-02 05:37:34', '2018-01-02 05:37:34', '2019-01-02 11:07:34'),
('4193ff1a781a2d71f9f11e7aba9e8eeccd03629416126cc3f151a6ea5a269cd0a19822bb2921181d', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 06:19:32', '2018-01-17 06:19:32', '2019-01-17 11:49:32'),
('440c6c866984210874f53565246675363ef1ffea57a6c342338de96b12e544d1758e3f8c2be1874a', 2, 1, 'MyApp', 'WEB', '', '[]', 0, '2018-01-10 11:04:54', '2018-01-10 11:04:54', '2019-01-10 16:34:54'),
('4ae086c9f5815d75bfa6665781515ca53257bfc101de620eff2bf1dd3554376f6acb6a3684619b2a', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-10 12:58:58', '2018-01-10 12:58:58', '2019-01-10 18:28:58'),
('4aff05e1bb0f071181be771e5875af78541e39a4b3b4cf643e8c3b63cfc22c222e1abeccd4188ae5', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 06:05:59', '2018-01-17 06:05:59', '2019-01-17 11:35:59'),
('4b468e15dee689fc9673a8476da6f7318ec98da2c9513de6c77ab3c6bc975df754f5878683671a0c', 5, 1, 'MyApp', 'WEB', '', '[]', 0, '2018-01-08 07:07:29', '2018-01-08 07:07:29', '2019-01-08 12:37:29'),
('564241720df233bf23af77c3ab48a1ead8f26160e1965a998970e3265a2db94942e43460a8302492', 1, 1, 'MyApp', 'WEB', '', '[]', 0, '2018-01-08 06:57:01', '2018-01-08 06:57:01', '2019-01-08 12:27:01'),
('56dcc1101c1139ddaec0cff83be4e9855695f8113ede65f7ccf29826cb4f5a1e91f359e369a5dc1c', 12, 1, 'MyApp', 'WEB', 'fCJLPOw3XbY:APA91bF', '[]', 0, '2018-02-21 12:50:12', '2018-02-21 12:50:12', '2019-02-21 18:20:12'),
('59b78d2629b6a06b8f597c8cf81a0ab76bb260e7b1a98e26c49abfa80362add45097912c8338b8fd', 2, 1, 'MyApp', 'WEB', '', '[]', 0, '2018-01-10 11:14:18', '2018-01-10 11:14:18', '2019-01-10 16:44:18'),
('5b90aa1fe2d891a867ee7cdda943d93688d27e1c711a352cba95628cb15a326868a71432ba9cae67', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 06:12:19', '2018-01-17 06:12:19', '2019-01-17 11:42:19'),
('5bd832b9a6b4fa4df86182e0c371569bacc78cf48f27fce13d8f19ff3d6ecb27a81eed25697624c4', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 05:27:25', '2018-01-17 05:27:25', '2019-01-17 10:57:25'),
('5c99f7d16f670d9ed65fd0923c5f54ef3f0079dd6c48c539af4076d1bd20d7f0e36e4c3314b11583', 2, 1, 'MyApp', 'WEB', '', '[]', 0, '2018-01-05 13:45:56', '2018-01-05 13:45:56', '2019-01-05 19:15:56'),
('6010db779f2c5101ff006c41d8cede568fc74004a7f4050303bd68e371433baa7160ed4503dc520f', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-02-05 09:03:44', '2018-02-05 09:03:44', '2019-02-05 14:33:44'),
('62cbdb3331bb4775ff267baacd64607721f387808a85920bab0b96d1503e2503884a45eb5effc875', 1, 1, 'MyApp', 'WEB', '', '[]', 0, '2018-01-02 04:54:52', '2018-01-02 04:54:52', '2019-01-02 10:24:52'),
('631c98be54acc296483173e4faf53cd71ee278487d09c26bd9cd1fddcc7815791561a5b1e37d34bf', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 06:25:15', '2018-01-17 06:25:15', '2019-01-17 11:55:15'),
('6352fe2a41a9db8e713918f572c0ba1f7a88984753cc45f497207664bd0e1eb3118ed3ecc906c9e7', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 05:24:11', '2018-01-17 05:24:11', '2019-01-17 10:54:11'),
('69ede553ce92be48c5249e8e226a5186d51994f78af5d765efcc22507481d94bc778ab1938de1d90', 2, 1, 'MyApp', 'WEB', 'f13H8UoKxnE:APA91bFGJrkSQ571EDFqRlInzn1evqbmzJaR2OCp5rnELL6U6e9ge4gXVSqHvnT0lc9vajx1gzqmXLNlrb3yqx9I-C8Pz1bhBDebfGbWP6MSeyOZuw_GYHcweKkYsMoiOvQ-hUF6kEhg', '[]', 0, '2018-01-10 12:46:15', '2018-01-10 12:46:15', '2019-01-10 18:16:15'),
('6ab4c24da24837eb0e46455b058b897be7338ddcb31b21b9d4ceaf841ce56c69cc68acac28c9a0fc', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 06:09:02', '2018-01-17 06:09:02', '2019-01-17 11:39:02'),
('6e45d09ecf30f99a1ee6d65840f93ebc5015194202d726ff5bca638b4165657fe8cf2d2e31d3689a', 12, 1, 'MyApp', 'WEB', 'fCJLPOw3XbY:APA91bF', '[]', 0, '2018-02-21 12:50:20', '2018-02-21 12:50:20', '2019-02-21 18:20:20'),
('74166b670d405089ea5faec8c07094526ade22b77086ded14681b3cae51d9dbd57e3c55c9cb2ab04', 1, 1, 'MyApp', 'WEB', '', '[]', 0, '2018-01-05 13:37:52', '2018-01-05 13:37:52', '2019-01-05 19:07:52'),
('763c1570e119dca686ec5b8fdd203677a5b82d6f9e090890182f16aeb6327a9d7096e97f0df21a2e', 1, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-03-27 09:11:08', '2018-03-27 09:11:08', '2019-03-27 14:41:08'),
('7afd44a16e2dc00496f365605f06d78b6da9846a2c7d5c9ddddb390925e584c7fd04ba74d932667f', 4, 1, 'MyApp', 'WEB', '', '[]', 0, '2018-01-05 13:41:06', '2018-01-05 13:41:06', '2019-01-05 19:11:06'),
('7c4ff43ade00b24f84bdb2d0bcb220cfd16bcaa0e9a9ed4f0f68d4b1eed00b5f4454b4bc608b802a', 3, 1, 'MyApp', 'WEB', '', '[]', 0, '2018-01-02 05:39:06', '2018-01-02 05:39:06', '2019-01-02 11:09:06'),
('7db3d2f3f8365abf74f194aa836613a8b458197ae11cdd76966284899ccd021548655d49f869e276', 5, 1, 'MyApp', 'WEB', '', '[]', 0, '2018-01-04 08:40:00', '2018-01-04 08:40:00', '2019-01-04 14:10:00'),
('7fc40d381f052b0a7f6b59d3eb989a7cca130ae6c0dc20f71ddffdc3e2182c925a2e380709f6c317', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 06:10:59', '2018-01-17 06:10:59', '2019-01-17 11:40:59'),
('80ae8cbb591e357d0579d83f32dcbffd9b19304e261958f07428bb8b036fe761b662526372337935', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 05:32:47', '2018-01-17 05:32:47', '2019-01-17 11:02:47'),
('80eb7584e39436a97b64382cdda4a0982a4d8d124298b3d11a8c609bf42b31c316f26d60e64250e9', 5, 1, 'MyApp', 'ANDROID', '', '[]', 0, '2018-01-04 08:36:19', '2018-01-04 08:36:19', '2019-01-04 14:06:19'),
('812ee54d0863d14e216319c15e863a8ec69a7dc11b16195fe8993f8acea3fa38d9970ead7ebc4926', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 06:10:46', '2018-01-17 06:10:46', '2019-01-17 11:40:46'),
('84f59c907055dd0588da04eef13aa16abcd3b3fea7bc51310977270c58f4f7fe8a15b61f7defc2f0', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 05:55:37', '2018-01-17 05:55:37', '2019-01-17 11:25:37'),
('85d66515232490975405de867563a12a84a50c155e06d0af0903ed04a917629b9fde1af198d9fc00', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 05:22:14', '2018-01-17 05:22:14', '2019-01-17 10:52:14'),
('8668f019dfa430186c30bc5affdc4251d48d7fbb1aa87c976cff19ca9719e0271b477c8b66f14dd4', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 06:06:07', '2018-01-17 06:06:07', '2019-01-17 11:36:07'),
('883a101c5af4fcd931586fcfdfe42c49a45e76f44d64d37567c1dc01070d7f2df3c907d9079f3209', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 06:13:34', '2018-01-17 06:13:34', '2019-01-17 11:43:34'),
('8a01874e0d5f8a25f04f0881bad94f94de3fca04dd1530ef015b9827f00141431463b6005a816f18', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 06:06:35', '2018-01-17 06:06:35', '2019-01-17 11:36:35'),
('8a516426caaec534c4aaad3c424050f0f424a90451c5e472d6f7653efe5e145d35b54bc5dbaad8ca', 1, 1, 'MyApp', 'WEB', '', '[]', 0, '2018-01-08 06:49:53', '2018-01-08 06:49:53', '2019-01-08 12:19:53'),
('8adc10d0cdba7084836d194dfeb6f93fd033b44d6122433ffeb67450d0e0a4a53d145c7a16d21808', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 06:07:48', '2018-01-17 06:07:48', '2019-01-17 11:37:48'),
('8b420badc32227e95ca8667e9ad0e51ad53f2bb705d562079fdf4f3fd678bcca152409b036d33351', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 06:20:02', '2018-01-17 06:20:02', '2019-01-17 11:50:02'),
('9061f418268425442ded15b8ef0647a39b75474b71252de6f53e12f99b759d4cbd1d4e6239611bce', 2, 1, 'MyApp', 'ANDROID', '', '[]', 0, '2018-01-02 04:55:21', '2018-01-02 04:55:21', '2019-01-02 10:25:21'),
('918e1234eb9863f943855ee62cc7c2fba296550deae433243b8a25a419185fe08b20bac73e5ec9bd', 3, 1, 'MyApp', 'WEB', '', '[]', 0, '2018-01-02 05:45:12', '2018-01-02 05:45:12', '2019-01-02 11:15:12'),
('931855dbccef89a37541a54ebcf66fa627c439ae1767e0c686c087d9aa8699a62afe911a847f3403', 5, 1, 'MyApp', 'WEB', '', '[]', 0, '2018-01-05 11:57:55', '2018-01-05 11:57:55', '2019-01-05 17:27:55'),
('96c149510b91d223d4dfeec8e517b8f70f193cb3795c76d982738606a19c1b85eb717c6ef5b688c7', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 06:09:19', '2018-01-17 06:09:19', '2019-01-17 11:39:19'),
('97dad7335ee3539206112bbd9aed9a0aa40ddf8a93057e877f93aebdc7ed5fc1111dbe3e5f27cef0', 1, 1, 'MyApp', 'ANDROID', '', '[]', 1, '2018-01-02 04:36:33', '2018-01-02 04:36:33', '2019-01-02 10:06:33'),
('985b5141f58de343fc105fca733da0f933287de0a1f21f0c6c69b1a1289f98c09634dbed4f3608e7', 2, 1, 'MyApp', 'WEB', '', '[]', 0, '2018-01-10 11:12:37', '2018-01-10 11:12:37', '2019-01-10 16:42:37'),
('985f8fac540ea8ddc09d04e4bd5747d942aed4c2f036e0993a1805b6da9c5d3e5ed9eabcca4ac5ec', 3, 1, 'MyApp', 'WEB', '', '[]', 0, '2018-01-10 11:31:08', '2018-01-10 11:31:08', '2019-01-10 17:01:08'),
('9cec02c510e6fae55aefc0685d7f7c817ad9825901a788c569acffdc60c3747616bf796bdd96d9df', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 06:13:47', '2018-01-17 06:13:47', '2019-01-17 11:43:47'),
('a10138facc3aa25d21cbba16c483009bfb0503a322152528edaebaa2df73431cca49f4b8a95634cc', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-03-06 05:37:01', '2018-03-06 05:37:01', '2019-03-06 11:07:01'),
('a343d243c2fa80f02a12b0f8652f9ed20aa32863f2316c93acb0659c0496e5ab2cdb69a45747ed2b', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 06:10:12', '2018-01-17 06:10:12', '2019-01-17 11:40:12'),
('a6681f22d3440744fe42a261c71ab8f62230c4fa430cc06e371167b883854d70b5f788b14b1ffab2', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 05:32:16', '2018-01-17 05:32:16', '2019-01-17 11:02:16'),
('af26d878247e7b843257a2355a35912516fdc1c961e595ed731ea645fc535d074dd7144620ae1348', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 06:06:58', '2018-01-17 06:06:58', '2019-01-17 11:36:58'),
('b105c32a245332951d6c806c0fb4cf595274531b5a13886a42bdbcce0045b78fb5a08981763fe830', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 06:22:19', '2018-01-17 06:22:19', '2019-01-17 11:52:19'),
('b3642471ca3f9608776bb3f87c4dec6879b4d506f2dba8b9f942e8026c5d7b28a795731d7390685e', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 06:24:49', '2018-01-17 06:24:49', '2019-01-17 11:54:49'),
('b97d363c19473e0070a67f1bc1d29fbfec95346cf40b24c0702958876515f588eced36ec7b346b2a', 1, 1, 'MyApp', 'WEB', '', '[]', 0, '2018-01-08 06:57:18', '2018-01-08 06:57:18', '2019-01-08 12:27:18'),
('bbb00f0427e91c900b5e49ffaf7d74cc7f85f7b7a1f15efcf5a76710947181cb23a587168b9231ae', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 06:11:12', '2018-01-17 06:11:12', '2019-01-17 11:41:12'),
('bec36cd55a323c2d89adbe060258bb6c6e7aee389a146b2cde1dc08d207ea9b08ee73aaa60087396', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 06:22:09', '2018-01-17 06:22:09', '2019-01-17 11:52:09'),
('bed8fd6f1b7b09442e9197443c8cf8b22df504f150e0f075617e14a1546a243ee82ad8f74afa6293', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 06:09:33', '2018-01-17 06:09:33', '2019-01-17 11:39:33'),
('bf3e5526448769436d8c27fb74dd9db1fd7efe30046808fb2a6d4430c7ed3e7f02c5f8560d1dc3e2', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 05:22:01', '2018-01-17 05:22:01', '2019-01-17 10:52:01'),
('c0c74059431b4450924c37e9c7d2762687398ff28435ceafa220f8974b2691218bc4b1c8088f10d1', 1, 1, 'MyApp', 'WEB', '', '[]', 0, '2018-01-02 05:38:15', '2018-01-02 05:38:15', '2019-01-02 11:08:15'),
('c653f7bac89c7ddf1641d370dbc1577c7392e83e1b53a80d11af79b377b96449054b459937c8acff', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 06:51:04', '2018-01-17 06:51:04', '2019-01-17 12:21:04'),
('c95991c77ba750e0c450ec87d70ee39c84f24e7c2961942543a3db96a0fcc2f5987a0afadf7db301', 1, 2, NULL, 'WEB', NULL, '["*"]', 0, '2018-02-01 13:17:24', '2018-02-01 13:17:24', '2018-02-16 18:47:24'),
('ca8d64aa82aaf3c4f139abdce4a581f414295b17c30612e14b37f89741735a942ead0eee37b752b7', 5, 1, 'MyApp', 'WEB', '', '[]', 0, '2018-01-08 08:36:46', '2018-01-08 08:36:46', '2019-01-08 14:06:46'),
('cafe5ea8112e59fc2fcdc35d957100b5dc8d6390f0d4db90f55ab3cb37a5ea6e4fb4f9abf2bc12ad', 3, 1, 'MyApp', 'WEB', '', '[]', 0, '2018-01-10 11:28:46', '2018-01-10 11:28:46', '2019-01-10 16:58:46'),
('d271e74d5640c6a859d3369614151b3f3f8c9b5dd514ac6ff498aacb62deaacf0ee16bf3f7822730', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 06:24:33', '2018-01-17 06:24:33', '2019-01-17 11:54:33'),
('d687783a3eabed838bbe4d43c06edc19037eceda5947ebb3138dfe598398269628bf0a603d85a081', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 06:22:38', '2018-01-17 06:22:38', '2019-01-17 11:52:38'),
('d94b99d7e111748335896d908dee385c51ce501582bca4802fad813ba757c681f44f6ab62ce94588', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 06:19:17', '2018-01-17 06:19:17', '2019-01-17 11:49:17'),
('da68d931f6f35d4b01553e7b1efd94524c82c533edc66d335805ac29d73fa1b5652e58a465225b08', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 06:00:55', '2018-01-17 06:00:55', '2019-01-17 11:30:55'),
('df6e23b9a332a086ec2856be8982da35b6a672c8d4989c68d44e18f7f53d560caab6923b8d7199c2', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 06:01:25', '2018-01-17 06:01:25', '2019-01-17 11:31:25'),
('dfd9ef8d57b895270c7c15b51572a4de379f2457e1bd427d1ff13772f9b23683690c956f7990bbe4', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-03-06 05:36:10', '2018-03-06 05:36:10', '2019-03-06 11:06:10'),
('e037e1a7bb2d071d277349f9a8a4f575999368c77cd7a985070a2373f9afb77e7891c998a21137ae', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 05:59:28', '2018-01-17 05:59:28', '2019-01-17 11:29:28'),
('e2515394adc567eb960a22021dee25e67916f380387d740f826cb26fd2ec2ff16edcd83cf68bbab2', 3, 1, 'MyApp', 'WEB', '', '[]', 0, '2018-01-10 11:28:46', '2018-01-10 11:28:46', '2019-01-10 16:58:46'),
('e2cec352661f8a570321bf0970e86259ae82b2d0d30ca5177f58455bc9571aad2b564f88e23d722d', 3, 1, 'MyApp', 'WEB', '', '[]', 0, '2018-01-10 11:29:37', '2018-01-10 11:29:37', '2019-01-10 16:59:37'),
('e4ca7440116e25245edb378dbb29b9b685fffccb2db39b1cc4cfc37534130e41d4452daed5b55f9a', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 06:05:49', '2018-01-17 06:05:49', '2019-01-17 11:35:49'),
('e68b1f5b7ea057220fdc4fce6884ddb403ee2425ebc6758692ecb7450f7293b17729468eeecd451b', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 05:27:32', '2018-01-17 05:27:32', '2019-01-17 10:57:32'),
('e8d9996b89e7eaa4af278709e361ee5913cd6858bca1160be068e44af852f133b2ae65dcfe645dd8', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 05:09:50', '2018-01-17 05:09:50', '2019-01-17 10:39:50'),
('e976f4d43d08323afd3c5728e8746d247b828a775f53b18fd68b715a0dff531b94908405906e3639', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 06:19:50', '2018-01-17 06:19:50', '2019-01-17 11:49:50'),
('fca383cb5bbffe7993717b4f1c2892ccd0d0fcecb869414671320d667280c7cb575c754cb923eae7', 11, 1, 'MyApp', 'WEB', 'sdfsdfsdfsdf', '[]', 0, '2018-01-17 06:21:51', '2018-01-17 06:21:51', '2019-01-17 11:51:51'),
('fd93519c7a347a5a5dd33e9c03192e282e49a617eee913f895d7ae73bfea089fed59b4fa167ce847', 1, 1, 'MyApp', 'WEB', '', '[]', 0, '2018-01-03 03:38:45', '2018-01-03 03:38:45', '2019-01-03 09:08:45'),
('fe8c1e6f6a44b921c688d04725a970292601cbb0de4952b83a574f394de9de34e4ea2094cf4f51d9', 2, 1, 'MyApp', 'WEB', '', '[]', 0, '2018-01-10 11:11:16', '2018-01-10 11:11:16', '2019-01-10 16:41:16'),
('fec38d2be83eca0c85d11f9364ea44991b9bd32366302841492a5f7662e0f4f487b7f24c8cd63d71', 3, 1, 'MyApp', 'WEB', '', '[]', 0, '2018-01-10 11:29:20', '2018-01-10 11:29:20', '2019-01-10 16:59:20');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'lW0iNUvbXchKt408MavwqSX6BGZdDTufARTJBuPm', 'http://localhost', 1, 0, 0, '2017-12-23 00:49:58', '2017-12-23 00:49:58'),
(2, NULL, 'Laravel Password Grant Client', 'IOw3e9dD6U3sr2LUlbzbjjuNBuZDvPzprHeunwjQ', 'http://localhost', 0, 1, 0, '2017-12-23 00:49:58', '2017-12-23 00:49:58'),
(3, 1, 'android', 'HNTJLmW8mgPEQMrWnEnJSMOugMlj0JV6PXp4FaCV', 'login', 0, 0, 0, '2017-12-23 01:56:47', '2017-12-23 01:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-12-23 00:49:58', '2017-12-23 00:49:58');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`id`, `access_token_id`, `revoked`, `expires_at`) VALUES
('cd7dd7e70c71ead651e070f9b096c09f4fa71aef22207bbf56b7e5dea52fcdd24071f144767ca548', 'c95991c77ba750e0c450ec87d70ee39c84f24e7c2961942543a3db96a0fcc2f5987a0afadf7db301', 0, '2018-03-03 18:47:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` int(10) UNSIGNED NOT NULL,
  `lat` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `lat`, `long`, `name`, `updated_at`, `created_at`) VALUES
(1, '23.061346', '72.5543635', 'zydus cadila near Ground, Ahmedabad, Gujarat', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '23.0734262', '72.62657100000001', 'Hansol, Ahmedabad, Gujarat 380003, India', '2018-03-28 16:59:23', '2018-03-28 15:49:08'),
(3, '28.515607543676374', '77.37162876440425', 'Jaypee Hospital Rd, Goberdhanpur, Sector 128, Shahpur Govardhanpur Bangar, Uttar Pradesh 201304, India', '2018-03-28 17:02:07', '2018-03-28 17:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sport_types`
--

CREATE TABLE `sport_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_hover` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `game_time` decimal(10,2) NOT NULL DEFAULT '90.00' COMMENT 'In minite',
  `no_of_player` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sport_types`
--

INSERT INTO `sport_types` (`id`, `name`, `icon`, `icon_hover`, `game_time`, `no_of_player`, `created_at`, `updated_at`) VALUES
(1, 'Football', 'sports/hollyball.png', 'sports/hollyball-hover.png', '90.00', '7,8,9,10,11,12', '2018-01-11 00:00:00', '2018-01-11 00:00:00'),
(2, 'Basketball', 'sports/basketball.png', 'sports/basketball-hover.png', '90.00', '3,5', '2018-01-11 00:00:00', '2018-01-11 00:00:00'),
(3, 'Tennis', 'sports/game.png', 'sports/game-hover.png', '90.00', '1,2', '2018-01-11 00:00:00', '2018-01-11 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mode` enum('MOF','LEAGUE') COLLATE utf8mb4_unicode_ci NOT NULL,
  `sport_type_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `win` decimal(10,0) NOT NULL DEFAULT '0',
  `loose` decimal(10,0) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `icon`, `mode`, `sport_type_id`, `user_id`, `created_at`, `updated_at`, `win`, `loose`) VALUES
(1, 'Kelvin1', 'teams/5f5c78aa5f5a1376889ba96ec9824c401517478010924.jpg', 'LEAGUE', 1, 2, '2018-02-01 09:40:10', '2018-03-19 07:15:10', '0', '0'),
(2, 'Kelvin2', 'teams/8840687299a3a0e573e58d66e86498d11517573782626.jpg', 'LEAGUE', 1, 2, '2018-02-02 12:16:23', '2018-04-04 11:14:11', '1', '0'),
(3, 'Kelvin3', 'teams/abdf6262c2d4377f2ec30f5eb1523fd71517574237299.jpg', 'LEAGUE', 1, 2, '2018-02-02 12:23:57', '2018-04-04 11:14:11', '0', '1'),
(4, 'A', 'teams/default.png', 'MOF', 1, 1, '2018-02-02 12:53:18', '2018-02-02 12:53:18', '0', '0'),
(5, 'B', 'teams/default.png', 'MOF', 1, 1, '2018-02-02 12:53:18', '2018-02-02 12:53:18', '0', '0'),
(6, 'A', 'teams/default.png', 'MOF', 2, 11, '2018-02-05 09:19:19', '2018-02-05 09:19:19', '0', '0'),
(7, 'B', 'teams/default.png', 'MOF', 2, 11, '2018-02-05 09:19:19', '2018-02-05 09:19:19', '0', '0'),
(8, 'Kelvin4', 'teams/a4fe4e6ecad0e7a1fcf2c20127ab73371518160234934.jpg', 'LEAGUE', 1, 2, '2018-02-09 07:10:34', '2018-02-09 07:10:34', '0', '0'),
(9, 'Kelvin5', 'teams/fb3ccb818391b4c87f103743512eb1d81518166304415.jpg', 'LEAGUE', 1, 2, '2018-02-09 08:51:44', '2018-02-09 08:51:44', '0', '0'),
(10, 'Kelvin6', 'teams/a38cc7cdfec35da79b4019f63b496b6f1522141926338.jpg', 'LEAGUE', 1, 1, '2018-03-27 09:12:06', '2018-03-27 09:12:06', '0', '0'),
(11, 'Kelvin7', 'teams/c2d223c9b53d59ccd4d218d93a00afe81522141948207.jpg', 'LEAGUE', 1, 1, '2018-03-27 09:12:28', '2018-03-27 09:12:28', '0', '0'),
(12, 'Kelvin75', 'teams/9d7b7831841e445fa4fd76430578ba4b1522141955654.jpg', 'LEAGUE', 1, 1, '2018-03-27 09:12:35', '2018-03-27 09:12:35', '0', '0'),
(13, 'Kelvin45', 'teams/d9f4ba6a11afd8883e4247771cb5e6231522141969470.jpg', 'LEAGUE', 1, 1, '2018-03-27 09:12:49', '2018-03-27 09:12:49', '0', '0'),
(14, 'Kelvin23', 'teams/58d6aacfc4275384a2a4b53bce2433711522141995464.jpg', 'LEAGUE', 1, 1, '2018-03-27 09:13:15', '2018-03-27 09:13:15', '0', '0'),
(16, 'Kelvin43', 'teams/4bd745961c0fadd77e1efc3c106bd21f1522144962316.jpg', 'LEAGUE', 1, 1, '2018-03-27 10:02:42', '2018-03-27 10:02:42', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `team_players`
--

CREATE TABLE `team_players` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` enum('CAPTION','PLAYER') NOT NULL DEFAULT 'PLAYER'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `team_players`
--

INSERT INTO `team_players` (`id`, `team_id`, `user_id`, `type`) VALUES
(2, 2, 2, 'CAPTION'),
(3, 3, 2, 'CAPTION'),
(4, 4, 1, 'CAPTION'),
(5, 6, 11, 'CAPTION'),
(6, 1, 1, 'CAPTION'),
(7, 8, 2, 'CAPTION'),
(8, 9, 2, 'CAPTION'),
(9, 7, 2, 'PLAYER'),
(10, 2, 4, 'PLAYER'),
(11, 10, 1, 'CAPTION'),
(12, 11, 1, 'CAPTION'),
(13, 12, 1, 'CAPTION'),
(14, 13, 1, 'CAPTION'),
(15, 14, 1, 'CAPTION'),
(17, 16, 1, 'CAPTION');

-- --------------------------------------------------------

--
-- Table structure for table `team_player_invite`
--

CREATE TABLE `team_player_invite` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `team_player_invite`
--

INSERT INTO `team_player_invite` (`id`, `team_id`, `user_id`) VALUES
(1, 10, 4),
(2, 11, 4);

-- --------------------------------------------------------

--
-- Table structure for table `team_points`
--

CREATE TABLE `team_points` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `point` decimal(10,0) NOT NULL DEFAULT '0',
  `sport_type_id` int(11) NOT NULL,
  `type` enum('POINT','RATTING') NOT NULL DEFAULT 'POINT'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `team_points`
--

INSERT INTO `team_points` (`id`, `team_id`, `point`, `sport_type_id`, `type`) VALUES
(1, 2, '600', 1, 'POINT');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date DEFAULT '2000-12-01',
  `mobile_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_size` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('MALE','FEMALE','OTHER') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'MALE',
  `facebook_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_set_password` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_picture` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_picture_thumb` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` int(11) NOT NULL DEFAULT '0',
  `verify_token` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `is_block` tinyint(1) NOT NULL DEFAULT '0',
  `is_favourite` int(11) NOT NULL DEFAULT '0',
  `type` enum('USER','ADMIN') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USER'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `email`, `password`, `date_of_birth`, `mobile_no`, `user_size`, `idol`, `gender`, `facebook_id`, `is_set_password`, `remember_token`, `created_at`, `updated_at`, `profile_picture`, `profile_picture_thumb`, `is_verified`, `verify_token`, `is_block`, `is_favourite`, `type`) VALUES
(1, 'kelvin', 'Kelvins', 'Patels', 'kelvin.arvaan@gmail.com', '$2y$10$DCZqC1pthuXrt..0T8ECr.Jwu.cTuXIShimYUSrmFBPBVe5e.nMz.', '1991-10-02', '9898253859', '', '', 'MALE', '123456789', 1, 'tLLvSpvWHdr5SNRTVRmsywo5SivUCyur7XUo4sW2cWbLzrmcIyNZ6GdeiBau', '2018-01-02 04:36:33', '2018-03-19 07:16:43', 'users/ff099e15973a1da60ff226ff6b11c0391515754497291.jpg', 'users/thumb/ff099e15973a1da60ff226ff6b11c0391515754497291.jpg', 1, '', 0, 1, 'ADMIN'),
(2, 'kelvin1', 'kelvin', 'patel', 'kelvinarvaan@gmail.com', '$2y$10$DCZqC1pthuXrt..0T8ECr.Jwu.cTuXIShimYUSrmFBPBVe5e.nMz.', '2000-01-01', '', '', '', 'MALE', '', 0, NULL, '2018-01-02 04:55:21', '2018-01-02 04:56:29', 'users/user.jpg', 'users/thumb/user.jpg', 1, '', 0, 0, 'USER'),
(3, '', 'Kelvin', 'Patel', 'k.elvin.arvaan@gmail.com', '', '2000-01-01', '', '', '', 'MALE', '1975178572803922', 1, NULL, '2018-01-02 05:39:06', '2018-02-21 12:45:59', 'users/228aac961fe1c88b0b0c86f223c31b241519217154255.jpg', 'users/thumb/228aac961fe1c88b0b0c86f223c31b241519217154255.jpg', 1, '', 0, 0, 'USER'),
(4, '', 'kelvin', 'patel', 'kelv.ina.rv.aa.n@gmail.com', '$2y$10$mpcH9hAsmZqmJa3UFP4BOe48k4wsl0VQLtkQWWLPHS1do7MhJrqi2', '2000-01-01', '', '', '', 'MALE', '', 0, NULL, '2018-01-03 03:28:10', '2018-01-03 03:28:10', 'users/user.jpg', 'users/thumb/user.jpg', 0, '489fd6067b43d2c459187bd931795e8cf94c4e5a', 0, 0, 'USER'),
(5, 'dilip111', 'Dilip', 'Mokariya', 'dilip.arvaan@gmail.com', '$2y$10$KwKqpTYeI1Zrg7GLo47rierFYcf.dwao0MYrQCT0nH3EDOBXinruS', '2000-01-01', '123456489', '', '', 'MALE', '', 0, NULL, '2018-01-04 08:36:18', '2018-01-04 08:46:20', 'users/user.jpg', 'users/thumb/user.jpg', 0, '76df555a32b812eef7754f1d1240072263b15a35', 0, 0, 'USER'),
(6, '', 'kelvin', 'patel', 'kelv.ina.rv.a.a.n@gmail.com', '$2y$10$0HSykSInyvkfIUKHikud4efi/h2F2sV75gTfiZ3ToCV7xaH5VMW2q', '2000-01-01', '', '', '', 'MALE', '', 0, NULL, '2018-01-10 11:15:35', '2018-01-10 11:15:35', 'users/user.jpg', 'users/thumb/user.jpg', 0, '0b258f69135363cc1fecae525e6de9f178dcff61', 0, 0, 'USER'),
(7, '', 'kelvin', 'patel', 'kelv.i.na.rv.a.a.n@gmail.com', '$2y$10$9Prnvn4HTLVKUpMu/UnuCOWIpRRhg5Z1IG/kwYFEGJ7Rwmf.BLPwO', '2000-01-01', '', '', '', 'MALE', '', 0, NULL, '2018-01-10 11:16:51', '2018-01-10 11:16:51', 'users/user.jpg', 'users/thumb/user.jpg', 0, '', 0, 0, 'USER'),
(8, '', 'kelvin', 'patel', 'k.elv.i.na.rv.a.a.n@gmail.com', '$2y$10$e2rY51NV/6jBUT3n50BzDOdT3bklJunzcCwI5oEuy5139c7rsmdr6', '2000-01-01', '', '', '', 'MALE', '', 0, NULL, '2018-01-10 11:20:49', '2018-01-10 11:20:50', 'users/user.jpg', 'users/thumb/user.jpg', 0, '797a978570a271d10a69e5abe0a02f9c2d5ea1e8', 0, 0, 'USER'),
(9, '', 'kelvin', 'patel', 'k.elv.i.na.r.v.a.a.n@gmail.com', '$2y$10$aD.5Yb0BfpukXh6GXfPGT.ADnjlFameWg4xRSnajyAulN9ckeHp7O', '2000-01-01', '', '', '', 'MALE', '', 0, NULL, '2018-01-10 11:24:17', '2018-01-10 11:24:17', 'users/user.jpg', 'users/thumb/user.jpg', 0, '9e9f703a0bb6c833a3fbbb683e549bdea5fb3256', 0, 0, 'USER'),
(10, '', 'kelvin', 'patel', 'k.elv.i.n.a.r.v.a.a.n@gmail.com', '$2y$10$sb8u1FKNtN3OjTCppGV2k.fTTx1z1nxY3.swu7ZKN8OQSRP57lejy', '2000-01-01', '', '', '', 'MALE', '', 0, NULL, '2018-01-10 11:41:22', '2018-01-10 11:41:22', 'users/user.jpg', 'users/thumb/user.jpg', 0, '2374bfec323815b6efb156eb8c416689e074de4f', 0, 0, 'USER'),
(11, '', 'kelvin', 'patel', 'k.el.v.i.n.a.r.v.a.a.n@gmail.com', '$2y$10$.iY5DJ972AKotUJ0TlNyq.54IOH/Jbkx72mLyjQ5pg9UwIQ3b6f/O', '2000-01-01', '', '', '', 'MALE', '', 0, NULL, '2018-01-10 11:42:03', '2018-01-10 11:42:04', 'users/user.jpg', 'users/thumb/user.jpg', 0, '9dc3baabcb04e6b29c7bf34d7b02b7c7ae26b9ad', 0, 0, 'USER'),
(12, '', 'Kunal', 'Patel', 'kunal.arvaan@gmail.com', '', '2000-01-01', '', '', '', 'MALE', '355847318157291', 1, NULL, '2018-02-21 12:50:12', '2018-02-21 12:50:19', 'users/6e5cae539cd1b663632edd284d96d2c51519217416857.jpg', 'users/thumb/6e5cae539cd1b663632edd284d96d2c51519217416857.jpg', 1, '', 0, 0, 'USER');

-- --------------------------------------------------------

--
-- Table structure for table `users_blocks`
--

CREATE TABLE `users_blocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `block_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_blocks`
--

INSERT INTO `users_blocks` (`id`, `user_id`, `block_id`, `created_at`, `updated_at`) VALUES
(4, 1, 2, '2018-01-02 06:01:48', '2018-01-02 06:01:48'),
(5, 1, 3, '2018-01-02 06:01:48', '2018-01-15 18:30:00'),
(6, 1, 4, '2018-01-03 18:30:00', '2018-01-02 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `users_friends`
--

CREATE TABLE `users_friends` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_friends`
--

INSERT INTO `users_friends` (`id`, `user_id`, `friend_id`, `created_at`, `updated_at`) VALUES
(15, 1, 2, NULL, NULL),
(16, 2, 1, NULL, NULL),
(19, 5, 1, '2018-01-08 07:11:07', '2018-01-08 07:11:07'),
(20, 1, 5, '2018-01-08 07:11:07', '2018-01-08 07:11:07'),
(27, 1, 3, '2018-01-12 07:21:10', '2018-01-12 07:21:10'),
(28, 3, 1, '2018-01-12 07:21:10', '2018-01-12 07:21:10'),
(35, 1, 6, '2018-01-19 11:10:34', '2018-01-19 11:10:34'),
(36, 6, 1, '2018-01-19 11:10:34', '2018-01-19 11:10:34'),
(37, 1, 4, '2018-02-09 07:37:56', '2018-02-09 07:37:56'),
(38, 4, 1, '2018-02-09 07:37:56', '2018-02-09 07:37:56');

-- --------------------------------------------------------

--
-- Table structure for table `users_friend_request`
--

CREATE TABLE `users_friend_request` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_game_wins`
--

CREATE TABLE `user_game_wins` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sport_type_id` int(11) NOT NULL,
  `game_wins` decimal(10,0) NOT NULL DEFAULT '0',
  `game_loose` decimal(10,0) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_game_wins`
--

INSERT INTO `user_game_wins` (`id`, `user_id`, `sport_type_id`, `game_wins`, `game_loose`) VALUES
(1, 4, 1, '4', '0'),
(4, 1, 1, '0', '2'),
(5, 2, 1, '0', '2');

-- --------------------------------------------------------

--
-- Table structure for table `user_messages`
--

CREATE TABLE `user_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `chat_message_id` int(11) NOT NULL,
  `is_read` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_messages`
--

INSERT INTO `user_messages` (`id`, `user_id`, `chat_message_id`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 2, 7, 0, NULL, '2018-03-27 11:43:19'),
(2, 2, 8, 1, NULL, '2018-03-29 05:25:50'),
(3, 2, 9, 0, NULL, '2018-03-27 11:54:12'),
(4, 2, 10, 0, NULL, '2018-03-27 11:54:12'),
(5, 3, 9, 0, NULL, '2018-03-27 11:54:12'),
(6, 2, 11, 0, NULL, '2018-03-27 11:54:12');

-- --------------------------------------------------------

--
-- Table structure for table `user_points`
--

CREATE TABLE `user_points` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `point` decimal(10,0) NOT NULL,
  `type` enum('POINT','RATTING') NOT NULL,
  `sport_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_points`
--

INSERT INTO `user_points` (`id`, `user_id`, `point`, `type`, `sport_type_id`) VALUES
(1, 1, '100', 'POINT', 1),
(2, 3, '200', 'POINT', 1),
(3, 1, '178', 'POINT', 3),
(4, 2, '178', 'RATTING', 1),
(5, 4, '200', 'RATTING', 3),
(6, 1, '100', 'RATTING', 2),
(7, 11, '20', 'POINT', 2),
(8, 4, '90', 'POINT', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cron_jobs`
--
ALTER TABLE `cron_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game_player_invite`
--
ALTER TABLE `game_player_invite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game_teams`
--
ALTER TABLE `game_teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game_team_invite`
--
ALTER TABLE `game_team_invite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game_team_players`
--
ALTER TABLE `game_team_players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_chats`
--
ALTER TABLE `group_chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_user_map`
--
ALTER TABLE `notification_user_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `sport_types`
--
ALTER TABLE `sport_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_players`
--
ALTER TABLE `team_players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_player_invite`
--
ALTER TABLE `team_player_invite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_points`
--
ALTER TABLE `team_points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_blocks`
--
ALTER TABLE `users_blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_friends`
--
ALTER TABLE `users_friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_friend_request`
--
ALTER TABLE `users_friend_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_game_wins`
--
ALTER TABLE `user_game_wins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_messages`
--
ALTER TABLE `user_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_points`
--
ALTER TABLE `user_points`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cron_jobs`
--
ALTER TABLE `cron_jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `game_player_invite`
--
ALTER TABLE `game_player_invite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `game_teams`
--
ALTER TABLE `game_teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `game_team_invite`
--
ALTER TABLE `game_team_invite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `game_team_players`
--
ALTER TABLE `game_team_players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `group_chats`
--
ALTER TABLE `group_chats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `notification_user_map`
--
ALTER TABLE `notification_user_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sport_types`
--
ALTER TABLE `sport_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `team_players`
--
ALTER TABLE `team_players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `team_player_invite`
--
ALTER TABLE `team_player_invite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `team_points`
--
ALTER TABLE `team_points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users_blocks`
--
ALTER TABLE `users_blocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users_friends`
--
ALTER TABLE `users_friends`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `users_friend_request`
--
ALTER TABLE `users_friend_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_game_wins`
--
ALTER TABLE `user_game_wins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_messages`
--
ALTER TABLE `user_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_points`
--
ALTER TABLE `user_points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
