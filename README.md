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
  
