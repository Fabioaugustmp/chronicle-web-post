# Chronicle

**Chronicle** é uma plataforma de publicação de conteúdo desenvolvida em PHP com interface responsiva utilizando Bootstrap e armazenamento de dados em MySQL. Esta aplicação permite a criação, organização e compartilhamento de posts de maneira rápida e prática.

## Tecnologias Utilizadas
- **PHP**: Linguagem de programação para o backend.
- **Bootstrap**: Framework CSS para design responsivo.
- **MySQL**: Banco de dados relacional para armazenamento de informações.

## Estrutura do Banco de Dados

Para configurar o banco de dados, siga as instruções abaixo para criar as tabelas e inserir dados iniciais.

### Passo a Passo

1. **Conecte-se ao MySQL**  
   Acesse o MySQL através de seu terminal, ou utilize uma ferramenta de interface gráfica, como phpMyAdmin.

2. **Crie o banco de dados (caso ainda não exista)**  
```sql 
CREATE DATABASE chronicle_db;
```
3. **Use o banco de dados**
```sql 
USE chronicle_db;
```
4. **Crie a tabela posts**
   Execute o seguinte comando para criar a tabela posts:
  ```sql    
CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    creation_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```
5. **Inserção de Dados Iniciais**
  Após criar a tabela, adicione alguns posts iniciais com o comando:

  ```sql 
INSERT INTO posts (title, description) VALUES 
('Bem-vindo ao Chronicle', 'Este é o nosso primeiro post de exemplo no Chronicle. Esperamos que você goste da experiência!'),
('Dicas de Publicação', 'Aqui vão algumas dicas para criar posts envolventes e atrativos.'),
('Novidades na Plataforma', 'Fique por dentro das últimas atualizações e novidades do Chronicle.');
```

6. **Verificação dos dados**
  ```sql 
    SELECT * FROM posts;
```

7. **Crie a tabela usuários**

  ```sql 
    CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    creation_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```
  
7.1 ***Relacione as tabelas entre usuários e posts***

  ```sql 
UPDATE posts 
SET user_id = 1; -- Replace '1' with a valid user ID from the `users` table

```
7.2 ***Faça a adição dos dados essenciais***

```sql
  INSERT INTO users (username, email, password_hash) VALUES 
('admin', 'admin@example.com', 'hashsenha1'),
('editor', 'editor@example.com', 'hashsenha2'),
('viewer', 'viewer@example.com', 'hashsenha3');
```

7.3 ***Altere a relação entre as tabelas***
```sql
ALTER TABLE posts 
ADD CONSTRAINT fk_user_id 
FOREIGN KEY (user_id) REFERENCES users(id) 
ON DELETE CASCADE;
```

7.4 ***Execute a relação entre usuários e posts***

```sql
UPDATE posts SET user_id = 1 WHERE id = 1; -- Admin cria o primeiro post
UPDATE posts SET user_id = 2 WHERE id = 2; -- Editor cria o segundo post
UPDATE posts SET user_id = 3 WHERE id = 3; -- Viewer cria o terceiro post
```

