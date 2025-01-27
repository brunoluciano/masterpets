Insert Into estados (id,uf,nome) Values(1,'AC','Acre');
Insert Into estados (id,uf,nome) Values(2,'AL','Alagoas');
Insert Into estados (id,uf,nome) Values(3,'AM','Amazonas');
Insert Into estados (id,uf,nome) Values(4,'AP','Amapá');
Insert Into estados (id,uf,nome) Values(5,'BA','Bahia');
Insert Into estados (id,uf,nome) Values(6,'CE','Ceará');
Insert Into estados (id,uf,nome) Values(7,'DF','Distrito Federal');
Insert Into estados (id,uf,nome) Values(8,'ES','Espírito Santo');
Insert Into estados (id,uf,nome) Values(9,'GO','Goiás');
Insert Into estados (id,uf,nome) Values(10,'MA','Maranhão');
Insert Into estados (id,uf,nome) Values(11,'MG','Minas Gerais');
Insert Into estados (id,uf,nome) Values(12,'MS','Mato Grosso do Sul');
Insert Into estados (id,uf,nome) Values(13,'MT','Mato Grosso');
Insert Into estados (id,uf,nome) Values(14,'PA','Pará');
Insert Into estados (id,uf,nome) Values(15,'PB','Paraíba');
Insert Into estados (id,uf,nome) Values(16,'PE','Pernambuco');
Insert Into estados (id,uf,nome) Values(17,'PI','Piauí');
Insert Into estados (id,uf,nome) Values(18,'PR','Paraná');
Insert Into estados (id,uf,nome) Values(19,'RJ','Rio de Janeiro');
Insert Into estados (id,uf,nome) Values(20,'RN','Rio Grande do Norte');
Insert Into estados (id,uf,nome) Values(21,'RO','Rondônia');
Insert Into estados (id,uf,nome) Values(22,'RR','Roraima');
Insert Into estados (id,uf,nome) Values(23,'RS','Rio Grande do Sul');
Insert Into estados (id,uf,nome) Values(24,'SC','Santa Catarina');
Insert Into estados (id,uf,nome) Values(25,'SE','Sergipe');
Insert Into estados (id,uf,nome) Values(26,'SP','São Paulo');
Insert Into estados (id,uf,nome) Values(27,'TO','Tocantins');

INSERT INTO `tipousuarios` (`id`, `descricao`, `created_at`, `updated_at`)
    VALUES  (NULL, 'Cliente', CURRENT_TIME(), CURRENT_TIME()),
            (NULL, 'Funcionário', CURRENT_TIME(), CURRENT_TIME()),
            (NULL, 'Gerente', CURRENT_TIME(), CURRENT_TIME());

INSERT INTO `unidademedidas` (`id`, `descricao`, `abreviacao`, `created_at`, `updated_at`)
    VALUES (NULL, 'grama', 'g', CURRENT_TIME(), CURRENT_TIME()),
           (NULL, 'quilo', 'kg', CURRENT_TIME(), CURRENT_TIME()),
           (NULL, 'mililitro', 'ml', CURRENT_TIME(), CURRENT_TIME()),
           (NULL, 'litro', 'l', CURRENT_TIME(), CURRENT_TIME()),
           (NULL, 'unidade', 'un', CURRENT_TIME(), CURRENT_TIME());

INSERT INTO `especies` (`id`, `nome`, `created_at`, `updated_at`) 
    VALUES (NULL, 'Canino', NULL, NULL), 
           (NULL, 'Felino', NULL, NULL);

INSERT INTO `racas` (`id`, `nome`, `especie_id`, `created_at`, `updated_at`) 
    VALUES (NULL, 'Poodle', '1', NULL, NULL), 
           (NULL, 'Siamês', '2', NULL, NULL);


INSERT INTO `portes` (`id`, `descricao`, `created_at`, `updated_at`) 
    VALUES (NULL, 'Pequeno', NULL, NULL), 
           (NULL, 'Médio', NULL, NULL), 
           (NULL, 'Grande', NULL, NULL), 
           (NULL, 'Gigante', NULL, NULL);

INSERT INTO `cores` (`id`, `descricao`, `created_at`, `updated_at`) 
    VALUES (NULL, 'Preto', NULL, NULL), 
           (NULL, 'Branco', NULL, NULL), 
           (NULL, 'Marrom', NULL, NULL), 
           (NULL, 'Castanho', NULL, NULL), 
           (NULL, 'Rajado', NULL, NULL);

INSERT INTO `pelos` (`id`, `descricao`, `created_at`, `updated_at`) 
    VALUES (NULL, 'Curto', NULL, NULL), 
           (NULL, 'Médio', NULL, NULL), 
           (NULL, 'Longo', NULL, NULL);

INSERT INTO `tiposervicos` (`id`, `descricao`, `created_at`, `updated_at`) 
    VALUES (NULL, 'Banho', NULL, NULL);

INSERT INTO `servicos` (`id`, `descricao`, `tipo_servico_id`, `valor`, `created_at`, `updated_at`) 
    VALUES (NULL, 'Banho pet médio', '1', '45', NULL, NULL);




