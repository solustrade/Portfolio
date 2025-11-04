# Manual completo do `gh` (GitHub CLI) — versão 2.83.0

**Observação:** este manual segue a documentação oficial do GitHub CLI e foi elaborado para a versão alvo **2.83.0**. Onde houve incerteza sobre changelogs oficiais dessa versão, o changelog específico foi omitido por não estar disponível publicamente nas fontes consultadas.

---

## Sumário rápido
1. Visão geral
2. Instalação (macOS / Windows / Linux / Snap / Homebrew / apt / dnf / pacman / manual)
3. Atualização e desinstalação
4. Autenticação (gh auth) — login via browser, token, SSH e Git protocol
5. Estrutura de comandos e navegação (help, flags globais, repositório alvo)
6. Comandos essenciais e exemplos (repo, clone, pr, issue, release, workflow, gist, api, alias, extension)
7. Integração com git (git protocol, push/pull, criação de branches, revisão de PR)
8. Uso em scripts / automação / CI (non-interactive, GH_TOKEN, --json/--jq)
9. Configuração, personalização e aliases
10. Extensões `gh` (instalar/remover/listar)
11. Autocompletar para shells (bash / zsh / fish / powershell)
12. Troubleshooting comum e logs
13. Segurança, permissões e melhores práticas
14. Apêndice: comandos de referência rápida

---

## 1 — Visão geral
`gh` é a CLI oficial do GitHub que permite gerenciar repositórios, pull requests, issues, releases, workflows, gists e outros recursos do GitHub diretamente do terminal. Ele complementa o `git` (controle de versão local) e fornece operações do GitHub num fluxo de trabalho interativo e scriptável.

Principais benefícios:
- Agiliza tarefas comuns do GitHub sem sair do terminal.
- Produz saída JSON para integração com scripts/CI.
- Suporta aliases e extensões para personalização.

---

## 2 — Instalação

**Verificação final:** após instalar, execute:
```bash
gh --version
```

### macOS
- Homebrew (recomendado):
```bash
brew install gh
```
- Atualizar:
```bash
brew upgrade gh
```

- Instalação manual: baixar binário/tarball da página de releases e mover o binário para `/usr/local/bin` ou `/opt/homebrew/bin` conforme arquitetura.

### Windows
- Winget:
```powershell
winget install --id GitHub.cli
```
- Scoop:
```powershell
scoop install gh
```
- Installer MSI: baixe o instalador MSI nas releases do projeto e execute.

### Linux (Debian/Ubuntu)
- Adicionar chave e instalar via apt (exemplo de fluxo oficial):
```bash
curl -fsSL https://cli.github.com/packages/githubcli-archive-keyring.gpg | sudo dd of=/usr/share/keyrings/githubcli-archive-keyring.gpg
# adicionar repositório (deb) conforme instruções oficiais e depois:
sudo apt update
sudo apt install gh
```

### Fedora / RHEL / CentOS (RPM)
- Usando dnf/yum e repositório oficial:
```bash
sudo dnf -y install 'dnf-plugins-core'
sudo dnf -y config-manager --add-repo https://cli.github.com/packages/rpm/gh-cli.repo
sudo dnf -y install gh
```

### Snap (quando disponível)
```bash
sudo snap install gh --classic
```

### Observações sobre versão específica (e.g., 2.83.0)
Se precisar de exatamente **2.83.0**, baixe o pacote correspondente (DEB/RPM/ZIP/TAR/MSI) da lista de releases do projeto `cli/cli` e instale manualmente. Use `gh --version` para validar a versão instalada.

---

## 3 — Atualização e desinstalação
- Homebrew: `brew upgrade gh` / `brew uninstall gh`
- apt: `sudo apt update && sudo apt install --only-upgrade gh` / `sudo apt remove gh`
- dnf: `sudo dnf upgrade gh` / `sudo dnf remove gh`
- snap: `sudo snap refresh gh` / `sudo snap remove gh`

---

## 4 — Autenticação (`gh auth`)
- Iniciar fluxo de login interativo:
```bash
gh auth login
```
Isto abre uma URL no navegador para autorizar o `gh` e grava credenciais localmente (`~/.config/gh/hosts.yml`).

- Login com token (não interativo):
```bash
echo $GITHUB_TOKEN | gh auth login --with-token
# ou
gh auth login --with-token < token.txt
```

- Especificar protocolo git ao configurar:
```bash
gh auth login --git-protocol ssh
# ou --git-protocol https
```

- Verificar status:
```bash
gh auth status
```

- Em CI/automação, defina `GH_TOKEN` (ou `GITHUB_TOKEN` quando apropriado) como variável de ambiente com escopo mínimo necessário.

---

## 5 — Estrutura de comandos e navegação
- Ajuda geral:
```bash
gh help
gh --help
```
- Ajuda por comando:
```bash
gh <comando> --help
# ex: gh pr --help
```

- Comandos top-level mais comuns:
`auth`, `repo`, `pr`, `issue`, `release`, `workflow`/`run`, `gist`, `api`, `alias`, `extension`, `codespace`, `ssh-key`, `config`.

- Apontando para outro repositório: `-R OWNER/REPO` ou `--repo OWNER/REPO`.
- Usar hostes alternativos (GitHub Enterprise): `--hostname <host>` e autentique para esse host.

---

## 6 — Comandos essenciais e exemplos

### Repositório
- Criar repositório localmente a partir da pasta atual e publicar no GitHub:
```bash
gh repo create my-repo --public --source=. --remote=origin --push
```
- Clonar:
```bash
gh repo clone OWNER/REPO
```
- Ver detalhes do repo:
```bash
gh repo view --web     # abre no navegador
gh repo view --json name,description --jq '.description'
```

