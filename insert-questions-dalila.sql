SET @TEST_ID=8;

-- QUESTION 1
INSERT INTO `question` (`text`,`evaluation`)
  VALUES ('Um monitor de 15 polegadas apresenta 1024 pixéis na horizontal e 768 na vertical. Uma imagem com dimensões de 1024 pixels por 768 pixéis preencherá este ecrã. O que acontecerá num monitor mais largo, e utilizando a mesma imagem (com dimensões de 1024 por 768 pixels)?',1);
SET @ID_QUESTION=LAST_INSERT_ID();
INSERT INTO `criterion` (`description`,`evaluation`,`question_idquestion`,`issubjective`)
  VALUES ('Fala que cada pixel aparecerá mais largo.',1,@ID_QUESTION,0);
INSERT INTO `criterion` (`description`,`evaluation`,`question_idquestion`,`issubjective`)
  VALUES ('Tens os mesmos pixéis, mas mais espaçados.',1,@ID_QUESTION,0);
INSERT INTO `criterion` (`description`,`evaluation`,`question_idquestion`,`issubjective`)
--  VALUES ('Fala na resolução do ecrã.',1,@ID_QUESTION,1);
  VALUES ('Correição geral:',1,@ID_QUESTION,1);
INSERT INTO `test_has_question` (`test_idtest`,`question_idquestion`,`score`,`usesStressors`)
  VALUES (@TEST_ID,@ID_QUESTION,10,0);

  
-- QUESTION 2
INSERT INTO `xdb`.`question` (`text`,`evaluation`)
  VALUES ('Quando falamos de imagem, é preciso ter em atenção que tipo de imagem vamos trabalhar. Se for fotografia, trataremos de um tipo de imagem; se for para elaborarem cartazes para impressão, falamos de outro tipo de imagem. Indique os dois tipos de imagens e explique o seu sistema de cores.',1);
SET @ID_QUESTION=LAST_INSERT_ID();
INSERT INTO `criterion` (`description`,`evaluation`,`question_idquestion`,`issubjective`)
  VALUES ('Fala e desenvolve a explicação do sistema RGB e do sistema CMYK.',1,@ID_QUESTION,0);
INSERT INTO `criterion` (`description`,`evaluation`,`question_idquestion`,`issubjective`)
  VALUES ('Fala e desenvolve apenas de um dos sistemas CMYK ou RGB.',1,@ID_QUESTION,0);
INSERT INTO `criterion` (`description`,`evaluation`,`question_idquestion`,`issubjective`)
--  VALUES ('Indique apenas o nome dos sistemas RGB ou CMYK.',1,@ID_QUESTION,1);
  VALUES ('Correição geral:',1,@ID_QUESTION,1);
INSERT INTO `test_has_question` (`test_idtest`,`question_idquestion`,`score`,`usesStressors`)
  VALUES (@TEST_ID,@ID_QUESTION,10,1);
  
-- QUESTION 3
INSERT INTO `xdb`.`question` (`text`,`evaluation`)
  VALUES ('Imagine que tem duas imagens uma em formato JPEG e outra em formato em formato TIFF, ao visualizar no monitor, qual a para si, verá com mais qualidade.',1);
SET @ID_QUESTION=LAST_INSERT_ID();
INSERT INTO `criterion` (`description`,`evaluation`,`question_idquestion`,`issubjective`)
  VALUES ('Fala que não tem importância e que o resultado é igual.',1,@ID_QUESTION,0);
INSERT INTO `criterion` (`description`,`evaluation`,`question_idquestion`,`issubjective`)
  VALUES ('Fala que no formato .JPEG e .TIFF a sua visualização no monitor.',1,@ID_QUESTION,0);
INSERT INTO `criterion` (`description`,`evaluation`,`question_idquestion`,`issubjective`)
--  VALUES ('Fala na resolução RGB dos monitores.',1,@ID_QUESTION,1);
  VALUES ('Correição geral:',1,@ID_QUESTION,1);
INSERT INTO `test_has_question` (`test_idtest`,`question_idquestion`,`score`,`usesStressors`)
  VALUES (@TEST_ID,@ID_QUESTION,10,1);