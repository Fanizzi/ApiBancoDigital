CREATE DATABASE db_bancodigital;

USE db_bancodigital;

-- -----------------------------------------------------
-- TABELA "CORRENTISTA"
-- -----------------------------------------------------
CREATE TABLE Correntista(
  id INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NOT NULL,
  cpf CHAR(11) NOT NULL,
  data_nasc DATE NOT NULL,
  senha VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);
-- -----------------------------------------------------
-- TABELA "CONTA"
-- -----------------------------------------------------
CREATE TABLE Conta(
  id INT NOT NULL AUTO_INCREMENT,
  numero INT NOT NULL,
  tipo VARCHAR(255) NOT NULL,
  senha VARCHAR(255) NOT NULL,
  id_correntista INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (id_correntista) REFERENCES Correntista (id)
);

-- -----------------------------------------------------
-- TABELA "CHAVE PIX"
-- -----------------------------------------------------
CREATE TABLE Chave_Pix(
  id INT NOT NULL AUTO_INCREMENT,
  chave VARCHAR(255) NOT NULL,
  tipo ENUM('CPF', 'TELEFONE', 'EMAIL', 'ALEATORIA') NOT NULL,
  id_conta INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (id_conta) REFERENCES Conta (id)
  );

-- -----------------------------------------------------
-- TABELA "TRANSACAO"
-- -----------------------------------------------------
CREATE TABLE Transacao (
  id INT NOT NULL AUTO_INCREMENT,
  data_transacao DATE NOT NULL,
  valor DOUBLE NOT NULL,
  PRIMARY KEY (id)
  );

-- -----------------------------------------------------
-- TABELA "TRANSACAO_CONTA_ASSOC"
-- -----------------------------------------------------
CREATE TABLE Transacao_Conta_Assoc(
  id INT NOT NULL AUTO_INCREMENT,
  id_transacao INT NOT NULL,
  id_remetente INT NOT NULL,
  id_destinatario INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (id_destinatario) REFERENCES conta (id),
  FOREIGN KEY (id_remetente) REFERENCES conta (id),
  FOREIGN KEY (id_transacao) REFERENCES transacao (id)
);

