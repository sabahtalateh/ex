CREATE TABLE users (
  id                    INT(11) PRIMARY KEY AUTO_INCREMENT,
  username              VARCHAR(255) NOT NULL UNIQUE,
  email                 VARCHAR(255) NOT NULL UNIQUE,
  password              VARCHAR(128) NOT NULL,
  password_recovery_key VARCHAR(255),
  avatar_path           VARCHAR(255),
  created_at            DATETIME    NOT NULL,
  updated_at            DATETIME    DEFAULT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARACTER SET = utf8;

CREATE INDEX idx_email ON users (email) USING BTREE;
CREATE INDEX idx_username ON users (username) USING BTREE;