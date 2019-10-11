-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 19-08-23 18:28
-- 서버 버전: 10.3.16-MariaDB
-- PHP 버전: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `bd4e14da537fb61f5a5b49b35fffe5c6b9b43a741476dead00ce395d10b8aca2`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `/2019/06/28/mogacko01`
--

CREATE TABLE `/2019/06/28/mogacko01` (
  `CommentUserId` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateTime` datetime NOT NULL,
  `ProfileImageFileName` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CommentIndex` int(11) NOT NULL,
  `EmotionalAnalysisValue` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `/2019/06/28/mogacko01_result`
--

CREATE TABLE `/2019/06/28/mogacko01_result` (
  `CommentUserId` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateTime` datetime NOT NULL,
  `ProfileImageFileName` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CommentIndex` int(11) NOT NULL,
  `EmotionalAnalysisValue` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `/2019/06/28/mogacko01_result`
--

INSERT INTO `/2019/06/28/mogacko01_result` (`CommentUserId`, `Content`, `DateTime`, `ProfileImageFileName`, `CommentIndex`, `EmotionalAnalysisValue`) VALUES
('jopemachine', 'ë¶„ë…¸ì˜ ì§ˆì£¼ ì•ˆ ë³´ì‹  ë¶„ë“¤ ë“¤ì–´ì˜¤ì„¸ìš” ì´ê±¸ë¡œ ì‹œìž‘í•˜ì‹œë©´ ë©ë‹ˆë‹¤', '2019-08-14 16:52:20', 'jopemachine.jpg', 3, 4);

-- --------------------------------------------------------

--
-- 테이블 구조 `/2019/07/02/mogacko02`
--

CREATE TABLE `/2019/07/02/mogacko02` (
  `CommentUserId` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateTime` datetime NOT NULL,
  `ProfileImageFileName` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CommentIndex` int(11) NOT NULL,
  `EmotionalAnalysisValue` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `/2019/07/02/mogacko02`
--

INSERT INTO `/2019/07/02/mogacko02` (`CommentUserId`, `Content`, `DateTime`, `ProfileImageFileName`, `CommentIndex`, `EmotionalAnalysisValue`) VALUES
('jopemachine', '1íŽ¸ë³´ë‹¤ ë” ê·€ì—½ê³  ìž”ë§ìŠ¤ëŸ¬ì›Œì§€ëŠ” íŽ«ë“¤ì„ ë³´ëŠ” ìž¬ë¯¸ ã… ã… ', '2019-08-14 16:51:56', 'jopemachine.jpg', 1, 39);

-- --------------------------------------------------------

--
-- 테이블 구조 `/2019/07/02/mogacko02_result`
--

CREATE TABLE `/2019/07/02/mogacko02_result` (
  `CommentUserId` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateTime` datetime NOT NULL,
  `ProfileImageFileName` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CommentIndex` int(11) NOT NULL,
  `EmotionalAnalysisValue` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `/2019/07/02/mogacko02_result`
--

INSERT INTO `/2019/07/02/mogacko02_result` (`CommentUserId`, `Content`, `DateTime`, `ProfileImageFileName`, `CommentIndex`, `EmotionalAnalysisValue`) VALUES
('jopemachine', 'ì´ ê¸€ì„ ë³´ì‹  ëª¨ë“ ë¶„ë“¤ ì¸ìƒ ëŒ€ë°•ë‚˜ê³  ê°€ì¡± ëª¨ë‘ê°€ ë§Œìˆ˜ë¬´ê°• ìž…ë‹ˆë‹¤', '2019-08-14 16:51:31', 'jopemachine.jpg', 3, 34);

-- --------------------------------------------------------

--
-- 테이블 구조 `/2019/07/05/mogacko03`
--

CREATE TABLE `/2019/07/05/mogacko03` (
  `CommentUserId` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateTime` datetime NOT NULL,
  `ProfileImageFileName` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CommentIndex` int(11) NOT NULL,
  `EmotionalAnalysisValue` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `/2019/07/05/mogacko03`
--

INSERT INTO `/2019/07/05/mogacko03` (`CommentUserId`, `Content`, `DateTime`, `ProfileImageFileName`, `CommentIndex`, `EmotionalAnalysisValue`) VALUES
('jopemachine', '........................ê¸´ì—¬ìš´', '2019-08-12 17:57:30', 'jopemachine.jpg', 4, 43),
('jopemachine', 'ì•ˆì„±ê¸°ë°°ìš°ë‹˜ì€ ë‚˜ì´ë“œì‹¤ìˆ˜ë¡ ë” ë©‹ìžˆìœ¼ì…”ìš”', '2019-08-14 16:51:04', 'jopemachine.jpg', 5, 21);

-- --------------------------------------------------------

--
-- 테이블 구조 `/2019/07/05/mogacko03_result`
--

CREATE TABLE `/2019/07/05/mogacko03_result` (
  `CommentUserId` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateTime` datetime NOT NULL,
  `ProfileImageFileName` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CommentIndex` int(11) NOT NULL,
  `EmotionalAnalysisValue` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `/2019/07/05/mogacko03_result`
--

INSERT INTO `/2019/07/05/mogacko03_result` (`CommentUserId`, `Content`, `DateTime`, `ProfileImageFileName`, `CommentIndex`, `EmotionalAnalysisValue`) VALUES
('ddwefw2134', 'ê´€ëžŒê°ìž¬ë°Œë„¤ì—¬ ì—­ì‹œ ë°ë“œí’€ ì•„ì‰¬ìš´ê±´ ì›ë³´ë‹¤ëŠ” ì¢€ ...ã…‹ã…‹	', '2019-08-12 17:54:30', 'ddwefw2134.jpg', 2, 45),
('(Anonymous)', 'ìºëŒ€ë°•!! ë³´ê³ ì‹¶ë‹¤;;', '2019-08-12 17:54:45', '', 3, 42),
('(Anonymous)', 'ë³„ë¡œë„¤ìš”. ë‚´ ë§ˆìŒì˜ ë³„ë¡œâ˜…', '2019-08-22 23:04:38', '', 5, -49),
('(Anonymous)', 'í•˜ë‹¤ ë§ì•˜ë‚˜ë³´ë„¤ìš”', '2019-08-22 23:04:48', '', 6, -25),
('(Anonymous)', 'ê±°ì˜ ì¡°ì¡Œë„¤ìš”', '2019-08-22 23:04:58', '', 7, -31),
('(Anonymous)', 'ëŒ€ìƒê°ì´ë„¤ìš”', '2019-08-22 23:05:07', '', 8, -1),
('(Anonymous)', 'ë³„ë¡œë„¤ìš”. ë‚´ ë§ˆìŒì˜ ë³„ë¡œ...', '2019-08-22 23:05:27', '', 9, -49),
('(Anonymous)', 'ëŒ€ìƒê°ì´ë„¤ìš”', '2019-08-22 23:06:16', '', 10, 0),
('(Anonymous)', 'ëŒ€ìƒ ê°€ì¦ˆì•„', '2019-08-22 23:20:22', '', 11, -30),
('(Anonymous)', 'ê°€ì¦ˆì•„', '2019-08-22 23:20:32', '', 12, -22),
('(Anonymous)', 'ëŒ€ìƒ', '2019-08-22 23:20:59', '', 13, -39),
('(Anonymous)', 'ê°€ìž', '2019-08-22 23:21:43', '', 14, -14),
('(Anonymous)', 'ëŒ€ìƒê°ì´ë„¤ìš”!!!', '2019-08-22 23:21:56', '', 15, 41),
('(Anonymous)', 'ëŒ€ìƒê°ì´ë„¤ìš”!!!', '2019-08-22 23:22:12', '', 16, 42),
('(Anonymous)', 'ëŒ€ìƒ!', '2019-08-22 23:23:10', '', 17, 8),
('(Anonymous)', 'ìš°ìˆ˜ìƒê°€ìž', '2019-08-22 23:23:46', '', 18, -9),
('(Anonymous)', 'ìš°ìˆ˜í•˜ë‹¤', '2019-08-22 23:23:55', '', 19, -23);

-- --------------------------------------------------------

--
-- 테이블 구조 `/2019/07/09/mogacko04`
--

CREATE TABLE `/2019/07/09/mogacko04` (
  `CommentUserId` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateTime` datetime NOT NULL,
  `ProfileImageFileName` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CommentIndex` int(11) NOT NULL,
  `EmotionalAnalysisValue` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `/2019/07/09/mogacko04`
--

INSERT INTO `/2019/07/09/mogacko04` (`CommentUserId`, `Content`, `DateTime`, `ProfileImageFileName`, `CommentIndex`, `EmotionalAnalysisValue`) VALUES
('jopemachine', 'ë±ìŠ¤í„° ë¶ˆìŒí•˜ë‹¤ ì˜¤ëŠ˜ í•™êµì—ì„œ ëì„ ë´¤ëŠ”ë° ì§„ì§œ ê°ë™ ìš¸ë»”ã… ã…  ì§„ì§œ ë‹¤ìš´ë°›ê³  ì‹¶ë‹¤.', '2019-08-12 17:50:30', 'jopemachine.jpg', 1, 42),
('jopemachine', 'ëë‚˜ê¸° 8ë¶„ì •ë„ ì „ì¯¤ ë‚˜ì˜¤ëŠ” íƒœê·¹ê¸°.ìš°ë¦¬ë‚˜ë¼ ì—„ë§ˆ...ìš¸ì»¥. íŽ¸í–¥íŽ¸ì§‘+ì§„ì‹¤ê³ ë°œì–¸ë¡ ì¸', '2019-08-12 17:50:40', 'jopemachine.jpg', 2, -29),
('jopemachine', 'ì•žìœ¼ë¡œ ì§„í¬ëŠ” ì–´ë–»ê²Œ ë ê¹Œìš”? ì•„í””ì—†ì´ í–‰ë³µë§Œ ìžˆê¸°ë¥¼..', '2019-08-12 17:50:47', 'jopemachine.jpg', 3, 28),
('jopemachine', 'ë…¸ëž˜ë„ ì¢‹êµ¬. ì£¼ì¸ê³µë“¤ë„ ì¢‹ì•„ìš”', '2019-08-12 17:50:56', 'jopemachine.jpg', 4, 49),
('ddwefw2134', 'ë°°ìš°ë“¤ì˜ ì—°ê¸°ê°€ ì§„ì§œ ë¦¬ì–¼í•¨ã…‹ã…‹ã…‹', '2019-08-12 17:54:13', 'ddwefw2134.jpg', 5, 28),
('(Anonymous)', 'ì™€ ì •ë§ ì‹ ê¸°í•˜ë„¤ìš”.', '2019-08-22 22:58:49', '', 6, 45),
('(Anonymous)', 'ì‹ ê¸°í•´ìš”.', '2019-08-22 22:59:00', '', 7, 17),
('(Anonymous)', 'ì„±ëŠ¥ì ì¸ ë¶€ë¶„ì„ ì¢€ ë” ë³´ì™„í•˜ë©´ ë” ì¢‹ì„ ê²ƒ ê°™ë„¤ìš”. ìˆ˜ê³  ë§Žì•˜ìŠµë‹ˆë‹¤.', '2019-08-22 22:59:35', '', 8, 39),
('(Anonymous)', 'ë‹¨ì ì´ ëª‡ê°œ ë³´ì´ë„¤ìš”.', '2019-08-22 23:00:16', '', 9, 1),
('(Anonymous)', 'ìž„ë² ë”© ë°©ì‹ë•Œë¬¸ì— ê°€ë” ê²°ê³¼ê°€ ì´ìƒí•˜ê²Œ ë‚˜ì˜¤ëŠ”ê²Œ ì•„ì‰½ë„¤ìš”.', '2019-08-22 23:00:51', '', 10, -24),
('(Anonymous)', 'ì•„ì´ë””ì–´ê°€ êµ‰ìž¥ížˆ ìž¬ë¯¸ìžˆë„¤ìš”.!\n', '2019-08-23 14:33:10', '', 11, 49),
('(Anonymous)', 'ì•„ì´ë””ì–´ê°€ êµ‰ìž¥ížˆ ìž¬ë¯¸ìžˆë„¤ìš”.!\n', '2019-08-23 14:33:10', '', 12, 49);

-- --------------------------------------------------------

--
-- 테이블 구조 `/2019/07/09/mogacko04_result`
--

CREATE TABLE `/2019/07/09/mogacko04_result` (
  `CommentUserId` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateTime` datetime NOT NULL,
  `ProfileImageFileName` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CommentIndex` int(11) NOT NULL,
  `EmotionalAnalysisValue` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `/2019/07/09/mogacko04_result`
--

INSERT INTO `/2019/07/09/mogacko04_result` (`CommentUserId`, `Content`, `DateTime`, `ProfileImageFileName`, `CommentIndex`, `EmotionalAnalysisValue`) VALUES
('jopemachine', 'ìµœê³ ì˜ ì˜í™”. 1íŽ¸ë³´ë‹¤ìž¬ë°ŒìŒ ì‹œë¦¬ì¦ˆì¤‘ê°‘ì¼ë“¯', '2019-08-12 17:49:27', 'jopemachine.jpg', 2, 48),
('jopemachine', 'ê°œë´‰ ì‹œê¸°ë¥¼ ìž˜ëª» ê³ ë¥¸ ìš´ ì—†ëŠ” ì˜í™”!! í•˜ì§€ë§Œ ë§¤ë ¥ ë„˜ì¹˜ëŠ” ì˜í™”!!', '2019-08-12 17:49:35', 'jopemachine.jpg', 3, 45),
('jopemachine', 'ê°ˆìˆ˜ë¡ CGë§Œ ì¢‹ì•„ì§€ê³  ë‚˜ë¨¸ì§„ í‡´ë³´í•˜ëŠ” í—ë¦¬ì›ƒ ë¸”ë¡ë²„ìŠ¤í„°ë“¤ë„ ê³¼ê±°ë¥¼ ë°°ì›Œë¼.', '2019-08-12 17:49:44', 'jopemachine.jpg', 4, -46),
('jopemachine', 'ì°¸ ê°ë™ì ì¸ íŽ¸ì´ë„¤.', '2019-08-12 17:49:50', 'jopemachine.jpg', 5, 21),
('jopemachine', 'íŒ½ê·„ë•Œë¬¸ì— 10ì ì¤€ë‹¤.', '2019-08-12 17:49:56', 'jopemachine.jpg', 6, 36),
('jopemachine', '10ì ì¤€ë‹¤.', '2019-08-12 17:50:02', 'jopemachine.jpg', 7, 46),
('jopemachine', 'íŒ½ê·„ë•Œë¬¸ì— ', '2019-08-12 17:50:08', 'jopemachine.jpg', 8, -30),
('jopemachine', 'ã… ã… ìŠ¬í¼ìš”', '2019-08-12 17:50:18', 'jopemachine.jpg', 9, -29);

-- --------------------------------------------------------

--
-- 테이블 구조 `/2019/07/12/mogacko05`
--

CREATE TABLE `/2019/07/12/mogacko05` (
  `CommentUserId` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateTime` datetime NOT NULL,
  `ProfileImageFileName` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CommentIndex` int(11) NOT NULL,
  `EmotionalAnalysisValue` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `/2019/07/12/mogacko05`
--

INSERT INTO `/2019/07/12/mogacko05` (`CommentUserId`, `Content`, `DateTime`, `ProfileImageFileName`, `CommentIndex`, `EmotionalAnalysisValue`) VALUES
('jopemachine', 'ì£½ìŒì„ë‹¤ì‹œí•œë²ˆìƒê°í•´ë³´ëŠ”ì˜í™”ì£¼ìœ„ì‚¬ëžŒë“¤ì´ì†Œì¤‘í•´ì§€ëŠ”ì˜í™”', '2019-08-12 17:48:26', 'jopemachine.jpg', 8, 46),
('jopemachine', 'ì´ê±°ë³´ê³  íŽ‘íŽ‘ ìš¸ì—ˆì–´ìš”ì§„ì§œ ë„ˆë¬´ ìŠ¬í”„ë„¤ìš”', '2019-08-12 17:48:34', 'jopemachine.jpg', 9, 49),
('jopemachine', 'ì£½ìŒì„ë‹¤ì‹œí•œë²ˆìƒê°í•´ë³´ëŠ”ì˜í™”ì£¼ìœ„ì‚¬ëžŒë“¤ì´ì†Œì¤‘í•´ì§€ëŠ”ì˜í™”', '2019-08-12 17:48:43', 'jopemachine.jpg', 10, 46),
('jopemachine', 'ì•„~  ì €ê°ë… ë­ëƒ??	', '2019-08-12 17:48:52', 'jopemachine.jpg', 11, -44),
('jopemachine', 'ì´ëŸ°ê²Œ ì§„ì§œ ì˜í™”ì§€...', '2019-08-12 17:49:01', 'jopemachine.jpg', 12, 30),
('jopemachine', 'ì´ëŸ°ê²Œ ì˜í™”ëƒ', '2019-08-12 17:49:11', 'jopemachine.jpg', 13, -15);

-- --------------------------------------------------------

--
-- 테이블 구조 `/2019/07/12/mogacko05_result`
--

CREATE TABLE `/2019/07/12/mogacko05_result` (
  `CommentUserId` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateTime` datetime NOT NULL,
  `ProfileImageFileName` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CommentIndex` int(11) NOT NULL,
  `EmotionalAnalysisValue` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `/2019/07/12/mogacko05_result`
--

INSERT INTO `/2019/07/12/mogacko05_result` (`CommentUserId`, `Content`, `DateTime`, `ProfileImageFileName`, `CommentIndex`, `EmotionalAnalysisValue`) VALUES
('jopemachine', 'ê´€ëžŒê° í˜„ì‹¤ì´...,..,.,.,.,.,.,', '2019-08-12 17:47:33', 'jopemachine.jpg', 6, 39),
('jopemachine', 'ë…¸ìž¼', '2019-08-12 17:47:41', 'jopemachine.jpg', 7, -49),
('jopemachine', 'ë…¸ìž¼', '2019-08-12 17:47:42', 'jopemachine.jpg', 8, -49);

-- --------------------------------------------------------

--
-- 테이블 구조 `/2019/07/16/mogacko06`
--

CREATE TABLE `/2019/07/16/mogacko06` (
  `CommentUserId` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateTime` datetime NOT NULL,
  `ProfileImageFileName` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CommentIndex` int(11) NOT NULL,
  `EmotionalAnalysisValue` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `/2019/07/16/mogacko06`
--

INSERT INTO `/2019/07/16/mogacko06` (`CommentUserId`, `Content`, `DateTime`, `ProfileImageFileName`, `CommentIndex`, `EmotionalAnalysisValue`) VALUES
('jopemachine', 'ë”ì´ìƒ í• ë§ì´ ì—†ìŒ	', '2019-08-12 17:46:50', 'jopemachine.jpg', 16, -37),
('jopemachine', 'ê·¸ëƒ¥ í•˜ì—¼ì—†ì´ ì£¼ì¸ê¸°ë‹¤ë¦¬ëŠ”... ì§„ë—ê°œë“¤ ì˜ˆê¸°ë„ ìƒê°ë‚˜ê³ ë§Œê° êµì°¨í•˜ë©° ëˆˆë¬¼ì´ ë‚˜ë”ë¼êµ¬ì—¬', '2019-08-12 17:46:57', 'jopemachine.jpg', 17, 41);

-- --------------------------------------------------------

--
-- 테이블 구조 `/2019/07/16/mogacko06_result`
--

CREATE TABLE `/2019/07/16/mogacko06_result` (
  `CommentUserId` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateTime` datetime NOT NULL,
  `ProfileImageFileName` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CommentIndex` int(11) NOT NULL,
  `EmotionalAnalysisValue` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `/2019/07/16/mogacko06_result`
--

INSERT INTO `/2019/07/16/mogacko06_result` (`CommentUserId`, `Content`, `DateTime`, `ProfileImageFileName`, `CommentIndex`, `EmotionalAnalysisValue`) VALUES
('jopemachine', 'ì¤‘ê°„ì— ìŒ©ëš±ë§žì€ ì¸ë¬¼ 2ëª…ë§Œ ë¹¼ë©´ ì¢‹ì€ë° ë³´ê³ ë‚˜ì„œ ì—¬ìš´ì´ ë„ˆë¬´ ë‚¨ì•„ì„œ ë³„10ê°œ...', '2019-08-12 17:46:33', 'jopemachine.jpg', 4, -48),
('jopemachine', 'ì§„ì§œì¶”ì²œìš”!!ì—„ì²­ìž¬ë°Œê³ ë§ˆì§€ë§‰ê°ë™ì—ì†Œë¦„ë‹ì•˜ì–´ìš”!', '2019-08-12 17:46:39', 'jopemachine.jpg', 5, 49);

-- --------------------------------------------------------

--
-- 테이블 구조 `/2019/07/19/mogacko07`
--

CREATE TABLE `/2019/07/19/mogacko07` (
  `CommentUserId` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateTime` datetime NOT NULL,
  `ProfileImageFileName` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CommentIndex` int(11) NOT NULL,
  `EmotionalAnalysisValue` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `/2019/07/19/mogacko07_result`
--

CREATE TABLE `/2019/07/19/mogacko07_result` (
  `CommentUserId` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateTime` datetime NOT NULL,
  `ProfileImageFileName` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CommentIndex` int(11) NOT NULL,
  `EmotionalAnalysisValue` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `/2019/07/19/mogacko07_result`
--

INSERT INTO `/2019/07/19/mogacko07_result` (`CommentUserId`, `Content`, `DateTime`, `ProfileImageFileName`, `CommentIndex`, `EmotionalAnalysisValue`) VALUES
('jopemachine', 'ì§„ì§œ ë‹¤ëžŒì¥ ê·€ì—½ë„¤ìš”^^ê¸€êµ¬ ë…¸ëž˜ë„ ë„ˆë¬´ ì¢‹ê³ ~ì •ë§ê¼­ ë´ë³´ì„¸ìš” ã…Žã…Ž	', '2019-08-12 17:46:01', 'jopemachine.jpg', 1, 49),
('jopemachine', 'ê²¨ìš¸ë‚  ê¼­ì–´ìš¸ë¦¬ëŠ” ì˜í™”', '2019-08-12 17:46:08', 'jopemachine.jpg', 2, 47),
('jopemachine', 'ë“œëž˜ê³¤ ë‚˜ëŒ€ì§€ë§ˆ!!!', '2019-08-12 17:46:16', 'jopemachine.jpg', 3, -16);

-- --------------------------------------------------------

--
-- 테이블 구조 `/2019/07/23/mogacko08`
--

CREATE TABLE `/2019/07/23/mogacko08` (
  `CommentUserId` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateTime` datetime NOT NULL,
  `ProfileImageFileName` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CommentIndex` int(11) NOT NULL,
  `EmotionalAnalysisValue` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `/2019/07/23/mogacko08`
--

INSERT INTO `/2019/07/23/mogacko08` (`CommentUserId`, `Content`, `DateTime`, `ProfileImageFileName`, `CommentIndex`, `EmotionalAnalysisValue`) VALUES
('jopemachine', 'ë„ˆë¬´ë‚˜ìž¬ë¯¸ìžˆê³ ëŒ€ë°•ê°ë™ì ì´ ì—ˆê³ ìŠ¬íŽìŠµë‹ˆë‹¤', '2019-08-12 17:45:48', 'jopemachine.jpg', 2, 49);

-- --------------------------------------------------------

--
-- 테이블 구조 `/2019/07/23/mogacko08_result`
--

CREATE TABLE `/2019/07/23/mogacko08_result` (
  `CommentUserId` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateTime` datetime NOT NULL,
  `ProfileImageFileName` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CommentIndex` int(11) NOT NULL,
  `EmotionalAnalysisValue` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `/2019/07/23/mogacko08_result`
--

INSERT INTO `/2019/07/23/mogacko08_result` (`CommentUserId`, `Content`, `DateTime`, `ProfileImageFileName`, `CommentIndex`, `EmotionalAnalysisValue`) VALUES
('jopemachine', 'ì™„ì „ ì˜ˆìˆ ì´ë‹¤....ê°•ë™ì› ì–¼êµ´ì´ ì˜ˆìˆ ì´ì•¼..', '2019-08-12 17:45:25', 'jopemachine.jpg', 22, 23),
('(Anonymous)', '10ì ', '2019-08-14 16:12:50', '', 23, 48);

-- --------------------------------------------------------

--
-- 테이블 구조 `/2019/07/30/mogacko09`
--

CREATE TABLE `/2019/07/30/mogacko09` (
  `CommentUserId` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateTime` datetime NOT NULL,
  `ProfileImageFileName` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CommentIndex` int(11) NOT NULL,
  `EmotionalAnalysisValue` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `/2019/07/30/mogacko09`
--

INSERT INTO `/2019/07/30/mogacko09` (`CommentUserId`, `Content`, `DateTime`, `ProfileImageFileName`, `CommentIndex`, `EmotionalAnalysisValue`) VALUES
('(Anonymous)', 'ì •ë§ ì¢‹ì•„ìš”', '2019-07-30 21:54:09', '', 8, 49.9014),
('(Anonymous)', 'ì™€ìš° ì„±ê³µ!', '2019-07-30 21:54:25', '', 9, 24.7894),
('(Anonymous)', 'í…ŒìŠ¤íŠ¸ í…ŒìŠ¤íŠ¸!', '2019-07-30 22:00:12', '', 10, 28.6361),
('(Anonymous)', 'êµ¬ë ¤ìš”', '2019-07-30 22:00:24', '', 11, 22.4391),
('(Anonymous)', 'ì§ˆì´ ë‚®ì€ ì˜í™”ë¥¼ ì¼ì»«ëŠ” í‘œí˜„', '2019-07-30 22:00:51', '', 12, 4.07904),
('(Anonymous)', 'ë‹¤ì‹œëŠ” ì˜¤ê³  ì‹¶ì§€ ì•ŠìŠµë‹ˆë‹¤', '2019-07-30 22:02:52', '', 13, -4.9341),
('(Anonymous)', 'ì •ë§ ê¸°ë¶„ ë‚˜ìœ ê²½í—˜ì´ì—ˆì–´ìš”', '2019-07-30 22:03:03', '', 14, 47.169),
('(Anonymous)', 'ì´ë ‡ê²Œ ë§›ì—†ëŠ” ê±´ ì²˜ìŒ ë¨¹ì–´ë´…ë‹ˆë‹¤', '2019-07-30 22:03:23', '', 15, -16.1306),
('(Anonymous)', 'ì´ê²Œ ì˜í™”ëƒ', '2019-07-30 22:03:41', '', 16, -46.7688),
('jopemachine', 'ëŒ“ê¸€!!!', '2019-08-02 17:33:29', 'jopemachine.jpg', 17, -16.4182),
('jopemachine', 'ëŒ“ê¸€!', '2019-08-02 17:33:49', 'jopemachine.jpg', 18, -27.8525),
('jopemachine', 'íŒŒì´í† ì¹˜', '2019-08-02 17:34:00', 'jopemachine.jpg', 19, -15.3881),
('jopemachine', 'ì¼ë³¸ì´ëž‘ ìˆ˜ì¤€ ìšœë¼ ì°¨ë³„í–‡ë‹¤ëŠ”ë° ì•ˆë´', '2019-08-02 17:38:13', 'jopemachine.jpg', 22, -39.1873),
('jopemachine', 'ì†Œì„¤ì„±ê²½ì±… ì¢‹ì•„í•˜ì‹œëŠ” ë¶„ë“¤í•œí…Œ ì¶”ì²œ', '2019-08-02 17:38:23', 'jopemachine.jpg', 23, -1.8889),
('jopemachine', 'ì• ê¸°ë“¤ ë³´ëŠ” ì˜í™”ë„¤ ...', '2019-08-02 17:39:02', 'jopemachine.jpg', 24, -41.53),
('jopemachine', 'êµ‰ìž¥ížˆ ìž¬ë¯¸ìžˆì„ì¤„ì•Œì•˜ëŠ”ë°', '2019-08-02 17:39:10', 'jopemachine.jpg', 25, 31.3558),
('jopemachine', '1ë³´ë‹¤ 100ë°° ëª»í•¨', '2019-08-02 17:40:28', 'jopemachine.jpg', 26, -20.5368),
('jopemachine', 'ë°±ì¸ìš°ì›”ì£¼ì˜ì—ì„œ ë‚˜ì˜¤ë¼.', '2019-08-02 17:40:39', 'jopemachine.jpg', 27, -43.6668),
('jopemachine', 'ë¼ì¿¤ë“¤ ë„ˆë¬´íž˜ë“¤ì—ˆë‹¤..!!!', '2019-08-02 17:40:46', 'jopemachine.jpg', 28, 38.3118),
('jopemachine', 'ë³µìˆ˜ì˜ ë™ê¸°ê°€ ì„ì—°ì°®ë‹¤..ìžê·¹ì ì¸ê±° ì™¸ì—ëŠ” ë³¼ë§Œí•œê²Œ ì—†ë„¤..ì¹œì ˆí•œê¸ˆìžì”¨ ì•„ë¥˜ìž‘', '2019-08-02 17:41:07', 'jopemachine.jpg', 29, -48.8851),
('jopemachine', 'ì–´ë¦°ì´ë“¤ì˜ í¥ë¯¸ ìœ„ì£¼ë¡œ í•œê²ƒê°™ì•„ ì¡°ê¸ˆì€ ì§€ë£¨í•œ ì˜í™”', '2019-08-02 17:41:17', 'jopemachine.jpg', 30, -43.6972),
('jopemachine', 'ì²­ì†Œë…„ ê´€ëžŒë¶ˆê°€ë¡œ í•˜ì§€ ê·¸ëž¬ì–´ìš” ì• ë“¤ì´ ì´ê±°ë³´ê³  ë­˜ ëŠë¼ê² ìŠµë‹ˆê¹Œ', '2019-08-02 17:41:27', 'jopemachine.jpg', 31, -41.549),
('jopemachine', 'ì§€ê¸ˆ ë¬¸ìž¬ì•™ ê²½ì œ ì´ëŒ€ë¡œ ê°€ë‹¤ê°€ ì˜í™” ê°œë´‰ì¼ì— ë§žì¶°ì„œ êµ­ê°€ ë¶€ë„ë‚ ë“¯ ã…‹ã…‹ã…‹ã…‹', '2019-08-02 17:42:15', 'jopemachine.jpg', 32, -31.5468),
('jopemachine', 'ë“œëž˜ê³¤ ë‚˜ëŒ€ì§€ë§ˆ!!!', '2019-08-02 17:42:28', 'jopemachine.jpg', 33, -16.7356),
('jopemachine', 'ê´€ëžŒê°ì•„ì´ë“¤ì´ ì¢‹ì•„í•©ë‹ˆë‹¤^^ë”°ëœ»í•œ ì´ì•¼ê¸°ë¼í•˜ë„¤ìš”', '2019-08-02 17:42:38', 'jopemachine.jpg', 34, 49.2233),
('jopemachine', 'ê´€ëžŒê°ìµœê³ ìž…ë‹ˆë‹¤!! ë˜ë³´ê³ ì‹¶ì€ì˜í™”!!', '2019-08-02 17:42:45', 'jopemachine.jpg', 35, 49.4163),
('jopemachine', 'ì§„ë—ê°œë“¤ ì˜ˆê¸°ë„ ìƒê°ë‚˜ê³ ë§Œê° êµì°¨í•˜ë©° ëˆˆë¬¼ì´ ë‚˜ë”ë¼êµ¬ì—¬', '2019-08-02 17:42:57', 'jopemachine.jpg', 36, 46.7342),
('jopemachine', 'ì™œì¼€ ê°€ìŠ´ì´ ë¨¹ë¨¹í•´ì§€ì§€...', '2019-08-02 17:43:25', 'jopemachine.jpg', 38, 47.3503),
('jopemachine', 'ê²ë‚˜ ê¸°ëŒ€í•˜ê³ ìžˆì–´ë„ë˜ëŠ”ê±°ë§žë‚˜?ã…‹ã…‹ã…‹', '2019-08-02 17:43:34', 'jopemachine.jpg', 39, -8.71747),
('jopemachine', 'ì–‘ë™ê·¼ ì§„ì§œ ì—°ê¸° ìž¬ëŠ¥ì´ ë„ˆë¬´ ì•„ê¹Œìš´ë° í™œë™ì„ ì•ˆí•´ ã… ', '2019-08-02 17:43:47', 'jopemachine.jpg', 40, -36.2855),
('jopemachine', 'ê°ˆìˆ˜ë¡ CGë§Œ ì¢‹ì•„ì§€ê³  ë‚˜ë¨¸ì§„ í‡´ë³´í•˜ëŠ” í—ë¦¬ì›ƒ ë¸”ë¡ë²„ìŠ¤í„°ë“¤ë„ ê³¼ê±°ë¥¼ ë°°ì›Œë¼.', '2019-08-02 17:44:14', 'jopemachine.jpg', 41, -46.6275),
('jopemachine', 'ì•ˆë…•í•˜ì„¸ìš” ì»´í“¨í„°ê³µí•™ê³¼ìž…ë‹ˆë‹¤.', '2019-08-02 17:44:56', 'jopemachine.jpg', 42, 4.07385),
('jopemachine', 'ì¢‹ì€ í•˜ë£¨ë˜ì„¸ìš”~', '2019-08-02 17:45:10', 'jopemachine.jpg', 43, 36.1046),
('jopemachine', 'ì €ëŠ” ì´ í”„ë¡œê·¸ëž¨ì´ ì‹«ì–´ìš”', '2019-08-02 17:45:48', 'jopemachine.jpg', 44, -34.4761),
('jopemachine', 'ì„±ëŠ¥ì´ ì¢€... ê·¸ë ‡ë„¤ìš”?', '2019-08-02 17:46:14', 'jopemachine.jpg', 45, -29.691),
('jopemachine', 'ê³ ìƒí–ˆì–´ìš”', '2019-08-02 17:46:28', 'jopemachine.jpg', 46, -23.6381),
('jopemachine', 'ë§Œë“œëŠë¼ ê³ ìƒí–ˆì–´ìš”', '2019-08-02 17:46:53', 'jopemachine.jpg', 47, -47.0608),
('jopemachine', 'ë…¸ë ¥í•˜ëŠë¼ ê³ ìƒí–ˆì–´ìš”', '2019-08-02 17:47:14', 'jopemachine.jpg', 48, -47.5073),
('jopemachine', 'ë…¸ë ¥', '2019-08-02 17:47:26', 'jopemachine.jpg', 49, -19.742),
('jopemachine', 'ì„¼ìŠ¤ ì—†ë‹¤', '2019-08-02 17:48:02', 'jopemachine.jpg', 50, -42.6972),
('jopemachine', 'ì„¼ìŠ¤ ìžˆë‹¤', '2019-08-02 17:48:09', 'jopemachine.jpg', 51, 26.9974),
('jopemachine', 'ì¢‹ë‹¤', '2019-08-02 17:48:32', 'jopemachine.jpg', 52, 49.037),
('jopemachine', 'ì•ˆ ì¢‹ì€ ê²ƒ ê°™ì€ë° ì¢‹ì•„', '2019-08-02 17:49:25', 'jopemachine.jpg', 56, 23.1394),
('jopemachine', 'ì°¸.. ì–´ë–¤ ê¸€ì„ ì¨ì•¼í• ì§€ë„ íž˜ë“¤ë‹¤.', '2019-08-02 17:50:22', 'jopemachine.jpg', 58, -33.7838),
('jopemachine', 'ë„ˆë¬´ ìž¬ë°Œì—ˆì–´ìš” ! ê·¸ ì‹ ë¹„ìŠ¤ëŸ¬ìš´ ë¶„ìœ„ê¸°ëž€ ..', '2019-08-12 17:45:05', '', 74, 49),
('(Anonymous)', '10ì  ê°€ì¦ˆì•„ ê°€ì¦ˆì•„ ê°€ì¦ˆì•„', '2019-08-14 16:11:21', '', 75, -11),
('(Anonymous)', 'ì•„ì´ë””ì–´ êµ¬í˜„ ëª¨ë‘ ìµœê³ ìž…ë‹ˆë‹¤. ', '2019-08-14 16:12:12', '', 76, 49),
('(Anonymous)', 'ì¦ê±°ìš´ Bottom-up ëŒ€íšŒ ì‹œì—°íšŒì— ì˜¤ì‹ ê±¸ í™˜ì˜í•©ë‹ˆë‹¤.', '2019-08-14 16:15:10', '', 77, 15),
('(Anonymous)', 'ìƒê°ë³´ë‹¤ ì„±ëŠ¥ì´ ì¢‹ì§€ ì•Šì•„ìš” ã… ã… ', '2019-08-14 16:16:14', '', 78, 13),
('(Anonymous)', 'ìƒê°ë³´ë‹¤ ì„±ëŠ¥ì´ ì¢‹ì§€ ì•Šì•„ìš”', '2019-08-14 16:16:33', '', 79, 14),
('(Anonymous)', 'ã…—', '2019-08-14 16:16:43', '', 80, -32),
('(Anonymous)', 'ì„±ëŠ¥ì´ ì‹¤ë§ìŠ¤ëŸ¬ì›Œìš”...', '2019-08-14 16:18:45', '', 81, -30),
('(Anonymous)', 'ì„±ëŠ¥ì´ ì‹¤ë§ìŠ¤ëŸ¬ì›Œìš”...', '2019-08-14 16:18:46', '', 82, -30),
('(Anonymous)', 'ì •ë§ ìµœì•…ìž…ë‹ˆë‹¤. ', '2019-08-14 16:19:36', '', 83, -49),
('(Anonymous)', 'ì•„ì´ë””ì–´ êµ¬í˜„ ëª¨ë‘ ìµœê³ ìž…ë‹ˆë‹¤.', '2019-08-14 16:22:46', '', 84, 49),
('(Anonymous)', 'ì¦ê±°ìš´ Bottom-up ëŒ€íšŒ ì‹œì—°íšŒì— ì˜¤ì‹ ê±¸ í™˜ì˜í•©ë‹ˆë‹¤.', '2019-08-14 16:22:54', '', 85, 15);

-- --------------------------------------------------------

--
-- 테이블 구조 `/2019/07/30/mogacko09_result`
--

CREATE TABLE `/2019/07/30/mogacko09_result` (
  `CommentUserId` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateTime` datetime NOT NULL,
  `ProfileImageFileName` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CommentIndex` int(11) NOT NULL,
  `EmotionalAnalysisValue` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `/2019/08/02/mogacko10`
--

CREATE TABLE `/2019/08/02/mogacko10` (
  `CommentUserId` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateTime` datetime NOT NULL,
  `ProfileImageFileName` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CommentIndex` int(11) NOT NULL,
  `EmotionalAnalysisValue` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `/2019/08/02/mogacko10_result`
--

CREATE TABLE `/2019/08/02/mogacko10_result` (
  `CommentUserId` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateTime` datetime NOT NULL,
  `ProfileImageFileName` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CommentIndex` int(11) NOT NULL,
  `EmotionalAnalysisValue` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `/2019/08/06/mogacko11`
--

CREATE TABLE `/2019/08/06/mogacko11` (
  `CommentUserId` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateTime` datetime NOT NULL,
  `ProfileImageFileName` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CommentIndex` int(11) NOT NULL,
  `EmotionalAnalysisValue` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `/2019/08/06/mogacko11`
--

INSERT INTO `/2019/08/06/mogacko11` (`CommentUserId`, `Content`, `DateTime`, `ProfileImageFileName`, `CommentIndex`, `EmotionalAnalysisValue`) VALUES
('jopemachine', 'ì´ëŸ° í•œêµ­ ì• ë‹ˆë©”ì´ì…˜ì„ íƒœì–´ë‚˜ì„œ ë³¸ ì ì´ ìžˆë˜ê°€ ì‹¶ì„ ì •ë„ë¡œ ì‡¼í‚¹í–ˆë‹¤. ì˜í™”ëì— í•œêµ­ì–´ë¡œë§Œ ëœ ì—”ë”©í¬ë ˆë”§ì´ ì˜¬ë¼ê°ˆë•ŒëŠ” ë­”ê°€ ë­‰í´í–ˆê³ , ë””ì¦ˆë‹ˆë“œë¦¼ì›ìŠ¤ì˜ ê°€ì¡±ì˜í™”ì´ê³  ì–´ë¥¸ë“¤ì´ ë” ìƒê°í•˜ëŠ” ì˜í™”ê°€ ë ê²ƒ ê°™ë‹¤. ì§„ì‹¬ìœ¼ë¡œ ë” ìž˜ë˜ë©´ ì¢‹ê² ë‹¤. ë”ë¹™ë„ ë´ì•¼ì§€', '2019-08-14 16:50:12', 'jopemachine.jpg', 4, 42);

-- --------------------------------------------------------

--
-- 테이블 구조 `/2019/08/06/mogacko11_result`
--

CREATE TABLE `/2019/08/06/mogacko11_result` (
  `CommentUserId` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateTime` datetime NOT NULL,
  `ProfileImageFileName` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CommentIndex` int(11) NOT NULL,
  `EmotionalAnalysisValue` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `/2019/08/13/mogacko12`
--

CREATE TABLE `/2019/08/13/mogacko12` (
  `CommentUserId` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateTime` datetime NOT NULL,
  `ProfileImageFileName` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CommentIndex` int(11) NOT NULL,
  `EmotionalAnalysisValue` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `/2019/08/13/mogacko12_result`
--

CREATE TABLE `/2019/08/13/mogacko12_result` (
  `CommentUserId` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateTime` datetime NOT NULL,
  `ProfileImageFileName` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CommentIndex` int(11) NOT NULL,
  `EmotionalAnalysisValue` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `/2019/08/23/bottom display`
--

CREATE TABLE `/2019/08/23/bottom display` (
  `CommentUserId` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateTime` datetime NOT NULL,
  `ProfileImageFileName` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CommentIndex` int(11) NOT NULL,
  `EmotionalAnalysisValue` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `/2019/08/23/bottom display`
--

INSERT INTO `/2019/08/23/bottom display` (`CommentUserId`, `Content`, `DateTime`, `ProfileImageFileName`, `CommentIndex`, `EmotionalAnalysisValue`) VALUES
('(Anonymous)', 'ì™€~~ ì •~~ë§ ìž¬ë¯¸ìžˆë„¤ìš”..ã…Žã…Ž....', '2019-08-23 13:15:37', '', 1, 45),
('(Anonymous)', 'ì™€~~~~ ì‹ ê¸°í•´ìš©~!~~~~~', '2019-08-23 13:42:50', '', 2, 37),
('(Anonymous)', 'ì™€~~~~ ì‹ ê¸°í•´ìš©~!~~~~~', '2019-08-23 13:42:50', '', 3, 37),
('(Anonymous)', 'ë„ˆë¬´ ì‹«ì–´ìš”', '2019-08-23 13:45:37', '', 4, -30),
('(Anonymous)', 'ì •ë§ ìž¬ë¯¸ìžˆì–´ ë³´ì´ëŠ” í”„ë¡œì íŠ¸ìž…ë‹ˆë‹¤.', '2019-08-23 13:46:29', '', 5, 40),
('(Anonymous)', 'ì •ë§ ëª»ìƒê²¼ì–´ìš”\n\n', '2019-08-23 13:49:08', '', 6, -8),
('(Anonymous)', 'ã……ã…‚', '2019-08-23 13:49:27', '', 7, -35),
('(Anonymous)', 'ë…¸ìž¼', '2019-08-23 13:50:05', '', 8, -49),
('(Anonymous)', 'ì¤­ë«Œ ì§²ì¤‘ë‚˜ë„¤ìš”', '2019-08-23 13:50:26', '', 9, -29),
('(Anonymous)', 'ì•„ë¦„ë‹¤ì›Œìš”', '2019-08-23 13:50:44', '', 10, -29),
('(Anonymous)', 'ì•„ë¦„ë‹¤ì›Œìš”', '2019-08-23 13:51:25', '', 11, -29),
('(Anonymous)', 'ì •ë§ ì•„ë¦„ë‹¤ì›Œìš”', '2019-08-23 13:52:15', '', 12, 9),
('(Anonymous)', 'ì •ë§ ì˜ˆì˜ë„¤ìš”.', '2019-08-23 13:52:28', '', 13, 47),
('jopemachine', 'ì™€ ê·¼ì†ì‹¤ì´ë‚˜ ë‚˜ë¼', '2019-08-23 14:15:07', '', 14, 6),
('jopemachine', 'ã…—ã…—', '2019-08-23 14:52:03', 'jopemachine.jpg', 15, -29),
('jopemachine', 'ã…—ã…—', '2019-08-23 14:52:03', 'jopemachine.jpg', 16, -29),
('jopemachine', 'ì¡´ë§›íƒ±', '2019-08-23 14:52:45', 'jopemachine.jpg', 17, 19),
('jopemachine', 'ì™€ ì‹œë°œ ì¡´ë‚˜ ì¢‹ë‹¤.', '2019-08-23 14:53:13', 'jopemachine.jpg', 18, 16),
('jopemachine', 'í™€ë¦¬ ì‰¿', '2019-08-23 14:53:28', 'jopemachine.jpg', 19, -29),
('jopemachine', 'ì‰½ì§€ ì•Šë‹¤.', '2019-08-23 14:53:42', 'jopemachine.jpg', 20, -11),
('jopemachine', 'ê°€ëž‘ë¹„ì— ì†Œë§¤ ì –ëŠ”ì§€ ëª¨ë¥¸ë‹¤', '2019-08-23 14:54:16', 'jopemachine.jpg', 21, 4),
('jopemachine', 'í‚¹ê³ ë¼ë‹ˆ', '2019-08-23 14:54:35', 'jopemachine.jpg', 22, 15),
('jopemachine', 'ì¡°êµ­', '2019-08-23 14:55:35', 'jopemachine.jpg', 23, 12),
('jopemachine', 'í—¬ì¡°ì„ ', '2019-08-23 14:55:46', 'jopemachine.jpg', 24, -38),
('jopemachine', 'í—¤ë¸ì¡°ì„ ', '2019-08-23 14:55:58', 'jopemachine.jpg', 25, -30),
('jopemachine', 'í‚¹ì¡°ì„ ', '2019-08-23 14:56:05', 'jopemachine.jpg', 26, -36),
('jopemachine', 'ì•„ë²„ì§€ ìž˜ ê³„ì‹œë‹ˆ?', '2019-08-23 14:58:17', 'jopemachine.jpg', 29, -11),
('jopemachine', 'í—¬ì¡°ì„ ', '2019-08-23 14:59:01', 'jopemachine.jpg', 30, -38),
('jopemachine', 'ã„´ã„±ã…\n\n', '2019-08-23 15:37:27', 'jopemachine.jpg', 31, -16),
('jopemachine', 'ã„´ã„±ã…\n\n', '2019-08-23 15:37:27', 'jopemachine.jpg', 32, -16),
('jopemachine', 'ã„´ã…‡ã… ê¹€ì¹˜ìž¥ì¸\n\n', '2019-08-23 15:37:55', 'jopemachine.jpg', 33, -45),
('jopemachine', 'ã„´ã…‡ã… ê°œì¢‹ì•„ìš”', '2019-08-23 15:38:21', 'jopemachine.jpg', 34, 13);

-- --------------------------------------------------------

--
-- 테이블 구조 `pagetitlepairs`
--

CREATE TABLE `pagetitlepairs` (
  `PageID` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `Title` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `pagetitlepairs`
--

INSERT INTO `pagetitlepairs` (`PageID`, `Title`) VALUES
('/2019/07/09/Mogacko04_Result', 'ëª¨ê°ì½” 4íšŒì°¨ ê²°ê³¼'),
('/2019/07/12/Mogacko05', 'ëª¨ê°ì½” 5íšŒì°¨ ëª©í‘œ'),
('/2019/07/12/Mogacko05_Result', 'ëª¨ê°ì½” 5íšŒì°¨ ê²°ê³¼'),
('/2019/07/05/Mogacko03', 'ëª¨ê°ì½” 3íšŒì°¨ ëª©í‘œ'),
('/2019/07/02/Mogacko02_Result', 'ëª¨ê°ì½” 2íšŒì°¨ ê²°ê³¼'),
('/2019/07/02/Mogacko02', 'ëª¨ê°ì½” 2íšŒì°¨ ëª©í‘œ'),
('/2019/06/28/Mogacko01_Result', 'ëª¨ê°ì½” 1íšŒì°¨ ê²°ê³¼'),
('/2019/06/28/Mogacko01', 'ëª¨ê°ì½” 1íšŒì°¨ ëª©í‘œ'),
('/2019/07/05/Mogacko03_Result', 'ëª¨ê°ì½” 3íšŒì°¨ ê²°ê³¼'),
('/2019/07/16/Mogacko06', 'ëª¨ê°ì½” 6íšŒì°¨ ëª©í‘œ'),
('/2019/07/16/Mogacko06_Result', 'ëª¨ê°ì½” 6íšŒì°¨ ê²°ê³¼'),
('/2019/07/09/Mogacko04', 'ëª¨ê°ì½” 4íšŒì°¨ ëª©í‘œ'),
('/2019/07/19/Mogacko07', 'ëª¨ê°ì½” 7íšŒì°¨ ëª©í‘œ'),
('/2019/07/19/Mogacko07_Result', 'ëª¨ê°ì½” 7íšŒì°¨ ê²°ê³¼'),
('/2019/07/23/Mogacko08_Result', 'ëª¨ê°ì½” 8íšŒì°¨ ê²°ê³¼'),
('/2019/07/23/Mogacko08', 'ëª¨ê°ì½” 8íšŒì°¨ ëª©í‘œ'),
('/2019/07/30/Mogacko09', 'ëª¨ê°ì½” 9íšŒì°¨ ëª©í‘œ'),
('/2019/07/30/Mogacko09_Result', 'ëª¨ê°ì½” 9íšŒì°¨ ê²°ê³¼'),
('/2019/08/02/Mogacko10', 'ëª¨ê°ì½” 10íšŒì°¨ ëª©í‘œ'),
('/2019/08/02/Mogacko10_Result', 'ëª¨ê°ì½” 10íšŒì°¨ ê²°ê³¼'),
('/2019/08/06/Mogacko11', 'ëª¨ê°ì½” 11íšŒì°¨ ëª©í‘œ'),
('/2019/08/06/Mogacko11_Result', 'ëª¨ê°ì½” 11íšŒì°¨ ê²°ê³¼'),
('/2019/08/13/Mogacko12_Result', 'ëª¨ê°ì½” 12íšŒì°¨ ê²°ê³¼'),
('/2019/08/13/Mogacko12', 'ëª¨ê°ì½” 12íšŒì°¨ ëª©í‘œ'),
('/2019/08/23/Bottom Display', 'ë°”í…€ì—… ì‹œì—°íšŒ');

-- --------------------------------------------------------

--
-- 테이블 구조 `visitorcounter`
--

CREATE TABLE `visitorcounter` (
  `I` int(11) NOT NULL,
  `PageID` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `REGDATE` datetime NOT NULL,
  `REGIP` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `REFERER` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `visitorcounter`
--

INSERT INTO `visitorcounter` (`I`, `PageID`, `REGDATE`, `REGIP`, `REFERER`) VALUES
(96, '/2019/07/16/Mogacko06_Result', '2019-07-17 08:10:06', '162.158.118.150', 'https://jopemachine.github.io/2019/07/16/Mogacko06_Result/'),
(97, '/2019/07/16/Mogacko06_Result', '2019-07-17 08:10:29', '162.158.118.94', 'https://jopemachine.github.io/2019/07/16/Mogacko06_Result/'),
(98, '/2019/07/16/Mogacko06_Result', '2019-07-17 09:42:57', '162.158.118.114', 'https://jopemachine.github.io/2019/07/16/Mogacko06_Result/'),
(99, '/2019/07/16/Mogacko06_Result', '2019-07-17 11:36:02', '162.158.118.96', 'https://jopemachine.github.io/2019/07/16/Mogacko06_Result/'),
(100, '/2019/07/16/Mogacko06', '2019-07-17 11:36:12', '162.158.118.96', 'https://jopemachine.github.io/2019/07/16/Mogacko06/'),
(101, '/2019/07/16/Mogacko06', '2019-07-17 15:06:39', '162.158.118.38', 'https://jopemachine.github.io/2019/07/16/Mogacko06/'),
(102, '/2019/07/16/Mogacko06_Result', '2019-07-17 15:46:08', '162.158.118.164', 'https://jopemachine.github.io/2019/07/16/Mogacko06_Result/'),
(103, '/2019/07/16/Mogacko06_Result', '2019-07-18 11:21:23', '162.158.6.26', 'https://jopemachine.github.io/2019/07/16/Mogacko06_Result/'),
(104, '/2019/07/16/Mogacko06_Result', '2019-07-18 20:33:19', '162.158.6.104', 'https://jopemachine.github.io/2019/07/16/Mogacko06_Result/'),
(105, '/2019/07/16/Mogacko06_Result', '2019-07-18 20:46:07', '162.158.7.39', 'https://jopemachine.github.io/2019/07/16/Mogacko06_Result/'),
(106, '/2019/07/16/Mogacko06_Result', '2019-07-18 20:46:43', '162.158.6.128', 'https://jopemachine.github.io/2019/07/16/Mogacko06_Result/'),
(107, '/2019/07/16/Mogacko06_Result', '2019-07-18 20:59:02', '162.158.7.57', 'https://jopemachine.github.io/2019/07/16/Mogacko06_Result/'),
(108, '/2019/07/16/Mogacko06_Result', '2019-07-18 21:02:11', '162.158.6.206', 'https://jopemachine.github.io/2019/07/16/Mogacko06_Result/'),
(109, '/2019/07/19/Mogacko07', '2019-07-19 13:50:33', '162.158.7.111', 'https://jopemachine.github.io/2019/07/19/Mogacko07/'),
(110, '/2019/07/16/Mogacko06_Result', '2019-07-19 13:50:38', '162.158.7.111', 'https://jopemachine.github.io/2019/07/16/Mogacko06_Result/'),
(111, '/2019/07/19/Mogacko07_Result', '2019-07-19 16:48:36', '173.245.48.181', 'https://jopemachine.github.io/2019/07/19/Mogacko07_Result/'),
(112, '/2019/07/19/Mogacko07_Result', '2019-07-19 17:39:42', '162.158.6.224', 'https://jopemachine.github.io/2019/07/19/Mogacko07_Result/'),
(113, '/2019/07/19/Mogacko07', '2019-07-19 17:40:35', '162.158.6.224', 'https://jopemachine.github.io/2019/07/19/Mogacko07/'),
(114, '/2019/07/16/Mogacko06_Result', '2019-07-19 17:41:53', '162.158.7.63', 'https://jopemachine.github.io/2019/07/16/Mogacko06_Result/'),
(115, '/2019/07/19/Mogacko07', '2019-07-19 17:42:21', '162.158.7.63', 'https://jopemachine.github.io/2019/07/19/Mogacko07/'),
(116, '/2019/07/19/Mogacko07_Result', '2019-07-19 17:48:28', '162.158.7.63', 'https://jopemachine.github.io/2019/07/19/Mogacko07_Result/'),
(117, '/2019/07/19/Mogacko07_Result', '2019-07-22 14:53:05', '162.158.118.20', 'https://jopemachine.github.io/2019/07/19/Mogacko07_Result/'),
(118, '/2019/07/19/Mogacko07_Result', '2019-07-22 16:47:12', '162.158.119.7', 'https://jopemachine.github.io/2019/07/19/Mogacko07_Result/'),
(119, '/2019/07/19/Mogacko07_Result', '2019-07-22 19:42:57', '162.158.118.188', 'https://jopemachine.github.io/2019/07/19/Mogacko07_Result/'),
(120, '/2019/07/19/Mogacko07_Result', '2019-07-22 20:40:22', '162.158.118.56', 'https://jopemachine.github.io/2019/07/19/Mogacko07_Result/'),
(121, '/2019/07/19/Mogacko07', '2019-07-22 21:07:35', '162.158.118.114', 'https://jopemachine.github.io/2019/07/19/Mogacko07/'),
(122, '/2019/07/19/Mogacko07', '2019-07-22 21:08:12', '162.158.118.56', 'https://jopemachine.github.io/2019/07/19/Mogacko07/'),
(123, '/2019/07/19/Mogacko07', '2019-07-22 21:08:30', '162.158.118.78', 'https://jopemachine.github.io/2019/07/19/Mogacko07/'),
(124, '/2019/07/19/Mogacko07', '2019-07-22 23:05:47', '162.158.7.99', 'https://jopemachine.github.io/2019/07/19/Mogacko07/'),
(125, '/2019/07/23/Mogacko08_Result', '2019-07-25 11:52:09', '162.158.6.122', 'https://jopemachine.github.io/2019/07/23/Mogacko08_Result/'),
(126, '/2019/07/23/Mogacko08_Result', '2019-07-25 12:01:49', '162.158.6.50', 'https://jopemachine.github.io/2019/07/23/Mogacko08_Result/'),
(127, '/2019/07/16/Mogacko06_Result', '2019-07-25 12:32:47', '162.158.6.152', 'https://jopemachine.github.io/2019/07/16/Mogacko06_Result/'),
(128, '/2019/07/23/Mogacko08', '2019-07-25 12:32:53', '162.158.6.152', 'https://jopemachine.github.io/2019/07/23/Mogacko08/'),
(129, '/2019/07/23/Mogacko08_Result', '2019-07-25 12:32:57', '162.158.6.152', 'https://jopemachine.github.io/2019/07/23/Mogacko08_Result/'),
(130, '/2019/07/19/Mogacko07_Result', '2019-07-25 12:34:06', '162.158.6.152', 'https://jopemachine.github.io/2019/07/19/Mogacko07_Result/'),
(131, '/2019/07/05/Mogacko03_Result', '2019-07-25 12:34:50', '162.158.6.152', 'https://jopemachine.github.io/2019/07/05/Mogacko03_Result/'),
(132, '/2019/07/23/Mogacko08_Result', '2019-07-26 15:02:05', '162.158.7.111', 'https://jopemachine.github.io/2019/07/23/Mogacko08_Result/'),
(133, '/2019/07/23/Mogacko08_Result', '2019-07-26 15:09:51', '162.158.6.182', 'https://jopemachine.github.io/2019/07/23/Mogacko08_Result/'),
(134, '/2019/07/12/Mogacko05', '2019-07-26 15:30:04', '162.158.7.39', 'https://jopemachine.github.io/2019/07/12/Mogacko05/'),
(135, '/2019/07/23/Mogacko08_Result', '2019-07-30 11:54:07', '162.158.7.115', 'https://jopemachine.github.io/2019/07/23/Mogacko08_Result/'),
(136, '/2019/07/23/Mogacko08_Result', '2019-07-30 13:14:49', '162.158.7.39', 'https://jopemachine.github.io/2019/07/23/Mogacko08_Result/'),
(137, '/2019/07/30/Mogacko09', '2019-07-30 13:43:20', '162.158.6.128', 'https://jopemachine.github.io/2019/07/30/Mogacko09/'),
(138, '/2019/07/23/Mogacko08_Result', '2019-07-30 13:43:32', '162.158.6.128', 'https://jopemachine.github.io/2019/07/23/Mogacko08_Result/'),
(139, '/2019/07/23/Mogacko08', '2019-07-30 13:43:35', '162.158.6.128', 'https://jopemachine.github.io/2019/07/23/Mogacko08/'),
(140, '/2019/07/30/Mogacko09_Result', '2019-07-30 16:57:29', '162.158.7.111', 'https://jopemachine.github.io/2019/07/30/Mogacko09_Result/'),
(141, '/2019/07/30/Mogacko09_Result', '2019-07-30 17:21:12', '162.158.7.63', 'https://jopemachine.github.io/2019/07/30/Mogacko09_Result/'),
(142, '/2019/07/23/Mogacko08_Result', '2019-07-30 17:21:44', '162.158.7.63', 'https://jopemachine.github.io/2019/07/23/Mogacko08_Result/'),
(143, '/2019/07/30/Mogacko09', '2019-07-30 17:50:29', '108.162.215.112', 'https://jopemachine.github.io/2019/07/30/Mogacko09/'),
(144, '/2019/07/23/Mogacko08_Result', '2019-07-30 17:53:59', '172.68.46.51', 'https://jopemachine.github.io/2019/07/23/Mogacko08_Result/'),
(145, '/2019/07/30/Mogacko09_Result', '2019-07-30 18:36:48', '172.69.33.69', 'https://jopemachine.github.io/2019/07/30/Mogacko09_Result/'),
(146, '/2019/07/30/Mogacko09_Result', '2019-07-30 21:53:43', '162.158.6.74', 'https://jopemachine.github.io/2019/07/30/Mogacko09_Result/'),
(147, '/2019/07/30/Mogacko09', '2019-07-30 21:54:00', '162.158.6.74', 'https://jopemachine.github.io/2019/07/30/Mogacko09/'),
(148, '/2019/07/30/Mogacko09', '2019-08-01 22:10:12', '162.158.6.128', 'https://jopemachine.github.io/2019/07/30/Mogacko09/'),
(149, '/2019/07/30/Mogacko09_Result', '2019-08-02 12:30:23', '162.158.6.122', 'https://jopemachine.github.io/2019/07/30/Mogacko09_Result/'),
(150, '/2019/07/30/Mogacko09', '2019-08-02 12:30:38', '162.158.6.122', 'https://jopemachine.github.io/2019/07/30/Mogacko09/'),
(151, '/2019/08/02/Mogacko10', '2019-08-02 14:35:30', '172.69.33.243', 'https://jopemachine.github.io/2019/08/02/Mogacko10/'),
(152, '/2019/07/30/Mogacko09', '2019-08-02 16:40:16', '173.245.48.217', 'https://jopemachine.github.io/2019/07/30/Mogacko09/'),
(153, '/2019/08/02/Mogacko10_Result', '2019-08-02 16:45:47', '162.158.6.128', 'https://jopemachine.github.io/2019/08/02/Mogacko10_Result/'),
(154, '/2019/08/02/Mogacko10', '2019-08-02 16:53:05', '173.245.48.217', 'https://jopemachine.github.io/2019/08/02/Mogacko10/'),
(155, '/2019/08/02/Mogacko10_Result', '2019-08-02 16:53:08', '173.245.48.217', 'https://jopemachine.github.io/2019/08/02/Mogacko10_Result/'),
(156, '/2019/07/30/Mogacko09_Result', '2019-08-02 17:10:01', '108.162.215.26', 'https://jopemachine.github.io/2019/07/30/Mogacko09_Result/'),
(157, '/2019/06/28/Mogacko01', '2019-08-02 18:15:56', '162.158.7.63', 'https://jopemachine.github.io/2019/06/28/Mogacko01/'),
(158, '/2019/07/30/Mogacko09_Result', '2019-08-02 19:48:47', '162.158.6.104', 'https://jopemachine.github.io/2019/07/30/Mogacko09_Result/'),
(159, '/2019/07/30/Mogacko09', '2019-08-02 19:48:53', '162.158.6.104', 'https://jopemachine.github.io/2019/07/30/Mogacko09/'),
(160, '/2019/07/30/Mogacko09', '2019-08-02 20:29:59', '162.158.7.111', 'https://jopemachine.github.io/2019/07/30/Mogacko09/'),
(161, '/2019/08/02/Mogacko10_Result', '2019-08-04 17:10:29', '162.158.6.122', 'https://jopemachine.github.io/2019/08/02/Mogacko10_Result/'),
(162, '/2019/08/02/Mogacko10_Result', '2019-08-04 19:53:25', '162.158.6.104', 'https://jopemachine.github.io/2019/08/02/Mogacko10_Result/'),
(163, '/2019/08/02/Mogacko10', '2019-08-04 19:56:09', '162.158.6.104', 'https://jopemachine.github.io/2019/08/02/Mogacko10/'),
(164, '/2019/07/30/Mogacko09_Result', '2019-08-04 19:56:17', '162.158.6.104', 'https://jopemachine.github.io/2019/07/30/Mogacko09_Result/'),
(165, '/2019/07/30/Mogacko09', '2019-08-04 19:56:21', '162.158.6.104', 'https://jopemachine.github.io/2019/07/30/Mogacko09/'),
(166, '/2019/07/30/Mogacko09', '2019-08-04 20:29:05', '162.158.7.69', 'https://jopemachine.github.io/2019/07/30/Mogacko09/'),
(167, '/2019/08/02/Mogacko10_Result', '2019-08-04 23:16:42', '162.158.7.39', 'https://jopemachine.github.io/2019/08/02/Mogacko10_Result/'),
(168, '/2019/08/06/Mogacko11', '2019-08-06 14:03:08', '162.158.59.74', 'https://jopemachine.github.io/2019/08/06/Mogacko11/'),
(169, '/2019/08/06/Mogacko11', '2019-08-06 16:04:26', '172.68.46.51', 'https://jopemachine.github.io/2019/08/06/Mogacko11/'),
(170, '/2019/08/06/Mogacko11_Result', '2019-08-06 16:46:47', '172.69.33.147', 'https://jopemachine.github.io/2019/08/06/Mogacko11_Result/'),
(171, '/2019/08/06/Mogacko11', '2019-08-06 17:23:06', '108.162.215.26', 'https://jopemachine.github.io/2019/08/06/Mogacko11/'),
(172, '/2019/07/30/Mogacko09', '2019-08-06 17:29:41', '162.158.7.99', 'https://jopemachine.github.io/2019/07/30/Mogacko09/'),
(173, '/2019/08/06/Mogacko11', '2019-08-06 17:32:17', '172.68.46.51', 'https://jopemachine.github.io/2019/08/06/Mogacko11/'),
(174, '/2019/08/06/Mogacko11_Result', '2019-08-06 17:32:21', '172.68.46.51', 'https://jopemachine.github.io/2019/08/06/Mogacko11_Result/'),
(175, '/2019/08/06/Mogacko11_Result', '2019-08-12 14:41:15', '162.158.7.39', 'https://jopemachine.github.io/2019/08/06/Mogacko11_Result/'),
(176, '/2019/08/06/Mogacko11', '2019-08-12 14:43:04', '162.158.7.39', 'https://jopemachine.github.io/2019/08/06/Mogacko11/'),
(177, '/2019/08/02/Mogacko10_Result', '2019-08-12 14:43:07', '162.158.7.39', 'https://jopemachine.github.io/2019/08/02/Mogacko10_Result/'),
(178, '/2019/08/02/Mogacko10_Result', '2019-08-12 14:56:26', '162.158.6.140', 'https://jopemachine.github.io/2019/08/02/Mogacko10_Result/'),
(179, '/2019/08/06/Mogacko11_Result', '2019-08-12 15:52:41', '172.69.33.9', 'https://jopemachine.github.io/2019/08/06/Mogacko11_Result/'),
(180, '/2019/08/06/Mogacko11', '2019-08-12 15:53:53', '172.69.33.9', 'https://jopemachine.github.io/2019/08/06/Mogacko11/'),
(181, '/2019/08/06/Mogacko11', '2019-08-12 15:56:03', '172.68.47.46', 'https://jopemachine.github.io/2019/08/06/Mogacko11/'),
(182, '/2019/08/02/Mogacko10_Result', '2019-08-12 16:01:16', '172.68.47.46', 'https://jopemachine.github.io/2019/08/02/Mogacko10_Result/'),
(183, '/2019/08/02/Mogacko10', '2019-08-12 16:01:19', '172.68.47.46', 'https://jopemachine.github.io/2019/08/02/Mogacko10/'),
(184, '/2019/07/30/Mogacko09_Result', '2019-08-12 16:01:22', '172.68.47.46', 'https://jopemachine.github.io/2019/07/30/Mogacko09_Result/'),
(185, '/2019/07/30/Mogacko09', '2019-08-12 16:01:27', '172.68.47.46', 'https://jopemachine.github.io/2019/07/30/Mogacko09/'),
(186, '/2019/07/23/Mogacko08_Result', '2019-08-12 17:45:16', '162.158.7.115', 'https://jopemachine.github.io/2019/07/23/Mogacko08_Result/'),
(187, '/2019/07/23/Mogacko08', '2019-08-12 17:45:31', '162.158.7.115', 'https://jopemachine.github.io/2019/07/23/Mogacko08/'),
(188, '/2019/07/19/Mogacko07_Result', '2019-08-12 17:45:52', '162.158.7.115', 'https://jopemachine.github.io/2019/07/19/Mogacko07_Result/'),
(189, '/2019/07/19/Mogacko07', '2019-08-12 17:46:19', '162.158.7.115', 'https://jopemachine.github.io/2019/07/19/Mogacko07/'),
(190, '/2019/07/16/Mogacko06_Result', '2019-08-12 17:46:27', '162.158.7.115', 'https://jopemachine.github.io/2019/07/16/Mogacko06_Result/'),
(191, '/2019/07/16/Mogacko06', '2019-08-12 17:46:42', '162.158.7.115', 'https://jopemachine.github.io/2019/07/16/Mogacko06/'),
(192, '/2019/07/12/Mogacko05_Result', '2019-08-12 17:47:04', '162.158.7.115', 'https://jopemachine.github.io/2019/07/12/Mogacko05_Result/'),
(193, '/2019/07/12/Mogacko05', '2019-08-12 17:48:14', '162.158.7.115', 'https://jopemachine.github.io/2019/07/12/Mogacko05/'),
(194, '/2019/07/09/Mogacko04_Result', '2019-08-12 17:49:15', '162.158.7.115', 'https://jopemachine.github.io/2019/07/09/Mogacko04_Result/'),
(195, '/2019/07/09/Mogacko04', '2019-08-12 17:50:23', '162.158.7.115', 'https://jopemachine.github.io/2019/07/09/Mogacko04/'),
(196, '/2019/07/05/Mogacko03_Result', '2019-08-12 17:54:24', '172.69.33.9', 'https://jopemachine.github.io/2019/07/05/Mogacko03_Result/'),
(197, '/2019/07/05/Mogacko03', '2019-08-12 17:56:29', '172.69.33.9', 'https://jopemachine.github.io/2019/07/05/Mogacko03/'),
(198, '/2019/07/23/Mogacko08_Result', '2019-08-12 18:34:58', '172.68.211.20', 'https://jopemachine.github.io/2019/07/23/Mogacko08_Result/'),
(199, '/2019/07/30/Mogacko09', '2019-08-12 18:34:59', '172.68.211.20', 'https://jopemachine.github.io/2019/07/30/Mogacko09/'),
(200, '/2019/08/06/Mogacko11_Result', '2019-08-13 13:10:41', '162.158.7.111', 'https://jopemachine.github.io/2019/08/06/Mogacko11_Result/'),
(201, '/2019/08/06/Mogacko11', '2019-08-13 13:38:27', '162.158.6.116', 'https://jopemachine.github.io/2019/08/06/Mogacko11/'),
(202, '/2019/07/05/Mogacko03_Result', '2019-08-14 10:10:02', '162.158.7.81', 'https://jopemachine.github.io/2019/07/05/Mogacko03_Result/'),
(203, '/2019/07/30/Mogacko09', '2019-08-14 10:11:36', '162.158.7.81', 'https://jopemachine.github.io/2019/07/30/Mogacko09/'),
(204, '/2019/07/30/Mogacko09', '2019-08-14 10:54:44', '162.158.7.57', 'https://jopemachine.github.io/2019/07/30/Mogacko09/'),
(205, '/2019/08/13/Mogacko12_Result', '2019-08-14 15:59:14', '172.68.47.94', 'https://jopemachine.github.io/2019/08/13/Mogacko12_Result/'),
(206, '/2019/08/13/Mogacko12', '2019-08-14 15:59:32', '172.68.47.94', 'https://jopemachine.github.io/2019/08/13/Mogacko12/'),
(207, '/2019/08/06/Mogacko11_Result', '2019-08-14 15:59:36', '172.68.47.94', 'https://jopemachine.github.io/2019/08/06/Mogacko11_Result/'),
(208, '/2019/08/06/Mogacko11', '2019-08-14 15:59:39', '172.68.47.94', 'https://jopemachine.github.io/2019/08/06/Mogacko11/'),
(209, '/2019/08/02/Mogacko10_Result', '2019-08-14 15:59:50', '172.68.47.94', 'https://jopemachine.github.io/2019/08/02/Mogacko10_Result/'),
(210, '/2019/08/02/Mogacko10', '2019-08-14 15:59:59', '172.68.47.94', 'https://jopemachine.github.io/2019/08/02/Mogacko10/'),
(211, '/2019/07/30/Mogacko09_Result', '2019-08-14 16:00:03', '172.68.47.94', 'https://jopemachine.github.io/2019/07/30/Mogacko09_Result/'),
(212, '/2019/07/30/Mogacko09', '2019-08-14 16:10:28', '162.158.6.104', 'https://jopemachine.github.io/2019/07/30/Mogacko09/'),
(213, '/2019/07/23/Mogacko08_Result', '2019-08-14 16:12:43', '162.158.6.104', 'https://jopemachine.github.io/2019/07/23/Mogacko08_Result/'),
(214, '/2019/07/30/Mogacko09', '2019-08-14 16:14:07', '172.68.211.80', 'https://jopemachine.github.io/2019/07/30/Mogacko09/'),
(215, '/2019/07/30/Mogacko09', '2019-08-14 16:14:08', '172.68.211.80', 'https://jopemachine.github.io/2019/07/30/Mogacko09/'),
(216, '/2019/06/28/Mogacko01', '2019-08-14 16:42:42', '172.69.33.243', 'https://jopemachine.github.io/2019/06/28/Mogacko01/'),
(217, '/2019/06/28/Mogacko01_Result', '2019-08-14 16:42:45', '172.69.33.243', 'https://jopemachine.github.io/2019/06/28/Mogacko01_Result/'),
(218, '/2019/07/02/Mogacko02', '2019-08-14 16:42:49', '172.69.33.243', 'https://jopemachine.github.io/2019/07/02/Mogacko02/'),
(219, '/2019/07/02/Mogacko02_Result', '2019-08-14 16:42:52', '172.69.33.243', 'https://jopemachine.github.io/2019/07/02/Mogacko02_Result/'),
(220, '/2019/07/05/Mogacko03_Result', '2019-08-14 16:43:02', '172.69.33.243', 'https://jopemachine.github.io/2019/07/05/Mogacko03_Result/'),
(221, '/2019/07/09/Mogacko04', '2019-08-14 16:43:05', '172.69.33.243', 'https://jopemachine.github.io/2019/07/09/Mogacko04/'),
(222, '/2019/07/09/Mogacko04_Result', '2019-08-14 16:43:09', '172.69.33.243', 'https://jopemachine.github.io/2019/07/09/Mogacko04_Result/'),
(223, '/2019/07/12/Mogacko05', '2019-08-14 16:43:13', '172.69.33.243', 'https://jopemachine.github.io/2019/07/12/Mogacko05/'),
(224, '/2019/07/12/Mogacko05_Result', '2019-08-14 16:43:15', '172.69.33.243', 'https://jopemachine.github.io/2019/07/12/Mogacko05_Result/'),
(225, '/2019/07/16/Mogacko06', '2019-08-14 16:43:18', '172.69.33.243', 'https://jopemachine.github.io/2019/07/16/Mogacko06/'),
(226, '/2019/07/16/Mogacko06_Result', '2019-08-14 16:43:21', '172.69.33.243', 'https://jopemachine.github.io/2019/07/16/Mogacko06_Result/'),
(227, '/2019/07/19/Mogacko07', '2019-08-14 16:43:24', '172.69.33.243', 'https://jopemachine.github.io/2019/07/19/Mogacko07/'),
(228, '/2019/07/19/Mogacko07_Result', '2019-08-14 16:43:28', '172.69.33.243', 'https://jopemachine.github.io/2019/07/19/Mogacko07_Result/'),
(229, '/2019/07/23/Mogacko08', '2019-08-14 16:43:32', '172.69.33.243', 'https://jopemachine.github.io/2019/07/23/Mogacko08/'),
(230, '/2019/07/05/Mogacko03', '2019-08-14 16:45:41', '172.69.33.243', 'https://jopemachine.github.io/2019/07/05/Mogacko03/'),
(231, '/2019/08/06/Mogacko11', '2019-08-14 17:54:38', '162.158.7.69', 'https://jopemachine.github.io/2019/08/06/Mogacko11/'),
(232, '/2019/06/28/Mogacko01', '2019-08-14 19:01:15', '172.69.33.171', 'https://jopemachine.github.io/2019/06/28/Mogacko01/'),
(233, '/2019/08/13/Mogacko12', '2019-08-14 19:01:59', '172.69.33.171', 'https://jopemachine.github.io/2019/08/13/Mogacko12/'),
(234, '/2019/08/13/Mogacko12_Result', '2019-08-14 19:02:03', '172.69.33.171', 'https://jopemachine.github.io/2019/08/13/Mogacko12_Result/'),
(235, '/2019/08/06/Mogacko11_Result', '2019-08-14 19:02:09', '172.69.33.171', 'https://jopemachine.github.io/2019/08/06/Mogacko11_Result/'),
(236, '/2019/06/28/Mogacko01_Result', '2019-08-14 19:02:25', '172.69.33.171', 'https://jopemachine.github.io/2019/06/28/Mogacko01_Result/'),
(237, '/2019/07/02/Mogacko02_Result', '2019-08-14 19:02:36', '172.69.33.171', 'https://jopemachine.github.io/2019/07/02/Mogacko02_Result/'),
(238, '/2019/06/28/Mogacko01', '2019-08-14 19:53:46', '162.158.6.224', 'https://jopemachine.github.io/2019/06/28/Mogacko01/'),
(239, '/2019/06/28/Mogacko01_Result', '2019-08-14 19:53:48', '162.158.6.224', 'https://jopemachine.github.io/2019/06/28/Mogacko01_Result/'),
(240, '/2019/07/02/Mogacko02', '2019-08-14 19:53:51', '162.158.6.224', 'https://jopemachine.github.io/2019/07/02/Mogacko02/'),
(241, '/2019/07/02/Mogacko02_Result', '2019-08-14 19:53:53', '162.158.6.224', 'https://jopemachine.github.io/2019/07/02/Mogacko02_Result/'),
(242, '/2019/07/05/Mogacko03', '2019-08-14 19:54:14', '162.158.6.224', 'https://jopemachine.github.io/2019/07/05/Mogacko03/'),
(243, '/2019/07/05/Mogacko03_Result', '2019-08-14 19:54:19', '162.158.6.224', 'https://jopemachine.github.io/2019/07/05/Mogacko03_Result/'),
(244, '/2019/07/09/Mogacko04', '2019-08-14 19:54:40', '162.158.6.224', 'https://jopemachine.github.io/2019/07/09/Mogacko04/'),
(245, '/2019/07/09/Mogacko04_Result', '2019-08-14 19:54:45', '162.158.6.224', 'https://jopemachine.github.io/2019/07/09/Mogacko04_Result/'),
(246, '/2019/07/12/Mogacko05', '2019-08-14 19:54:50', '162.158.6.224', 'https://jopemachine.github.io/2019/07/12/Mogacko05/'),
(247, '/2019/07/12/Mogacko05_Result', '2019-08-14 19:54:53', '162.158.6.224', 'https://jopemachine.github.io/2019/07/12/Mogacko05_Result/'),
(248, '/2019/07/16/Mogacko06', '2019-08-14 19:55:01', '162.158.6.224', 'https://jopemachine.github.io/2019/07/16/Mogacko06/'),
(249, '/2019/07/16/Mogacko06_Result', '2019-08-14 19:55:07', '162.158.6.224', 'https://jopemachine.github.io/2019/07/16/Mogacko06_Result/'),
(250, '/2019/07/19/Mogacko07', '2019-08-14 19:55:11', '162.158.6.224', 'https://jopemachine.github.io/2019/07/19/Mogacko07/'),
(251, '/2019/07/19/Mogacko07_Result', '2019-08-14 19:55:17', '162.158.6.224', 'https://jopemachine.github.io/2019/07/19/Mogacko07_Result/'),
(252, '/2019/07/23/Mogacko08', '2019-08-14 19:55:21', '162.158.6.224', 'https://jopemachine.github.io/2019/07/23/Mogacko08/'),
(253, '/2019/07/23/Mogacko08_Result', '2019-08-14 19:55:38', '162.158.6.224', 'https://jopemachine.github.io/2019/07/23/Mogacko08_Result/'),
(254, '/2019/07/30/Mogacko09_Result', '2019-08-14 19:55:51', '162.158.6.224', 'https://jopemachine.github.io/2019/07/30/Mogacko09_Result/'),
(255, '/2019/08/02/Mogacko10', '2019-08-14 19:55:54', '162.158.6.224', 'https://jopemachine.github.io/2019/08/02/Mogacko10/'),
(256, '/2019/08/02/Mogacko10_Result', '2019-08-14 19:55:57', '162.158.6.224', 'https://jopemachine.github.io/2019/08/02/Mogacko10_Result/'),
(257, '/2019/08/06/Mogacko11', '2019-08-14 19:56:04', '162.158.6.224', 'https://jopemachine.github.io/2019/08/06/Mogacko11/'),
(258, '/2019/08/06/Mogacko11_Result', '2019-08-14 19:56:07', '162.158.6.224', 'https://jopemachine.github.io/2019/08/06/Mogacko11_Result/'),
(259, '/2019/08/13/Mogacko12', '2019-08-14 19:56:12', '162.158.6.224', 'https://jopemachine.github.io/2019/08/13/Mogacko12/'),
(260, '/2019/08/13/Mogacko12_Result', '2019-08-14 19:56:31', '162.158.6.224', 'https://jopemachine.github.io/2019/08/13/Mogacko12_Result/'),
(261, '/2019/08/13/Mogacko12_Result', '2019-08-15 09:57:15', '162.158.7.51', 'https://jopemachine.github.io/2019/08/13/Mogacko12_Result/'),
(262, '/2019/08/06/Mogacko11', '2019-08-15 16:25:39', '162.158.6.62', 'https://jopemachine.github.io/2019/08/06/Mogacko11/'),
(263, '/2019/08/02/Mogacko10_Result', '2019-08-15 16:25:47', '162.158.6.62', 'https://jopemachine.github.io/2019/08/02/Mogacko10_Result/'),
(264, '/2019/08/02/Mogacko10', '2019-08-15 16:25:52', '162.158.6.62', 'https://jopemachine.github.io/2019/08/02/Mogacko10/'),
(265, '/2019/07/30/Mogacko09_Result', '2019-08-15 16:26:08', '162.158.6.62', 'https://jopemachine.github.io/2019/07/30/Mogacko09_Result/'),
(266, '/2019/07/30/Mogacko09', '2019-08-15 16:26:11', '162.158.6.62', 'https://jopemachine.github.io/2019/07/30/Mogacko09/'),
(267, '/2019/07/23/Mogacko08_Result', '2019-08-15 16:40:26', '162.158.7.33', 'https://jopemachine.github.io/2019/07/23/Mogacko08_Result/'),
(268, '/2019/08/06/Mogacko11', '2019-08-16 17:51:55', '162.158.7.97', 'https://jopemachine.github.io/2019/08/06/Mogacko11/'),
(269, '/2019/08/06/Mogacko11', '2019-08-16 17:55:04', '162.158.7.97', 'https://jopemachine.github.io/2019/08/06/Mogacko11/'),
(270, '/2019/08/02/Mogacko10_Result', '2019-08-16 17:55:31', '162.158.7.97', 'https://jopemachine.github.io/2019/08/02/Mogacko10_Result/'),
(271, '/2019/08/02/Mogacko10', '2019-08-16 17:58:06', '162.158.7.97', 'https://jopemachine.github.io/2019/08/02/Mogacko10/'),
(272, '/2019/07/30/Mogacko09_Result', '2019-08-16 17:58:09', '162.158.7.97', 'https://jopemachine.github.io/2019/07/30/Mogacko09_Result/'),
(273, '/2019/07/30/Mogacko09', '2019-08-16 17:58:13', '162.158.7.97', 'https://jopemachine.github.io/2019/07/30/Mogacko09/'),
(274, '/2019/07/23/Mogacko08_Result', '2019-08-16 17:59:20', '162.158.7.97', 'https://jopemachine.github.io/2019/07/23/Mogacko08_Result/'),
(275, '/2019/07/23/Mogacko08', '2019-08-16 17:59:35', '162.158.7.97', 'https://jopemachine.github.io/2019/07/23/Mogacko08/'),
(276, '/2019/07/19/Mogacko07_Result', '2019-08-16 17:59:38', '162.158.7.97', 'https://jopemachine.github.io/2019/07/19/Mogacko07_Result/'),
(277, '/2019/07/19/Mogacko07', '2019-08-16 17:59:42', '162.158.7.97', 'https://jopemachine.github.io/2019/07/19/Mogacko07/'),
(278, '/2019/07/16/Mogacko06_Result', '2019-08-16 17:59:45', '162.158.7.97', 'https://jopemachine.github.io/2019/07/16/Mogacko06_Result/'),
(279, '/2019/07/16/Mogacko06', '2019-08-16 17:59:57', '162.158.7.97', 'https://jopemachine.github.io/2019/07/16/Mogacko06/'),
(280, '/2019/07/12/Mogacko05_Result', '2019-08-16 18:00:07', '162.158.7.97', 'https://jopemachine.github.io/2019/07/12/Mogacko05_Result/'),
(281, '/2019/07/12/Mogacko05', '2019-08-16 18:00:23', '162.158.7.97', 'https://jopemachine.github.io/2019/07/12/Mogacko05/'),
(282, '/2019/07/09/Mogacko04_Result', '2019-08-16 18:00:27', '162.158.7.97', 'https://jopemachine.github.io/2019/07/09/Mogacko04_Result/'),
(283, '/2019/07/09/Mogacko04', '2019-08-16 18:00:31', '162.158.7.97', 'https://jopemachine.github.io/2019/07/09/Mogacko04/'),
(284, '/2019/07/05/Mogacko03_Result', '2019-08-16 18:00:34', '162.158.7.97', 'https://jopemachine.github.io/2019/07/05/Mogacko03_Result/'),
(285, '/2019/07/05/Mogacko03', '2019-08-16 18:00:50', '162.158.7.97', 'https://jopemachine.github.io/2019/07/05/Mogacko03/'),
(286, '/2019/07/02/Mogacko02_Result', '2019-08-16 18:00:52', '162.158.7.97', 'https://jopemachine.github.io/2019/07/02/Mogacko02_Result/'),
(287, '/2019/07/02/Mogacko02', '2019-08-16 18:01:00', '162.158.7.97', 'https://jopemachine.github.io/2019/07/02/Mogacko02/'),
(288, '/2019/06/28/Mogacko01_Result', '2019-08-16 18:01:02', '162.158.7.97', 'https://jopemachine.github.io/2019/06/28/Mogacko01_Result/'),
(289, '/2019/06/28/Mogacko01', '2019-08-16 18:01:06', '162.158.7.97', 'https://jopemachine.github.io/2019/06/28/Mogacko01/'),
(290, '/2019/08/13/Mogacko12_Result', '2019-08-16 18:01:11', '162.158.7.97', 'https://jopemachine.github.io/2019/08/13/Mogacko12_Result/'),
(291, '/2019/08/13/Mogacko12', '2019-08-16 18:01:14', '162.158.7.97', 'https://jopemachine.github.io/2019/08/13/Mogacko12/'),
(292, '/2019/08/06/Mogacko11_Result', '2019-08-16 18:01:16', '162.158.7.97', 'https://jopemachine.github.io/2019/08/06/Mogacko11_Result/'),
(293, '/2019/08/06/Mogacko11_Result', '2019-08-20 15:15:18', '172.69.135.80', 'https://jopemachine.github.io/2019/08/06/Mogacko11_Result/'),
(294, '/2019/08/06/Mogacko11', '2019-08-20 15:15:21', '172.69.135.80', 'https://jopemachine.github.io/2019/08/06/Mogacko11/'),
(295, '/2019/08/02/Mogacko10_Result', '2019-08-20 15:15:27', '172.69.135.80', 'https://jopemachine.github.io/2019/08/02/Mogacko10_Result/'),
(296, '/2019/08/02/Mogacko10', '2019-08-20 15:15:32', '172.69.135.80', 'https://jopemachine.github.io/2019/08/02/Mogacko10/'),
(297, '/2019/07/30/Mogacko09_Result', '2019-08-20 15:15:36', '172.69.135.80', 'https://jopemachine.github.io/2019/07/30/Mogacko09_Result/'),
(298, '/2019/07/30/Mogacko09_Result', '2019-08-20 15:15:51', '172.69.134.157', 'https://jopemachine.github.io/2019/07/30/Mogacko09_Result/'),
(299, '/2019/07/30/Mogacko09', '2019-08-20 15:15:56', '172.69.134.157', 'https://jopemachine.github.io/2019/07/30/Mogacko09/'),
(300, '/2019/07/23/Mogacko08', '2019-08-20 15:16:01', '172.69.134.157', 'https://jopemachine.github.io/2019/07/23/Mogacko08/'),
(301, '/2019/08/13/Mogacko12_Result', '2019-08-20 16:08:02', '162.158.166.119', 'https://jopemachine.github.io/2019/08/13/Mogacko12_Result/'),
(302, '/2019/07/23/Mogacko08', '2019-08-20 16:15:53', '162.158.167.166', 'https://jopemachine.github.io/2019/07/23/Mogacko08/'),
(303, '/2019/08/13/Mogacko12_Result', '2019-08-20 16:19:18', '162.158.165.100', 'https://jopemachine.github.io/2019/08/13/Mogacko12_Result/'),
(304, '/2019/08/13/Mogacko12_Result', '2019-08-22 20:13:03', '162.158.7.51', 'https://jopemachine.github.io/2019/08/13/Mogacko12_Result/'),
(305, '/2019/08/13/Mogacko12', '2019-08-22 20:18:41', '162.158.6.38', 'https://jopemachine.github.io/2019/08/13/Mogacko12/'),
(306, '/2019/08/06/Mogacko11_Result', '2019-08-22 20:19:06', '162.158.6.38', 'https://jopemachine.github.io/2019/08/06/Mogacko11_Result/'),
(307, '/2019/08/06/Mogacko11', '2019-08-22 20:19:17', '162.158.6.38', 'https://jopemachine.github.io/2019/08/06/Mogacko11/'),
(308, '/2019/08/02/Mogacko10_Result', '2019-08-22 20:19:25', '162.158.6.38', 'https://jopemachine.github.io/2019/08/02/Mogacko10_Result/'),
(309, '/2019/08/02/Mogacko10', '2019-08-22 20:19:37', '162.158.6.38', 'https://jopemachine.github.io/2019/08/02/Mogacko10/'),
(310, '/2019/07/30/Mogacko09_Result', '2019-08-22 20:19:42', '162.158.6.38', 'https://jopemachine.github.io/2019/07/30/Mogacko09_Result/'),
(311, '/2019/07/30/Mogacko09', '2019-08-22 20:19:46', '162.158.6.38', 'https://jopemachine.github.io/2019/07/30/Mogacko09/'),
(312, '/2019/07/23/Mogacko08_Result', '2019-08-22 20:19:54', '162.158.6.38', 'https://jopemachine.github.io/2019/07/23/Mogacko08_Result/'),
(313, '/2019/07/23/Mogacko08', '2019-08-22 20:20:01', '162.158.6.38', 'https://jopemachine.github.io/2019/07/23/Mogacko08/'),
(314, '/2019/07/23/Mogacko08', '2019-08-22 20:25:57', '162.158.7.109', 'https://jopemachine.github.io/2019/07/23/Mogacko08/'),
(315, '/2019/07/19/Mogacko07', '2019-08-22 22:10:27', '162.158.6.86', 'https://jopemachine.github.io/2019/07/19/Mogacko07/'),
(316, '/2019/07/05/Mogacko03', '2019-08-22 22:17:15', '162.158.7.27', 'https://jopemachine.github.io/2019/07/05/Mogacko03/'),
(317, '/2019/07/09/Mogacko04', '2019-08-22 22:17:32', '162.158.7.27', 'https://jopemachine.github.io/2019/07/09/Mogacko04/'),
(318, '/2019/06/28/Mogacko01_Result', '2019-08-22 22:38:51', '162.158.7.21', 'https://jopemachine.github.io/2019/06/28/Mogacko01_Result/'),
(319, '/2019/07/05/Mogacko03_Result', '2019-08-22 23:04:29', '162.158.7.109', 'https://jopemachine.github.io/2019/07/05/Mogacko03_Result/'),
(320, '/2019/07/05/Mogacko03_Result', '2019-08-22 23:57:59', '162.158.7.51', 'https://jopemachine.github.io/2019/07/05/Mogacko03_Result/'),
(321, '/2019/08/23/Bottom Display', '2019-08-23 13:12:59', '162.158.7.51', 'https://jopemachine.github.io/2019/08/23/Bottom-Display/'),
(322, '/2019/08/23/Bottom Display', '2019-08-23 13:56:03', '162.158.6.14', 'https://jopemachine.github.io/2019/08/23/Bottom-Display/'),
(323, '/2019/08/13/Mogacko12_Result', '2019-08-23 16:23:08', '162.158.6.86', 'https://jopemachine.github.io/2019/08/13/Mogacko12_Result/');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `/2019/06/28/mogacko01`
--
ALTER TABLE `/2019/06/28/mogacko01`
  ADD PRIMARY KEY (`CommentIndex`);

--
-- 테이블의 인덱스 `/2019/06/28/mogacko01_result`
--
ALTER TABLE `/2019/06/28/mogacko01_result`
  ADD PRIMARY KEY (`CommentIndex`);

--
-- 테이블의 인덱스 `/2019/07/02/mogacko02`
--
ALTER TABLE `/2019/07/02/mogacko02`
  ADD PRIMARY KEY (`CommentIndex`);

--
-- 테이블의 인덱스 `/2019/07/02/mogacko02_result`
--
ALTER TABLE `/2019/07/02/mogacko02_result`
  ADD PRIMARY KEY (`CommentIndex`);

--
-- 테이블의 인덱스 `/2019/07/05/mogacko03`
--
ALTER TABLE `/2019/07/05/mogacko03`
  ADD PRIMARY KEY (`CommentIndex`);

--
-- 테이블의 인덱스 `/2019/07/05/mogacko03_result`
--
ALTER TABLE `/2019/07/05/mogacko03_result`
  ADD PRIMARY KEY (`CommentIndex`);

--
-- 테이블의 인덱스 `/2019/07/09/mogacko04`
--
ALTER TABLE `/2019/07/09/mogacko04`
  ADD PRIMARY KEY (`CommentIndex`);

--
-- 테이블의 인덱스 `/2019/07/09/mogacko04_result`
--
ALTER TABLE `/2019/07/09/mogacko04_result`
  ADD PRIMARY KEY (`CommentIndex`);

--
-- 테이블의 인덱스 `/2019/07/12/mogacko05`
--
ALTER TABLE `/2019/07/12/mogacko05`
  ADD PRIMARY KEY (`CommentIndex`);

--
-- 테이블의 인덱스 `/2019/07/12/mogacko05_result`
--
ALTER TABLE `/2019/07/12/mogacko05_result`
  ADD PRIMARY KEY (`CommentIndex`);

--
-- 테이블의 인덱스 `/2019/07/16/mogacko06`
--
ALTER TABLE `/2019/07/16/mogacko06`
  ADD PRIMARY KEY (`CommentIndex`);

--
-- 테이블의 인덱스 `/2019/07/16/mogacko06_result`
--
ALTER TABLE `/2019/07/16/mogacko06_result`
  ADD PRIMARY KEY (`CommentIndex`);

--
-- 테이블의 인덱스 `/2019/07/19/mogacko07`
--
ALTER TABLE `/2019/07/19/mogacko07`
  ADD PRIMARY KEY (`CommentIndex`);

--
-- 테이블의 인덱스 `/2019/07/19/mogacko07_result`
--
ALTER TABLE `/2019/07/19/mogacko07_result`
  ADD PRIMARY KEY (`CommentIndex`);

--
-- 테이블의 인덱스 `/2019/07/23/mogacko08`
--
ALTER TABLE `/2019/07/23/mogacko08`
  ADD PRIMARY KEY (`CommentIndex`);

--
-- 테이블의 인덱스 `/2019/07/23/mogacko08_result`
--
ALTER TABLE `/2019/07/23/mogacko08_result`
  ADD PRIMARY KEY (`CommentIndex`);

--
-- 테이블의 인덱스 `/2019/07/30/mogacko09`
--
ALTER TABLE `/2019/07/30/mogacko09`
  ADD PRIMARY KEY (`CommentIndex`);

--
-- 테이블의 인덱스 `/2019/07/30/mogacko09_result`
--
ALTER TABLE `/2019/07/30/mogacko09_result`
  ADD PRIMARY KEY (`CommentIndex`);

--
-- 테이블의 인덱스 `/2019/08/02/mogacko10`
--
ALTER TABLE `/2019/08/02/mogacko10`
  ADD PRIMARY KEY (`CommentIndex`);

--
-- 테이블의 인덱스 `/2019/08/02/mogacko10_result`
--
ALTER TABLE `/2019/08/02/mogacko10_result`
  ADD PRIMARY KEY (`CommentIndex`);

--
-- 테이블의 인덱스 `/2019/08/06/mogacko11`
--
ALTER TABLE `/2019/08/06/mogacko11`
  ADD PRIMARY KEY (`CommentIndex`);

--
-- 테이블의 인덱스 `/2019/08/06/mogacko11_result`
--
ALTER TABLE `/2019/08/06/mogacko11_result`
  ADD PRIMARY KEY (`CommentIndex`);

--
-- 테이블의 인덱스 `/2019/08/13/mogacko12`
--
ALTER TABLE `/2019/08/13/mogacko12`
  ADD PRIMARY KEY (`CommentIndex`);

--
-- 테이블의 인덱스 `/2019/08/13/mogacko12_result`
--
ALTER TABLE `/2019/08/13/mogacko12_result`
  ADD PRIMARY KEY (`CommentIndex`);

--
-- 테이블의 인덱스 `/2019/08/23/bottom display`
--
ALTER TABLE `/2019/08/23/bottom display`
  ADD PRIMARY KEY (`CommentIndex`);

--
-- 테이블의 인덱스 `visitorcounter`
--
ALTER TABLE `visitorcounter`
  ADD PRIMARY KEY (`I`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `/2019/06/28/mogacko01`
--
ALTER TABLE `/2019/06/28/mogacko01`
  MODIFY `CommentIndex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 테이블의 AUTO_INCREMENT `/2019/06/28/mogacko01_result`
--
ALTER TABLE `/2019/06/28/mogacko01_result`
  MODIFY `CommentIndex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 테이블의 AUTO_INCREMENT `/2019/07/02/mogacko02`
--
ALTER TABLE `/2019/07/02/mogacko02`
  MODIFY `CommentIndex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 테이블의 AUTO_INCREMENT `/2019/07/02/mogacko02_result`
--
ALTER TABLE `/2019/07/02/mogacko02_result`
  MODIFY `CommentIndex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 테이블의 AUTO_INCREMENT `/2019/07/05/mogacko03`
--
ALTER TABLE `/2019/07/05/mogacko03`
  MODIFY `CommentIndex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 테이블의 AUTO_INCREMENT `/2019/07/05/mogacko03_result`
--
ALTER TABLE `/2019/07/05/mogacko03_result`
  MODIFY `CommentIndex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- 테이블의 AUTO_INCREMENT `/2019/07/09/mogacko04`
--
ALTER TABLE `/2019/07/09/mogacko04`
  MODIFY `CommentIndex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 테이블의 AUTO_INCREMENT `/2019/07/09/mogacko04_result`
--
ALTER TABLE `/2019/07/09/mogacko04_result`
  MODIFY `CommentIndex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 테이블의 AUTO_INCREMENT `/2019/07/12/mogacko05`
--
ALTER TABLE `/2019/07/12/mogacko05`
  MODIFY `CommentIndex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 테이블의 AUTO_INCREMENT `/2019/07/12/mogacko05_result`
--
ALTER TABLE `/2019/07/12/mogacko05_result`
  MODIFY `CommentIndex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 테이블의 AUTO_INCREMENT `/2019/07/16/mogacko06`
--
ALTER TABLE `/2019/07/16/mogacko06`
  MODIFY `CommentIndex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 테이블의 AUTO_INCREMENT `/2019/07/16/mogacko06_result`
--
ALTER TABLE `/2019/07/16/mogacko06_result`
  MODIFY `CommentIndex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 테이블의 AUTO_INCREMENT `/2019/07/19/mogacko07`
--
ALTER TABLE `/2019/07/19/mogacko07`
  MODIFY `CommentIndex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 테이블의 AUTO_INCREMENT `/2019/07/19/mogacko07_result`
--
ALTER TABLE `/2019/07/19/mogacko07_result`
  MODIFY `CommentIndex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 테이블의 AUTO_INCREMENT `/2019/07/23/mogacko08`
--
ALTER TABLE `/2019/07/23/mogacko08`
  MODIFY `CommentIndex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 테이블의 AUTO_INCREMENT `/2019/07/23/mogacko08_result`
--
ALTER TABLE `/2019/07/23/mogacko08_result`
  MODIFY `CommentIndex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- 테이블의 AUTO_INCREMENT `/2019/07/30/mogacko09`
--
ALTER TABLE `/2019/07/30/mogacko09`
  MODIFY `CommentIndex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- 테이블의 AUTO_INCREMENT `/2019/07/30/mogacko09_result`
--
ALTER TABLE `/2019/07/30/mogacko09_result`
  MODIFY `CommentIndex` int(11) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `/2019/08/02/mogacko10`
--
ALTER TABLE `/2019/08/02/mogacko10`
  MODIFY `CommentIndex` int(11) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `/2019/08/02/mogacko10_result`
--
ALTER TABLE `/2019/08/02/mogacko10_result`
  MODIFY `CommentIndex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 테이블의 AUTO_INCREMENT `/2019/08/06/mogacko11`
--
ALTER TABLE `/2019/08/06/mogacko11`
  MODIFY `CommentIndex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 테이블의 AUTO_INCREMENT `/2019/08/06/mogacko11_result`
--
ALTER TABLE `/2019/08/06/mogacko11_result`
  MODIFY `CommentIndex` int(11) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `/2019/08/13/mogacko12`
--
ALTER TABLE `/2019/08/13/mogacko12`
  MODIFY `CommentIndex` int(11) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `/2019/08/13/mogacko12_result`
--
ALTER TABLE `/2019/08/13/mogacko12_result`
  MODIFY `CommentIndex` int(11) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `/2019/08/23/bottom display`
--
ALTER TABLE `/2019/08/23/bottom display`
  MODIFY `CommentIndex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- 테이블의 AUTO_INCREMENT `visitorcounter`
--
ALTER TABLE `visitorcounter`
  MODIFY `I` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=324;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
