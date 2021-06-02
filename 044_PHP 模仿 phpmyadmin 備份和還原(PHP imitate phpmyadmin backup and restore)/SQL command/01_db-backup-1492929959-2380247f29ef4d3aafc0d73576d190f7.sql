DROP TABLE csv_table;

CREATE TABLE `csv_table` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO csv_table VALUES("1","修平科技大學");
INSERT INTO csv_table VALUES("2","逢甲大學");