### Pull Requests (PR)
- Criar PR a partir da branch atual:
```bash
gh pr create --base main --head minha-branch --title "Minha PR" --body "Descrição detalhada"
```
- Listar PRs:
```bash
gh pr list --state open --assignee @me
```
- Fazer checkout da branch da PR:
```bash
gh pr checkout 123
```
- Visualizar no browser:
```bash
gh pr view 123 --web
```
- Merge (opções):
```bash
gh pr merge 123 --merge        # merge commit
gh pr merge 123 --squash       # squash and merge
gh pr merge 123 --rebase       # rebase and merge
# flags adicionais: --delete-branch, --admin, --subject, --body
```

### Issues
- Criar issue:
```bash
gh issue create --title "Bug X" --body "Como reproduzir..."
```
- Listar por label:
```bash
gh issue list --label bug --state open
```

### Releases
- Criar release:
```bash
gh release create v1.2.0 --notes "Changelog resumido..." --target main
```
- Upload de asset para release:
```bash
gh release upload v1.2.0 build/output.zip
```
- Visualizar lista de releases:
```bash
gh release list
gh release view v1.2.0
```

### Workflows / Actions
- Listar runs:
```bash
gh run list
```
- Ver logs de um run (visualizar no terminal):
```bash
gh run view <run-id> --log
```
- Re-executar um run:
```bash
gh run rerun <run-id>
```

### API (REST e GraphQL)
- Chamada REST simples:
```bash
gh api repos/OWNER/REPO --method GET
```
- Rodar uma query GraphQL:
```bash
gh api graphql -f query='query { viewer { login } }'
```

### Alias
- Criar alias para comandos frequentes:
```bash
gh alias set prco 'pr checkout'
gh prco 123
```

### Extensões
- Instalar uma extensão do GitHub:
```bash
gh extension install owner/repo
```
- Listar e remover extensões:
```bash
gh extension list
gh extension remove <name>
```

---

## 7 — Integração com `git`
- O `gh` complementa o `git` — continue usando `git` para commits, merges locais, rebase, etc.
- Fluxo típico para abrir PR:
```bash
git checkout -b feature/x
# alterações...
git add . && git commit -m "feat: adiciona X"
git push -u origin feature/x
gh pr create --base main --fill
```
- `gh` pode configurar o remote automaticamente quando criar repositório novo com `gh repo create`.

---

## 8 — Uso em scripts / automação / CI
- Saída estruturada (`--json`) e filtragem integradas (`--jq`) para parsing em scripts:
```bash
gh pr list --state open --json number,title,author --jq '.[] | "\(.number) \(.title) by \(.author.login)"'
```
- Exemplo em CI para criar release:
```bash
echo "$GH_TOKEN" | gh auth login --with-token
gh release create "v${VERSION}" --notes-file changelog.md
```
- Em GitHub Actions, prefira `GITHUB_TOKEN` (do próprio Action) quando possível; para outras CIs, use `GH_TOKEN` com escopo mínimo.

---

## 9 — Configuração, personalização e aliases
- Arquivos de configuração principais:
  - `~/.config/gh/hosts.yml` — credenciais por host.
  - `~/.config/gh/config.yml` — configurações do CLI (ex.: git_protocol, editor, prompt).
- Comandos úteis:
```bash
gh config set git_protocol ssh
gh config get git_protocol
gh config list
```

---

## 10 — Extensões `gh`
- Extensões adicionam novos subcomandos. Exemplos comuns incluem extensões para fluxos de trabalho específicos, integração com ferramentas externas, helpers de revisão de código, etc.
- Instalação a partir de repositório público do GitHub:
```bash
gh extension install owner/repo
```

---

## 11 — Autocompletar para shells
- Gerar completions para bash/zsh/fish/powershell:
```bash
gh completion -s bash > /etc/bash_completion.d/gh
gh completion -s zsh > ~/.oh-my-zsh/completions/_gh
gh completion -s powershell | Out-File -Encoding ASCII $PROFILE\gh-completion.ps1
```
- Se o gerenciador de pacotes não instalou skills de autocomplete, execute os comandos acima e siga instruções do seu shell para carregar as scripts de completions.

---

## 12 — Troubleshooting comum
**Erro de autenticação / token expirado**:
- Verifique com `gh auth status`. Refaça `gh auth login` ou use `gh auth login --with-token` com PAT novo.

**Permissão negada (403)**:
- Confirme escopos do token e permissões do usuário no repositório/organização.
- Para GitHub Enterprise, verifique `--hostname` e compatibilidade entre versões do servidor e client.

**Comandos falhando em CI**:
- Confirme que `GH_TOKEN` está presente e que o runner/container tem `gh` instalado. Insira `gh --version` nos logs para diagnosticar.

**Debug**:
- Rode o comando com variável de ambiente para depuração:
```bash
GH_DEBUG=1 gh <command>
```

---

## 13 — Segurança, permissões e melhores práticas
- Use PATs com escopo mínimo. Prefira `read:org`, `repo` (quando estritamente necessário), `workflow` para ações relacionadas a workflows.
- Nunca comite tokens em repositórios públicos ou privados.
- Para automações, use secret managers e env vars do CI (ex.: `GH_TOKEN`) e revogue tokens antigos.
- Para operações `git`, preferir SSH quando trabalhar de estações pessoais; para CI, usar tokens.

---

## 14 — Apêndice: comandos de referência rápida
- `gh --version`
- `gh auth login`
- `gh auth status`
- `gh repo create|clone|view`
- `gh pr create|list|view|checkout|merge`
- `gh issue create|list|view`
- `gh release create|list|view|upload`
- `gh run list|view|rerun`
- `gh extension install|list|remove`
- `gh alias set NAME 'command'`
- `gh api`

---
