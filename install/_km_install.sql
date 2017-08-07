
CREATE TABLE `km_admin` (
  `id` bigint(10) NOT NULL auto_increment,
`username` char(50) default NULL,
`password` char(50) default NULL,
PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


CREATE TABLE `km_article` (
  `id` bigint(10) NOT NULL auto_increment,
  `title` char(200) default NULL,
  `content` varchar(4000) default NULL,
  `time` char(60) default 0,
  `writer` char(50) default NULL,
  `come` char(50) default NULL,
  `clicktime` bigint(10) default 0,
  `classname` char(50) default NULL,
  `classid_b` bigint(10) default NULL,
  `classid_s` bigint(10) default NULL,
  `description` char(255) default NULL,
  `recommen` char(6) default NULL,
  `popular` char(6) default NULL,
  `pic_s` char(255) default NULL,
  `pic_b` char(255) default NULL,

  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=187 DEFAULT CHARSET=utf8;


CREATE TABLE `km_article_class_b` (
  `classid_b` bigint(10) NOT NULL auto_increment,
  `classname` char(50) default NULL,
  `classOrder` int(10) NOT NULL default '0',
  PRIMARY KEY  (`classid_b`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;


CREATE TABLE `km_article_class_s` (
  `classid_s` bigint(10) NOT NULL auto_increment,
  `classid_b` bigint(10) default NULL,
  `classname` char(50) default NULL,
  `classOrder` int(10) NOT NULL default '0',
  PRIMARY KEY  (`classid_s`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;