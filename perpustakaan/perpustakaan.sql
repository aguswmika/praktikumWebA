# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.26)
# Database: tokobuku
# Generation Time: 2020-05-30 16:30:46 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table buku
# ------------------------------------------------------------

DROP TABLE IF EXISTS `buku`;

CREATE TABLE `buku` (
  `id_buku` char(12) NOT NULL DEFAULT '',
  `judul` varchar(255) NOT NULL,
  `noisbn` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun` year(4) NOT NULL,
  `stok` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT '',
  PRIMARY KEY (`id_buku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `buku` WRITE;
/*!40000 ALTER TABLE `buku` DISABLE KEYS */;

INSERT INTO `buku` (`id_buku`, `judul`, `noisbn`, `penulis`, `penerbit`, `tahun`, `stok`, `slug`, `gambar`)
VALUES
	('BK-201702001','At The Mountains of Madness and Other Stories','9786023850594','HP. Lovecraft','Noura Book Publising','2016',28,'at-the-mountains-of-madness-and-other-stories','atthemountainsofmadnessandotherstories.jpg'),
	('BK-201702002','CHANGED','9786026940407','RASHIFA KILLA','Bintang Media','2017',0,'changed','changed.jpg'),
	('BK-201702003','Finding Dory','9786020338095','Disney','Gramedia Pustaka Utama','2017',0,'finding-dory','findingdory.jpg'),
	('BK-201702004','#Dearmantan','9789797945299','Hendra Putra','MediaKita','2016',0,'dearmantan','dearmantan.jpg'),
	('BK-201702005','Komik Ghost School Days vol. 33: Tarian Dens','9786023672929','Citra Mustikawati','Muffin Graphics','2017',0,'komik-ghost-school-days-vol.-33:-tarian-dens','ghost.jpg'),
	('BK-201702006','Lo, Tunangan Gue!','9786024300524','Yenny Marissa','Bentang Belia','2017',0,'lo,-tunangan-gue!','lotunangangue.jpg'),
	('BK-201702007','Memasak Dengan 4 Macam Bumbu Dasar','9789790822771','Ratu Hani','Demedia Pustaka','2016',0,'memasak-dengan-4-macam-bumbu-dasar','memasak.jpg'),
	('BK-201702008','Merayakan Kehilangan','9789797945275','Brian Khrisna','MediaKita','2016',0,'merayakan-kehilangan','merayakankehilangan.jpg'),
	('BK-201702009','Nisekoi : False Love 4','9786020299563','Naoshi Komi','Elex Media Komputindo','2017',17,'nisekoi-:-false-love-4','nisekoi.jpg'),
	('BK-201702010','Princess Academy Mix: Happy Accident','9786023673032','Maharani Aulia & Citra Mustikawati','Muffin Graphics','2017',133,'princess-academy-mix:-happy-accident','princessacademy.jpg'),
	('BK-201702011','Tentang Kamu','9786020822341','Tere-Liye','Republika','2016',0,'tentang-kamu','tentangkamu.jpg'),
	('BK-201703012','Lelah Dengan Drama','-','Aron Ashab','Aron Ashab','2017',23,'lelah-dengan-drama','01.jpg'),
	('BK-201703013','Guerrilla Marketing','-','JAY CONRAD LEVINSON','PLP Book','2017',0,'guerrilla-marketing','02.jpg'),
	('BK-201703014','Perempuan Yang Dihapus Namanya','9786020337135','Avianti Armand','Gramedia Pustaka Utama','2017',0,'perempuan-yang-dihapus-namanya','03.jpg'),
	('BK-201703015','Inevitably In Love','9786022202059','Cecil Wang','Bukune','2017',80,'inevitably-in-love','04.jpg'),
	('BK-201703016','50 Resep Cake, Kue, & Roti','9789790822795','APRI BULENG','Demedia Pustaka','2017',0,'50-resep-cake,-kue,-roti','05.jpg'),
	('BK-201703017','50 Resep Kue Lezat Tanpa Oven','9789790822818','Raditrini','Demedia Pustaka','2017',54,'50-resep-kue-lezat-tanpa-oven','06.jpg'),
	('BK-201703018','Kita, Yang Sebatas Pernah','-','Penakecil_ID','TransMedia Pustaka','2017',0,'kita,-yang-sebatas-pernah','07.jpg'),
	('BK-201703019','The Master Book of Psychology','9786026380067','Harfi Muthia Rahmi, S.Psi., M.Psi.','Anak Hebat Indonesia','2017',0,'the-master-book-of-psychology','masterofp.jpg'),
	('BK-201703020','Sepasang Kekasih yang Belum Bertemu','9789797945312','Boy Candra','MediaKita','2017',0,'sepasang-kekasih-yang-belum-bertemu','08.jpg'),
	('BK-201703021','True Stalker','9789797945329','Sirhayani','MediaKita','2017',0,'true-stalker','09.jpg'),
	('BK-201703022','Jingga Untuk Matahari','9786020337234','Esti Kinasih','Gramedia Pustaka Utama','2017',0,'jingga-untuk-matahari','10.jpg'),
	('BK-201703023','Une Personne Au Bout De La Rue - Seseorang di Ujung Jalan','9786026475268','Yayan D','Katadepan','2017',0,'une-personne-au-bout-de-la-rue---seseorang-di-ujung-jalan','11.jpg'),
	('BK-201703024','PREDIKSI AKURAT! SOAL-SOAL UN YANG AKAN KELUAR SMP/MTS 2017','9789798774683','SMART TUTORS TEAM','Planet Ilmu','2017',0,'prediksi-akurat!-soal-soal-un-yang-akan-keluar-smp/mts-2017','12.jpg'),
	('BK-201703025','Historical Romance: Skandal Musim Semi (Scandal In Spring)','9786020337456','Lisa Kleypas','Gramedia Pustaka Utama','2017',0,'historical-romance:-skandal-musim-semi-(scandal-in-spring)','13.jpg'),
	('BK-201703026','Board Book Kenali Aku','9786020298450','FX Sukamto','Elex Media Komputindo','2017',0,'board-book-kenali-aku','14.jpg');

/*!40000 ALTER TABLE `buku` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table distributor
# ------------------------------------------------------------

DROP TABLE IF EXISTS `distributor`;

CREATE TABLE `distributor` (
  `id_distributor` char(12) NOT NULL DEFAULT '',
  `nama_distributor` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  PRIMARY KEY (`id_distributor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `distributor` WRITE;
/*!40000 ALTER TABLE `distributor` DISABLE KEYS */;

INSERT INTO `distributor` (`id_distributor`, `nama_distributor`, `alamat`, `telepon`)
VALUES
	('DS-201702001','Gramedia','Denpasar','036128932'),
	('DS-201702002','BukuKita','Dalung','036128392');

/*!40000 ALTER TABLE `distributor` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pasok
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pasok`;

CREATE TABLE `pasok` (
  `id_pasok` char(12) NOT NULL DEFAULT '',
  `id_distributor` char(12) NOT NULL DEFAULT '',
  `id_buku` char(12) NOT NULL DEFAULT '',
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_pasok`),
  KEY `id_buku` (`id_buku`),
  KEY `id_distributor` (`id_distributor`),
  CONSTRAINT `pasok_ibfk_1` FOREIGN KEY (`id_distributor`) REFERENCES `distributor` (`id_distributor`),
  CONSTRAINT `pasok_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `pasok` WRITE;
/*!40000 ALTER TABLE `pasok` DISABLE KEYS */;

INSERT INTO `pasok` (`id_pasok`, `id_distributor`, `id_buku`, `jumlah`, `tanggal`)
VALUES
	('PS-201703001','DS-201702001','BK-201702001',31,'2017-03-01'),
	('PS-201703002','DS-201702001','BK-201702009',40,'2017-03-06'),
	('PS-201703003','DS-201702001','BK-201703017',54,'2017-03-12'),
	('PS-201703004','DS-201702001','BK-201703012',25,'2017-03-12'),
	('PS-201703005','DS-201702002','BK-201703015',80,'2017-03-12'),
	('PS-201703006','DS-201702002','BK-201702010',135,'2017-03-12'),
	('PS-202005007','DS-201702001','BK-201702010',10,'2020-05-28');

/*!40000 ALTER TABLE `pasok` ENABLE KEYS */;
UNLOCK TABLES;

DELIMITER ;;
/*!50003 SET SESSION SQL_MODE="NO_AUTO_VALUE_ON_ZERO" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`root`@`localhost` */ /*!50003 TRIGGER `buku_tambah_stok` AFTER INSERT ON `pasok` FOR EACH ROW BEGIN
	UPDATE buku SET stok = stok + NEW.jumlah WHERE id_buku = NEW.id_buku;
END */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`root`@`localhost` */ /*!50003 TRIGGER `buku_edit_stok` AFTER UPDATE ON `pasok` FOR EACH ROW BEGIN
	UPDATE buku SET stok = (stok - OLD.jumlah) + NEW.jumlah WHERE id_buku = OLD.id_buku;
END */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`root`@`localhost` */ /*!50003 TRIGGER `buku_delete_stok` AFTER DELETE ON `pasok` FOR EACH ROW BEGIN
    	IF (SELECT stok FROM buku WHERE id_buku = OLD.id_buku) < OLD.jumlah THEN
		    UPDATE buku SET stok = stok - OLD.jumlah WHERE id_buku = OLD.id_buku;
        ELSE
            UPDATE buku SET stok = 0 WHERE id_buku = OLD.id_buku;
        END IF;
END */;;
DELIMITER ;
/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;


# Dump of table pesan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pesan`;

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `pesan` WRITE;
/*!40000 ALTER TABLE `pesan` DISABLE KEYS */;

INSERT INTO `pesan` (`id_pesan`, `perihal`, `nama`, `email`, `pesan`, `tanggal`)
VALUES
	(1,'Pesanan Buku Changed','Agus Wahyu','aguswahyu@gmail.com','Saya ingin memesan buku Change\r\nJumlah : 1 Biji\r\nAlamat saya Denpasar','2017-03-01 00:00:00'),
	(2,'Pesanan','BukuKita','agusapem@gmail.com','asasas','2017-03-01 10:28:41'),
	(3,'Pesanan1','BukuKita2','agusape2m@gmail.com','asasas','2017-03-01 10:28:41'),
	(4,'Pesanan','BukuKita','agusapem@gmail.com','wdds','2017-03-01 10:29:13'),
	(5,'asas','asas','sds@asa.com','asasa','2017-03-01 10:37:07'),
	(6,'sasa','asas','agusapem@gmail.com','asas','2017-03-01 10:37:24'),
	(7,'asasa','asasa','agusapem@gmail.com','sas','2017-03-01 10:37:32'),
	(8,'asasa','asasa','agusapem@gmail.com','Zasas','2017-03-01 10:37:50'),
	(9,'ajska','asjkasj','agus@wahyu-widiatmika.tk','saksaks\r\nasasa\r\nsasa','2017-03-12 14:56:59');

/*!40000 ALTER TABLE `pesan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pinjaman
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pinjaman`;

CREATE TABLE `pinjaman` (
  `id_pinjaman` char(12) NOT NULL DEFAULT '',
  `id_peminjam` char(12) NOT NULL DEFAULT '',
  `id_admin` char(12) DEFAULT '',
  `jumlah` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `tanggal_permohonan` datetime NOT NULL,
  `tanggal_status` datetime NOT NULL,
  `tanggal_kembali` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pinjaman`),
  KEY `id_peminjam` (`id_peminjam`),
  KEY `id_admin` (`id_admin`),
  CONSTRAINT `pinjaman_ibfk_1` FOREIGN KEY (`id_peminjam`) REFERENCES `user` (`id_user`),
  CONSTRAINT `pinjaman_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `pinjaman` WRITE;
/*!40000 ALTER TABLE `pinjaman` DISABLE KEYS */;

INSERT INTO `pinjaman` (`id_pinjaman`, `id_peminjam`, `id_admin`, `jumlah`, `status`, `tanggal_permohonan`, `tanggal_status`, `tanggal_kembali`)
VALUES
	('PJ-202005003','US-202005004','KS-201702001',2,1,'2020-05-30 23:49:07','2020-05-30 23:49:07',NULL),
	('PJ-202005004','US-202005005',NULL,2,1,'2020-05-30 23:51:29','2020-05-30 23:51:29',NULL);

/*!40000 ALTER TABLE `pinjaman` ENABLE KEYS */;
UNLOCK TABLES;

DELIMITER ;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`root`@`localhost` */ /*!50003 TRIGGER `pinjaman_delete` BEFORE DELETE ON `pinjaman` FOR EACH ROW BEGIN

 DELETE FROM pinjaman_detail WHERE pinjaman_detail.id_pinjaman = OLD.id_pinjaman;

END */;;
DELIMITER ;
/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;


# Dump of table pinjaman_detail
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pinjaman_detail`;

CREATE TABLE `pinjaman_detail` (
  `id_pinjaman_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_pinjaman` char(12) NOT NULL DEFAULT '',
  `id_buku` char(12) NOT NULL DEFAULT '',
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id_pinjaman_detail`),
  KEY `id_penjualan` (`id_pinjaman`),
  KEY `id_buku` (`id_buku`),
  CONSTRAINT `pinjaman_detail_ibfk_1` FOREIGN KEY (`id_pinjaman`) REFERENCES `pinjaman` (`id_pinjaman`),
  CONSTRAINT `pinjaman_detail_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `pinjaman_detail` WRITE;
/*!40000 ALTER TABLE `pinjaman_detail` DISABLE KEYS */;

INSERT INTO `pinjaman_detail` (`id_pinjaman_detail`, `id_pinjaman`, `id_buku`, `jumlah`)
VALUES
	(29,'PJ-202005003','BK-201702009',1),
	(30,'PJ-202005003','BK-201703012',1),
	(31,'PJ-202005004','BK-201702009',1),
	(32,'PJ-202005004','BK-201702010',1);

/*!40000 ALTER TABLE `pinjaman_detail` ENABLE KEYS */;
UNLOCK TABLES;

DELIMITER ;;
/*!50003 SET SESSION SQL_MODE="NO_AUTO_VALUE_ON_ZERO" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`root`@`localhost` */ /*!50003 TRIGGER `detail_ubah_stok` AFTER INSERT ON `pinjaman_detail` FOR EACH ROW BEGIN

 UPDATE buku SET stok = stok-NEW.jumlah WHERE id_buku = NEW.id_buku;

END */;;
DELIMITER ;
/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` char(12) NOT NULL DEFAULT '',
  `nama` varchar(255) NOT NULL,
  `alamat` text,
  `telepon` varchar(15) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `akses` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id_user`, `nama`, `alamat`, `telepon`, `status`, `username`, `password`, `akses`)
VALUES
	('KS-201702001','Agus Wahyu','Dalung Permai','085333574027','active','admin','0c7540eb7e65b553ec1ba6b20de79608',1),
	('KS-201702002','Nyoman','Denpasar1','08122233344','active','nyoman','858142a34603e688c6415f1ee13d6a55',2),
	('KS-201703003','Samplug','Dalung','08123938928','active','samplug','95c315564830848ee0d637d93774437a',2),
	('US-202005004','Kletung','Dalung','08273892','active','klepug','468809f50fddd7847a869bf7979f3aab',3),
	('US-202005005','agus','agus','0813672672','active','agus','0c7540eb7e65b553ec1ba6b20de79608',3);

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
