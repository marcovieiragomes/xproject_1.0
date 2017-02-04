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
  VALUES ('Fala na resolução do ecrã.',1,@ID_QUESTION,1);
INSERT INTO `test_has_question` (`test_idtest`,`question_idquestion`,`score`,`usesStressors`)
  VALUES (@TEST_ID,@ID_QUESTION,10,0);

  
-- QUESTION 2
INSERT INTO `xdb`.`question` (`text`,`evaluation`)
  VALUES ('Supondo que tem uma imagem 15cm de Largura por  10cm de Altura, capturada com 300 DPI em True Color (24 Bpp). Qual o tamanho que essa imagem irá ocupar?',1);
SET @ID_QUESTION=LAST_INSERT_ID();
INSERT INTO `criterion` (`description`,`evaluation`,`question_idquestion`,`issubjective`)
  VALUES ('Apresenta os cálculos da largura, altura e tamanho e chega ao resultado de de 6Mb.',1,@ID_QUESTION,0);
INSERT INTO `criterion` (`description`,`evaluation`,`question_idquestion`,`issubjective`)
  VALUES ('Apresenta apenas o resultado 6Mb.',1,@ID_QUESTION,0);
INSERT INTO `criterion` (`description`,`evaluation`,`question_idquestion`,`issubjective`)
  VALUES ('Apresenta cálculos errados e valores finais errados.',1,@ID_QUESTION,1);
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
  VALUES ('Fala na resolução RGB dos monitores.',1,@ID_QUESTION,1);
INSERT INTO `test_has_question` (`test_idtest`,`question_idquestion`,`score`,`usesStressors`)
  VALUES (@TEST_ID,@ID_QUESTION,10,1);