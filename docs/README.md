# Manual de Uso da Documentação

Este repositório contém documentação Jekyll em `/docs`.

## Como rodar a documentação localmente (Debian/WSL)

1. Atualize os pacotes:
    ```bash
    sudo apt update
    ```

2. Instale Ruby e dependências:
    ```bash
    sudo apt install ruby-full build-essential zlib1g-dev
    ```

3. Configure o PATH do RubyGems:
    ```bash
    echo '# Install Ruby Gems to ~/gems' >> ~/.bashrc
    echo 'export GEM_HOME="$HOME/gems"' >> ~/.bashrc
    echo 'export PATH="$HOME/gems/bin:$PATH"' >> ~/.bashrc
    source ~/.bashrc
    ```

4. Instale Jekyll e Bundler:
    ```bash
    gem install jekyll bundler
    ```

5. Entre na pasta da documentação:
    ```bash
    cd docs
    ```

6. Instale as dependências do projeto (se houver Gemfile):
    ```bash
    bundle install
    ```

7. Rode o servidor Jekyll:
    ```bash
    bundle exec jekyll serve
    ```
    ou
    ```bash
    jekyll serve
    ```

8. Acesse no navegador:
    ```
    http://localhost:4000
    ```

---

## Sobre a documentação

- Os métodos de manipulação de string estão documentados em `/docs/docs/methods/`.
- Exemplos de uso estão disponíveis em cada página de método.

---