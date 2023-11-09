-- --------------------------------------------------------
-- 호스트:                          127.0.0.1
-- 서버 버전:                        10.4.24-MariaDB - mariadb.org binary distribution
-- 서버 OS:                        Win64
-- HeidiSQL 버전:                  11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- phpdb 데이터베이스 구조 내보내기
DROP DATABASE IF EXISTS `phpdb`;
CREATE DATABASE IF NOT EXISTS `phpdb` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `phpdb`;

-- 테이블 phpdb.actor 구조 내보내기
DROP TABLE IF EXISTS `actor`;
CREATE TABLE IF NOT EXISTS `actor` (
  `a_name` varchar(10) NOT NULL,
  `a_pic` varchar(30) DEFAULT NULL,
  `a_birth` varchar(10) DEFAULT NULL,
  `a_debut` varchar(50) DEFAULT NULL,
  `a_drama` varchar(50) DEFAULT NULL,
  `a_movie` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`a_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 phpdb.actor:~7 rows (대략적) 내보내기
DELETE FROM `actor`;
/*!40000 ALTER TABLE `actor` DISABLE KEYS */;
INSERT INTO `actor` (`a_name`, `a_pic`, `a_birth`, `a_debut`, `a_drama`, `a_movie`) VALUES
	('김유정', 'actor/kimyujung.jpg', '1999-09-22', '2003년 CF 크라운제과 - 크라운산도', '-', '20세기 소녀'),
	('박정민', 'actor/parkjeongmin.jpg', '198-03-24', '2011년 영화 "파수꾼"', '지옥', '사냥의 시간'),
	('송강', 'actor/songkang.jpg', '1994-04-23', '2017년 tvN 드라마 ', '좋아하면 울리는 시즌1, 좋아하면 울리는 시즌2, 스위트홈', '-'),
	('유아인', 'actor/yooahin.jpg', '1986-10-06', '2003년 농심 "쫄쫄면" 광고', '지옥', '서울대작전'),
	('전지현', 'actor/jungianna.jpg', '1981-10-30', '1997년 잡지 "에꼴" 표지 모델', '-', '킹덤 아신전'),
	('주지훈', 'actor/jujihoon.jpg', '1982-05-16', '2003년 S/S 시즌 서울 컬렉션 (모델) 2006년 MBC 드라마 <궁> (배우)', '킹덤 시즌1, 킹덤 시즌2', '-'),
	('황정민', 'actor/hwangjungmin.jpg', '1970-09-01', '1994년 뮤지컬 ', '수리남', '-');
/*!40000 ALTER TABLE `actor` ENABLE KEYS */;

-- 테이블 phpdb.director 구조 내보내기
DROP TABLE IF EXISTS `director`;
CREATE TABLE IF NOT EXISTS `director` (
  `d_name` varchar(10) NOT NULL,
  `d_pic` varchar(30) DEFAULT NULL,
  `d_birth` varchar(10) DEFAULT NULL,
  `d_debut` varchar(30) DEFAULT NULL,
  `d_drama` varchar(50) DEFAULT NULL,
  `d_movie` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`d_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 phpdb.director:~4 rows (대략적) 내보내기
DELETE FROM `director`;
/*!40000 ALTER TABLE `director` DISABLE KEYS */;
INSERT INTO `director` (`d_name`, `d_pic`, `d_birth`, `d_debut`, `d_drama`, `d_movie`) VALUES
	('김성훈', 'director/kimsunghun.jpg', '1971-02-20', '2003년 영화 "오! 해피데이" 조감독', '킹덤 시즌1, 킹덤 시즌2', '킹덤 아신전'),
	('방우리', 'director/banguri.jpg', '-', '2014년 단편 영화 "영희씨"', '-', '20세기 소녀'),
	('윤종빈', 'director/YJB.jpg', '1979-12-20', '2004년 "남성의 증명"', '수리남', '-'),
	('황동혁', 'director/hwangdonghyuk.jpg', '1971-05-26', '2007년 영화 "마이 파더"', '오징어게임', '-');
/*!40000 ALTER TABLE `director` ENABLE KEYS */;

-- 테이블 phpdb.drama 구조 내보내기
DROP TABLE IF EXISTS `drama`;
CREATE TABLE IF NOT EXISTS `drama` (
  `title` varchar(20) NOT NULL,
  `genre` varchar(30) DEFAULT NULL,
  `actor` varchar(50) DEFAULT NULL,
  `poster` varchar(50) DEFAULT NULL,
  `director` varchar(10) DEFAULT NULL,
  `opening` varchar(10) DEFAULT NULL,
  `plot` text DEFAULT NULL,
  PRIMARY KEY (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 phpdb.drama:~8 rows (대략적) 내보내기
DELETE FROM `drama`;
/*!40000 ALTER TABLE `drama` DISABLE KEYS */;
INSERT INTO `drama` (`title`, `genre`, `actor`, `poster`, `director`, `opening`, `plot`) VALUES
	('수리남', '범죄, 스릴러, 액션', '하정우, 황정민, 박해수, 조우진, 유연석', 'poster/su.jpg', '윤종빈', '2022-09-09', '마약'),
	('스위트홈', '스릴러, 공포, 생존', '송강, 이시영, 이진욱, 이도현', 'poster/sweethome.jpg', '이응복', '2020-12-18', '세상을 차단하고 방 안에 틀어박힌 10대 소년. 현수가 세상 밖으로 나온다. 인간이 괴물로 변했다. 그래도 살아야 한다. 아직은 사람이니까. 이웃들과 함께 싸워야 한다.'),
	('썸바디', '범죄, 서스펜스, 스릴러', '김영광, 강해림, 김용지, 김수연', 'poster/somebody.jpg', '정지우', '2022-11-18', '한 소프트웨어 개발자가 데이팅 앱을 만들었다. 연쇄 살인범이 다음 타깃을 찾는 데 앱이 이용되면서, 개발자는 로맨스와 살인이 뒤얽힌 어둠의 세계로 빠져드는데.'),
	('오징어게임', '서바이벌, 스릴러, 액션', '이정재, 박해수, 위하준, 오영수, 정호연', 'poster/squid.jpg', '황동혁', '2021-09-17', '456억, 어른들의 동심이 파괴된다.'),
	('인간수업', '범죄, 스릴러, 하이틴', '김동희, 박주현, 정다빈, 남윤수', 'poster/human.jpg', '김진민', '2020-04-29', '범죄'),
	('지옥', '공포, 범죄, 스릴러, 미스터리', '유아인, 김현주, 박정민', 'poster/hell.jpg', '연상호', '2021-11-19', '어느 날 기이한 존재로부터 지옥행을 선고받은 사람들. 충격과 두려움에 휩싸인 도시에 대혼란의 시대가 도래한다. 신의 심판을 외치며 세를 확장하려는 종교단체와 진실을 파헤치는 자들의 이야기.'),
	('킹덤 시즌1', '좀비, 스릴러, 사극, 액션', '주지훈, 배두나, 류승룡', 'poster/kingdom1.jpg', '김성훈', '2019-01-25', '병든 왕을 둘러싸고 흉흉한 소문이 떠돈다.\r\n어둠에 뒤덮인 조선, 기이한 역병에 신음하는 산하.\r\n정체 모를 악에 맞서 백성을 구원할 희망은 오직 세자뿐이다.'),
	('킹덤 시즌2', '좀비, 스릴러, 사극, 액션', '주지훈, 배두나, 류승룡', 'poster/kingdom2.jpg', '김성훈', '2020-03-13', '역병이 퍼져나간다. 누구도 안전할 수는 없다.\r\n조선을 지키고자 싸우는 세자, 그의 길을 막는 산 자와 죽은 자들.\r\n이제 피의 전쟁이 시작된다.');
/*!40000 ALTER TABLE `drama` ENABLE KEYS */;

-- 테이블 phpdb.movie 구조 내보내기
DROP TABLE IF EXISTS `movie`;
CREATE TABLE IF NOT EXISTS `movie` (
  `m_title` varchar(20) NOT NULL,
  `m_genre` varchar(30) DEFAULT NULL,
  `m_actor` varchar(50) DEFAULT NULL,
  `m_poster` varchar(50) DEFAULT NULL,
  `m_director` varchar(10) DEFAULT NULL,
  `m_opening` varchar(10) DEFAULT NULL,
  `m_plot` text DEFAULT NULL,
  PRIMARY KEY (`m_title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 phpdb.movie:~5 rows (대략적) 내보내기
DELETE FROM `movie`;
/*!40000 ALTER TABLE `movie` DISABLE KEYS */;
INSERT INTO `movie` (`m_title`, `m_genre`, `m_actor`, `m_poster`, `m_director`, `m_opening`, `m_plot`) VALUES
	('20세기 소녀', '청춘, 로맨스, 시대극', '김유정, 변우석, 박정우, 노윤서', 'movie/20th.jpg', '방우리', '2022-10-21', '1999년, 단짝 친구가 홀딱 반한 남학생을 친구 대신 관찰해 주기로 한 10대 소녀. 하지만 소녀에게도 예기치 못한 사랑이 찾아온다.'),
	('사냥의 시간', '범죄, 스릴러', '이제훈, 안재홍, 최우식, 박정민', 'movie/hunt.png', '윤성현', '2020-04-23', '그날, 우리는 놈의 사냥감이 되었다.\r\n\r\n희망 없는 도시, 감옥에서 출소한 ‘준석’은 가족 같은 친구들인 ‘장호’와 ‘기훈’ 그리고 ‘상수’와 함께 무모한 작전을 계획한다.\r\n\r\n새로운 인생을 향한 부푼 꿈도 잠시 이들을 뒤쫓는 정체불명의 추격자가 나타나면서 목숨마저 위협받게 된다.\r\n\r\n서로가 세상의 전부인 네 친구들은 놈의 사냥에서 벗어날 수 있을까?\r\n\r\n심장을 조여오는 지옥 같은 사냥의 시간이 시작된다.'),
	('서울대작전', '액션, 범죄, 시대극', '유아인, 고경표, 이규형, 박주현, 옹성우', 'movie/seoul.jpg', '문현성', '2022-08-26', '1988년 서울올림픽을 앞두고, 드라이버와 정비 전문가 등이 모인 팀이 특수 위장 작전에 투입된다. 작전의 목표는 대규모 돈세탁 조직의 실체를 밝히고 와해하는 것.'),
	('승리호', 'SF, 디스토피아, 액션', '송중기, 김태리, 진선규, 유해진, 박예린', 'movie/victory.jpg', '조성희', '2021-02-05', '2092년, 지구는 병들고 우주 위성궤도에 인류의 새로운 보금자리인 UTS가 만들어졌다.'),
	('킹덤 아신전', '스릴러, 좀비, 액션', '전지현', 'movie/kingdomA.jpg', '김성훈', '2021-07-23', '비극과 배신이 삶을 덮친다. 기이하고 불길한 뭔가를 발견한다.\r\n한순간에 가족과 동족을 잃은 여인.\r\n오직 복수를 꿈꾸며 살아온 그녀가 짙은 어둠을 마주한다.');
/*!40000 ALTER TABLE `movie` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
