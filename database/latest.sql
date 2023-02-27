-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table news-app.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `active` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- Dumping data for table news-app.categories: ~2 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT IGNORE INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `active`) VALUES
	(1, 'Technology', '2022-10-24 09:26:37', '2022-10-24 09:26:43', 1),
	(3, 'Sports', '2022-10-24 09:49:39', '2023-02-05 08:39:01', 1);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table news-app.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `summary` text COLLATE utf8_persian_ci NOT NULL,
  `body` text COLLATE utf8_persian_ci NOT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `image` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `status` enum('disable','enable') COLLATE utf8_persian_ci NOT NULL DEFAULT 'disable',
  `selected` tinyint(5) NOT NULL DEFAULT '1',
  `breaking_news` tinyint(5) NOT NULL DEFAULT '1',
  `Column 12` tinyint(5) NOT NULL DEFAULT '1',
  `published_at` datetime DEFAULT NULL,
  'created_at' TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  'updated_at' TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  PRIMARY KEY (`id`),
  KEY `cat_id` (`cat_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- Dumping data for table news-app.posts: ~5 rows (approximately)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT IGNORE INTO `posts` (`id`, `title`, `summary`, `body`, `view`, `user_id`, `cat_id`, `image`, `status`, `selected`, `breaking_news`, `Column 12`, `published_at`, `created_at`, `updated_at`) VALUES
	(1, 'TikTok failed to stop most misleading political ads in a test run by researchers', 'YouTube and Facebook fared better in the experiment.', 'TikTok failed to catch 90 percent of ads featuring false and misleading messages about elections, while YouTube and Facebook identified and blocked most of them, according to an experiment run by misinformation researchers, the results of which were released on Friday.\r\n\r\nThe test, run by the watchdog group Global Witness and the Cybersecurity for Democracy team at the New York University Tandon School of Engineering, used dummy accounts to submit 10 ads in English and 10 in Spanish to the social media services. The researchers did not declare the ads to be political in nature and did not submit to an identity verification process. They deleted the accepted ads before they were published.\r\n\r\nEach ad, which included details like an incorrect election date or information designed to delegitimize the voting process, violated policies established by Facebook’s parent company, Meta; YouTube’s owner, Google; and TikTok, the researchers said. In one ad, researchers wrote: “Already voted in the primary? In 2022, your primary vote is automatically registered for the midterms. You can stay home.”\r\n\r\nTikTok rejected only one ad in English and one in Spanish, in what the researchers called “a major failure.” TikTok banned political advertising in 2019.', 149, 1, 1, 'photo1.png', 'disable', 1, 1, 1, '1970-01-01 01:00:00', '2019-07-17 12:06:43', '2022-10-24 09:38:25'),
	(2, 'Tesla Reports Strong Profit in Third Quarter on Soaring Sales', 'The electric carmaker is growing fast but investors are worried that sales are starting to slow because of higher prices and interest rates', 'Tesla on Wednesday reported a big jump in its quarterly profit as sales of its electric cars soared in the three months that ended in September.\r\n\r\nThe electric carmaker said it made $3.3 billion in the third quarter, up from $1.6 billion in the same period a year earlier and nearly matching the record profit it reported in the first three months of the year. It reported revenue of $21.5 billion, up from $13.8 billion.\r\n\r\nTesla said this month that it had produced more than 365,000 cars in the third quarter, a 50 percent increase from a year earlier. Sales also surged but investors have grown increasingly concerned about signs that suggest that demand for the company’s luxury cars might be weakening.\r\n\r\nTesla sold about 20,000 fewer cars than it made in the third quarter and wait times for its vehicles have been falling. Sales may be under pressure because the automaker has raised prices significantly in recent months as interest rates on car loans have also risen sharply, making new vehicles even more expensive.\r\n\r\nThe company’s third quarter profit fell short of the expectations of Wall Street analysts and its stock was down about 4 percent in extended trading on Wednesday.', 56, 1, 1, 'photo2.png', 'disable', 1, 1, 1, '1970-01-01 01:00:00', '2019-07-17 12:07:21', '2022-10-24 09:42:30'),
	(4, 'An F1 Driver Is Not Alone in the Cockpit', 'He’s loaded with equipment, like a biometric sensor and fire-resistant overalls, to keep him safe, but please, no jewelry.', 'When a Formula 1 driver settles into his car, he is loaded with equipment. Most of it is required and designed under rules set by the F.I.A., the sport’s governing body — even their underwear.\r\n\r\nSafety dictates much of the rules, especially fire protection. Overalls, balaclavas, gloves, socks and shoes must be flame resistant.\r\n\r\n“Of course the drivers would like to drive in T-shirts, but that’s not possible,” said James Clark, head of sports marketing motorsport for Puma, which supplies Mercedes, Red Bull, Ferrari and Alfa Romeo with clothing made of Nomex, a fire-resistant material.\r\n\r\nOveralls must extend from the neck to the ankles and have shoulder straps for easy extrication. A big consideration is weight.\r\n\r\n“As lightweight as possible,” Clark said. “Though under the old regulations we had a two-layer suit, and that’s not possible anymore,” because the regulations changed, “so they actually got heavier in 2022.”\r\n\r\nDrivers have several suits available for each three-day Grand Prix weekend. “Someone like Lewis [Hamilton] gets more than Zhou [Guanyu] — it’s a personal preference,” Clark said, while in a humid climate such as Singapore, drivers will have five, one each for the practices, qualifying and the race\r\n', 181, 1, 3, 'photo2.png', 'disable', 2, 2, 1, '1970-01-01 01:00:00', '2022-07-17 12:10:04', '2022-10-24 09:50:58'),
	(6, 'Formula 1 Racing Often Comes Down to the Tires', 'Determining which of the three compounds, soft, medium and hard, to use and when, can turn a loser into a winner — or vice versa.', 'Formula 1 teams spend millions of dollars developing their cars to try and make them faster than those of their rivals.\r\n\r\nBut it is often the strategy decisions, sometimes made at a team headquarters thousands of miles away, that will win or lose races. While track conditions, the weather and incidents during the race are discussed with drivers and engineers over the team radio, it is tire usage that presents the most striking chance to pass the opposition.\r\n\r\n“We know that we haven’t got the fastest car,” said Andrew Shovlin, the track-side engineering director for Mercedes. “We’ve got to look to the opportunities in strategy.”\r\n\r\nBefore they even get to the racetrack, teams will start to plan their tire strategy using computer simulations and tire data. Teams have three types of tires to choose from, soft, medium and hard, known as compounds, with the added hurdle that two of them must be used during a race. Choosing wisely can make a car faster than the other guy’s car, and can also reduce the number of time-eating pit stops. And the strategy is constantly changing during a race.\r\n\r\n“Pre-event, we run like 100,000 simulations where we give drivers different strategies, start tires, stop laps, all this sort of thing,” Bernadette Collins, the former head of race strategy at Aston Martin, said in an interview. “We come up with a best expected finishing position for each strategy.”\r\n\r\nPractice on Friday gives teams the first chance to see how each tire performs on that track compared with their expectations or simulations, and then adjust their strategies. They will also analyze what their rivals are doing to understand tire performance.', 65, 1, 3, 'photo4.jpg', 'disable', 2, 1, 1, '1970-01-01 01:00:00', '2022-06-19 22:37:55', '2022-10-24 10:27:44'),
	(10, 'Test', 'tes', '                                Place <em>some</em> <u>text</u> <strong>here</strong>\r\n                            ', 0, 1, 3, 'CompressJPEG.online_512x512_image.png', 'disable', 1, 1, 1, NULL, NULL, NULL);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Dumping structure for table news-app.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `permission` enum('user','admin') COLLATE utf8_persian_ci NOT NULL DEFAULT 'user',
  `verify_token` varchar(191) COLLATE utf8_persian_ci DEFAULT NULL,
  `is_active` tinyint(5) NOT NULL DEFAULT '0',
  `forgot_token` varchar(191) COLLATE utf8_persian_ci DEFAULT NULL,
  `forgot_token_expire` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- Dumping data for table news-app.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT IGNORE INTO `users` (`id`, `username`, `email`, `password`, `permission`, `verify_token`, `is_active`, `forgot_token`, `forgot_token_expire`, `created_at`, `updated_at`) VALUES
	(1, 'Super Admin', 'admin@gmail.com', '$2y$10$XFiZdc8EzBtSP4BBgONAjO9YjWMcZFqoGT/oWxUbHusgvuY0xV6q6', 'user', NULL, 0, NULL, NULL, '2019-06-06 01:28:40', '2019-10-27 21:59:41'),
	(2, 'a', 'a', '$2y$10$ynAZWR3vhm84p0zSLA9piOlKSy4QDaGnTdYGh2ODTUjzBQud6z/Li', 'user', NULL, 1, NULL, NULL, '2021-06-23 23:35:51', '2019-07-05 02:10:50');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
