# 📄 Documento Técnico — Contract Flow

---

# 📌 Sobre o Projeto

O projeto foi desenvolvido como solução para o desafio técnico proposto, com foco principal na organização do backend, modelagem das entidades e implementação das regras de negócio relacionadas aos contratos e serviços.

A ideia foi construir uma aplicação simples, mas organizada de forma que fosse fácil manter e evoluir posteriormente.

---

# 🏗️ Estrutura da Aplicação

Apesar do desafio não exigir framework, optei por utilizar Laravel pela praticidade e pela estrutura que ele oferece para aplicações desse tipo.

O projeto foi organizado utilizando o padrão MVC, separando controllers, models e views para manter responsabilidades mais bem definidas dentro da aplicação.

Além disso, também utilizei Form Requests do Laravel para separar as validações das operações de criação e atualização dos CRUDs. Dessa forma, evitei repetição de regras e deixei os controllers mais simples e focados apenas no fluxo da aplicação.

A estrutura principal ficou dividida entre:

- Controllers para controle do fluxo HTTP
- Models representando as entidades e relacionamentos
- Requests para validações
- Services para algumas regras de negócio relacionadas aos contratos

---

# 🧠 Regras de Negócio

O cálculo do valor do contrato foi implementado de forma dinâmica com base nos itens vinculados ao contrato.

Cada item possui:

- serviço
- quantidade
- valor unitário

Com isso, o valor total é calculado a partir da soma dos itens cadastrados no momento.

Também foi implementada uma regra adicional de desconto para contratos com maior quantidade de itens. Contratos com 5 ou mais itens recebem automaticamente 10% de desconto sobre o valor total.

Além disso, foram adicionadas algumas regras complementares:

- clientes inativos não podem receber novos contratos
- contratos cancelados não podem ser editados
- o valor unitário do item pode ser diferente do valor base do serviço

---

# ⚙️ Frontend

No frontend utilizei Blade junto com Vue.js.

Preferi utilizar Vue apenas no formulário de contratos, já que era a parte mais dinâmica da aplicação por envolver adição e remoção de itens em tempo real.

A decisão de não desenvolver toda a aplicação em Vue foi principalmente para evitar aumentar a complexidade do projeto e conseguir priorizar melhor o prazo do desafio.

---

# 🗄️ Banco de Dados

Foi utilizado PostgreSQL como banco relacional.

As tabelas foram criadas através de migrations e também foram adicionados seeders para facilitar os testes e o desenvolvimento da aplicação.

Os relacionamentos foram estruturados de forma simples para representar:

- clientes
- contratos
- serviços
- itens do contrato

---

# 🧪 Testes

Também foram implementados alguns testes automatizados utilizando PHPUnit.

Os testes foram focados principalmente nas validações e em partes mais importantes das regras de negócio, como criação de contratos e cálculos.

---

# 🐳 Ambiente Docker

O projeto foi dockerizado para facilitar a execução em diferentes ambientes e reduzir problemas de configuração local.

O ambiente inclui:

- aplicação Laravel
- PostgreSQL
- PgAdmin

A ideia foi deixar o processo de execução o mais simples possível para avaliação do projeto.

---

# 🔮 Melhorias Futuras

Com mais tempo, algumas melhorias que poderiam ser adicionadas seriam:

- API REST completa
- autenticação de usuários
- filtros
- histórico de alterações nos contratos
- mais testes automatizados
